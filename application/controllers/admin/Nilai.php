<?php

class Nilai extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->model("nilai_model");
		$this->load->library('form_validation');
		if($this->session->userdata('logged_in') !== TRUE){
			redirect('login');
		}
    }
    
    public function index()
    {
        if($this->session->userdata('jabatan')==='Admin'){
            $this->load->view("admin/topik_quiz/topik_quiz");

		}
    }

    public function hasil($id_tq = null)
    {
        $data["nilai"] = $this->nilai_model->getNilaiByIdTq($id_tq);
        $data["topik_quiz"] = $this->nilai_model->getByIdTq($id_tq);

        if($this->session->userdata('jabatan')==='Admin'){
            $this->load->view("admin/topik_quiz/hasil", $data);
        }elseif($this->session->userdata('jabatan')==='Manager'){
            $this->load->view("manager/topik_quiz/hasil", $data);
        }elseif($this->session->userdata('jabatan')==='Site Manager'){
            $this->load->view("manager/topik_quiz/hasil", $data);
        }else{
        $this->load->view("hasil", $data);
        }
    }

    public function add($id_tq = null)
    {
        $nilai = $this->nilai_model;
        $id_tq = $this->uri->segment(4);


        
            $nilai->save();
            $this->session->set_flashdata('success_simpan', 'Data berhasil disimpan');

            redirect("admin/nilai/hasil/".$id_tq);
      

    }
}