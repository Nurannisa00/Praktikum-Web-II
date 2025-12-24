<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = [
            'title'    => 'View Data Kategori',
            'userlog'  => infoLogin(),
            'kategori' => $this->Kategori_model->getAll(),
            'content'  => 'kategori/index',
        ];
        $this->load->view('template/main', $data);
    }

    public function add()
    {
        // Cek apakah ada data yang dikirim melalui metode POST
        if ($this->input->post()) {
            // Panggil fungsi save di Model untuk memasukkan data ke database
            $this->Kategori_model->save();

            // Jika data berhasil masuk, beri pesan sukses
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata("success", "Data Kategori Berhasil DiSimpan");
            }

            // Kembalikan ke halaman daftar kategori
            redirect('kategori');
        }

        // Jika tidak ada data POST, tampilkan form tambah seperti biasa
        $data = [
            'title'   => 'Tambah Data Kategori',
            'content' => 'kategori/add_form',
        ];
        $this->load->view('template/main', $data);
    }

    public function edit($id = null)
    {
        if (! isset($id)) {
            redirect('kategori');
        }

        if ($this->input->post()) {
            $this->Kategori_model->editData(); // Memanggil fungsi di model (Langkah 3)
            $this->session->set_flashdata("success", "Data Kategori Berhasil DiUpdate");
            redirect('kategori');
        }

        $data = [
            'title'    => 'Update Data Kategori',
            'kategori' => $this->Kategori_model->getById($id),
            'content'  => 'kategori/edit_form',
        ];

        if (! $data['kategori']) {
            show_404();
        }

        $this->load->view('template/main', $data);
    }

    public function delete($id)
    {
        $this->Kategori_model->delete($id);
        redirect('kategori');
    }

}
