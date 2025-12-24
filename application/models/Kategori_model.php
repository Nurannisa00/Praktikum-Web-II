<?php defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_model extends CI_Model
{
    protected $_table  = 'kategori'; // Nama tabel di database
    protected $primary = 'id';

    // 1. Tambahkan fungsi ini untuk mengambil semua data kategori
    public function getAll()
    {
        // Mengurutkan berdasarkan ID dari yang terkecil (data lama di atas, baru di bawah)
        $this->db->order_by('id', 'ASC');
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function save()
    {
        $data = [
            'name' => htmlspecialchars($this->input->post('name'), true),
        ];
        return $this->db->insert($this->_table, $data);
    }

    public function editData()
    {
        $id = $this->input->post('id'); // Mengambil id dari input hidden di form

        $data = [
            'name' => htmlspecialchars($this->input->post('name'), true),
        ];

        return $this->db->set($data)
            ->where($this->primary, $id)
            ->update($this->_table);
    }

    public function delete($id)
    {
        $this->db->where('id', $id)->delete($this->_table);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata("success", "Data Kategori Berhasil Di Delete");
        }
    }

}
