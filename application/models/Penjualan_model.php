<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan_model extends CI_Model
{

    public function get_all_penjualan()
    {
        // Query untuk mengambil data gabungan (Join)
        $this->db->select('penjualan.*, customer.name as nama_customer, user.full_name as nama_kasir');
        $this->db->from('penjualan');
        $this->db->join('customer', 'customer.id = penjualan.customer_id');
        $this->db->join('user', 'user.id = penjualan.user_id');
        $this->db->order_by('penjualan.id', 'DESC');
        return $this->db->get()->result_array();
    }

    public function get_limit($limit, $start)
    {
        $this->db->select('penjualan.*, customer.name as nama_customer, user.username as nama_kasir');
        $this->db->from('penjualan');

        // Sesuaikan dengan gambar: kolomnya adalah customer_id dan user_id
        $this->db->join('customer', 'customer.id = penjualan.customer_id', 'left');
        $this->db->join('user', 'user.id = penjualan.user_id', 'left');

        $this->db->limit($limit, $start);
        $this->db->order_by('penjualan.tanggal', 'DESC');
        return $this->db->get()->result_array();
    }
}
