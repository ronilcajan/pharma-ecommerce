<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CatModel extends CI_Model
{

    public function __contruct()
    {
        $this->load->database();
    }

    public function category()
    {
        $query = $this->db->get('category');
        return $query->result();
    }
    public function getCat($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('category');
        return $query->row();
    }

    public function product_category($id)
    {
        $this->db->where('category_id', $id);
        $query = $this->db->get('products');
        return $query->result();
    }

    public function save($data)
    {
        $this->db->insert('category', $data);
        return $this->db->affected_rows();
    }

    public function update($data, $id)
    {
        $this->db->update('category', $data, "id='$id'");
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('category');
        return $this->db->affected_rows();
    }
}
