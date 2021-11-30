<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TransacModel extends CI_Model
{

    public function __contruct()
    {
        $this->load->database();
    }

    public function save($data)
    {
        $this->db->insert('transaction', $data);
        return $this->db->affected_rows();
    }
    public function transactions()
    {
        $this->db->select('*, transaction.id as id, users.id as user_id, user_order.id as user_order_id');
        $this->db->join('users', 'users.id=transaction.user_id');
        $this->db->join('user_order', 'user_order.id=transaction.order_id');
        $query = $this->db->get('transaction');
        return $query->result();
    }
}
