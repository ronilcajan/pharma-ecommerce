<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin'] = 'auth/users';
$route['register'] = 'auth/register';
$route['login'] = 'auth/users';
$route['admin/users'] = 'auth/users';
$route['admin/user_profile'] = 'auth/user_profile';

$route['admin/dashboard'] = 'dashboard/index';
$route['admin/category'] = 'category/index';
$route['admin/category/(:num)'] = 'category/product_category/$1';
$route['admin/products'] = 'products/index';
$route['admin/transaction'] = 'transaction/index';
$route['admin/inquiry'] = 'support/index';
$route['admin/orders'] = 'products/orders';
$route['admin/orders/(:num)'] = 'products/orders/$1';

$route['about'] = 'home/about';
$route['contact'] = 'home/contact';
$route['shop'] = 'home/shop';
$route['shop/(:any)'] = 'home/shop/$1';
$route['category'] = 'home/index';
$route['category/(:num)'] = 'home/category/$1';
$route['category/(:num)/(:num)'] = 'home/category/$1/$2';
$route['cart'] = 'home/cart';
$route['cart/(:num)'] = 'home/myorder/$1';
$route['orders'] = 'home/order';
$route['product/(:num)'] = 'home/product/$1';
$route['checkout'] = 'home/checkout';
$route['search'] = 'home/search';
$route['thankyou'] = 'home/thankyou';
