<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Requests\BookRec;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.books')->with(['books'=> Book::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRec $request)
    {
        $request->validated();

        $book = new Book;
        $book->barCode = $request->barCode;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->price = $request->price;  
        $book->quantity = $request->quantity;
        $book->available = $request->available;
        $book->description = $request->description;
        $book->save();

        return redirect()->route('books.index')->with('success', 'Book Has Been Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function update(BookRec $request, Book $book)
    {
        $request->validated();

        $book->barCode = $request->barCode;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->price = $request->price;
        $book->quantity = $request->quantity;
        $book->available = $request->available;
        $book->description = $request->description;
        $book->save();

        return redirect()->route('books.index')->with('success', 'Book Has Been Created Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book Has Been Deleted Successfully');
    }
}
