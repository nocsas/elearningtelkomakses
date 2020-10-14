<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tim extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("tim_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["tim"] = $this->tim_model->getAll();
        $this->load->view("admin/tim/tim", $data);
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
        if (!$data["divisi"]) show_404();
        $this->load->view("admin/tim/new_tim", $data);

    }

    public function edit($id_tim = null)
    {
        if (!isset($id_tim)) redirect('admin/tim');
       
        $tim = $this->tim_model;
        $validation = $this->form_validation;
        $validation->set_rules($tim->rules());

        if ($validation->run()) {
            $tim->update();
            $this->session->set_flashdata('success_update', 'Data berhasil diupdate');
        }

        $data["tim"] = $tim->getById($id_tim);
        if (!$data["tim"]) show_404();
        
        $this->load->view("admin/tim/edit_tim", $data);
    }

    public function delete($id_tim = null)
    {
        if (!isset($id_tim)) show_404();
        
        if ($this->tim_model->delete($id_tim)) {
            $this->session->set_flashdata('success_delete', 'Data berhasil dihapus');
            redirect(site_url('admin/tim'));
        }
    }
}