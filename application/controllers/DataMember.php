<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datamember extends CI_Controller {

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
			$row[] = $members->id;
			$row[] = $members->name;
			$row[] = $members->level_id;
			// $row[] = date('d F Y', $members->date_created);
			$row[] = $members->blocked;
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

	// Validasi Update Data User
	private function _validUpdateUser()
	{
		$this->form_validation->set_rules('name', 'Name', 'trim|required',
			[
            	'required' => "Name Can't be Empty!"
        	]
		);
		// $this->form_validation->set_rules('password', 'Password', 'trim|required',
		// 	[
  //           	'required' => "Password Can't be Empty!"
  //       	]
		// );
		$this->form_validation->set_rules('level_id', 'User Level', 'trim|required',
			[
            	'required' => "User Level Can't be Empty!"
        	]
		);
		$this->form_validation->set_rules('blocked', 'Blocked', 'trim|required',
			[
            	'required' => "Blocked Can't be Empty!"
        	]
		);
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

	// Simpan Update Users
	public function update()
	{
		//Cek Validasi Update Data User
		$this->_validUpdateUser();

		$idUser		= $this->input->post('idUser');
		$name		= $this->input->post('name');
		$password		= $this->input->post('password');
		$level_id		= $this->input->post('level_id');
		$blocked		= $this->input->post('blocked');

		//Jika Data Valid
		if ($this->form_validation->run()) {
			$data = [ 
				'id' => $idUser,
				'name' => $name,
				'password' => $this->encryption->encrypt($password),
				'level_id' => $level_id,
				'blocked' => $blocked
			];

			//Update Data User
			$this->M_user->updateUsers($data, $idUser);

			$validasi2 = [
				'success'   => true
			];
			echo json_encode($validasi2);

		} 

		//Data Tidak Valid
		else {
			$validasi = [
				'error'   => true,
			    'name_error' => form_error('name'),
			    'password_error' => form_error('password'),
			    'level_id_error' => form_error('level_id'),
			    'blocked_error' => form_error('blocked')
			];
			echo json_encode($validasi);
		}
	}

	// Menampilkan ajax data bank soal berdasarkan Id Users
	public function ajaxUpdate($idUsers)
	{
		$data = $this->M_user->getUserById($idUsers)->row_array();
		echo json_encode($data);
	}

	// Delete Users
	public function delete($idUsers)
	{
		$this->M_user->deleteUsersById($idUsers);
	}

}

/* End of file DataMember.php */
/* Location: ./application/controllers/DataMember.php */