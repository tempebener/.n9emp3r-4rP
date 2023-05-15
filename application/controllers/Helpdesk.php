<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Helpdesk extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		if($this->session->userdata('level_id') != "1")
		{
			redirect('accessdenied');
		}
	}

	// Halaman Data Member Aktif
	public function index()
	{
		$data ['title']   = "Helpdesk | Users";
		$data ['page']    = "data_members";
		$data ['nama']    = $this->session->userdata('name');
		$data ['company_profile'] = $this->M_user->view_where('frs_general_company_profile', array('account'=>$this->session->userdata('level_id')))->row_array();
		$data ['all_level']    = $this->M_user->allLevel();

		$this->load->view('v_dataMember/index', $data);
	}

	public function users(){
		$data ['title']   = "Helpdesk | Users";
		$data ['page']    = "users";
		$data ['nama']    = $this->session->userdata('name');
		$data ['company_profile'] = $this->M_user->view_where('frs_general_company_profile', array('account'=>$this->session->userdata('level_id')))->row_array();

		$data = $this->M_user->view_join_users('id_users');
        // $data = array('record' => $data);
		$this->load->view('v_helpdesk/index', $data);
	}

}