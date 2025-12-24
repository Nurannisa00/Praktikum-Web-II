<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Satuan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Satuan_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = [
            'title'   => 'Data Satuan',
            'satuan'  => $this->Satuan_model->getAll(),
            'content' => 'satuan/index',
        ];
        $this->load->view('template/main', $data);
    }

    public function add()
    {
        $data = [
            'title'   => 'Tambah Satuan',
            'content' => 'satuan/add_form',
        ];
        $this->load->view('template/main', $data);
    }

    public function save()
    {
        $this->Satuan_model->save();
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata("success", "Data satuan berhasil disimpan");
        }
        redirect('satuan');
    }

    public function getedit($id = null)
    {
        if (! isset($id)) {
            redirect('satuan');
        }

        $satuan = $this->Satuan_model->getById($id);
        if (! $satuan) {
            show_404();
        }

        $data = [
            'title'   => 'Edit Satuan',
            'satuan'  => $satuan,
            'content' => 'satuan/edit_form', // Mengarahkan isi konten ke form edit
        ];

        // Panggil template utama agar Bootstrap tetap tampil
        $this->load->view('template/main', $data);
    }

    public function edit()
    {
        // 1. Meminta Model untuk menjalankan query UPDATE di database
        $this->Satuan_model->editData();

        // 2. Mengecek apakah ada baris data yang berubah di database
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata("success", "Data satuan berhasil diupdate");
        }

        // 3. Melempar kembali pengguna ke halaman daftar satuan (index)
        redirect('satuan');
    }
    public function delete($id = null)
    {
        if (! isset($id)) {
            show_404();
        }

        if ($this->Satuan_model->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect(site_url('satuan'));
        }
    }
}
