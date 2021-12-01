<div style="height: 160px;" class="bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto align-self-center mt-5">
                <div class="text-center text-white">
                    <h1><?= $title ?></h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bg-light py-3">
    <div class="container">
        <form action="<?= site_url('search') ?>" method="post">
            <input type="text" class="form-control" name="search" placeholder="Search product name and hit enter..." value="<?= $this->session->flashdata('search_text') ?>">
        </form>
    </div>
</div>
<div class="container">

</div>
<div class="site-section">
    <div class="container">
        <div class="mb-5">
            <h2 class="text-dark">Search result for: <?= $this->session->flashdata('search_text') ?></h2>
        </div>
        <?php if ($searched) : ?>
            <?php foreach ($searched as $row) : ?>
                <a href="<?= site_url('product/') . $row->id ?>">
                    <div class="row border m-2" id="search-container">
                        <div class="col-md-4 text-center p-4">
                            <img src="<?= site_url('assets/uploads/') . $row->image ?>" alt="Image" height="200">
                        </div>
                        <div class="col-md-8 p-4">
                            <h2 class="text-black"><?= $row->name ?></h2>
                            <p class="text-muted"><?= $row->description ?></p>
                            <small class="text-muted"><?= $row->stocks == 0 ? 'Out of stocks' : 'Available Stocks: ' . $row->stocks . ' ' . $row->unit ?></small>
                            <?php if ($row->price_2 != '0') : ?>
                                <p><del class="text-muted">P <?= $row->price_2 ?></del> <strong class="text-primary h4">P <?= $row->price ?></strong></p>
                            <?php else : ?>
                                <p><strong class="text-primary h4">P <?= $row->price ?></strong></p>
                            <?php endif ?>
                        </div>
                    </div>
                </a>
            <?php endforeach ?>
        <?php else : ?>
            <p class="price">No products has been found!</p>
        <?php endif ?>

        <div class="row mt-5">
            <div class="col-md-12 text-center">
                <?php if (isset($links)) : ?>
                    <?= $links ?>
                <?php endif ?>
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