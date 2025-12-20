<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Customer_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = [
            'title'    => 'Data Customer',
            'customer' => $this->Customer_model->getAll(),
            'content'  => 'customer/index',
        ];
        $this->load->view('template/main', $data);
    }

    public function add()
    {
        $data = [
            'title'   => 'Tambah Customer',
            'content' => 'customer/add_form',
        ];
        $this->load->view('template/main', $data);
    }

    public function save()
    {
        $this->Customer_model->save();
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata("success", "Data customer berhasil disimpan");
        }
        redirect('customer');
    }

    public function getedit($id)
    {
        $data = [
            'title'    => 'Edit Customer',
            'customer' => $this->Customer_model->getById($id),
            'content'  => 'customer/edit_form',
        ];
        $this->load->view('template/main', $data);
    }

    public function edit()
    {
        $this->Customer_model->editData();
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata("success", "Data customer berhasil diupdate");
        }
        redirect('customer');
    }

    public function delete($id)
    {
        $this->Customer_model->delete($id);
        $this->session->set_flashdata("success", "Data customer berhasil dihapus");
        redirect('customer');
    }
}
