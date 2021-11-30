<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="<?= site_url() ?>">Home</a> <span class="mx-2 mb-0">/</span> <a href="<?= site_url('shop') ?>">Store</a> <span class="mx-2 mb-0">/</span> <strong class="text-black"><?= $product->name ?></strong></div>
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
        <div class="row">
            <div class="col-md-5 mr-auto">
                <div class="border text-center">
                    <img src="<?= site_url('assets/uploads/') . $product->image ?>" alt="Image" class="img-fluid p-5">
                </div>
            </div>
            <div class="col-md-6">
                <h2 class="text-black"><?= $product->name ?></h2>
                <p><?= $product->description ?></p>

                <p class="text-muted"><?= $product->stocks == 0 ? 'Out of stocks' : 'Available Stocks: ' . $product->stocks . ' ' . $product->unit ?></p>
                <?php if ($product->price_2 != '0') : ?>
                    <p><del>P <?= $product->price_2 ?></del> <strong class="text-primary h4">P <?= $product->price ?></strong></p>
                <?php else : ?>
                    <p><strong class="text-primary h4">P <?= $product->price ?></strong></p>
                <?php endif ?>
                <form method="POST" action="<?= site_url('products/save_order') ?>">
                    <div class="mb-5">
                        <div class="input-group mb-3" style="max-width: 220px;">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                            </div>
                            <input type="num" name="quantity" max="<?= $product->stocks ?>" data-unit="<?= $product->unit ?>" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                            </div>
                        </div>
                        <input type="hidden" name="product_id" value="<?= $product->id ?>">
                    </div>
                    <p><button type="submit" class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary">Add To Cart</button></p>
                </form>
                <!-- <div class="mt-5">
                    <ul class="nav nav-pills mb-3 custom-pill" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Ordering Information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Specifications</a>
                        </li>

                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <table class="table custom-table">
                                <thead>
                                    <th>Material</th>
                                    <th>Description</th>
                                    <th>Packaging</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">OTC022401</th>
                                        <td>Pain Management: Acetaminophen PM Extra-Strength Caplets, 500 mg, 100/Bottle</td>
                                        <td>1 BT</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">OTC022401</th>
                                        <td>Pain Management: Acetaminophen PM Extra-Strength Caplets, 500 mg, 100/Bottle</td>
                                        <td>144/CS</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">OTC022401</th>
                                        <td>Pain Management: Acetaminophen PM Extra-Strength Caplets, 500 mg, 100/Bottle</td>
                                        <td>1 EA</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

                            <table class="table custom-table">

                                <tbody>
                                    <tr>
                                        <td>HPIS CODE</td>
                                        <td class="bg-light">999_200_40_0</td>
                                    </tr>
                                    <tr>
                                        <td>HEALTHCARE PROVIDERS ONLY</td>
                                        <td class="bg-light">No</td>
                                    </tr>
                                    <tr>
                                        <td>LATEX FREE</td>
                                        <td class="bg-light">Yes, No</td>
                                    </tr>
                                    <tr>
                                        <td>MEDICATION ROUTE</td>
                                        <td class="bg-light">Topical</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div> -->


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