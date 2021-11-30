<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0">
                <a href="<?= site_url() ?>">Home</a> <span class="mx-2 mb-0">/</span>
                <strong class="text-black">Cart</strong>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <?php if (isset($message) || $this->session->flashdata('message')) : ?>
            <div class="alert alert-<?= $this->session->flashdata('success'); ?>" role="alert">
                <?= isset($message) ? $message : $this->session->flashdata('message') ?>
            </div>
        <?php endif ?>
        <div class="row mb-5">
            <form class="col-md-12" method="post" action="<?= site_url('products/update_order') ?>">
                <div class="site-blocks-table">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="product-thumbnail">Image</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-quantity">Details</th>
                                <th class="product-total">Total</th>
                                <th class="product-remove">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total = 0;
                            $pres = 0;
                            if (!empty($cart[0]->name)) :
                                foreach ($cart as $row) : ?>
                                    <input type="hidden" name="product_id[]" value="<?= $row->product_id ?>">
                                    <input type="hidden" name="order_id" value="<?= $row->user_order_id ?>">
                                    <tr>
                                        <td class="product-thumbnail">
                                            <img src="<?= site_url('assets/uploads/') . $row->image ?>" alt="Image" class="img-fluid">
                                        </td>
                                        <td class="product-name">
                                            <h2 class="h5 text-black"><a href="<?= site_url('product/') . $row->product_id ?>"><?= $row->name ?></a></h2>
                                        </td>
                                        <td>P <?= $row->price_2 != '0' ? number_format($row->price_2, 2) : number_format($row->price, 2) ?></td>
                                        <td>
                                            <div class="input-group mb-3" style="max-width: 250px;">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                                                </div>
                                                <input type="text" class="form-control text-center" max="<?= $row->stocks ?>" data-unit="<?= $row->unit ?>" name="quantity[]" value="<?= $row->quantity ?>" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                                                </div>
                                            </div>

                                        </td>
                                        <td>
                                            <?php if ($row->prescription == 1) : ?>
                                                <?php
                                                if (empty($row->prescription_file)) :  $pres++; ?>
                                                    <small class="text-danger"><i>*Presciption required</i></small>
                                                <?php else : ?>
                                                    <a href="<?= site_url('assets/uploads/') . $row->prescription_file ?>" target="_blank">view</a>
                                                <?php endif ?>
                                            <?php else : ?>
                                                <small><i>*Presciption not required</small>
                                            <?php endif ?>
                                        </td>
                                        <td>P <?= $row->price_2 != '0' ? number_format($row->price_2, 2) : number_format($row->price, 2) ?></td>
                                        <td>
                                            <?php if ($row->prescription == 1) : ?>
                                                <button class="btn btn-primary height-auto btn-sm" title="Upload Prescription" id="myBtn" type='button' data-product="<?= $row->product_id ?>" data-order="<?= $row->user_order_id ?>">+</button>
                                            <?php endif ?>
                                            <a class="btn btn-danger height-auto btn-sm" onclick="return confirm('Are you sure you want to remove this product?');" href="<?= site_url('products/delete_product/') . $row->id ?>">x</a>
                                        </td>
                                    </tr>
                                <?php $total +=  $row->price_2 != '0' ? $row->price_2 * $row->quantity : $row->price * $row->quantity;
                                endforeach ?>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="row mb-5">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <button class="btn btn-primary btn-md btn-block">Update Cart</button>
                    </div>
                    </form>
                    <div class="col-md-6">
                        <a href="<?= site_url('shop') ?>" class="btn btn-outline-primary btn-md btn-block">Continue Shopping</a>
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="col-md-12">
                        <label class="text-black h4" for="coupon">Coupon</label>
                        <p>Enter your coupon code if you have one.</p>
                    </div>
                    <div class="col-md-8 mb-3 mb-md-0">
                        <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-primary btn-md px-4">Apply Coupon</button>
                    </div>
                </div> -->
            </div>
            <div class="col-md-6 pl-5">
                <div class="row justify-content-end">
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-12 text-right border-bottom mb-5">
                                <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                            </div>
                        </div>
                        <!-- <div class="row mb-3">
                            <div class="col-md-6">
                                <span class="text-black">Subtotal</span>
                            </div>
                            <div class="col-md-6 text-right">
                                <strong class="text-black">$230.00</strong>
                            </div>
                        </div> -->
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <span class="text-black">Total</span>
                            </div>
                            <div class="col-md-6 text-right">
                                <strong class="text-black">P <?= number_format($total, 2) ?></strong>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <?php if ($pres > 0) : ?>
                                    <small class="text-danger"><i>*Please upload prescription</i></small>
                                    <button class="btn btn-primary btn-lg btn-block">Proceed To
                                        Checkout</button>
                                <?php else : ?>
                                    <button class="btn btn-primary btn-lg btn-block" onclick="window.location='<?= site_url('checkout') ?>'">Proceed To
                                        Checkout</button>
                                <?php endif ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-section bg-secondary bg-image" style="background-image: url('<?= site_url() ?>assets/client/images/bg_2.jpg');">
    <div class="container">
        <div class="row align-items-stretch">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <a href="#" class="banner-1 h-100 d-flex" style="background-image: url('<?= site_url() ?>assets/client/images/bg_1.jpg');">
                    <div class="banner-1-inner align-self-center">
                        <h2>Pharma Products</h2>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestiae ex ad minus rem odio voluptatem.
                        </p>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 mb-5 mb-lg-0">
                <a href="#" class="banner-1 h-100 d-flex" style="background-image: url('<?= site_url() ?>assets/client/images/bg_2.jpg');">
                    <div class="banner-1-inner ml-auto  align-self-center">
                        <h2>Rated by Experts</h2>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestiae ex ad minus rem odio voluptatem.
                        </p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- The Modal -->
<div id="myModal" class="modal">

    <div class="modal-content">
        <div class="modal-header">
            <h4>Upload Prescription</h4>
            <span class="close">&times;</span>

        </div>
        <form method="POST" action="<?= site_url('products/uploadPres') ?>" enctype="multipart/form-data" id="product_form">
            <div class="modal-body">
                <div class="form-group form-floating-label mt-3">
                    <label>Upload Doctor Prescription</label>
                    <input type="file" class="form-control" name="pres_img" required accept="image/*">
                </div>
                <input type="hidden" id="product_id" name="product_id">
                <input type="hidden" id="order_id" name="order_id">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Upload</button>
            </div>
        </form>

    </div>

</div>