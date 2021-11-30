<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {

        $data['title'] = 'Home';

        $data['popular'] = $this->productModel->getpopularProducts();
        $data['new'] = $this->productModel->getnewProducts();

        $this->base->load('client', 'client/home', $data);
    }
    public function shop()
    {

        $limit_per_page = 6;
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) - 1 : 0;
        $total_records = $this->productModel->get_total();

        if ($total_records > 0) {
            // get current page records
            $data["results"] = $this->productModel->get_products($limit_per_page, $page * $limit_per_page);
            $data['num'] = $limit_per_page . '-' . $page * $limit_per_page;
            $config['base_url'] = site_url('shop');
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 2;

            // custom paging configuration
            $config['use_page_numbers'] = TRUE;
            $config['reuse_query_string'] = TRUE;

            $config['full_tag_open'] = '<div class="site-block-27"> <ul>';
            $config['full_tag_close'] = '</ul></div>';

            $config['first_link'] = false;
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';

            $config['last_link'] = false;
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';

            $config['next_link'] = '&raquo';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';

            $config['prev_link'] = '&laquo';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';

            $config['cur_tag_open'] = '<li class="active"><span>';
            $config['cur_tag_close'] = '</span></li>';

            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';

            $this->pagination->initialize($config);

            // build paging links
            $data["links"] = $this->pagination->create_links();
        }
        $data['title'] = 'Store';

        $this->base->load('client', 'client/shop', $data);
    }

    public function category($id)
    {

        $limit_per_page = 6;
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) - 1 : 0;
        $total_records = $this->productModel->get_category_total($id);

        if ($total_records > 0) {
            // get current page records
            $data["results"] = $this->productModel->get_category_products($limit_per_page, $page * $limit_per_page, $id);
            $data['num'] = $limit_per_page . '-' . $page * $limit_per_page;
            $config['base_url'] = site_url('category/') . $id;
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;

            // custom paging configuration
            $config['use_page_numbers'] = TRUE;
            $config['reuse_query_string'] = TRUE;

            $config['full_tag_open'] = '<div class="site-block-27"> <ul>';
            $config['full_tag_close'] = '</ul></div>';

            $config['first_link'] = false;
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';

            $config['last_link'] = false;
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';

            $config['next_link'] = '&raquo';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';

            $config['prev_link'] = '&laquo';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';

            $config['cur_tag_open'] = '<li class="active"><span>';
            $config['cur_tag_close'] = '</span></li>';

            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';

            $this->pagination->initialize($config);

            // build paging links
            $data["links"] = $this->pagination->create_links();
        }
        $data['title'] = 'Category';
        $data['cat'] = $this->catModel->getCat($id);
        $this->base->load('client', 'client/category', $data);
    }
    public function about()
    {

        $data['title'] = 'About Us';

        $this->base->load('client', 'client/about', $data);
    }
    public function contact()
    {

        $data['title'] = 'Contact Us';

        $this->base->load('client', 'client/contact', $data);
    }
    public function product($id = '')
    {

        $data['product'] = $this->productModel->getproduct($id);
        $data['title'] = $data['product']->name;

        $this->base->load('client', 'client/shop-single', $data);
    }
    public function checkout()
    {
        if ($this->ion_auth->logged_in()) {
            $user = $this->ion_auth->user()->row();
            $data['user'] = $this->ion_auth->user()->row();
            $data['cart'] = $this->productModel->mycart($user->id);
            $data['title'] = 'Checkout';

            $this->base->load('client', 'client/checkout', $data);
        } else {
            redirect($_SERVER['HTTP_REFERER'], 'refresh');
        }
    }
    public function cart()
    {
        if ($this->ion_auth->logged_in()) {
            $user = $this->ion_auth->user()->row();
            $data['cart'] = $this->productModel->mycart($user->id);
            $data['title'] = 'Cart';

            $this->base->load('client', 'client/cart', $data);
        } else {
            redirect($_SERVER['HTTP_REFERER'], 'refresh');
        }
    }
    public function myorder($id)
    {
        if ($this->ion_auth->logged_in()) {
            $user = $this->ion_auth->user()->row();
            $data['cart'] = $this->productModel->myproductorder($user->id, $id);
            $data['title'] = 'Cart';

            $this->base->load('client', 'client/myorders', $data);
        } else {
            redirect($_SERVER['HTTP_REFERER'], 'refresh');
        }
    }
    public function order()
    {
        if ($this->ion_auth->logged_in()) {
            $user = $this->ion_auth->user()->row();
            $data['order'] = $this->productModel->myorder($user->id);
            $data['title'] = 'Orders';

            $this->base->load('client', 'client/order', $data);
        } else {
            redirect($_SERVER['HTTP_REFERER'], 'refresh');
        }
    }
    public function thankyou()
    {

        $data['title'] = 'Thank You';

        $this->base->load('client', 'client/thankyou', $data);
    }
}
