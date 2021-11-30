<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProductModel extends CI_Model
{

    public function __contruct()
    {
        $this->load->database();
    }

    public function products()
    {
        $query = $this->db->get('products');
        return $query->result();
    }
    public function getpopularProducts()
    {
        $this->db->where('status', 'Sale');
        $this->db->order_by('rand()');
        $this->db->limit(6);
        $query = $this->db->get('products');
        return $query->result();
    }
    public function getnewProducts()
    {
        $this->db->where('status', 'New');
        $this->db->order_by('rand()');
        $this->db->limit(6);
        $query = $this->db->get('products');
        return $query->result();
    }
    public function getOrder($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('user_order');
        return $query->row();
    }
    public function getproduct($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('products');
        return $query->row();
    }
    public function checkOrder($id)
    {
        $this->db->where('user_id', $id);
        $this->db->where('status', 'New');
        $query = $this->db->get('user_order');
        return $query->row();
    }
    public function mycart($id)
    {
        $this->db->select('*, order_products.id as id, products.id as product_id, user_order.id as user_order_id');
        $this->db->join('products', 'products.id=order_products.product_id');
        $this->db->join('user_order', 'user_order.id=order_products.user_order_id', 'right');
        $this->db->where('user_order.user_id', $id);
        $this->db->where('user_order.status', 'New');
        $query = $this->db->get('order_products');
        return $query->result();
    }
    public function myproductorder($user_id, $id)
    {
        $this->db->select('*, order_products.id as id, products.id as product_id, user_order.id as user_order_id');
        $this->db->join('products', 'products.id=order_products.product_id');
        $this->db->join('user_order', 'user_order.id=order_products.user_order_id', 'right');
        $this->db->where('user_order.user_id', $user_id);
        $this->db->where('user_order.id', $id);
        $query = $this->db->get('order_products');
        return $query->result();
    }
    public function orderProducts($id)
    {
        $this->db->select('*, order_products.id as id, products.id as product_id, user_order.id as user_order_id');
        $this->db->join('products', 'products.id=order_products.product_id');
        $this->db->join('user_order', 'user_order.id=order_products.user_order_id', 'right');
        $this->db->join('users', 'users.id=user_order.user_id', 'right');
        $this->db->where('user_order_id', $id);
        $query = $this->db->get('order_products');
        return $query->result();
    }
    public function getProductOrder($id)
    {
        $this->db->where('user_order_id', $id);
        $query = $this->db->get('order_products');
        return $query->result();
    }
    public function myorder($id)
    {
        $this->db->where('user_order.user_id', $id);
        $this->db->where('user_order.status !=', 'New');
        $this->db->order_by('date', 'DESC');
        $query = $this->db->get('user_order');
        return $query->result();
    }

    public function getthisOrder($id)
    {
        $this->db->join('users', 'users.id=user_order.user_id');
        $this->db->where('user_order.id', $id);
        $query = $this->db->get('user_order');
        return $query->row();
    }

    public function clientproductorder($id)
    {
        $this->db->select('*, order_products.id as id, products.id as product_id, user_order.id as user_order_id');
        $this->db->join('products', 'products.id=order_products.product_id');
        $this->db->join('user_order', 'user_order.id=order_products.user_order_id', 'right');
        $this->db->where('user_order.id', $id);
        $query = $this->db->get('order_products');
        return $query->result();
    }
    public function clientorders()
    {
        $this->db->select('*, user_order.id as id');
        $this->db->join('users', 'users.id=user_order.user_id');
        $this->db->where('user_order.status !=', 'New');
        $this->db->order_by('date', 'DESC');
        $query = $this->db->get('user_order');
        return $query->result();
    }
    public function create_order($data)
    {
        $this->db->insert('user_order', $data);
        return $this->db->insert_id();
    }
    public function save($data)
    {
        $this->db->insert('products', $data);
        return $this->db->affected_rows();
    }
    public function save_to_cart($data)
    {
        $this->db->insert('order_products', $data);
        return $this->db->affected_rows();
    }
    public function update($data, $id)
    {
        $this->db->update('products', $data, "id='$id'");
        return $this->db->affected_rows();
    }
    public function placeorder($data, $id)
    {
        $this->db->update('user_order', $data, "id='$id'");
        return $this->db->affected_rows();
    }
    public function update_order($data, $order_id)
    {
        $this->db->where('user_order_id', $order_id);
        $this->db->delete('order_products');

        $this->db->insert_batch('order_products', $data);
        return $this->db->affected_rows();
    }
    public function get_products($limit, $start)
    {
        $query = $this->db->get("products", $limit, $start);
        return $query->result();
    }
    public function get_category_products($limit, $start, $id)
    {
        $this->db->where('category_id', $id);
        $query = $this->db->get("products", $limit, $start);
        return $query->result();
    }

    public function get_total()
    {
        return $this->db->count_all("products");
    }

    public function get_category_total($id)
    {
        $this->db->where('category_id', $id);
        return $this->db->count_all("products");
    }

    public function deliver($data, $id)
    {
        $this->db->update('user_order', $data, "id='$id'");
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('products');
        return $this->db->affected_rows();
    }
    public function delete_product($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('order_products');
        return $this->db->affected_rows();
    }

    public function uploadPres($data, $pro_id, $ord_id)
    {
        $this->db->where('product_id', $pro_id);
        $this->db->where('user_order_id', $ord_id);
        $this->db->update('order_products', $data);
        return $this->db->affected_rows();
    }
}
