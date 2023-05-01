<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('role_id') != "1")
	    {
	      redirect('accessdenied');
	    }

	}

	// Validasi Input Data Supplier
	private function _validInputSoal()
	{
		$this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'trim|required',
			[
            	'required' => 'Pertanyaan Soal Tidak Boleh Kosong!'
        	]
		);
		$this->form_validation->set_rules('pilihan_a', 'Pilihan A', 'trim|required',
			[
            	'required' => 'Pilihan A Tidak Boleh Kosong!'
        	]
		);
		$this->form_validation->set_rules('pilihan_b', 'Pilihan B', 'trim|required',
			[
            	'required' => 'Pilihan B Tidak Boleh Kosong!'
        	]
		);
		$this->form_validation->set_rules('pilihan_c', 'Pilihan C', 'trim|required',
			[
            	'required' => 'Pilihan C Tidak Boleh Kosong!'
        	]
		);
		$this->form_validation->set_rules('pilihan_d', 'Pilihan D', 'trim|required',
			[
            	'required' => 'Pilihan D Tidak Boleh Kosong!'
        	]
		);
		$this->form_validation->set_rules('pilihan_e', 'Pilihan E', 'trim|required',
			[
            	'required' => 'Pilihan E Tidak Boleh Kosong!'
        	]
		);
		$this->form_validation->set_rules('nilai_a', 'Nilai Pilihan A', 'trim|required|integer',
			[
            	'required' => 'Nilai Pilihan A Tidak Boleh Kosong!',
            	'integer' => 'Nilai Pilihan A Harus Angka (0-5)!'
        	]
		);
		$this->form_validation->set_rules('nilai_b', 'Nilai Pilihan B', 'trim|required|integer',
			[
            	'required' => 'Nilai Pilihan B Tidak Boleh Kosong!',
            	'integer' => 'Nilai Pilihan B Harus Angka (0-5)!'
        	]
		);
		$this->form_validation->set_rules('nilai_c', 'Nilai Pilihan C', 'trim|required|integer',
			[
            	'required' => 'Nilai Pilihan C Tidak Boleh Kosong!',
            	'integer' => 'Nilai Pilihan C Harus Angka (0-5)!'
        	]
		);
		$this->form_validation->set_rules('nilai_d', 'Nilai Pilihan D', 'trim|required|integer',
			[
            	'required' => 'Nilai Pilihan D Tidak Boleh Kosong!',
            	'integer' => 'Nilai Pilihan D Harus Angka (0-5)!'
        	]
		);
		$this->form_validation->set_rules('nilai_e', 'Nilai Pilihan E', 'trim|required|integer',
			[
            	'required' => 'Nilai Pilihan E Tidak Boleh Kosong!',
            	'integer' => 'Nilai Pilihan E Harus Angka (0-5)!'
        	]
		);
	}

	// Validasi Update Data Supplier
	private function _validUpdateSoal()
	{
		$this->form_validation->set_rules('pertanyaan2', 'Pertanyaan', 'trim|required',
			[
            	'required' => 'Pertanyaan Soal Tidak Boleh Kosong!'
        	]
		);
		$this->form_validation->set_rules('pilihan_a2', 'Pilihan A', 'trim|required',
			[
            	'required' => 'Pilihan A Tidak Boleh Kosong!'
        	]
		);
		$this->form_validation->set_rules('pilihan_b2', 'Pilihan B', 'trim|required',
			[
            	'required' => 'Pilihan B Tidak Boleh Kosong!'
        	]
		);
		$this->form_validation->set_rules('pilihan_c2', 'Pilihan C', 'trim|required',
			[
            	'required' => 'Pilihan C Tidak Boleh Kosong!'
        	]
		);
		$this->form_validation->set_rules('pilihan_d2', 'Pilihan D', 'trim|required',
			[
            	'required' => 'Pilihan D Tidak Boleh Kosong!'
        	]
		);
		$this->form_validation->set_rules('pilihan_e2', 'Pilihan E', 'trim|required',
			[
            	'required' => 'Pilihan E Tidak Boleh Kosong!'
        	]
		);
		$this->form_validation->set_rules('nilai_a2', 'Nilai Pilihan A', 'trim|required|integer',
			[
            	'required' => 'Nilai Pilihan A Tidak Boleh Kosong!',
            	'integer' => 'Nilai Pilihan A Harus Angka (0-5)!'
        	]
		);
		$this->form_validation->set_rules('nilai_b2', 'Nilai Pilihan B', 'trim|required|integer',
			[
            	'required' => 'Nilai Pilihan B Tidak Boleh Kosong!',
            	'integer' => 'Nilai Pilihan B Harus Angka (0-5)!'
        	]
		);
		$this->form_validation->set_rules('nilai_c2', 'Nilai Pilihan C', 'trim|required|integer',
			[
            	'required' => 'Nilai Pilihan C Tidak Boleh Kosong!',
            	'integer' => 'Nilai Pilihan C Harus Angka (0-5)!'
        	]
		);
		$this->form_validation->set_rules('nilai_d2', 'Nilai Pilihan D', 'trim|required|integer',
			[
            	'required' => 'Nilai Pilihan D Tidak Boleh Kosong!',
            	'integer' => 'Nilai Pilihan D Harus Angka (0-5)!'
        	]
		);
		$this->form_validation->set_rules('nilai_e2', 'Nilai Pilihan E', 'trim|required|integer',
			[
            	'required' => 'Nilai Pilihan E Tidak Boleh Kosong!',
            	'integer' => 'Nilai Pilihan E Harus Angka (0-5)!'
        	]
		);
	}

	// Tombol Aksi Pada Data Tabel Supplier
	private function _action($category, $idSupplier)
	{ 
		$link = "
			<a href='".base_url('supplier/update/'.$category.'/'.$idSupplier)."' data-toggle='tooltip' data-placement='top' class='btn-edit' title='Update' value='".$idSupplier."'>
	      		<button type='button' class='btn btn-outline-success btn-xs' data-toggle='modal' data-target='#modalEdit'><i class='fa fa-edit'></i></button>
	      	</a>
	      
	      	<a href='".base_url('supplier/delete/'.$category.'/'.$idSupplier)."' class='btn-delete' data-toggle='tooltip' data-placement='top' title='Delete'>
	      		<button type='button' class='btn btn-outline-danger btn-xs'><i class='fa fa-trash'></i></button>
	      	</a>
	    ";
	    return $link;
	}

	// Halaman Data Supplier Berdasarkan Kategori Soal
	public function index($category)
	{
		$data ['title'] 	= "Supplier";
		$data ['page']    	= "supplier";
		$data ['nama'] 		= $this->session->userdata('nama');

		//Cek Kategori Soal Berdasarkan Id Kategori Soal
		$cekKategori 			= $this->M_supplier->cekKategoriById($category)->row_array();
		$data ['kategoriSupplier'] 	= $cekKategori; 
		// $data ['category'] 	= "PROCUREMENT"; 

		//Jika Kategori Ada
		if ($cekKategori) {
		 	$this->load->view('v_supplier/index', $data);
		} 
		else {
		 	$this->load->view('v_supplier/error', $data);
		}
		  
	}

	// Add Supplier
	public function add($category)
	{
		//Cek Validasi Input Data Supplier
		$this->_validInputSoal();

		$category 	= $category; 
		$pertanyaan		= $this->input->post('pertanyaan');
		$pilihan_a		= $this->input->post('pilihan_a');
		$pilihan_b		= $this->input->post('pilihan_b');
		$pilihan_c		= $this->input->post('pilihan_c');
		$pilihan_d		= $this->input->post('pilihan_d');
		$pilihan_e		= $this->input->post('pilihan_e');
		$nilai_a		= $this->input->post('nilai_a');
		$nilai_b		= $this->input->post('nilai_b');
		$nilai_c		= $this->input->post('nilai_c');
		$nilai_d		= $this->input->post('nilai_d');
		$nilai_e		= $this->input->post('nilai_e');

		//Jika Data Valid 
		if ($this->form_validation->run()) {
			$data = [ 
				'category' => $category,
				'pertanyaan' => $pertanyaan,
				'pilihan_a' => $pilihan_a,
				'pilihan_b' => $pilihan_b,
				'pilihan_c' => $pilihan_c,
				'pilihan_d' => $pilihan_d,
				'pilihan_e' => $pilihan_e,
				'nilai_a' => $nilai_a,
				'nilai_b' => $nilai_b,
				'nilai_c' => $nilai_c,
				'nilai_d' => $nilai_d,
				'nilai_e' => $nilai_e
			];

			//Simpan Data Supplier
			$this->M_supplier->addSupplier($data);

			$validasi = [
				'success'   => true
			];
			echo json_encode($validasi);
		}

		//Data Tidak Valid
		else {
			$validasi = [
				'error'   => true,
			    'pertanyaan_error' => form_error('pertanyaan'),
			    'pilihan_a_error' => form_error('pilihan_a'),
			    'pilihan_b_error' => form_error('pilihan_b'),
			    'pilihan_c_error' => form_error('pilihan_c'),
			    'pilihan_d_error' => form_error('pilihan_d'),
			    'pilihan_e_error' => form_error('pilihan_e'),
			    'nilai_a_error' => form_error('nilai_a'),
			    'nilai_b_error' => form_error('nilai_b'),
			    'nilai_c_error' => form_error('nilai_c'),
			    'nilai_d_error' => form_error('nilai_d'),
			    'nilai_e_error' => form_error('nilai_e')
			];
			echo json_encode($validasi);
		}
		
	}

	// Simpan Update Supplier
	public function update()
	{
		//Cek Validasi Update Data Supplier
		$this->_validUpdateSoal();

		$idSupplier		= $this->input->post('idSupplier');
		$category	= $this->input->post('category');
		$pertanyaan		= $this->input->post('pertanyaan2');
		$pilihan_a		= $this->input->post('pilihan_a2');
		$pilihan_b		= $this->input->post('pilihan_b2');
		$pilihan_c		= $this->input->post('pilihan_c2');
		$pilihan_d		= $this->input->post('pilihan_d2');
		$pilihan_e		= $this->input->post('pilihan_e2');
		$nilai_a		= $this->input->post('nilai_a2');
		$nilai_b		= $this->input->post('nilai_b2');
		$nilai_c		= $this->input->post('nilai_c2');
		$nilai_d		= $this->input->post('nilai_d2');
		$nilai_e		= $this->input->post('nilai_e2');

		//Jika Data Valid
		if ($this->form_validation->run()) {
			$data = [ 
				'pertanyaan' => $pertanyaan,
				'pilihan_a' => $pilihan_a,
				'pilihan_b' => $pilihan_b,
				'pilihan_c' => $pilihan_c,
				'pilihan_d' => $pilihan_d,
				'pilihan_e' => $pilihan_e,
				'nilai_a' => $nilai_a,
				'nilai_b' => $nilai_b,
				'nilai_c' => $nilai_c,
				'nilai_d' => $nilai_d,
				'nilai_e' => $nilai_e
			];

			//Update Data Supplier
			$this->M_supplier->updateSupplier($data, $idSupplier);

			$validasi2 = [
				'success'   => true
			];
			echo json_encode($validasi2);

		} 

		//Data Tidak Valid
		else {
			$validasi2 = [
				'error'   => true,
			    'pertanyaan2_error' => form_error('pertanyaan2'),
			    'pilihan_a2_error' => form_error('pilihan_a2'),
			    'pilihan_b2_error' => form_error('pilihan_b2'),
			    'pilihan_c2_error' => form_error('pilihan_c2'),
			    'pilihan_d2_error' => form_error('pilihan_d2'),
			    'pilihan_e2_error' => form_error('pilihan_e2'),
			    'nilai_a2_error' => form_error('nilai_a2'),
			    'nilai_b2_error' => form_error('nilai_b2'),
			    'nilai_c2_error' => form_error('nilai_c2'),
			    'nilai_d2_error' => form_error('nilai_d2'),
			    'nilai_e2_error' => form_error('nilai_e2')
			];
			echo json_encode($validasi2);
		}

	}

	// Menampilkan ajax data bank soal berdasarkan Id bank soal
	public function ajaxUpdate($idSupplier)
	{
		$data = $this->M_supplier->getSupplierById($idSupplier)->row_array();
		echo json_encode($data);
	}

	// Delete BanK Soal
	public function delete($category, $idSupplier)
	{
		$category 	= $category; 
		$this->M_supplier->deleteSupplierById($idSupplier);
	}

	// Server Side Data Supplier Berdasarkan ID Kategori Soal
	public function ajaxGetSupplier($category)
	{
		$list = $this->M_supplier->getSupplier($category);
		$data = array();
		$no = $_POST['start'];
		
		foreach ($list as $l) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $l->account;
			$row[] = $l->name;
			$row[] = $l->city;
			$row[] = $l->email_address;
			$row[] = $l->contact_person;
			$row[] = $l->limit_credit;
			$row[] = $this->_action($category, $l->account);
			$data[] = $row; 
		}

		$output = array(
			"draw" 				=> $_POST['draw'],
			"recordsTotal" 		=> $this->M_supplier->count_all($category),
			"recordsFiltered" 	=> $this->M_supplier->count_filtered($category),
			"data" 				=> $data,
		);
		
		//output to json format
		echo json_encode($output);
	}
	
}

/* End of file Supplier.php */
/* Location: ./application/controllers/Supplier.php */
