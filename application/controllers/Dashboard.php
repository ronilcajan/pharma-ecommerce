<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
			redirect('auth', 'refresh');
		}

		$data['customer'] = $this->dashboardModel->getCustomers();
		$data['products'] = $this->dashboardModel->getProducts();
		$data['sales'] = $this->dashboardModel->getSales();
		$data['order'] = $this->dashboardModel->getOrders();

		$data['title'] = 'Dashboard';

		$this->base->load('admin', 'dashboard', $data);
	}

	public function getOrders()
	{
		$validator = array('total' => array(), 'active' => array(), 'paid' => array());

		$validator['total'] = $this->dashboardModel->getOrders();
		$validator['undeliver'] = $this->dashboardModel->getundeliver();
		$validator['deliver'] = $this->dashboardModel->delivered();

		echo json_encode($validator);
	}

	public function getSales()
	{
		$validator = array(
			'jan' => array(),
			'feb' => array(),
			'mar' => array(),
			'apr' => array(),
			'may' => array(),
			'jun' => array(),
			'jul' => array(),
			'aug' => array(),
			'sep' => array(),
			'oct' => array(),
			'nov' => array(),
			'dec' => array(),
		);
		$validator['jan'] = $this->dashboardModel->getSale(1);
		$validator['feb'] = $this->dashboardModel->getSale(2);
		$validator['mar'] = $this->dashboardModel->getSale(3);
		$validator['apr'] = $this->dashboardModel->getSale(4);
		$validator['may'] = $this->dashboardModel->getSale(5);
		$validator['jun'] = $this->dashboardModel->getSale(6);
		$validator['jul'] = $this->dashboardModel->getSale(7);
		$validator['aug'] = $this->dashboardModel->getSale(8);
		$validator['sep'] = $this->dashboardModel->getSale(9);
		$validator['oct'] = $this->dashboardModel->getSale(10);
		$validator['nov'] = $this->dashboardModel->getSale(11);
		$validator['dec'] = $this->dashboardModel->getSale(12);

		echo json_encode($validator);
	}
}
