<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_supplier extends CI_Model {

	private $_table = "frs_purchase_vendor";
	private $column_order = array(null, 'account', 'name','npwp_no', 'address', 'city', 'contact_person', 'email_address', 'tlp_no', 'hp_no', 'fax_no', 'currency', 'payment_method', 'payment_top', 'payment_top_start', 'limit_credit', 'tax_ppn', 'tax_pph23', 'account_bank', 'name_bank', 'summary', 'coa_payable', 'coa_purchase_advance', 'blocked', 'category', 'category_book', 'status_id', 'create_user', 'create_date', 'modified_user', 'modified_date'); //set column field database for datatable orderable
	private $column_search = array('account', 'name','npwp_no', 'address', 'city', 'contact_person', 'email_address', 'tlp_no', 'hp_no', 'fax_no', 'currency', 'payment_method', 'payment_top', 'payment_top_start', 'limit_credit', 'tax_ppn', 'tax_pph23', 'account_bank', 'name_bank', 'summary', 'coa_payable', 'coa_purchase_advance', 'blocked', 'category', 'category_book', 'status_id', 'create_user', 'create_date', 'modified_user', 'modified_date'); //set column field database for datatable searchable 
	private $order = array('account' => 'desc'); // default order 
	public function add_rules()
    {
        return [
            [
                'field' => 'name',  //samakan dengan atribute name pada tags input
                'label' => 'name',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
        ];
    }
	public function edit_rules()
    {
        return [
            [
                'field' => 'name',  //samakan dengan atribute name pada tags input
                'label' => 'name',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
        ];
    }

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

	public function getById($id){
		return $this->db->get_where($this->_table, ["account" => $id])->row();
	}

	public function view_where($table,$data)
	{
		$this->db->where($data);
		return $this->db->get($table);
	}

	public function view_join_suppliers(){
		$query = $this->db->get($this->_table);
		return $query->result();
	}

	public function save(){
		$post = $this->input->post();

		$code = $this->db->query("SELECT MAX(RIGHT(`account`,1)) as code_max FROM frs_purchase_vendor ORDER BY account DESC LIMIT 1")->row();
		$code_account = "V".sprintf("%04s", $code->code_max+1);

		$this->account = $code_account;
		$this->name = $post["name"];
		$this->npwp_no = $post["npwp_no"];
		$this->address = $post["address"];
		$this->city = $post["city"];
		$this->contact_person = $post["contact_person"];
		$this->email_address = $post["email_address"];
		$this->tlp_no = $post["tlp_no"];
		$this->hp_no = $post["hp_no"];
		$this->fax_no = $post["fax_no"];
		$this->currency = $post["currency"];
		$this->payment_method = $post["payment_method"];
		$this->payment_top = $post["payment_top"];
		$this->payment_top_start = $post["payment_top_start"];
		$this->limit_credit = $post["limit_credit"];
		$this->tax_ppn = $post["tax_ppn"];
		$this->tax_pph23 = $post["tax_pph23"];
		$this->account_bank = $post["account_bank"];
		$this->name_bank = $post["name_bank"];
		$this->summary = $post["summary"];
		// $this->coa_payable = $post["coa_payable"];
		// $this->coa_purchase_advance = $post["coa_purchase_advance"];
		$this->blocked = 'No';
		// $this->category = $post["category"];
		// $this->category_book = $post["category_book"];
		// $this->status_id = $post["status_id"];
		$this->create_user = $this->session->id;
		$this->create_date = date('Y-m-d H:i:s');
		return $this->db->insert($this->_table, $this);
	}

	public function update() {
		$post = $this->input->post();
		// $this->account = $post["account"];
		$this->name = $post["name"];
		$this->npwp_no = $post["npwp_no"];
		$this->address = $post["address"];
		$this->city = $post["city"];
		$this->contact_person = $post["contact_person"];
		$this->email_address = $post["email_address"];
		$this->tlp_no = $post["tlp_no"];
		$this->hp_no = $post["hp_no"];
		$this->fax_no = $post["fax_no"];
		$this->currency = $post["currency"];
		$this->payment_method = $post["payment_method"];
		$this->payment_top = $post["payment_top"];
		$this->payment_top_start = $post["payment_top_start"];
		$this->limit_credit = $post["limit_credit"];
		$this->tax_ppn = $post["tax_ppn"];
		$this->tax_pph23 = $post["tax_pph23"];
		$this->account_bank = $post["account_bank"];
		$this->name_bank = $post["name_bank"];
		$this->summary = $post["summary"];
		// $this->coa_payable = $post["coa_payable"];
		// $this->coa_purchase_advance = $post["coa_purchase_advance"];
		// $this->blocked = $post["blocked"];
		// $this->category = $post["category"];
		// $this->category_book = $post["category_book"];
		// $this->status_id = $post["status_id"];
		$this->modified_user = $this->session->id;
		$this->modified_date = date('Y-m-d H:i:s');
		return $this->db->update($this->_table, $this, array('account' => $post['account']));
	}

	public function delete($account){
		return $this->db->delete($this->_table, array("account" => $account));
	}

}