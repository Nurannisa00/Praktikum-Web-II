<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model');      //
        $this->load->library('form_validation'); //
    }

    public function index()
    {
        $data = [
            'title'   => 'Dashboard',                   //
            'userlog' => infoLogin(),                   //
            'barang'  => $this->Barang_model->getAll(), //
            'content' => 'barang/index',                //
        ];
        $this->load->view('template/main', $data); //
    }

    public function add()
    {
        $data = [
            'title'    => 'Tambah Data Barang',                       //
            'kategori' => $this->db->get('kategori')->result_array(), //
            'satuan'   => $this->db->get('satuan')->result_array(),   //
            'supplier' => $this->db->get('supplier')->result_array(), //
            'content'  => 'barang/add_form',                          //
        ];
        $this->load->view('template/main', $data); //
    }

    public function save()
    {
        $this->Barang_model->Save();
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata("success", "Data Barang Berhasil Di Simpan");
        }
        redirect('barang');
    }

    public function getedit($id)
    {
        $data = [
            'title'    => 'Update Data Barang',
            'kategori' => $this->db->get('kategori')->result_array(),
            'satuan'   => $this->db->get('satuan')->result_array(),
            'supplier' => $this->db->get('supplier')->result_array(),
            'barang'   => $this->Barang_model->getById($id),
            'content'  => 'barang/edit_form',
        ];
        $this->load->view('template/main', $data);
    }
    public function delete($id)
    {
        // Memanggil fungsi delete pada Barang_model
        $this->Barang_model->delete($id);

        // Kembali ke halaman daftar barang setelah menghapus
        redirect('barang');
    }
}
