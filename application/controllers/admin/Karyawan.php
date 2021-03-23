<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("karyawan_model");
        $this->load->library('form_validation');
        if($this->session->userdata('logged_in') !== TRUE){
            redirect('login');
        }
    }

    public function index()
    {
        if($this->session->userdata('jabatan')==='Admin'){
            $data["karyawan"] = $this->karyawan_model->getAll();
            $this->load->view("admin/karyawan/karyawan", $data);

		}elseif($this->session->userdata('jabatan')==='Manager'){
            $id_div = $this->session->userdata('id_div');
            $data["karyawan"] = $this->karyawan_model->getKarByIdDiv($id_div);
            $this->load->view("manager/karyawan/karyawan", $data);

        }elseif($this->session->userdata('jabatan')==='Site Manager'){
            $id_div = $this->session->userdata('id_div');
            $data["karyawan"] = $this->karyawan_model->getKarByIdDiv($id_div);
            $this->load->view("manager/karyawan/karyawan", $data);

        }else{
            $id_tim = $this->session->userdata('id_tim');
            if($id_tim != ""){
                $data["karyawan"] = $this->karyawan_model->getKarByIdTim($id_tim);
                $this->load->view("tim", $data);
            }else{
                $nik = $this->session->userdata('nik');
                $data["karyawan"] = $this->karyawan_model->getByNik($nik);
                $this->load->view("tim", $data);
            }
            
        }
    }

    public function karPerDiv($id_div = null )
    {
        if (!isset($id_div)) redirect('divisi');

        $data["karyawan"] = $this->karyawan_model->getKarByIdDiv($id_div);
        $this->load->view("admin/karyawan/karyawan", $data);
    }

    public function getKarByIdTim($id_tim = null )
    {
        if (!isset($id_tim)) redirect('tim');

        $data["karyawan"] = $this->karyawan_model->getKarByIdTim($id_tim);
        
        if($this->session->userdata('jabatan')==='Admin'){
            $this->load->view("admin/karyawan/karyawan", $data);

        }elseif($this->session->userdata('jabatan')==='Manager'){
            $this->load->view("manager/karyawan/karyawan", $data);

        }elseif($this->session->userdata('jabatan')==='Site Manager'){
            $this->load->view("manager/karyawan/karyawan", $data);
        }
    }

    public function add()
    {
        $karyawan = $this->karyawan_model;
        $validation = $this->form_validation;
        $validation->set_rules($karyawan->rules());
        $validation->set_rules('nik','Nik','required|numeric|is_unique[karyawan.nik]');
        $validation->set_rules('password_login','Password Login','required');

        if ($validation->run()) {
            $karyawan->save();
            $this->session->set_flashdata('success_simpan', 'Data berhasil disimpan');
        }

        
        if($this->session->userdata('jabatan')==='Admin'){
            $data["divisi"] = $this->karyawan_model->getIdDiv();
    
            $data["tim"] = $this->karyawan_model->getIdTim();
            $this->load->view("admin/karyawan/new_karyawan", $data);

		}elseif($this->session->userdata('jabatan')==='Manager'){
            $id_div = $this->session->userdata('id_div');
            $data["tim"] = $this->karyawan_model->getTimByIdDiv($id_div);
            $this->load->view("manager/karyawan/new_karyawan", $data);

        }elseif($this->session->userdata('jabatan')==='Site Manager'){
            $id_div = $this->session->userdata('id_div');
            $data["tim"] = $this->karyawan_model->getTimByIdDiv($id_div);
            $this->load->view("manager/karyawan/new_karyawan", $data);
        }

    }

    public function edit($nik = null)
    {
        if (!isset($nik)) redirect('karyawan');
       
        $karyawan = $this->karyawan_model;
        $validation = $this->form_validation;
        $validation->set_rules($karyawan->rules());

        if ($validation->run()) {
            $karyawan->update();
            $this->session->set_flashdata('success_update', 'Data berhasil diupdate');
        }
    
        $data["karyawan"] = $karyawan->getById($nik);
        if (!$data["karyawan"]) show_404();

        
        if($this->session->userdata('jabatan')==='Admin'){
            $data["divisi"] = $this->karyawan_model->getIdDiv();
    
            $data["tim"] = $this->karyawan_model->getIdTim();
            
            $this->load->view("admin/karyawan/edit_karyawan", $data);

		}elseif($this->session->userdata('jabatan')==='Manager'){
            $id_div = $this->session->userdata('id_div');
            $data["tim"] = $this->karyawan_model->getTimByIdDiv($id_div);
            
            $this->load->view("manager/karyawan/edit_karyawan", $data);

        }elseif($this->session->userdata('jabatan')==='Site Manager'){
            $id_div = $this->session->userdata('id_div');
            $data["tim"] = $this->karyawan_model->getTimByIdDiv($id_div);
            
            $this->load->view("manager/karyawan/edit_karyawan", $data);
        }
    }

    public function profile()
    {
        $nik = $this->session->userdata('nik');
       
        $karyawan = $this->karyawan_model;
        $validation = $this->form_validation;
        $validation->set_rules($karyawan->rules());

        if ($validation->run()) {
            $karyawan->update();
            $this->session->set_flashdata('success_update', 'Data berhasil diupdate');
        }
    
        $data["karyawan"] = $karyawan->getById($nik);
        if (!$data["karyawan"]) show_404();

        if($this->session->userdata('jabatan')==='Admin'){
            
            $this->load->view("admin/karyawan/profile", $data);

		}elseif($this->session->userdata('jabatan')==='Manager'){
            
            $this->load->view("manager/karyawan/profile", $data);

        }elseif($this->session->userdata('jabatan')==='Site Manager'){
            
            $this->load->view("manager/karyawan/profile", $data);
        }else{

            $this->load->view("profile", $data);
        }
    }

    public function delete($nik = null)
    {
        if (!isset($nik)) show_404();
        
        if ($this->karyawan_model->delete($nik)) {
            $this->session->set_flashdata('success_delete', 'Data berhasil dihapus');
            redirect(site_url('admin/karyawan'));
        }
    }
}