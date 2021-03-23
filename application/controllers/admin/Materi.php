<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Materi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("materi_model");
        $this->load->library('form_validation');
        if($this->session->userdata('logged_in') !== TRUE){
            redirect('login');
        }
    }

    public function index()
    {
        if($this->session->userdata('jabatan')==='Admin'){
            $data["materi"] = $this->materi_model->getAll();
            $this->load->view("admin/materi/materi", $data);

		}elseif($this->session->userdata('jabatan')==='Manager'){
            $id_div = $this->session->userdata('id_div');
            $data["materi"] = $this->materi_model->getMatByIdDiv($id_div);
            $this->load->view("manager/materi/materi", $data);

        }elseif($this->session->userdata('jabatan')==='Site Manager'){
            $id_div = $this->session->userdata('id_div');
            $data["materi"] = $this->materi_model->getMatByIdDiv($id_div);
            $this->load->view("manager/materi/materi", $data);
            
        }else{
            $id_tim = $this->session->userdata('id_tim');
            $data["materi"] = $this->materi_model->getMatByIdTim($id_tim);
            $this->load->view("materi", $data);
        }
    }

    public function add()
    {
        $materi = $this->materi_model;
        $validation = $this->form_validation;
        $validation->set_rules($materi->rules());


        if ($validation->run()) {
            $materi->save();
            $this->session->set_flashdata('success_simpan', 'Data berhasil disimpan');
        }

        if($this->session->userdata('jabatan')==='Admin'){
            $data["divisi"] = $this->materi_model->getIdDiv();
            
            $data["tim"] = $this->materi_model->getIdTim();
            $this->load->view("admin/materi/new_materi", $data);

        }elseif($this->session->userdata('jabatan')==='Manager'){
            $id_div = $this->session->userdata('id_div');
            $data["tim"] = $this->materi_model->getTimByIdDiv($id_div);
            $this->load->view("manager/materi/new_materi", $data);

        }elseif($this->session->userdata('jabatan')==='Site Manager'){
            $id_div = $this->session->userdata('id_div');
            $data["tim"] = $this->materi_model->getTimByIdDiv($id_div);
            $this->load->view("manager/materi/new_materi", $data);
        }

    }

    public function edit($id_file = null)
    {
        if (!isset($id_file)) redirect('materi');
       
        $materi = $this->materi_model;
        $validation = $this->form_validation;
        $validation->set_rules($materi->rules());

        if ($validation->run()) {
            $materi->update();
            $this->session->set_flashdata('success_update', 'Data berhasil diupdate');
        }

        $data["materi"] = $materi->getById($id_file);
        if (!$data["materi"]) show_404();

        if($this->session->userdata('jabatan')==='Admin'){
            $data["divisi"] = $this->materi_model->getIdDiv();
            
            $data["tim"] = $this->materi_model->getIdTim();
            $this->load->view("admin/materi/edit_materi", $data);

        }elseif($this->session->userdata('jabatan')==='Manager'){
            $id_div = $this->session->userdata('id_div');
            $data["tim"] = $this->materi_model->getTimByIdDiv($id_div);
            $this->load->view("manager/materi/edit_materi", $data);

        }elseif($this->session->userdata('jabatan')==='Site Manager'){
            $id_div = $this->session->userdata('id_div');
            $data["tim"] = $this->materi_model->getTimByIdDiv($id_div);
            $this->load->view("manager/materi/edit_materi", $data);
        }
    }

    public function delete($id_file = null)
    {
        if (!isset($id_file)) show_404();
        
        if ($this->materi_model->delete($id_file)) {
            $this->session->set_flashdata('success_delete', 'Data berhasil dihapus');
            redirect(site_url('admin/materi'));
        }
    }
}