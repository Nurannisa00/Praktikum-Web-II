<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Barang_model");
        $this->load->model("Kategori_model");
        $this->load->model("Satuan_model");
        $this->load->model("Supplier_model");
    }

    public function index()
    {
        $data = [
            'title'   => 'View Data Barang',
            'barang'  => $this->Barang_model->getAll(),
            'content' => 'barang/index',
        ];
        $this->load->view('template/main', $data);
    }

    public function add()
    {
        $data = [
            'title'    => 'Tambah Data Barang',
            'kategori' => $this->db->get('kategori')->result(),
            'satuan'   => $this->db->get('satuan')->result(),
            'supplier' => $this->db->get('supplier')->result(),
            'content'  => 'barang/add_form',
        ];
        $this->load->view('template/main', $data);
    }

    public function save()
    {
        $this->Barang_model->save();
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata("success", "Data barang berhasil disimpan");
        }
        redirect('barang');
    }

    public function delete($id)
    {
        $this->Barang_model->delete($id);
        $this->session->set_flashdata("success", "Data barang berhasil dihapus");
        redirect('barang');
    }
}
