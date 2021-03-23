<?php
class Komentar extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->model("komentar_model");
		$this->load->library('form_validation');
		if($this->session->userdata('logged_in') !== TRUE){
			redirect('login');
		}
    }
    


    public function index() 
    {
        $data["komentar"] = $this->komentar_model->getAll();
        $this->load->view("admin/komentar", $data);
    }

    public function diskusi($id_file = null) {
        if (!isset($id_file)) redirect('materi');

        $data["materi"] = $this->komentar_model->getMatByIdFile($id_file);
			
        $data["komentar"] = $this->komentar_model->getKomByIdFile($id_file);

        if($this->session->userdata('jabatan')==='Admin'){
            $this->load->view("admin/materi/diskusi", $data);

		}elseif($this->session->userdata('jabatan')==='Manager'){
            $this->load->view("manager/materi/diskusi", $data);

        }elseif($this->session->userdata('jabatan')==='Site Manager'){
            $this->load->view("manager/materi/diskusi", $data);

        }else{
            $this->load->view("diskusi", $data);

        }
    }

    public function kirim($id_file = null){
        $komentar = $this->komentar_model;
        $validation = $this->form_validation;
        $validation->set_rules($komentar->rules());


        if ($validation->run()) {
            $komentar->send();
        }

        redirect('admin/komentar/diskusi/'.$id_file);
    }

    public function delete($id_kom = null)
    {
        if (!isset($id_kom)) show_404();
        
        if ($this->komentar_model->delete($id_kom)) {
            $this->session->set_flashdata('success_delete', 'Data berhasil dihapus');
            redirect(site_url('komentar'));
        }
    }

}