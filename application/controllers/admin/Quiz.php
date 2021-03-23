<?php

class Quiz extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->model("quiz_model");
		$this->load->library('form_validation');
		if($this->session->userdata('logged_in') !== TRUE){
			redirect('login');
		}
	}

	public function index()
	{
		if($this->session->userdata('jabatan')==='Admin'){
            redirect('topik_quiz');
		}
	}

	public function soal($id_tq = null)
	{
		if($this->session->userdata('jabatan')==='Admin'){
			if (!isset($id_tq)) redirect('topik_quiz');

        	$data["topik_quiz"] = $this->quiz_model->getTq($id_tq);
			
			$data["quiz"] = $this->quiz_model->getByIdTq($id_tq);
            $this->load->view("admin/quiz/quiz", $data);

        }elseif($this->session->userdata('jabatan')==='Manager'){
			if (!isset($id_tq)) redirect('topik_quiz');

        	$data["topik_quiz"] = $this->quiz_model->getTq($id_tq);
			
			$data["quiz"] = $this->quiz_model->getByIdTq($id_tq);
            $this->load->view("manager/quiz/quiz", $data);

        }elseif($this->session->userdata('jabatan')==='Site Manager'){
			if (!isset($id_tq)) redirect('topik_quiz');

        	$data["topik_quiz"] = $this->quiz_model->getTq($id_tq);
			
			$data["quiz"] = $this->quiz_model->getByIdTq($id_tq);
            $this->load->view("manager/quiz/quiz", $data);
        }else{
            if (!isset($id_tq)) redirect('topik_quiz');

        	$data["topik_quiz"] = $this->quiz_model->getTq($id_tq);
			
            $data["quiz"] = $this->quiz_model->getByIdTq($id_tq);
            if (!$data["quiz"]) redirect('topik_quiz');

            $this->load->view("quiz", $data);
        }
	}

    public function add($id_tq = null)
    {
		if (!isset($id_tq)) redirect('topik_quiz');

        $quiz = $this->quiz_model;
        $validation = $this->form_validation;
        $validation->set_rules($quiz->rules());


        if ($validation->run()) {
            $quiz->save();
            $this->session->set_flashdata('success_simpan', 'Data berhasil disimpan');
		}
		
		$data["topik_quiz"] = $this->quiz_model->getTq($id_tq);

        if($this->session->userdata('jabatan')==='Admin'){
            $this->load->view("admin/quiz/new_quiz", $data);

        }elseif($this->session->userdata('jabatan')==='Manager'){
            $this->load->view("manager/quiz/new_quiz", $data);

        }elseif($this->session->userdata('jabatan')==='Site Manager'){
            $this->load->view("manager/quiz/new_quiz", $data);
        }
    }

    public function edit($id_quiz = null)
    {
        if (!isset($id_quiz)) redirect('topik_quiz');

        $quiz = $this->quiz_model;
        $validation = $this->form_validation;
        $validation->set_rules($quiz->rules());

        if ($validation->run()) {
            $quiz->update();
            $this->session->set_flashdata('success_update', 'Data berhasil diupdate');
        }

        $data["quiz"] = $quiz->getById($id_quiz);

        if($this->session->userdata('jabatan')==='Admin'){
            $this->load->view("admin/quiz/edit_quiz", $data);

        }elseif($this->session->userdata('jabatan')==='Manager'){
            $this->load->view("manager/quiz/edit_quiz", $data);

        }elseif($this->session->userdata('jabatan')==='Site Manager'){
            $this->load->view("manager/quiz/edit_quiz", $data);
        }

    }

    public function delete($id_quiz = null)
    {
        if (!isset($id_quiz)) show_404();
        
        if ($this->quiz_model->delete($id_quiz)) {
            $this->session->set_flashdata('success_delete', 'Data berhasil dihapus');
            redirect(site_url('admin/topik_quiz'));
        }
    }

}