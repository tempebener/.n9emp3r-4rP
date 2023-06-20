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

	public function suppliers()
	{
		$data ['title']   = "Purchasing | Supplier";
		$data ['page']    = "purchasing_supplier";
		$data ['nama']    = $this->session->userdata('name');
		$data ['suppliers'] = $this->M_supplier->view_join_suppliers();
		// $data ['all_level']    = $this->M_supplier->allLevel();

		$this->template->load('layouts_admin/template','v_supplier/index', $data);
	}

	public function add_suppliers(){
		$data ['title']    = "Purchasing | Add Suppliers";
		$data ['page']    = "purchasing_add_suppliers";
		$data ['nama']    = $this->session->userdata('name');
		$supplier = $this->M_supplier;
		$validation = $this->form_validation;
		$validation->set_rules($supplier->add_rules());

		if ($validation->run()) {
			$supplier->save();
			$this->session->set_flashdata('success', 'Saved successfully');
		}

		$this->template->load('layouts_admin/template','v_supplier/add_suppliers', $data);
	}

	public function edit_suppliers($account = null){
		$data ['title']    = "Purchasing | Edit Suppliers";
		$data ['page']    = "purchasing_edit_suppliers";
		$data ['nama']    = $this->session->userdata('name');
		if (!isset($account)) redirect('purchasing/suppliers');

		$supplier = $this->M_supplier;
		$validation = $this->form_validation;
		$validation->set_rules($supplier->edit_rules());

		if ($validation->run()) {
			$supplier->update();
			$this->session->set_flashdata('success', 'Saved successfully');
		}
		$data["suppliers"] = $supplier->getById($account);
		if (!$data["suppliers"]) show_404();
		$this->template->load('layouts_admin/template','v_supplier/edit_suppliers', $data);
	}

	public function delete_suppliers($id=null)
	{
		if (!isset($id)) show_404();

		if ($this->M_user->delete($id)) {
			redirect(site_url('purchasing/suppliers'));
		}
	}

}