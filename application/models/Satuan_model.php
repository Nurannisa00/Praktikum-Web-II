<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Satuan_model extends CI_Model
{
    protected $_table  = 'satuan';
    protected $primary = 'id';

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function save()
    {
        $data = [
            'name'      => htmlspecialchars($this->input->post('name'), true),
            'deskripsi' => htmlspecialchars($this->input->post('deskripsi'), true),
        ];

        return $this->db->insert($this->_table, $data);
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function editData()
    {
        $id   = $this->input->post('id');
        $data = [
            'name'      => htmlspecialchars($this->input->post('name'), true),
            'deskripsi' => htmlspecialchars($this->input->post('deskripsi'), true),
        ];

        return $this->db->where($this->primary, $id)->update($this->_table, $data);
    }

    public function delete($id)
    {
        return $this->db->where($this->primary, $id)->delete($this->_table);
    }
}
