<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer_model extends CI_Model
{
    protected $_table  = 'customer'; // Sesuai nama tabel di DB
    protected $primary = 'id';

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function save()
    {
        $data = [
            'nik'    => htmlspecialchars($this->input->post('nik'), true),
            'name'   => htmlspecialchars($this->input->post('name'), true),
            'telp'   => htmlspecialchars($this->input->post('telp'), true),
            'email'  => htmlspecialchars($this->input->post('email'), true),
            'alamat' => htmlspecialchars($this->input->post('alamat'), true),
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
            'nik'    => htmlspecialchars($this->input->post('nik'), true),
            'name'   => htmlspecialchars($this->input->post('name'), true),
            'telp'   => htmlspecialchars($this->input->post('telp'), true),
            'email'  => htmlspecialchars($this->input->post('email'), true),
            'alamat' => htmlspecialchars($this->input->post('alamat'), true),
        ];

        return $this->db->where($this->primary, $id)->update($this->_table, $data);
    }

    public function delete($id)
    {
        return $this->db->where($this->primary, $id)->delete($this->_table);
    }
}
