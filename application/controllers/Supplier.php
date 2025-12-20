<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Supplier_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = [
            'title'    => 'Data Supplier',
            'supplier' => $this->Supplier_model->getAll(),
            'content'  => 'supplier/index',
        ];
        $this->load->view('template/main', $data);
    }

    public function add()
    {
        $data = [
            'title'   => 'Tambah Supplier',
            'content' => 'supplier/add_form',
        ];
        $this->load->view('template/main', $data);
    }

    public function save()
    {
        $this->Supplier_model->save();
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata("success", "Data supplier berhasil disimpan");
        }
        redirect('supplier');
    }

    public function getedit($id)
    {
        $data = [
            'title'    => 'Edit Supplier',
            'supplier' => $this->Supplier_model->getById($id),
            'content'  => 'supplier/edit_form',
        ];
        $this->load->view('template/main', $data);
    }

    public function edit()
    {
        $this->Supplier_model->editData();
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata("success", "Data supplier berhasil diupdate");
        }
        redirect('supplier');
    }

    public function delete($id)
    {
        $this->Supplier_model->delete($id);
        $this->session->set_flashdata("success", "Data supplier berhasil dihapus");
        redirect('supplier');
    }
}
