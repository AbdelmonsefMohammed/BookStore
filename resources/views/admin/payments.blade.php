@extends('layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Payments
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Payments</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        @include('includes.messages')

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <table id="example1" class="table table-bordered">
                            <thead>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Products</th>
                            </thead>
                            <tbody>
                                @foreach( $payments as $payment)

                                <tr>
                                    <td>{{$payment->payment_date}}</td>
                                    <td>$ {{$payment->amount}}</td>
                                    <td>{{$payment->products}}</td>
                                </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
