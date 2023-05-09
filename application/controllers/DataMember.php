<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataMember extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		if($this->session->userdata('role_id') != "1")
		{
			redirect('accessdenied');
		}
	}

	// Halaman Data Member Aktif
	public function index()
	{
		$data ['title']   = "Helpdesk | Users";
	    $data ['page']    = "data_members";
	  	$data ['nama']    = $this->session->userdata('nama');
	  	// $data ['company_profile'] = $this->M_user->view_where('frs_general_company_profile', array('account'=>$this->session->userdata('role_id')))->row_array();

	  	$this->load->view('v_dataMember/index', $data);
	}

	// Server Side Data Member Aktive
	public function ajaxGetMembers()
	{
		$list = $this->M_user->getMembers();
		$data = array();
		$no = $_POST['start'];
		
		foreach ($list as $members) {
			$no++;
			$row = array();
			$row[] = $this->_action($members->id);
			$row[] = $no;
			$row[] = $members->email;
			$row[] = $members->nama;
			$row[] = $members->email;
			$row[] = date('d F Y', $members->date_created);
			$data[] = $row; 
		}

		$output = array(
			"draw" 				=> $_POST['draw'],
			"recordsTotal" 		=> $this->M_user->count_all(),
			"recordsFiltered" 	=> $this->M_user->count_filtered(),
			"data" 				=> $data,
		);
		
		//output to json format
		echo json_encode($output);
	}


	// Tombol Aksi Pada Data Tabel Bank Soal
	private function _action($idUsers)
	{ 
		$link = "
			<a href='".base_url('datamember/update/'.$idUsers)."' data-toggle='tooltip' data-placement='top' class='btn-edit' title='Update' value='".$idUsers."'>
	      		<button type='button' class='btn btn-outline-success btn-xs' data-toggle='modal' data-target='#modalEdit'><i class='fa fa-edit'></i></button>
	      	</a>
	      
	      	<a href='".base_url('datamember/delete/'.$idUsers)."' class='btn-delete' data-toggle='tooltip' data-placement='top' title='Delete'>
	      		<button type='button' class='btn btn-outline-danger btn-xs'><i class='fa fa-trash'></i></button>
	      	</a>
	    ";
	    return $link;
	}


}

/* End of file DataMember.php */
/* Location: ./application/controllers/DataMember.php */