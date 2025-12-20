<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_model extends CI_Model
{
    protected $_table  = 'barang';
    protected $primary = 'id';

    public function getAll()
    {
        $this->db->select('barang.*, kategori.name as nama_kategori, satuan.name as nama_satuan, supplier.name as nama_supplier');
        $this->db->from($this->_table);
        $this->db->join('kategori', 'kategori.id = barang.kategori_id');
        $this->db->join('satuan', 'satuan.id = barang.satuan_id');
        $this->db->join('supplier', 'supplier.id = barang.supplier_id');
        return $this->db->get()->result();
    }

    public function save()
    {
        $data = [
            'barcode'     => htmlspecialchars($this->input->post('barcode'), true),
            'name'        => htmlspecialchars($this->input->post('name'), true),
            'harga_beli'  => $this->input->post('harga_beli'),
            'harga_jual'  => $this->input->post('harga_jual'),
            'stok'        => $this->input->post('stok'),
            'kategori_id' => $this->input->post('kategori_id'),
            'satuan_id'   => $this->input->post('satuan_id'),
            'supplier_id' => $this->input->post('supplier_id'),
            'user_id'     => 1, // Sementara di-set 1, atau ambil dari session login
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
            'barcode'     => htmlspecialchars($this->input->post('barcode'), true),
            'name'        => htmlspecialchars($this->input->post('name'), true),
            'harga_beli'  => $this->input->post('harga_beli'),
            'harga_jual'  => $this->input->post('harga_jual'),
            'stok'        => $this->input->post('stok'),
            'kategori_id' => $this->input->post('kategori_id'),
            'satuan_id'   => $this->input->post('satuan_id'),
            'supplier_id' => $this->input->post('supplier_id'),
        ];

        return $this->db->where($this->primary, $id)->update($this->_table, $data);
    }

    public function delete($id)
    {
        return $this->db->where($this->primary, $id)->delete($this->_table);
    }
}
