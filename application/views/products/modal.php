<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Products</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="msg"></div>
                <form method="POST" action="<?= site_url('products/create') ?>" enctype="multipart/form-data" id="product_form">
                    <input type="hidden" name="size" value="1000000">
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <img src="<?= site_url('assets/img/product.png') ?>" alt="..." class="img img-fluid" width="250" height="250" alt="preview">
                            <div class="form-group form-floating-label mt-3">
                                <label>Upload Product Image</label>
                                <input type="file" class="form-control" name="product_img">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-floating-label">
                                <label>Category</label>
                                <select class="form-control" name="category" required>
                                    <option disabled>Select Category</option>
                                    <?php foreach ($category as $row) : ?>
                                        <option value="<?= $row->id ?>"><?= $row->name ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group form-floating-label">
                                <label>Product Name</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group form-floating-label">
                                <label>Unit</label>
                                <input type="text" class="form-control" name="unit" required>
                            </div>
                            <div class="form-group form-floating-label">
                                <label>Price</label>
                                <input type="number" class="form-control" step="0.25" name="price" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-floating-label">
                                <label>Stocks</label>
                                <input type="number" min="1" step="1" class="form-control" name="stocks" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-floating-label">
                                <label>Minimum Stocks</label>
                                <input type="number" min="1" step="1" class="form-control" name="min_stocks" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-floating-label">
                                <label>Status</label>
                                <select class="form-control" name="status" id="product_status">
                                    <option>New</option>
                                    <option>Sale</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-floating-label">
                                <label>Sale Price(if product is sale!)</label>
                                <input type="number" class="form-control" name="sale_price" readonly id="sale_price">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="desc"></textarea>
                    </div>
                    <div class="form-check">
                        <label>Require Doctor Prescription?</label><br>
                        <label class="form-radio-label">
                            <input class="form-radio-input" type="radio" name="prescription" value="0" checked="">
                            <span class="form-radio-sign">No</span>
                        </label>
                        <label class="form-radio-label ml-3">
                            <input class="form-radio-input" type="radio" name="prescription" value="1">
                            <span class="form-radio-sign">Yes</span>
                        </label>
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
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Products</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="msg"></div>
                <form method="POST" action="<?= site_url('products/update') ?>" enctype="multipart/form-data" id="product_form">
                    <input type="hidden" name="size" value="1000000">
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <img src="<?= site_url('assets/img/product.png') ?>" alt="..." width="250" alt="preview" height="250" id="product_img">
                            <div class="form-group form-floating-label mt-3">
                                <label>Upload Product Image</label>
                                <input type="file" class="form-control" name="product_img">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-floating-label">
                                <label>Category</label>
                                <select class="form-control" name="category" required id="category_id">
                                    <option disabled>Select Category</option>
                                    <?php foreach ($category as $row) : ?>
                                        <option value="<?= $row->id ?>"><?= $row->name ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group form-floating-label">
                                <label>Product Name</label>
                                <input type="text" class="form-control" name="name" required id="pname">
                            </div>
                            <div class="form-group form-floating-label">
                                <label>Unit</label>
                                <input type="text" class="form-control" name="unit" required id="punit">
                            </div>
                            <div class="form-group form-floating-label">
                                <label>Price</label>
                                <input type="number" class="form-control" step="0.25" name="price" required id="pprice">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-floating-label">
                                <label>Stocks</label>
                                <input type="number" min="1" step="1" class="form-control" name="stocks" required id="pstocks">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-floating-label">
                                <label>Minimum Stocks</label>
                                <input type="number" min="1" step="1" class="form-control" name="min_stocks" required id="pmin_stocks">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-floating-label">
                                <label>Status</label>
                                <select class="form-control" name="status" id="product_status1">
                                    <option>New</option>
                                    <option>Sale</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-floating-label">
                                <label>Sale Price(if product is sale!)</label>
                                <input type="number" class="form-control" name="sale_price" readonly id="sale_price1">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="desc" id="pdesc"></textarea>
                    </div>
                    <div class="form-check">
                        <label>Require Doctor Prescription?</label><br>
                        <label class="form-radio-label">
                            <input class="form-radio-input" type="radio" id="prescription_no" name="prescription" value="0">
                            <span class="form-radio-sign">No</span>
                        </label>
                        <label class="form-radio-label ml-3">
                            <input class="form-radio-input" type="radio" id="prescription_yes" name="prescription" value="1">
                            <span class="form-radio-sign">Yes</span>
                        </label>
                    </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id" id="pro_id">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>