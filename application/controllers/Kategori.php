<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Kategori_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = [
            'title'    => 'Data Kategori',
            'kategori' => $this->Kategori_model->getAll(),
            'content'  => 'kategori/index',
        ];
        $this->load->view('template/main', $data);
    }

    public function add()
    {
        $data = [
            'title'   => 'Tambah Kategori',
            'content' => 'kategori/add_form',
        ];
        $this->load->view('template/main', $data);
    }

    public function save()
    {
        $this->Kategori_model->save();
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata("success", "Kategori berhasil disimpan");
        }
        redirect('kategori');
    }

    public function getedit($id)
    {
        $data = [
            'title'    => 'Edit Kategori',
            'kategori' => $this->Kategori_model->getById($id),
            'content'  => 'kategori/edit_form',
        ];
        $this->load->view('template/main', $data);
    }

    public function edit()
    {
        $this->Kategori_model->editData();
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata("success", "Kategori berhasil diupdate");
        }
        redirect('kategori');
    }

    public function delete($id)
    {
        $this->Kategori_model->delete($id);
        $this->session->set_flashdata("success", "Kategori berhasil dihapus");
        redirect('kategori');
    }
}
