
<?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class Pembelian extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Pembelian_model');
        }

        public function index()
        {
            $this->load->library('pagination');

            // 1. Ambil nilai offset (start) paksa ke Integer untuk cegah error 8192
            $start = ($this->uri->segment(3)) ? intval($this->uri->segment(3)) : 0;

            // 2. Konfigurasi Pagination
            $config['base_url']    = site_url('pembelian/index');
            $config['total_rows']  = $this->db->count_all('pembelian');
            $config['per_page']    = 10;
            $config['uri_segment'] = 3;

            // Styling Bootstrap
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

            $this->pagination->initialize($config);

            // 3. Ambil data & Kirim ke View
            $data['pembelian']  = $this->Pembelian_model->get_limit($config['per_page'], $start);
            $data['pagination'] = $this->pagination->create_links();
            $data['start']      = $start;
            $data['title']      = "Data Pembelian";
            $data['content']    = 'pembelian/index';

            $this->load->view('template/main', $data);
    }
}