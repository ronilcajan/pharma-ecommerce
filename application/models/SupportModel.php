<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SupportModel extends CI_Model
{

    public function __contruct()
    {
        $this->load->database();
    }

    public function inquiry()
    {
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('support');
        return $query->result_array();
    }

    public function save($data)
    {
        $this->db->insert('support', $data);
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('support');
        return $this->db->affected_rows();
    }
}
