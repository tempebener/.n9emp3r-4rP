<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

	/*
	| ----------------------SERVER SIDE DATA MEMBERS----------------------------------
	*/

	private $column_order = array(null, 'id', 'nama','email', 'date_created'); //set column field database for datatable orderable
	private $column_search = array('id', 'nama','email', 'date_created'); //set column field database for datatable searchable 
	private $order = array('id' => 'asc'); // default order 

	private function _frs_users()
	{
		$this->db->select('*');
		$this->db->from('frs_users');
		$this->db->where('level_id', 2);
		$this->db->where('access_app', 1);
	}

	private function _get_query() {
		$this->_frs_users();

		$i = 0;
		foreach ($this->column_search as $item) { // loop column 
			if($_POST['search']['value']) { // if datatable send POST for search
				
				if($i===0){ // first loop
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])){ // here order processing
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order)){
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	public function getMembers() {
		$this->_get_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		
		return $query->result();
	}

	public function count_filtered() {
		$this->_get_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all() {
		$this->_frs_users();
		return $this->db->count_all_results();
	}
	
	/*
	| -------------------------------------------------------------------
	*/

	public function addUser($data)
	{
		$this->db->insert('frs_users', $data);
		
	}

	public function cekUserByEmail($email)
	{
		return $this->db->get_where('frs_users', array('email' => $email));
	}

	public function cekUserById($idUser)
	{
		return $this->db->get_where('frs_users', array('id' => $idUser));
	}

	public function updateUserById($data, $idUser)
	{
		$this->db->where('id', $idUser);
		$this->db->update('frs_users', $data);
	}

	public function view_where($table,$data)
	{
		$this->db->where($data);
		return $this->db->get($table);
	}

	public function updateUsers($data, $idBankSoal)
	{
		$this->db->where('id', $idBankSoal);
		$this->db->update('tbl_bank_soal', $data);
		
	}

	public function deleteUsersById($idBankSoal)
	{
		$this->db->where('id', $idBankSoal);
		$this->db->delete('tbl_bank_soal');
		
	}

}

/* End of file M_user.php */
/* Location: ./application/models/M_user.php */