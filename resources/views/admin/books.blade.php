@extends('layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Books
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Books</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        @include('includes.messages')

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <a href="#addnewbook" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered">
                            <thead>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Availability</th>
                                <th>Tools</th>
                            </thead>
                            <tbody>
                                @foreach( $books as $book)

                                <tr>
                                    <td>{{$book->title}}</td>
                                    <td>{{$book->author}}</td>
                                    <td>{{$book->price}} $</td>
                                    <td>{{$book->quantity}}</td>
                                    <td>
                                        @if( $book->available == 1 )
                                        <span class="label label-warning">Available</span>
                                        @else
                                        <span class="label label-danger">Out of Stock</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="#edit{{$book->id}}" data-toggle="modal" class="btn btn-success btn-sm edit btn-flat"><i class='fa fa-edit'></i> Edit</a>
                                        <a href="#delete{{$book->id}}" data-toggle="modal" class="btn btn-danger btn-sm delete btn-flat"><i class='fa fa-trash'></i> Delete</a>
                                    </td>
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
@foreach( $books as $book)
@include('includes.edit_delete_books')
@endforeach

@include('includes.add_books')

@endsection
