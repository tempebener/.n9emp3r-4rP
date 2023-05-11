<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

  public function __construct() 
  {
    parent::__construct();
    if($this->session->userdata('level_id') != "1")
    {
      redirect('accessdenied');
    }
  }

  // Halaman Dashboard
  public function index()
  {
    $data ['title']   = "ASI | Dashboard";
    $data ['page']    = "dashboard";
  	$data ['nama']    = $this->session->userdata('nama');
    $data ['company_profile'] = $this->M_user->view_where('frs_general_company_profile', array('account'=>$this->session->userdata('level_id')))->row_array();

  	$this->load->view('v_dashboard/index', $data);
  }

  // Logout
  public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */