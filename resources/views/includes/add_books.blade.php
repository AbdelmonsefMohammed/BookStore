<!-- Add -->
<div class="modal fade" id="addnewbook">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Add Book</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('books.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="barcode" class="col-sm-3 control-label">BarCode</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="barcode" name="barCode" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-sm-3 control-label">Title</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="author" class="col-sm-3 control-label">Author</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="author" name="author">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="quantity" class="col-sm-3 control-label">Quantity</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="quantity" name="quantity" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price" class="col-sm-3 control-label">Price</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="price" name="price" required>
                        </div>
                    </div>                    
                    <div class="form-group">
                        <label for="available" class="col-sm-3 control-label">Available</label>

                        <div class="col-sm-9">
                            <select class="form-control" id="available" name="available" required>
                                <option value="" selected>- Select -</option>
                                <option value="0">Not Available </option>
                                <option value="1">Available </option>
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

