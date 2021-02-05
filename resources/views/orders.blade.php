@extends('layouts.app')

@section('content')
<section class="accre_body">
    <div class="container">
        <div class="row">
            <div class="ml-auto mb-3">
                <form action="{{route('order.store')}}" method="POST">
                    @csrf
                    <label for="#search">Add product</label>
                    <input id="search" class="" name="barCode" type="text">
                    <button type="submit"class="btn btn-primary">Add</button>
                </form>
            </div>

        </div>
        <div class="row mt-3">
            <div class="col-md-10">
                <h4> Make Payment: </h4>
                @include('includes.messages')
                <table class="table text-center" >
                    <tr class="thead-light">
                        <th>
                            #
                        </th>
                        <th>
                            Book Title
                        </th>
                        <th>
                            Quantity
                        </th>
                        <th>
                            Price
                        </th>
                        <th>
                            
                        </th>
                    </tr>

					@php	$counter = 1; @endphp
					@foreach (Cart::content() as $item)
					<tr id="item{{$item->model->exam_id}}">
						<td>
							{{$counter}}
						</td>
						<td>
							{{$item->model->title}}
						</td>
						<td>
							{{$item->qty}}
						</td>
						<td>
							{{$item->price}} EGP
						</td>
						<td>
							<form style="display:inline-block;" method='POST' action='{{route("order.destroy", $item->rowId)}}' >
								@csrf
								@method('DELETE')
								<button class="btn btn-danger" title="Delete" type="submit">Delete</button>
							 </form>
						</td>
					</tr>
					@php	$counter++; @endphp
					@endforeach

                    <tfoot>
                        <tr>
                          <td colspan="3">Total</td>
                          <td>{{round($newTotal, 2)}} EGP</td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="col-md-2">
                <div class="price">
					<table>
						<tr class="fees">
							@if ($newTotal > 0)
								<td colspan="2"><h4>  Total fees : <span>{{round($newTotal, 2)}} EGP</span></h4></td>
							@else
								<td colspan="2"><h4>  Total fees : <span>Free</span></h4></td>
							@endif
						</tr>
					</table>	
                </div>

                <div class="d-flex justify-content-between">
                    <form method='Get' action='{{route('confirm.payment')}}' target="_blank">
                        <button {{ Cart::count() === 0 ? "disabled" : "" }} targ type="submit"class="btn btn-primary reg-btn"> Confirm </button>
                     </form>
                    <a href="{{route('emptyCart')}}" class="btn btn-danger {{ Cart::count() === 0 ? "disabled" : "" }}">Cancel</a>
                </div>
            </div>

        </div>

        </div>
    </div>
    
</section>
@endsection

@section('script')

@endsection