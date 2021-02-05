<!-- Edit -->
<div class="modal fade" id="edit{{$book->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b><span class="employee_id">Edit Book</span></b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('books.update',$book->id) }}">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label for="title" class="col-sm-3 control-label">Title</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="title" name="title" value="{{$book->title}}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="barcode" class="col-sm-3 control-label">BarCode</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="barcode" name="barCode" value="{{$book->barCode}}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="author" class="col-sm-3 control-label">Author</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="author" name="author" value="{{$book->author}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="quantity" class="col-sm-3 control-label">Quantity</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="quantity" name="quantity" value="{{$book->quantity}}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price" class="col-sm-3 control-label">Price</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="price" name="price" value="{{$book->price}}" required>
                        </div>
                    </div>                    
                    <div class="form-group">
                        <label for="available" class="col-sm-3 control-label">Available</label>

                        <div class="col-sm-9">
                            <select class="form-control" id="available" name="available" required>
                                <option value="">- Select -</option>
                                <option value="0" <?php if($book->available == '0') echo "selected"; ?>>Not Available </option>
                                <option value="1" <?php if($book->available == '1') echo "selected"; ?>>Available </option>
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete{{$book->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b><span class="employee_id">Delete Book</span></b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('books.destroy',$book->id) }}">
                    @csrf
                    {{ method_field('DELETE') }}
                    <div class="text-center">
                        <p>DELETE {{$book->title}}</p>
                        <h2 class="bold del_employee_name"></h2>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i> Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>