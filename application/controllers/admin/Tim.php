<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tim extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("tim_model");
        $this->load->library('form_validation');
        if($this->session->userdata('logged_in') !== TRUE){
            redirect('login');
        }
    }

    public function index()
    {
        if($this->session->userdata('jabatan')==='Admin'){
            $data["tim"] = $this->tim_model->getAll();
            $this->load->view("admin/tim/tim", $data);

		}elseif($this->session->userdata('jabatan')==='Manager'){
            $id_div = $this->session->userdata('id_div');
            $data["tim"] = $this->tim_model->getIdTimByIdDiv($id_div);
            $this->load->view("manager/tim/tim", $data);

        }elseif($this->session->userdata('jabatan')==='Site Manager'){
            $id_div = $this->session->userdata('id_div');
            $data["tim"] = $this->tim_model->getIdTimByIdDiv($id_div);
            $this->load->view("manager/tim/tim", $data);
        }
    }

    public function add()
    {
        $tim = $this->tim_model;
        $validation = $this->form_validation;
        $validation->set_rules($tim->rules());
        $validation->set_rules('id_tim','Id Tim','required|is_unique[tim.id_tim]');


        if ($validation->run()) {
            $tim->save();
            $this->session->set_flashdata('success_simpan', 'Data berhasil disimpan');
        }

        $data["divisi"] = $this->tim_model->getIdDiv();
        
        $data["karyawan"] = $this->tim_model->getByJabatan();

        if($this->session->userdata('jabatan')==='Admin'){
            $this->load->view("admin/tim/new_tim", $data);

        }elseif($this->session->userdata('jabatan')==='Manager'){
            $this->load->view("manager/tim/new_tim", $data);

        }elseif($this->session->userdata('jabatan')==='Site Manager'){
            $this->load->view("manager/tim/new_tim", $data);
        }

    }

    public function edit($id_tim = null)
    {
        if (!isset($id_tim)) redirect('tim');
       
        $tim = $this->tim_model;
        $validation = $this->form_validation;
        $validation->set_rules($tim->rules());

        if ($validation->run()) {
            $tim->update();
            $this->session->set_flashdata('success_update', 'Data berhasil diupdate');
        }

        $data["tim"] = $tim->getById($id_tim);
        
        $data["karyawan"] = $this->tim_model->getByJabatan();

        if($this->session->userdata('jabatan')==='Admin'){
            $this->load->view("admin/tim/edit_tim", $data);

        }elseif($this->session->userdata('jabatan')==='Manager'){
            $this->load->view("manager/tim/edit_tim", $data);

        }elseif($this->session->userdata('jabatan')==='Site Manager'){
            $this->load->view("manager/tim/edit_tim", $data);
        }
    }

    public function delete($id_tim = null)
    {
        if (!isset($id_tim)) show_404();
        
        if ($this->tim_model->delete($id_tim)) {
            $this->session->set_flashdata('success_delete', 'Data berhasil dihapus');
            redirect(site_url('tim'));
        }
    }
}