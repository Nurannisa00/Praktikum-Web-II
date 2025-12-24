<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Customer_model");
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
        $this->session->set_flashdata("success", "Data Customer berhasil disimpan");
        redirect('customer');
    }

    public function getedit($id)
    {
        $customer = $this->Customer_model->getById($id);
        if (! $customer) {
            show_404();
        }

        $data = [
            'title'    => 'Edit Customer',
            'customer' => $customer,
            'content'  => 'customer/edit_form',
        ];
        $this->load->view('template/main', $data);
    }

    public function edit()
    {
        $this->Customer_model->update();
        $this->session->set_flashdata("success", "Data Customer berhasil diupdate");
        redirect('customer');
    }

    public function delete($id)
    {
        $this->Customer_model->delete($id);
        $this->session->set_flashdata('success', 'Data Customer berhasil dihapus');
        redirect('customer');
    }
}
