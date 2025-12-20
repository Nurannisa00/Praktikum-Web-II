<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Memuat library form_validation untuk memproses input form
        $this->load->library('form_validation');
    }

    // Fungsi untuk menampilkan form login dan mengatur rules validasi
    public function index()
    {
        // Mendefinisikan aturan (rules) untuk validasi form
        $this->form_validation->set_rules('email', 'email', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        // Memuat view (tampilan) yang berada di folder 'login' dengan nama file 'index'
        $this->load->view('login/index');
    }

    // Fungsi untuk memproses data yang dikirim dari form login
    public function doLogin()
    {
        // Mengambil input email dan password dari form
        $user = $this->input->post('email');
        $pswd = $this->input->post('password');

        // Mencari data user di database berdasarkan email
        $user = $this->db->get_where('user', ['email' => $user])->row_array();

        // 1. Cek apakah user terdaftar (data user ditemukan)
        if ($user) {

            // 2. Jika user terdaftar, periksa password-nya
            if (password_verify($pswd, $user['password'])) {

                // Jika password benar, buat data sesi (session)
                $data = [
                    'id'       => $user['id'],
                    'email'    => $user['email'],
                    'username' => $user['username'],
                    'role'     => $user['role'],
                ];

                // Tambahkan data user ke sesi
                $this->session->set_userdata($data);

                // Update kolom 'last_login' di database
                $this->updateLastLogin($user['id']);

                // 3. Periksa role user dan redirect ke halaman yang sesuai
                if ($user['role'] == 'PEMILIK') {
                    redirect('menu'); // Redirect ke halaman menu

                } elseif ($user['role'] == 'ADMIN') {
                    redirect('user'); // Redirect ke halaman user

                } elseif ($user['role'] == 'KASIR') {
                    redirect('kasir'); // Redirect ke halaman kasir

                } else {
                    // Jika role tidak terdefinisi
                    redirect('login');
                }

            } else {
                // Jika password salah
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><b>Error :</b> Password Salah. </div>');
                redirect('login');
            }

        } else {
            // 4. Jika user tidak terdaftar (email tidak ditemukan)
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><b>Error :</b> User Tidak Terdaftar. </div>');
            redirect('login');
        }
    }

    // Fungsi untuk menghancurkan sesi dan mengarahkan kembali ke halaman login
    public function logout()
    {
        // hancurkan semua sesi
        $this->session->sess_destroy();
        redirect(site_url('login'));
    }

    // Fungsi untuk menampilkan halaman 'Access Denied'
    // Asumsi fungsi infologin() sudah ada di tempat lain (misalnya Helper atau Model)
    public function block()
    {
        $data = [
            'user'  => $this->infologin(), // Asumsi: fungsi infologin() mengambil data user saat ini
            'title' => 'Access Denied!',
        ];
        $this->load->view('login/error404', $data);
    }

    // Fungsi private untuk mengupdate kolom 'last_login' di tabel user
    private function updateLastLogin($userId)
    {
        $sql = "UPDATE user SET last_login=now() WHERE ID='{$userId}'";
        $this->db->query($sql);
    }
}
