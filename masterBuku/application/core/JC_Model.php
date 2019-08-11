<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JC_Model extends CI_Model {

	public $_database = '';
	protected $_table_name = '';
	protected $_primary_key = 'id';
	protected $_primary_filter = 'intval';
	protected $_order_by = '';
	public $rules = array();
	protected $_timestamps = FALSE;
	
	function __construct() {
		parent::__construct();
		$this->db = $this->load->database( $this->_database , TRUE);

	}

	public function get_by_query($query){

		$query = $this->db->query($query);
		return $query->result();
	}


	public function get_select_where_order($select, $where , $group , $single = false)
	{
	
		$this->db->select($select);
		$this->db->where($where);
		$this->db->group_by($group);
		return $this->get(NULL, $single);
	
	}

	
	public function array_from_post($fields){
		$data = array();
		foreach ($fields as $field) {
			$data[$field] = $this->input->post($field);
		}
		return $data;
	}
	
	public function get($id = NULL, $single = FALSE){
		
		if ($id != NULL) {
			$filter = $this->_primary_filter;
			$id = $filter($id);
			$this->db->where($this->_primary_key, $id);
			$method = 'row';
		}
		elseif($single == TRUE) {
			$method = 'row';
		}
		else {
			$method = 'result';
		}
		
		// if (!count($this->db->ar_orderby)) {
		// 	$this->db->order_by($this->_order_by);
		// }
		$this->db->order_by($this->_order_by);
		return $this->db->get($this->_table_name)->$method();
	}

	public function get_desc($id = NULL, $single = FALSE){
		
		if ($id != NULL) {
			$filter = $this->_primary_filter;
			$id = $filter($id);
			$this->db->where($this->_primary_key, $id);
			$method = 'row';
		}
		elseif($single == TRUE) {
			$method = 'row';
		}
		else {
			$method = 'result';
		}
		
		// if (!count($this->db->ar_orderby)) {
		// 	$this->db->order_by($this->_order_by);
		// }
		$this->db->order_by($this->_order_by,'desc');
		return $this->db->get($this->_table_name)->$method();
	}

	
	public function get_by($where, $single = FALSE){

		$this->db->where($where);
		$this->db->order_by($this->_order_by);
		return $this->get(NULL, $single);
	}

	public function get_by_desc($where, $single = FALSE){

		$this->db->where($where);
		$this->db->order_by($this->_order_by,'DESC');
		return $this->get(NULL, $single);
	}

	public function get_by_desc_limit($where, $single = FALSE , $lim){

		$this->db->where($where);
		$this->db->limit($lim);
		$this->db->order_by($this->_order_by,'DESC');
		return $this->get(NULL, $single);
	}

	public function login($where, $single = FALSE){

		$this->db->where($where);
		$this->db->limit(1);
		return $this->get(NULL, $single);
	}


	
	
	public function save($data, $id = NULL){
		
		// Set timestamps
		if ($this->_timestamps == TRUE) {
			$now = date('Y-m-d H:i:s');
			$id || $data['dibuat'] = $now;
			$data['diedit'] = $now;
		}
		
		// Insert
		if ($id == NULL) {
			// !isset($data[$this->_primary_key]) || $data[$this->_primary_key] = NULL;
			$this->db->set($data);
			$this->db->insert($this->_table_name);
			$id = $this->db->insert_id();
			return $this->db->affected_rows();
		}
		// Update
		else {
			// $filter = $this->_primary_filter;
			// $id = $filter($id);
			$this->db->set($data);
			$this->db->where($this->_primary_key, $id);
			$this->db->update($this->_table_name);
			return $this->db->affected_rows();
		}
		
		return $id;
	}



	// delete data
	public function delete($id){
		// $filter = $this->_primary_filter;
		// $id = $filter($id);
		
		if (!$id) {
			return FALSE;
		}
		$this->db->where($this->_primary_key, $id);
		$this->db->limit(1);
		$this->db->delete($this->_table_name);

		return $this->db->error();

	}
	public function delete_by($pm,$id){
		// $filter = $this->_primary_filter;
		// $id = $filter($id);
		if (!$id) {
			return FALSE;
		}
		$conv = strval($pm);
		$this->db->where($conv,$id);
		$this->db->delete($this->_table_name);
	}

	public function delete_all()
	{
		$this->db->empty_table($this->_table_name);
	}


	


}

/* End of file ELTRAN_Model.php */
/* Location: ./application/core/ELTRAN_Model.php */