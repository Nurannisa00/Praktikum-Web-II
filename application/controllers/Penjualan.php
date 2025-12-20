<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Penjualan_model');
    }

    public function index()
    {
        $this->load->library('pagination');

        // 1. Konfigurasi Dasar Pagination
        $config['base_url']    = site_url('penjualan/index');
        $config['total_rows']  = $this->db->count_all('penjualan');
        $config['per_page']    = 10;
        $config['uri_segment'] = 3;

        // 2. Pengaturan tag HTML Bootstrap 4/5
        $config['full_tag_open']   = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']  = '</ul></nav>';
        $config['first_link']      = 'First';
        $config['first_tag_open']  = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_link']       = 'Last';
        $config['last_tag_open']   = '<li class="page-item">';
        $config['last_tag_close']  = '</li>';
        $config['next_link']       = '&raquo;';
        $config['next_tag_open']   = '<li class="page-item">';
        $config['next_tag_close']  = '</li>';
        $config['prev_link']       = '&laquo;';
        $config['prev_tag_open']   = '<li class="page-item">';
        $config['prev_tag_close']  = '</li>';
        $config['cur_tag_open']    = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close']   = '</a></li>';
        $config['num_tag_open']    = '<li class="page-item">';
        $config['num_tag_close']   = '</li>';
        $config['attributes']      = ['class' => 'page-link'];

        // 3. Inisialisasi Pagination
        $this->pagination->initialize($config);

        // 4. KUNCI PERBAIKAN: Pastikan segment 3 diubah ke integer 0 jika NULL
        // Lakukan ini TEPAT SEBELUM memanggil create_links()
        $start = ($this->uri->segment(3)) ? intval($this->uri->segment(3)) : 0;

        // 5. Siapkan data untuk View
        $data['penjualan']  = $this->Penjualan_model->get_limit($config['per_page'], $start);
        $data['pagination'] = $this->pagination->create_links();
        $data['start']      = $start;
        $data['title']      = "Data Penjualan";
        $data['content']    = 'penjualan/index';

        $this->load->view('template/main', $data);
    }
}
