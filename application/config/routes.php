<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
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
$route['thankyou'] = 'home/thankyou';
