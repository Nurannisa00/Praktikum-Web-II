<?php
class Satuan_model extends CI_Model
{

    private $_table = "satuan"; // Nama tabel di database

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
        $post = $this->input->post();
        $data = [
            'name'      => $post["name"],
            'deskripsi' => $post["deskripsi"],
        ];
        return $this->db->insert($this->_table, $data);
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, ["id" => $id]);
    }

    public function editData()
    {
        $post = $this->input->post();
        $data = [
            'name'      => $post["name"],      // Mengambil input dari name="name"
            'deskripsi' => $post["deskripsi"], // Mengambil input dari name="deskripsi"
        ];

        // Melakukan update data berdasarkan ID yang dikirim secara hidden
        return $this->db->update('satuan', $data, ['id' => $post['id']]);
    }
}
