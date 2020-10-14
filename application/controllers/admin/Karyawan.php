<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("karyawan_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["karyawan"] = $this->karyawan_model->getAll();
        $this->load->view("admin/karyawan/karyawan", $data);
    }

    public function add()
    {
        $tim = $this->karyawan_model;
        $validation = $this->form_validation;
        $validation->set_rules($tim->rules());
        $validation->set_rules('nik','Nik','required|numeric|is_unique[karyawan.nik]');
        $validation->set_rules('password_login','Password Login','required');

        if ($validation->run()) {
            $tim->save();
            $this->session->set_flashdata('success_simpan', 'Data berhasil disimpan');
        }
        $data["divisi"] = $this->karyawan_model->getIdDiv();
        if (!$data["divisi"]) show_404();
        $this->load->view("admin/karyawan/new_karyawan", $data);

    }

    public function edit($nik = null)
    {
        if (!isset($nik)) redirect('admin/karyawan');
       
        $karyawan = $this->karyawan_model;
        $validation = $this->form_validation;
        $validation->set_rules($karyawan->rules());

        if ($validation->run()) {
            $karyawan->update();
            $this->session->set_flashdata('success_update', 'Data berhasil diupdate');
        }
        
        $data["divisi"] = $this->karyawan_model->getIdDiv();
        if (!$data["divisi"]) show_404();

        $data["karyawan"] = $karyawan->getById($nik);
        if (!$data["karyawan"]) show_404();
        
        $this->load->view("admin/karyawan/edit_karyawan", $data);
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