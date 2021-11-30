<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardModel extends CI_Model
{

    public function __contruct()
    {
        $this->load->database();
    }

    public function getCustomers()
    {
        $this->db->join('users_groups', 'users_groups.user_id=users.id');
        $this->db->where('users_groups.group_id', 2);
        $query = $this->db->get('users');
        return $query->num_rows();
    }

    public function getProducts()
    {
        $query = $this->db->get('products');
        return $query->num_rows();
    }

    public function getSales()
    {
        $this->db->select_sum('amount');
        $query = $this->db->get('transaction');
        return $query->row();
    }

    public function getOrders()
    {
        $this->db->where('user_order.status !=', 'New');
        $query = $this->db->get('user_order');
        return $query->num_rows();
    }

    public function getSale($id)
    {
        $this->db->select_sum('amount');
        $this->db->where('MONTH(date)', $id);
        $query = $this->db->get('transaction');
        return $query->row();
    }

    public function getundeliver()
    {
        $this->db->where('status', 'Processing');
        $this->db->or_where('status', 'Delivery ongoing');
        $query = $this->db->get('user_order');
        return $query->num_rows();
    }

    public function delivered()
    {
        $this->db->where('user_order.status', 'Order Delivered');
        $query = $this->db->get('user_order');
        return $query->num_rows();
    }

    public function update($data)
    {
        $this->db->update('systems', $data, "id=1");
        return $this->db->affected_rows();
    }
}
