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
		$data ['page']    = "helpdesk";
		$data ['nama']    = $this->session->userdata('name');
		$data ['company_profile'] = $this->M_user->view_where('frs_general_company_profile', array('account'=>$this->session->userdata('level_id')))->row_array();
		$data ['all_level']    = $this->M_user->allLevel();

		$this->load->view('v_dataMember/index', $data);
	}

	public function users(){
		$id = $this->session->userdata('id_users');
		$data ['title']    = "Helpdesk | Users";
		$data ['page']    = "helpdesk_users";
		$data ['nama']    = $this->session->userdata('name');
		$data ['users'] = $this->M_user->view_join_users3();
		// $data ['company_profile'] = $this->M_user->view_where('frs_general_company_profile', array('account'=>$this->session->userdata('level_id')))->row_array();
		$this->template->load('layouts_admin/template','v_helpdesk/index', $data);
	}

	public function add_users(){
		$data ['title']    = "Helpdesk | Add Users";
		$data ['page']    = "helpdesk_add_users";
		$data ['nama']    = $this->session->userdata('name');
		$user = $this->M_user;
		$validation = $this->form_validation;
		$validation->set_rules($user->add_rules());

		if ($validation->run()) {
			$user->save();
			$this->session->set_flashdata('success', 'Saved successfully');
		}

		$this->template->load('layouts_admin/template','v_helpdesk/add_users', $data);
	}

	public function edit_users($id = null){
		$data ['title']    = "Helpdesk | Edit Users";
		$data ['page']    = "helpdesk_users";
		$data ['nama']    = $this->session->userdata('name');
		if (!isset($id)) redirect('helpdesk/users');

		$user = $this->M_user;
		$validation = $this->form_validation;
		$validation->set_rules($user->edit_rules());

		if ($validation->run()) {
			$user->update();
			$this->session->set_flashdata('success', 'Saved successfully');
		}
		$data["users"] = $user->getById($id);
		if (!$data["users"]) show_404();
		$this->template->load('layouts_admin/template','v_helpdesk/edit_users', $data);
	}

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->M_user->delete($id)) {
            redirect(site_url('helpdesk/users'));
        }
    }

}