<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0">
                <a href="<?= site_url() ?>">Home</a> <span class="mx-2 mb-0">/</span>
                <strong class="text-black">Orders</strong>
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
                                <th class="product-thumbnail">Order No.</th>
                                <th class="product-thumbnail">Date</th>
                                <th class="product-name">Payment Method</th>
                                <th class="product-name">Transaction</th>
                                <th class="product-quantity">Status</th>
                                <th class="product-total">Notes</th>
                                <th class="product-remove">Total(P)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($order as $row) : ?>
                                <tr>
                                    <td class="product-name">
                                        <p class="text-black"><a href="<?= site_url('cart/') . $row->id ?>">D0000<?= $row->id ?></a></h2>
                                    </td>
                                    <td class="product-name">
                                        <p class="text-black"><?= date('F d, Y h:i A', strtotime($row->date)) ?></p>
                                    </td>
                                    <td class="product-name">
                                        <p class="text-black"><?= $row->payment_method ?></h2>
                                    </td>
                                    <td class="product-name">
                                        <p class="text-black"><?= $row->transaction ?></h2>
                                    </td>
                                    <td class="product-name">
                                        <?php if ($row->status == 'Processing') : ?>
                                            <span class="badge badge-primary">Processing</span>
                                        <?php elseif ($row->status == 'Delivery ongoing') : ?>
                                            <span class="badge badge-danger">Delivery ongoing</span>
                                        <?php else : ?>
                                            <span class="badge badge-success">Order Delivered</span>
                                        <?php endif ?>
                                    </td>
                                    <td class="product-name">
                                        <p class="text-black"><?= $row->notes ?></h2>
                                    </td>
                                    <td class="product-name">
                                        <p class="text-black"><?= number_format($row->total_order, 2) ?></h2>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
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