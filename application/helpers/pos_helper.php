<?php

// Pastikan fungsi belum didefinisikan untuk menghindari error
if (! function_exists('infologin')) {
    /**
     * Mengambil seluruh data user yang sedang login dari database
     * berdasarkan username yang tersimpan di sesi.
     * @return array Data user
     */
    function infologin()
    {
        // Mendapatkan instance CodeIgniter Super Object
        $ci = &get_instance();

        // Mengambil data user dari tabel 'tb_user' berdasarkan 'username' dari sesi
        return $ci->db->get_where('user', ['username' => $ci->session->userdata('username')])->row_array();
    }
}

if (! function_exists('cek_login')) {
    /**
     * Memeriksa apakah user sudah login (sesi 'username' ada).
     * Jika belum, user akan diredirect ke halaman login.
     */
    function cek_login()
    {
        $ci = &get_instance();

        // Cek jika sesi 'username' tidak ada
        if (! $ci->session->userdata('username')) {
            // Jika belum login, redirect ke controller 'login'
            redirect('login');
        }
    }
}

if (! function_exists('cek_user')) {
    /**
     * Memeriksa role dari user yang sedang login.
     * Jika role BUKAN 'admin', user akan diredirect ke halaman 'login/block'.
     */
    function cek_user()
    {
        $ci = &get_instance();

        // Ambil data user yang sedang login
        $user = $ci->db->get_where('user', ['username' => $ci->session->userdata('username')])->row_array();

        // Periksa apakah role user adalah 'admin'
        if ($user['role'] == 'admin') {
            // Lanjutkan eksekusi jika role adalah admin (blok ini kosong)
        } else {
            // Jika role bukan admin, redirect ke halaman 'block' (akses ditolak)
            redirect('login/block');
        }
    }
}

/* Akhir dari file Helper */
// Tidak perlu tag penutup
