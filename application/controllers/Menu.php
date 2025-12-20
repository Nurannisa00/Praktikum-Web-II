<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function index()
    {
        $data = [
            'title'          => 'Dashboard',
            'user'           => [],

            // Tambahan script baru untuk menghitung jumlah data
            'total_barang'   => $this->db->count_all('barang'),
            'total_supplier' => $this->db->count_all('supplier'),
            'total_customer' => $this->db->count_all('customer'),
            'total_user'     => $this->db->count_all('user'),

            'content'        => 'dashboard/index',
        ];
        $this->load->view('template/main', $data);
    }
}
