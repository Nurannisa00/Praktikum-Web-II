<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembelian_model extends CI_Model
{
    public function get_limit($limit, $start)
    {
        $this->db->select('pembelian.*, supplier.name as nama_supplier, user.username as nama_petugas');
        $this->db->from('pembelian');
        // Join ke tabel supplier dan user
        $this->db->join('supplier', 'supplier.id = pembelian.supplier_id', 'left');
        $this->db->join('user', 'user.id = pembelian.user_id', 'left');

        $this->db->limit($limit, $start);
        $this->db->order_by('pembelian.tanggal', 'DESC');
        return $this->db->get()->result_array();
    }
}
