<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer_model extends CI_Model
{
    private $_table = "customer";

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function save()
    {
        $data = [
            'nik'    => $this->input->post('nik'),
            'name'   => $this->input->post('name'),
            'telp'   => $this->input->post('telp'),
            'email'  => $this->input->post('email'),
            'alamat' => $this->input->post('alamat'),
        ];
        return $this->db->insert($this->_table, $data);
    }

    public function update()
    {
        $id   = $this->input->post('id');
        $data = [
            'nik'    => $this->input->post('nik'),
            'name'   => $this->input->post('name'),
            'telp'   => $this->input->post('telp'),
            'email'  => $this->input->post('email'),
            'alamat' => $this->input->post('alamat'),
        ];
        return $this->db->update($this->_table, $data, ['id' => $id]);
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, ['id' => $id]);
    }
}
