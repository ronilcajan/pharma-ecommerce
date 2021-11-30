<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products extends CI_Controller
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

        $data['title'] = 'Products Management';

        $data['products'] = $this->productModel->products();
        $data['category'] = $this->catModel->category();

        $this->base->load('admin', 'products/products', $data);
    }

    public function orders($id = '')
    {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('auth', 'refresh');
        }
        $data['title'] = 'Orders Management';
        if (!empty($id)) {
            $data['orders'] = $this->productModel->clientproductorder($id);
            $data['id'] = $id;
            $this->base->load('admin', 'order/order_products', $data);
        } else {

            $data['orders'] = $this->productModel->clientorders();

            $this->base->load('admin', 'order/manage', $data);
        }
    }

    public function create()
    {
        $this->session->set_flashdata('success', 'danger');
        if ($this->ion_auth->is_admin()) {

            $config['upload_path'] = 'assets/uploads/';
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            $this->form_validation->set_rules('', 'Category Name', 'required|trim');
            $this->form_validation->set_rules('name', 'Product Name', 'required|trim');
            $this->form_validation->set_rules('unit', 'Product Unit', 'required|trim');
            $this->form_validation->set_rules('price', 'Product Price', 'required|trim');
            $this->form_validation->set_rules('stocks', 'Product Stocks', 'required|trim');
            $this->form_validation->set_rules('min_stocks', 'Minimum Stocks', 'required|trim');

            if ($this->form_validation->run() == FALSE) {

                $this->session->set_flashdata('message', validation_errors());
            } else {

                if ($this->upload->do_upload('product_img')) {
                    $file = $this->upload->data();
                    //Resize and Compress Image
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = 'assets/uploads/' . $file['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = TRUE;
                    $config['quality'] = '60%';
                    $config['new_image'] = 'assets/uploads/' . $file['file_name'];

                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $data = array(
                        'name' => $this->input->post('name'),
                        'description' => $this->input->post('desc'),
                        'unit' => $this->input->post('unit'),
                        'stocks' => $this->input->post('stocks'),
                        'min_stocks' => $this->input->post('min_stocks'),
                        'price' => $this->input->post('price'),
                        'price_2' => $this->input->post('sale_price'),
                        'status' => $this->input->post('status'),
                        'category_id' => $this->input->post('category'),
                        'prescription' => $this->input->post('prescription'),
                        'image' => $file['file_name'],
                    );
                } else {
                    $data = array(
                        'name' => $this->input->post('name'),
                        'description' => $this->input->post('desc'),
                        'unit' => $this->input->post('unit'),
                        'stocks' => $this->input->post('stocks'),
                        'min_stocks' => $this->input->post('min_stocks'),
                        'price' => $this->input->post('price'),
                        'price_2' => $this->input->post('sale_price'),
                        'status' => $this->input->post('status'),
                        'category_id' => $this->input->post('category'),
                        'prescription' => $this->input->post('prescription'),
                    );
                }


                $insert = $this->productModel->save($data);

                if ($insert) {
                    $this->session->set_flashdata('success', 'success');
                    $this->session->set_flashdata('message', 'Products has been created!');
                } else {
                    $this->session->set_flashdata('message', 'Something went wrong. Please try again!');
                }
            }
        } else {
            $this->session->set_flashdata('message', 'Your not an admin!');
        }
        redirect("admin/products", 'refresh');
    }

    public function update()
    {
        $this->session->set_flashdata('success', 'danger');
        if ($this->ion_auth->is_admin()) {

            $config['upload_path'] = 'assets/uploads/';
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            $this->form_validation->set_rules('', 'Category Name', 'required|trim');
            $this->form_validation->set_rules('name', 'Product Name', 'required|trim');
            $this->form_validation->set_rules('unit', 'Product Unit', 'required|trim');
            $this->form_validation->set_rules('price', 'Product Price', 'required|trim');
            $this->form_validation->set_rules('stocks', 'Product Stocks', 'required|trim');
            $this->form_validation->set_rules('min_stocks', 'Minimum Stocks', 'required|trim');

            if ($this->form_validation->run() == FALSE) {

                $this->session->set_flashdata('message', validation_errors());
            } else {
                $id = $this->input->post('id');
                if ($this->upload->do_upload('product_img')) {
                    $file = $this->upload->data();
                    //Resize and Compress Image
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = 'assets/uploads/' . $file['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = TRUE;
                    $config['quality'] = '60%';
                    $config['new_image'] = 'assets/uploads/' . $file['file_name'];

                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $data = array(
                        'name' => $this->input->post('name'),
                        'description' => $this->input->post('desc'),
                        'unit' => $this->input->post('unit'),
                        'stocks' => $this->input->post('stocks'),
                        'min_stocks' => $this->input->post('min_stocks'),
                        'price' => $this->input->post('price'),
                        'price_2' => $this->input->post('sale_price'),
                        'status' => $this->input->post('status'),
                        'category_id' => $this->input->post('category'),
                        'prescription' => $this->input->post('prescription'),
                        'image' => $file['file_name'],
                    );
                } else {
                    $data = array(
                        'name' => $this->input->post('name'),
                        'description' => $this->input->post('desc'),
                        'unit' => $this->input->post('unit'),
                        'stocks' => $this->input->post('stocks'),
                        'min_stocks' => $this->input->post('min_stocks'),
                        'price' => $this->input->post('price'),
                        'price_2' => $this->input->post('sale_price'),
                        'status' => $this->input->post('status'),
                        'category_id' => $this->input->post('category'),
                        'prescription' => $this->input->post('prescription'),
                    );
                }


                $update = $this->productModel->update($data, $id);

                if ($update) {
                    $this->session->set_flashdata('success', 'success');
                    $this->session->set_flashdata('message', 'Products has been updated!');
                } else {
                    $this->session->set_flashdata('message', 'No changes has been made!');
                }
            }
        } else {
            $this->session->set_flashdata('message', 'Your not an admin!');
        }
        redirect("admin/products", 'refresh');
    }

    public function save_order()
    {
        $user = $this->ion_auth->user()->row();
        $this->session->set_flashdata('success', 'danger');
        if ($this->ion_auth->logged_in()) {
            $this->form_validation->set_rules('product_id', 'Product', 'required|trim');
            $this->form_validation->set_rules('quantity', 'Order Quantity', 'required|trim');

            $product = $this->productModel->getproduct($this->input->post('product_id'));

            if ($this->input->post('quantity') > $product->stocks) {
                $this->session->set_flashdata('message', 'Order exceeded!');
                redirect($_SERVER['HTTP_REFERER'], 'refresh');
            } else {
                if ($this->form_validation->run() == FALSE) {

                    $this->session->set_flashdata('message', validation_errors());
                } else {

                    $check_order = $this->productModel->checkOrder($user->id);

                    if (!empty($check_order)) {
                        $data = array(
                            'product_id' => $this->input->post('product_id'),
                            'quantity' => $this->input->post('quantity'),
                            'user_order_id' => $check_order->id
                        );

                        $insert = $this->productModel->save_to_cart($data);
                    } else {
                        $data = array(
                            'user_id' => $user->id
                        );
                        $order_id = $this->productModel->create_order($data);

                        $data = array(
                            'product_id' => $this->input->post('product_id'),
                            'quantity' => $this->input->post('quantity'),
                            'user_order_id' => $order_id
                        );
                        $insert = $this->productModel->save_to_cart($data);
                    }

                    if ($insert) {
                        $this->session->set_flashdata('success', 'success');
                        $this->session->set_flashdata('message', 'Product/s has been added to cart!');
                    } else {
                        $this->session->set_flashdata('message', 'Something went wrong. Please try again!');
                    }
                }
            }
        } else {
            $this->session->set_flashdata('message', 'Only registered customer can place an order. Thank you!');
            redirect($_SERVER['HTTP_REFERER'], 'refresh');
        }
        redirect("cart", 'refresh');
    }

    public function update_order()
    {
        $user = $this->ion_auth->user()->row();
        $this->session->set_flashdata('success', 'danger');
        if ($this->ion_auth->logged_in()) {
            $this->form_validation->set_rules('product_id[]', 'Product', 'required|trim');
            $this->form_validation->set_rules('quantity[]', 'Order Quantity', 'required|trim');

            if ($this->form_validation->run() == FALSE) {

                $this->session->set_flashdata('message', validation_errors());
            } else {

                $orders = array();
                $order_id = $this->input->post('order_id');
                $products = $this->input->post('product_id');
                $qty = $this->input->post('quantity');

                foreach ($products as $index => $pro) {
                    $orders[] = array(
                        'product_id' => $pro,
                        'quantity' => $qty[$index],
                        'user_order_id' => $order_id
                    );
                }

                $insert = $this->productModel->update_order($orders, $order_id);

                if ($insert) {
                    $this->session->set_flashdata('success', 'success');
                    $this->session->set_flashdata('message', 'Order/s has been updated!');
                } else {
                    $this->session->set_flashdata('message', 'Something went wrong. Please try again!');
                }
            }
        } else {
            $this->session->set_flashdata('message', 'Only registered customer can place an order. Thank you!');
        }
        redirect("cart", 'refresh');
    }
    public function place_order()
    {
        $this->session->set_flashdata('success', 'danger');
        if ($this->ion_auth->logged_in()) {
            if (!$this->ion_auth->is_admin()) {
                $this->form_validation->set_rules('order_id', 'Order ID', 'required|trim');

                if ($this->form_validation->run() == FALSE) {

                    $this->session->set_flashdata('message', validation_errors());
                } else {
                    $user = $this->ion_auth->user()->row();
                    $order_id =  $this->input->post('order_id');
                    $data = array(
                        'status' => 'Processing',
                        'payment_method' => $this->input->post('payment_method'),
                        'transaction' => $this->input->post('transaction_no'),
                        'notes' => $this->input->post('c_order_notes'),
                        'total_order' => $this->input->post('total_order'),
                        'date' => date('Y-m-d h:i'),
                    );
                    $insert = $this->productModel->placeorder($data, $order_id);

                    if ($insert) {

                        $products = $this->productModel->orderProducts($order_id);

                        $config = [
                            'protocol' => 'smtp',
                            'smtp_host' => 'ssl://smtp.googlemail.com',
                            'smtp_port' => 465,
                            'smtp_user' => 'jameronjame@gmail.com',
                            'smtp_pass' => 'KAGEbunshin1?',
                            'mailtype' => 'html'
                        ];
                        $data = array(
                            'identity' => 'Pharma',
                            'products' => $products,
                            'total' => $this->input->post('total_order'),
                            'order_id' => 'D0000' . $order_id,
                            'address' => $user->purok . ', ' . $user->barangay . ', ' . $user->city . ', ' . $user->province,
                            'name' => $user->first_name . ' ' . $user->last_name
                        );
                        $this->load->library('email');
                        $this->email->initialize($config);
                        $this->email->set_newline("\r\n");

                        $this->email->from('jameronjame@gmail.com', 'Pharma');
                        $this->email->to($this->session->email);
                        $this->email->subject('Order Confirmation');
                        $body = $this->load->view('email/order_confirmation.tpl.php', $data, TRUE);

                        $this->email->message($body);
                        if ($this->email->send()) {
                            $this->session->set_flashdata('success', 'success');
                            $this->session->set_flashdata('message', 'Product/s has been added to cart!');
                        } else {
                            echo 'Email not sent!';
                            show_error($this->email->print_debugger());
                        }

                        redirect("thankyou", 'refresh');
                    } else {
                        $this->session->set_flashdata('message', 'Something went wrong. Please try again!');
                        redirect("checkout", 'refresh');
                    }
                }
            } else {
                $this->session->set_flashdata('message', 'Please switch to customer account!');
                redirect($_SERVER['HTTP_REFERER'], 'refresh');
            }
        } else {
            $this->session->set_flashdata('message', 'Only registered customer can place an order. Thank you!');
            redirect($_SERVER['HTTP_REFERER'], 'refresh');
        }
    }

    public function getProducts()
    {
        $validator = array('data' => array());

        $id = $this->input->post('id');

        $validator['data'] = $this->productModel->getproduct($id);

        echo json_encode($validator);
    }

    public function delete($id)
    {
        $this->session->set_flashdata('success', 'danger');
        $delete = $this->productModel->delete($id);

        if ($delete) {
            $this->session->set_flashdata('message', 'Product has been deleted!');
        } else {
            $this->session->set_flashdata('message', 'Something went wrong!');
        }
        redirect('admin/products', 'refresh');
    }
    public function delete_product($id)
    {
        $this->session->set_flashdata('success', 'danger');
        $delete = $this->productModel->delete_product($id);

        if ($delete) {
            $this->session->set_flashdata('message', 'Order product/s has been remove!');
        } else {
            $this->session->set_flashdata('message', 'Something went wrong!');
        }
        redirect('cart', 'refresh');
    }

    public function deliver($id)
    {

        $this->session->set_flashdata('success', 'success');
        $data = array(
            'status' => 'Delivery ongoing',
            'date' => date('Y-m-d h:i'),
        );
        $update = $this->productModel->deliver($data, $id);
        $order = $this->productModel->getProductOrder($id);
        $user = $this->productModel->getthisOrder($id);
        if ($update) {

            foreach ($order as $row) {
                $produc = $this->productModel->getproduct($row->product_id);

                $stocks = $produc->stocks - $row->quantity;

                $data = array(
                    'stocks' => $stocks
                );
                $this->productModel->update($data, $produc->id);
            }

            $config = [
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'jameronjame@gmail.com',
                'smtp_pass' => 'KAGEbunshin1?',
                'mailtype' => 'html'
            ];
            $data = array(
                'identity' => 'Pharma',
                'total' => $user->total_order,
                'order_id' => 'D0000' . $id,
                'address' => $user->purok . ', ' . $user->barangay . ', ' . $user->city . ', ' . $user->province,
                'name' => $user->first_name . ' ' . $user->last_name
            );
            $this->load->library('email');
            $this->email->initialize($config);
            $this->email->set_newline("\r\n");

            $this->email->from('jameronjame@gmail.com', 'Pharma');
            $this->email->to($user->email);
            $this->email->subject('Ongoing Delivery');
            $body = $this->load->view('email/ongoing_delivery.tpl.php', $data, TRUE);

            $this->email->message($body);
            if ($this->email->send()) {
                $this->session->set_flashdata('message', 'Delivery is ongoing!');
            } else {
                echo 'Email not sent!';
                show_error($this->email->print_debugger());
            }
        } else {
            $this->session->set_flashdata('message', 'Something went wrong!');
        }
        redirect('admin/orders', 'refresh');
    }
    public function delivered($id)
    {
        $this->session->set_flashdata('success', 'success');
        $data = array(
            'status' => 'Order Delivered',
            'date' => date('Y-m-d h:i'),
        );
        $update = $this->productModel->deliver($data, $id);
        $order = $this->productModel->getOrder($id);
        $user = $this->productModel->getthisOrder($id);

        $payment = array(
            'user_id' => $order->user_id,
            'order_id' => $order->id,
            'amount' => $order->total_order,
        );
        if ($update) {
            $this->transacModel->save($payment);


            $config = [
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'jameronjame@gmail.com',
                'smtp_pass' => 'KAGEbunshin1?',
                'mailtype' => 'html'
            ];
            $data = array(
                'identity' => 'Pharma',
                'total' => $user->total_order,
                'order_id' => 'D0000' . $id,
                'address' => $user->purok . ', ' . $user->barangay . ', ' . $user->city . ', ' . $user->province,
                'name' => $user->first_name . ' ' . $user->last_name
            );
            $this->load->library('email');
            $this->email->initialize($config);
            $this->email->set_newline("\r\n");

            $this->email->from('jameronjame@gmail.com', 'Pharma');
            $this->email->to($user->email);
            $this->email->subject('Your order has been delivered!');
            $body = $this->load->view('email/parcel_recieved.tpl.php', $data, TRUE);

            $this->email->message($body);
            if ($this->email->send()) {
                $this->session->set_flashdata('message', 'Ordered has been delivered!');
            } else {
                echo 'Email not sent!';
                show_error($this->email->print_debugger());
            }
        } else {
            $this->session->set_flashdata('message', 'Something went wrong!');
        }
        redirect('admin/orders', 'refresh');
    }

    public function uploadPres()
    {
        $this->session->set_flashdata('success', 'danger');
        $config['upload_path'] = 'assets/uploads/';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        $this->form_validation->set_rules('product_id', 'Product ID', 'required|trim');
        $this->form_validation->set_rules('order_id', 'Order ID', 'required|trim');


        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('message', validation_errors());
        } else {
            $product_id = $this->input->post('product_id');
            $order_id = $this->input->post('order_id');
            if ($this->upload->do_upload('pres_img')) {
                $file = $this->upload->data();
                //Resize and Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = 'assets/uploads/' . $file['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['quality'] = '60%';
                $config['new_image'] = 'assets/uploads/' . $file['file_name'];

                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $data = array(
                    'prescription_file' => $file['file_name'],
                );
            } else {
                $this->session->set_flashdata('message', 'Prescription is required!');
            }


            $upload = $this->productModel->uploadPres($data, $product_id, $order_id);

            if ($upload) {
                $this->session->set_flashdata('success', 'success');
                $this->session->set_flashdata('message', 'Prescription uploaded!');
            } else {
                $this->session->set_flashdata('message', 'Prescription not uploaded!');
            }
        }
        redirect("cart", 'refresh');
    }
}
