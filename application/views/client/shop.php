<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black"><?= $title ?></strong></div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <?php foreach ($results as $row) : ?>
                <div class="col-sm-6 col-lg-4 text-center item mb-4">
                    <?= $row->status == 'Sale' ? '<span class="tag">Sale</span>' : '<span class="tag-blue">New</span>' ?>
                    <a href="<?= site_url('product/') . $row->id ?>"> <img src="<?= site_url('assets/uploads/') . $row->image ?>" alt="Image" height="300"></a>
                    <h3 class="text-dark"><a href="<?= site_url('product/') . $row->id ?>"><?= $row->name ?></a></h3>
                    <?php if ($row->price_2 != '0') : ?>
                        <p class="price"><del>P <?= $row->price_2 ?></del> &mdash; P <?= $row->price ?></p>
                    <?php else : ?>
                        <p class="price">P <?= $row->price ?></p>
                    <?php endif ?>
                </div>
            <?php endforeach ?>
        </div>
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