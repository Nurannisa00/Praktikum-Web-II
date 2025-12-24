<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Supplier_model");
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
            $this->session->set_flashdata("success", "Data Supplier berhasil disimpan! yey");
        }
        redirect('supplier');
    }

    public function getedit($id)
    {
        $supplier = $this->Supplier_model->getById($id);
        if (! $supplier) {
            show_404();
        }

        $data = [
            'title'    => 'Edit Supplier',
            'supplier' => $supplier,
            'content'  => 'supplier/edit_form',
        ];
        $this->load->view('template/main', $data);
    }

    public function edit()
    {
        $this->Supplier_model->update();
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata("success", "Data Supplier berhasil diedit! yey");
        }
        redirect('supplier');
    }

    public function delete($id)
    {
        if ($this->Supplier_model->delete($id)) {
            $this->session->set_flashdata('success', 'Data Supplier berhasil dihapus!');
            redirect('supplier');
        }
    }
}
