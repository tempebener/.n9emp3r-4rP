<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_supplier extends CI_Model {

	/*
	| ----------------------SERVER SIDE DATA PERTANYAAN----------------------------------
	*/

	private $column_order = array(null, 'account', 'name','npwp_no', 'address', 'city', 'contact_person', 'email_address', 'tlp_no', 'hp_no', 'fax_no', 'currency', 'payment_method', 'payment_top', 'payment_top_start', 'limit_credit', 'tax_ppn', 'tax_pph23', 'account_bank', 'name_bank', 'summary', 'coa_payable', 'coa_purchase_advance', 'blocked', 'category', 'category_book', 'status_id', 'create_user', 'create_date', 'modified_user', 'modified_date'); //set column field database for datatable orderable
	private $column_search = array('account', 'name','npwp_no', 'address', 'city', 'contact_person', 'email_address', 'tlp_no', 'hp_no', 'fax_no', 'currency', 'payment_method', 'payment_top', 'payment_top_start', 'limit_credit', 'tax_ppn', 'tax_pph23', 'account_bank', 'name_bank', 'summary', 'coa_payable', 'coa_purchase_advance', 'blocked', 'category', 'category_book', 'status_id', 'create_user', 'create_date', 'modified_user', 'modified_date'); //set column field database for datatable searchable 
	private $order = array('account' => 'desc'); // default order 

	private function frs_purchase_vendor($category)
	{
		$this->db->select('*');
		$this->db->from('frs_purchase_vendor');
		$this->db->where('category', $category);	
	}

	private function _get_query($category) {
		$this->frs_purchase_vendor($category);

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

	public function getSupplier($category) {
		$this->_get_query($category);
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		
		return $query->result();
	}

	public function count_filtered($category) {
		$this->_get_query($category);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all($category) {
		$this->frs_purchase_vendor($category);
		return $this->db->count_all_results();
	}
	
	/*
	| -------------------------------------------------------------------
	*/

	public function addSupplier($data)
	{
		$this->db->insert('frs_purchase_vendor', $data);
	}

	public function updateSupplier($data, $account)
	{
		$this->db->where('account', $account);
		$this->db->update('frs_purchase_vendor', $data);
		
	}

	public function deleteSupplierById($account)
	{
		$this->db->where('account', $account);
		$this->db->delete('frs_purchase_vendor');
		
	}

	public function getSupplierById($account)
	{
		return $this->db->get_where('frs_purchase_vendor', array('account' => $account));
	}

	public function acakSoal($category, $limit)
	{ 
		$this->db->select('account, category');
		$this->db->from('frs_purchase_vendor');
		$this->db->where('category', $category);
		$this->db->order_by('rand()');
		$this->db->limit($limit); 
		return $this->db->get();
	}
		public function cekKategoriById($category)
	{
		return $this->db->get_where('vendor_category', array('category' => $category));
	}

}

/* End of file M_supplier.php */
/* Location: ./application/models/M_supplier.php */