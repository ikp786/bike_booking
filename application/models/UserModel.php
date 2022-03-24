<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class UserModel extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	// public function adminLogin($username,$password){
	// 	$this->db->where(array('email'=>$username,'password'=>$password));
	// 	$query = $this->db->get('tbl_admin');
	// 	if ($query) {
	// 		return $query->row();
	// 	}else{
	// 		return false;
	// 	}
	// }

	public function insert_data($table,$data){
		$query = $this->db->insert($table,$data);
		if ($query) {
			return $this->db->insert_id();
		}else{
			return false;
		}
	}
	public function insertData($table,$data){
		$query = $this->db->insert($table,$data);
		if ($query) {
			return true;
		}else{
			return false;
		}
	}

	public function insertBatch($table,$data){
		$query = $this->db->insert_batch($table,$data);
		if ($query) {
			return true;
		}else{
			return false;
		}
	}

	public function getSelectWhereResult($select,$table,$where,$ordby="",$limit=""){
		if (!empty($ordby)) {
			$this->db->order_by('id',$ordby);
		}
		if (!empty($limit)) {
			$this->db->limit($limit);
		}
		$this->db->select($select);
		$this->db->where($where);
		$query = $this->db->get($table);
		if ($query) {
			return $query->result();
		}else{
			return false;
		}
	}

	public function getSelectWhereRow($select,$table,$where,$ordby="",$limit=""){
		if (!empty($ordby)) {
			$this->db->order_by('id',$ordby);
		}
		if (!empty($limit)) {
			$this->db->limit($limit);
		}
		$this->db->select($select);
		$this->db->where($where);
		$query = $this->db->get($table);
		if ($query) {
			return $query->row();
		}else{
			return false;
		}
	}

	public function updateData($set,$table,$where){
		$this->db->set($set);
		$this->db->where($where);
		$query=$this->db->update($table);
		if ($query) {
			return true;
		}else{
			return false;
		}
	}

	public function deleteData($table,$where){
		$this->db->where($where);
		$query = $this->db->delete($table);
		if ($query) {
			return true;
		}else{
			return false;
		}
	}

	public function getSelectResult($table){
		$query = $this->db->get($table); 
		if ($query) {
			return $query->result();
		}else{
			return false;
		}
	}

	
}
