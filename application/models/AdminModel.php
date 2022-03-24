<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class AdminModel extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function adminLogin($username,$password){
		$this->db->where(array('email'=>$username,'password'=>$password));
		$query = $this->db->get('tbl_admin');
		if ($query) {
			return $query->row();
		}else{
			return false;
		}
	}

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


	public function getCount($select,$table){
		$this->db->select($select);
		$query = $this->db->get($table); 
		if ($query) {
			return $query->num_rows();
		}else{
			return false;
		}
	}

	public function branchCount()
	{
		$data = $this->db->select('branch.*, city.city_name')->from('branch')->join('city', 'city.id = branch.city_id')->get()->num_rows();

		return $data;
	}

	function earning()
	{
		$this->db->select_sum('total_amount');   
	    $this->db->from('booking_order'); 
	    $query=$this->db->get()->row_array();
	    return $query;
	}

	function extraHelmet()
	{
		$this->db->select('id');   
	    $this->db->where('extaHelmet','1'); 
	    $query = $this->db->get('booking_order'); 
	    if ($query) {
			return $query->num_rows();
		}else{
			return false;
		}
	}

	public function upcomingBooking()
	{
		$date= date('Y-m-d');
		$this->db->select('id');
		$this->db->from('booking_order');
		$this->db->where('DATE(from_date) >', $date);
		$query = $this->db->get();
		if ($query) {
			return $query->num_rows();
		}else{
			return false;
		}
	}

	public function completeBooking()
	{
		$date= date('Y-m-d');
		$this->db->select('id');
		$this->db->from('booking_order');
		$this->db->where('DATE(to_date) <', $date);
		$query = $this->db->get();
		if ($query) {
			return $query->num_rows();
		}else{
			return false;
		}
	}

	public function runningBooking()
	{
		$date= date('Y-m-d');
		$this->db->select('id');
		$this->db->from('booking_order');
		$this->db->where('DATE(from_date) <=', $date);
		$this->db->where('DATE(to_date) >=', $date);
		$query = $this->db->get();
		if ($query) {
			return $query->num_rows();
		}else{
			return false;
		}
	}

	public function totalBikes()
	{
		$data = $this->db->select('model_at_branch.*, model_at_branch.id as main_id, manufacturer.manufacturer_name, type.type, city.city_name, branch.branch_name, model.model_name')->from('model_at_branch')->join('manufacturer', 'manufacturer.id = model_at_branch.manufacturer_id')->join('type', 'type.id = model_at_branch.type_id')->join('city', 'city.id = model_at_branch.city_id')->join('branch', 'branch.id = model_at_branch.branch_id')->join('model', 'model.id = model_at_branch.model_id')->order_by('id', 'desc')->get()->result();

		$total = 0;
		if (isset($data) && !empty($data)){

			foreach($data as $d)
			{
				$total += $d->available_qty;
			}	

			return $total;
		}
		else
		{
			return $total;
		}	
	}

	

	
}
