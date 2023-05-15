<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchasing extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		if($this->session->userdata('level_id') != "1")
		{
			redirect('accessdenied');
		}
	}

	// Halaman Purchasing Aktif
	public function index()
	{
		$data ['title']   = "Purchasing";
	    $data ['page']    = "purchasing";
	  	$data ['nama']    = $this->session->userdata('nama');

	  	$this->load->view('v_dataPurchasing/index', $data);
	}

	// Server Side Purchasing Aktive
	public function ajaxGetPurchasing()
	{
		$list = $this->M_purchasing->getPurchasing();
		$data = array();
		$no = $_POST['start'];
		
		foreach ($list as $purchasing) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $purchasing->nama;
			$row[] = $purchasing->email;
			$row[] = date('d F Y', $purchasing->date_created);
			$data[] = $row; 
		}

		$output = array(
			"draw" 				=> $_POST['draw'],
			"recordsTotal" 		=> $this->M_purchasing->count_all(),
			"recordsFiltered" 	=> $this->M_purchasing->count_filtered(),
			"data" 				=> $data,
		);
		
		//output to json format
		echo json_encode($output);
	}

	// Halaman Purchase Advance Aktif
	public function purchase_advance()
	{
		$data ['title']   = "Purchasing | Purchase Advance";
	    $data ['page']    = "purchase_advance";
	  	$data ['nama']    = $this->session->userdata('nama');

	  	$this->load->view('v_dataPurchaseAdvance/index', $data);
	}

	// Halaman Purchase Advance Aktif
	public function purchase_order()
	{
		$data ['title']   = "Purchasing | Purchase Order";
	    $data ['page']    = "purchase_order";
	  	$data ['nama']    = $this->session->userdata('nama');

	  	$this->load->view('v_dataPurchaseOrder/index', $data);
	}

	public function list_supplier()
	{
		$data ['title']   = "Purchasing | Supplier";
		$data ['page']    = "purchasing_list_supplier";
		$data ['nama']    = $this->session->userdata('name');
		$data ['company_profile'] = $this->M_user->view_where('frs_general_company_profile', array('account'=>$this->session->userdata('level_id')))->row_array();
		$data ['all_level']    = $this->M_user->allLevel();

		$this->load->view('v_supplier/index', $data);
	}

}

/* End of file DataMember.php */
/* Location: ./application/controllers/DataMember.php */