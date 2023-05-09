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
	    $data ['page']    = "datamember";
	  	$data ['nama']    = $this->session->userdata('nama');
	  	$data ['company_profile'] = $this->M_user->view_where('frs_general_company_profile', array('account'=>$this->session->userdata('role_id')))->row_array();

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

	// Simpan Update Bank Soal
	public function update()
	{
		//Cek Validasi Update Data Users
		// $this->_validUpdateSoal();

		$idUsers		= $this->input->post('idUsers');
		$idKategoriSoal	= $this->input->post('idKategoriSoal');
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
				'id' => $idUsers,
				'nilai_a' => $nilai_a,
				'nilai_b' => $nilai_b,
				'nilai_c' => $nilai_c,
				'nilai_d' => $nilai_d,
				'nilai_e' => $nilai_e
			];

			//Update Data Bank Soal
			$this->M_bank_soal->updateBankSoal($data, $idBankSoal);

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
	public function ajaxUpdate($idBankSoal)
	{
		$data = $this->M_bank_soal->getBankSoalById($idBankSoal)->row_array();
		echo json_encode($data);
	}

	// Delete BanK Soal
	public function delete($idKategoriSoal, $idBankSoal)
	{
		$kategori_id 	= $idKategoriSoal; 
		$this->M_bank_soal->deleteBankSoalById($idBankSoal);
	}

}

/* End of file DataMember.php */
/* Location: ./application/controllers/DataMember.php */