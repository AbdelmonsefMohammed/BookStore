<?php

namespace App\Http\Controllers;

use App\Book;
use App\Payment;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Carbon\Carbon;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;


class OrderController extends Controller
{
    public function index()
    {
        $subtotal = Cart::subtotal();
        $tax = config('cart.tax') / 100;
        $discount = session()->get('coupon')['discount'] ?? 0;
        $newSubtotal = ($subtotal - $discount);
        if($newSubtotal < 0){
            $newSubtotal = 0;
        }
        $newTax = $newSubtotal * $tax;
        $newTotal = $newSubtotal + $newTax;

        return view('orders',compact('discount','newSubtotal','newTax','newTotal'));

    }

    public function store(Request $request)
    {   
        $book = Book::where('barCode', $request->barCode)->first();
        Cart::add($book->id, $book->title, 1, $book->price, 0)->associate('App\Book');

        return redirect()->back()->with('success', 'Book added to cart successfully');
    }

    public function destroy($id)
    {
        Cart::remove($id);
        return back()->with('success','Book was removed successfully');
    }

    public function destroyCart()
    {
        Cart::destroy();
        return redirect()->back();
    }
    public function confirmPayment()
    {
        $customer = new Buyer([
            'name'          => 'John Doe',
            'custom_fields' => [
                'email' => 'test@example.com',
            ],
        ]);
        $items = [];
        foreach (Cart::content() as $item){
        $items[] = (new InvoiceItem())->title($item->model->title)->pricePerUnit($item->model->price)->quantity($item->qty);
        }
        $invoice = Invoice::make()
        ->buyer($customer)
        ->addItems($items)
        ->logo(public_path('vendor/invoices/sample-logo.png'));
        $books = [];
        foreach (Cart::content() as $item){
            $books[] =  $item->model->title;
            $book = Book::findOrFail($item->id);
            $newQuantity = $book->quantity - $item->qty;
            $book->update([
                'quantity' => $newQuantity,
            ]);
        }
        $products = implode(" / ", $books);
        $price = Cart::subtotal();

        $payment = Payment::create([
            'payment_date' => Carbon::now(),
            'amount'        => $price,
            'products'           => $products,
        ]);
        Cart::destroy();
        return $invoice->stream();
        // return redirect('/order')->with('success', 'Payment Has Been Created Successfully');
    }
}
