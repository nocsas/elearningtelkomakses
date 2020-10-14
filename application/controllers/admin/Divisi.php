<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Divisi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("divisi_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["divisi"] = $this->divisi_model->getAll();
        $this->load->view("admin/divisi/divisi", $data);
    }

    public function add()
    {
        $divisi = $this->divisi_model;
        $validation = $this->form_validation;
        $validation->set_rules($divisi->rules());
        $validation->set_rules('id_div','Id Divisi','required|is_unique[divisi.id_div]');


        if ($validation->run()) {
            $divisi->save();
            $this->session->set_flashdata('success_simpan', 'Data berhasil disimpan');
        }

        $this->load->view("admin/divisi/new_divisi");
    }

    public function edit($id_div = null)
    {
        if (!isset($id_div)) redirect('admin/divisi');
       
        $divisi = $this->divisi_model;
        $validation = $this->form_validation;
        $validation->set_rules($divisi->rules());

        if ($validation->run()) {
            $divisi->update();
            $this->session->set_flashdata('success_update', 'Data berhasil diupdate');
        }

        $data["divisi"] = $divisi->getById($id_div);
        if (!$data["divisi"]) show_404();
        
        $this->load->view("admin/divisi/edit_divisi", $data);
    }

    public function delete($id_div = null)
    {
        if (!isset($id_div)) show_404();
        
        if ($this->divisi_model->delete($id_div)) {
            $this->session->set_flashdata('success_delete', 'Data berhasil dihapus');
            redirect(site_url('admin/divisi'));
        }
    }
}