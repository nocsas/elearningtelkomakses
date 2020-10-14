<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Materi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("materi_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["materi"] = $this->materi_model->getAll();
        $this->load->view("admin/materi/materi", $data);
    }

    public function add()
    {
        $materi = $this->materi_model;
        $validation = $this->form_validation;
        $validation->set_rules($materi->rules());


        if ($validation->run()) {
            $tim->save();
            $this->session->set_flashdata('success_simpan', 'Data berhasil disimpan');
        }

        $data["divisi"] = $this->materi_model->getIdDiv();
        if (!$data["divisi"]) show_404();
        
        $data["tim"] = $this->materi_model->getIdTim();
        if (!$data["tim"]) show_404();
        $this->load->view("admin/materi/new_materi", $data);

    }

    public function edit($id_file = null)
    {
        if (!isset($id_file)) redirect('admin/materi');
       
        $materi = $this->materi_model;
        $validation = $this->form_validation;
        $validation->set_rules($materi->rules());

        if ($validation->run()) {
            $materi->update();
            $this->session->set_flashdata('success_update', 'Data berhasil diupdate');
        }

        $data["materi"] = $tim->getById($id_file);
        if (!$data["materi"]) show_404();

        $data["divisi"] = $this->materi_model->getIdDiv();
        if (!$data["divisi"]) show_404();
        
        $data["tim"] = $this->materi_model->getIdTim();
        if (!$data["tim"]) show_404();
        $this->load->view("admin/materi/edit_materi", $data);
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