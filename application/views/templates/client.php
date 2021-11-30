<?php
$user = $this->ion_auth->user()->row();
$query = $this->db->query("SELECT * FROM systems WHERE id=1");
$sys = $query->row();

$sql = $this->db->query("SELECT * FROM category");
$category = $sql->result();

if ($this->ion_auth->logged_in()) {
    $query = $this->db->query("SELECT * FROM order_products RIGHT JOIN user_order ON user_order.id=order_products.user_order_id WHERE user_order.user_id=$user->id AND order_products.product_id is not null AND user_order.status='New'");
    $cart = $query->num_rows();
}


$current_page = $this->uri->segment(1);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $title ?> | <?= $sys->system_name ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="<?= site_url() ?>assets/img/icon.ico" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
    <link rel="stylesheet" href="<?= site_url() ?>assets/client/fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?= site_url() ?>assets/client/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= site_url() ?>assets/client/css/magnific-popup.css">
    <link rel="stylesheet" href="<?= site_url() ?>assets/client/css/jquery-ui.css">
    <link rel="stylesheet" href="<?= site_url() ?>assets/client/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= site_url() ?>assets/client/css/owl.theme.default.min.css">


    <link rel="stylesheet" href="<?= site_url() ?>assets/client/css/aos.css">

    <link rel="stylesheet" href="<?= site_url() ?>assets/client/css/style.css">
    <style>
        .field-icon {
            float: right;
            margin-left: -25px;
            margin-top: -29px;
            margin-right: 5px;
            position: relative;
            z-index: 2;
            cursor: pointer;
        }

        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1000;
            /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            /* Could be more or less, depending on screen size */
        }

        /* The Close Button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <div class="site-wrap">


        <div class="site-navbar py-2">

            <div class="search-wrap">
                <div class="container">
                    <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
                    <form action="#" method="post">
                        <input type="text" class="form-control" placeholder="Search keyword and hit enter...">
                    </form>
                </div>
            </div>
            <div class="container">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="logo">
                        <div class="site-logo">
                            <a href="<?= site_url() ?>" class="js-logo-clone">Pharma</a>
                        </div>
                    </div>
                    <div class="main-nav d-none d-lg-block">
                        <nav class="site-navigation text-right text-md-center" role="navigation">
                            <ul class="site-menu js-clone-nav d-none d-lg-block">
                                <li class="<?= empty($current_page) ? 'active' : null ?>"><a href="<?= site_url() ?>">Home</a></li>
                                <li class="<?= $current_page == 'shop' ||  $current_page == 'product' ||  $current_page == 'cart' ? 'active' : null ?>"><a href="<?= site_url('shop') ?>">Store</a></li>
                                <li class="has-children">
                                    <a href="#">Categories</a>
                                    <ul class="dropdown">
                                        <?php foreach ($category as $row) : ?>
                                            <li><a href="<?= site_url('category/') . $row->id ?>"><?= $row->name ?></a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </li>
                                <li class="<?= $current_page == 'about' ? 'active' : null ?>"><a href="<?= site_url('about') ?>">About</a></li>
                                <li class="<?= $current_page == 'contact' ? 'active' : null ?>"><a href="<?= site_url('contact') ?>">Contact</a></li>
                                <?php if ($this->ion_auth->logged_in()) : ?>
                                    <li class="has-children">
                                        <a href="#"> <span class="icon-user"></span> <?= $user->username ?></a>
                                        <ul class="dropdown">
                                            <?php if ($this->ion_auth->is_admin()) : ?>
                                                <li><a href="<?= site_url('admin/dashboard') ?>">Dashboard</a></li>
                                            <?php else : ?>
                                                <li><a href="<?= site_url('auth/edit_user/') . $user->id ?>">Profile</a></li>
                                                <li><a href="<?= site_url('orders') ?>">My Order/s</a></li>
                                            <?php endif ?>

                                            <li><a href="<?= site_url('auth/logout') ?>">Logout</a></li>
                                        </ul>
                                    </li>
                                <?php endif ?>
                            </ul>
                        </nav>
                    </div>
                    <div class="icons">
                        <?php if ($this->ion_auth->logged_in()) : ?>
                            <!-- <a href="#" class="icons-btn d-inline-block js-search-open"><span class="icon-search"></span></a> -->
                            <a href="<?= site_url('cart') ?>" class="icons-btn d-inline-block bag">
                                <span class="icon-shopping-bag"></span>
                                <span class="number"><?= $cart ?></span>
                            </a>
                        <?php else : ?>
                            <button type="button" onclick="location.href='<?= site_url('login') ?>'" class="btn btn-outline-primary btn-sm">
                                Login
                            </button>
                            <a href="<?= site_url('register') ?>" class="btn btn-primary btn-sm">
                                Register
                            </a>
                        <?php endif ?>


                        <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span class="icon-menu"></span></a>
                    </div>
                </div>
            </div>
        </div>

        <?= $content ?>


        <footer class="site-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">

                        <div class="block-7">
                            <h3 class="footer-heading mb-4">About Us</h3>
                            <p><?= $sys->about ?></p>
                        </div>

                    </div>
                    <div class="col-lg-3 mx-auto mb-5 mb-lg-0">
                        <h3 class="footer-heading mb-4">Quick Links</h3>
                        <ul class="list-unstyled">
                            <?php foreach ($category as $row) : ?>
                                <li><a href="<?= site_url('category/') . $row->id ?>"><?= $row->name ?></a></li>
                            <?php endforeach ?>
                        </ul>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="block-5 mb-5">
                            <h3 class="footer-heading mb-4">Contact Info</h3>
                            <ul class="list-unstyled">
                                <li class="address"> <?= $sys->address ?></li>
                                <li class="phone"><a href="tel:<?= $sys->system_name ?>"> <?= $sys->number ?></a></li>
                                <li class="email"><a href="mailto:<?= $sys->system_name ?>"> <?= $sys->email ?></a></li>
                            </ul>
                        </div>


                    </div>
                </div>
                <div class="row pt-5 mt-5 text-center">
                    <div class="col-md-12">
                        <p>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            <?= $sys->system_name ?> Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved.
                        </p>
                    </div>

                </div>
            </div>
        </footer>
    </div>

    <script src="<?= site_url() ?>assets/client/js/jquery-3.3.1.min.js"></script>
    <script src="<?= site_url() ?>assets/client/js/jquery-ui.js"></script>
    <script src="<?= site_url() ?>assets/client/js/popper.min.js"></script>
    <script src="<?= site_url() ?>assets/client/js/bootstrap.min.js"></script>
    <script src="<?= site_url() ?>assets/client/js/owl.carousel.min.js"></script>
    <script src="<?= site_url() ?>assets/client/js/jquery.magnific-popup.min.js"></script>
    <script src="<?= site_url() ?>assets/client/js/aos.js"></script>

    <script src="<?= site_url() ?>assets/client/js/main.js"></script>
    <script>
        $(".toggle-password").click(function() {
            $(this).toggleClass("icon-eye icon-eye-slash");
            var input = $($(this).attr("toggle"));

            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
            var product = $(this).attr('data-product');
            var order = $(this).attr('data-order');

            $('#product_id').val(product);
            $('#order_id').val(order);
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>

</html>