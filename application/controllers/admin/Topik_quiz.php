<?php

class Topik_quiz extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->model("topik_quiz_model");
		$this->load->library('form_validation');
		if($this->session->userdata('logged_in') !== TRUE){
			redirect('login');
		}
	}

	public function index()
	{
		if($this->session->userdata('jabatan')==='Admin'){
            $data["topik_quiz"] = $this->topik_quiz_model->getAll();
            $this->load->view("admin/topik_quiz/topik_quiz", $data);

		}elseif($this->session->userdata('jabatan')==='Manager'){
            $id_div = $this->session->userdata('id_div');
            $data["topik_quiz"] = $this->topik_quiz_model->getTqByIdDiv($id_div);
            $this->load->view("manager/topik_quiz/topik_quiz", $data);

        }elseif($this->session->userdata('jabatan')==='Site Manager'){
            $id_div = $this->session->userdata('id_div');
            $data["topik_quiz"] = $this->topik_quiz_model->getTqByIdDiv($id_div);
            $this->load->view("manager/topik_quiz/topik_quiz", $data);

        }else{
            $id_tim = $this->session->userdata('id_tim');
            $nik    = $this->session->userdata('nik');
            $data["topik_quiz"] = $this->topik_quiz_model->getTqByIdTim($id_tim);
            $this->load->view("topik_quiz", $data);
        }
	}

	public function add()
    {
        $topik_quiz = $this->topik_quiz_model;
        $validation = $this->form_validation;
        $validation->set_rules($topik_quiz->rules());

        if ($validation->run()) {
            $topik_quiz->save();
            $this->session->set_flashdata('success_simpan', 'Data berhasil disimpan');
		}
        
        if($this->session->userdata('jabatan')==='Admin'){
            $data["divisi"] = $this->topik_quiz_model->getIdDiv();
            
            $data["tim"] = $this->topik_quiz_model->getIdTim();
            $this->load->view("admin/topik_quiz/new_topik_quiz", $data);

        }elseif($this->session->userdata('jabatan')==='Manager'){
            $id_div = $this->session->userdata('id_div');
            $data["tim"] = $this->topik_quiz_model->getTimByIdDiv($id_div);
            $this->load->view("manager/topik_quiz/new_topik_quiz", $data);

        }elseif($this->session->userdata('jabatan')==='Site Manager'){
            $id_div = $this->session->userdata('id_div');
            $data["tim"] = $this->topik_quiz_model->getTimByIdDiv($id_div);
            $this->load->view("manager/topik_quiz/new_topik_quiz", $data);

        }

	}
	
	public function edit($id_tq = null)
    {
        if (!isset($id_tq)) redirect('topik_quiz');
       
        $topik_quiz = $this->topik_quiz_model;
        $validation = $this->form_validation;
        $validation->set_rules($topik_quiz->rules());

        if ($validation->run()) {
            $topik_quiz->update();
            $this->session->set_flashdata('success_update', 'Data berhasil diupdate');
        }

        $data["topik_quiz"] = $topik_quiz->getById($id_tq);
        if (!$data["topik_quiz"]) show_404();
        
        if($this->session->userdata('jabatan')==='Admin'){
            $data["divisi"] = $this->topik_quiz_model->getIdDiv();
            
            $data["tim"] = $this->topik_quiz_model->getIdTim();
            $this->load->view("admin/topik_quiz/edit_topik_quiz", $data);

        }elseif($this->session->userdata('jabatan')==='Manager'){
            $id_div = $this->session->userdata('id_div');
            $data["tim"] = $this->topik_quiz_model->getTimByIdDiv($id_div);
            $this->load->view("manager/topik_quiz/edit_topik_quiz", $data);

        }elseif($this->session->userdata('jabatan')==='Site Manager'){
            $id_div = $this->session->userdata('id_div');
            $data["tim"] = $this->topik_quiz_model->getTimByIdDiv($id_div);
            $this->load->view("manager/topik_quiz/edit_topik_quiz", $data);
        }
    }

    public function delete($id_tq = null)
    {
        if (!isset($id_tq)) show_404();
        
        if ($this->topik_quiz_model->delete($id_tq)) {
            $this->session->set_flashdata('success_delete', 'Data berhasil dihapus');
            redirect(site_url('topik_quiz'));
        }
    }

}