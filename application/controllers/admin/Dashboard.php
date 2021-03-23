<?php

class Dashboard extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->model("karyawan_model");
		if($this->session->userdata('logged_in') !== TRUE){
			redirect('login');
		}
	}

	public function index()
	{
        //Allowing akses to admin only
		if($this->session->userdata('jabatan')==='Admin')
		{
			$this->load->view('admin/dashboard');
		}elseif($this->session->userdata('jabatan')==='Manager')
		{
			$this->load->view('manager/dashboard');
		}elseif($this->session->userdata('jabatan')==='Site Manager')
		{
			$this->load->view('manager/dashboard');
		}else{
			$this->load->view('dashboard');
		}
	}
}