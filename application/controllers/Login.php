<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("karyawan_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        // tampilkan halaman login
        $this->load->view("login");
    }

    public function auth(){
        $validate = $this->karyawan_model->login($nik,$password_login);
        if($validate->num_rows() > 0){
            $data  = $validate->row_array();
            $nama_lengkap  = $data['nama_lengkap'];
            $nik = $data['nik'];
            $jabatan = $data['jabatan'];
            $id_div = $data['id_div'];
            $id_tim = $data['id_tim'];
            $sesdata = array(
                'nama_lengkap'  => $nama_lengkap,
                'nik'           => $nik,
                'jabatan'       => $jabatan,
                'id_div'        => $id_div,
                'id_tim'        => $id_tim,
                'logged_in'     => TRUE
            );
            $this->session->set_userdata($sesdata);
            // access login for admin
            if($jabatan === 'Admin'){
                redirect ('dashboard');
     
            // access login for manager
            }elseif($jabatan === 'Site Manager' or 'Manager'){
                redirect ('dashboard');
     
            // access login for author
            }else{
                redirect('dashboard');
            }
        }else{
            echo $this->session->set_flashdata('msg','NIK Atau Password Salah');
            redirect('login');
        }
    }

    public function logout()
    {
        // hancurkan semua sesi
        $this->session->sess_destroy();
        redirect(site_url('login'));
    }
}