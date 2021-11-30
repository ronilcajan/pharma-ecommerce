<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="msg"></div>
                <form method="POST" action="<?= site_url('category/create') ?>" id="cat_form">
                    <div class="form-group form-floating-label">
                        <label>Category</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label>Details</label>
                        <textarea class="form-control" name="details"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="msg"></div>
                <form method="POST" action="<?= site_url('category/update') ?>">
                    <div class="form-group form-floating-label">
                        <label>Category</label>
                        <input type="text" class="form-control" name="name" required id="cname">
                    </div>
                    <div class="form-group">
                        <label>Details</label>
                        <textarea class="form-control" name="details" id="details"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id" id="c_id">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>