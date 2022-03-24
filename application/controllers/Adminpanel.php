<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminpanel extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('AdminModel','AM');
		$this->load->helper('form', 'url');
		$this->load->library('session');
		$this->load->library('email');		
	}

	public function admin_login(){
		$this->load->view('admin/admin-login');
	}

	public function checkAdminLogin(){
		$post = $this->input->post();
		$loginData = $this->db->select('*')->from("admin")
		->or_where("email" , $post['email'])
		->where("password" ,  $post['password'])
		->get()
		->row();
		if(!empty($loginData)){
			$loginUser = array( 
				'email'     => $loginData->email, 
				'user_type' => "Admin",
				"user_login" => TRUE
			 );
			$this->session->set_userdata($loginUser);
			redirect('dashboard');
			//$this->manage_cities();	
		}else{
			$data['error_data'] = "Invalid user and password";
			$this->load->view('admin/admin-login', $data);
		}		
	}

	public function manage_cities($message = NULL){
		$cityData['city_data'] = $this->AM->getSelectResult('city');
		$cityData['message'] = $message;
		$this->load->view('admin/admin-manage-cities', $cityData);
	}

	public function manage_branch(){
		$data['city_data'] = $this->AM->getSelectResult('city');
		$data['branch_data'] = $this->db->select('branch.*, city.city_name')
		->from('branch')
		->join('city', 'city.id = branch.city_id')
		->get()
		->result();
		$this->load->view('admin/admin-manage-branch', $data);
	}
	public function manage_manufacturer(){
		$data['manufacturer_data'] = $this->AM->getSelectResult('manufacturer');
		$this->load->view('admin/admin-manage-manufacturer', $data);
	}

	public function manage_type(){
		$this->load->view('admin/admin-manage-type');
	}

	public function manage_models(){
		$data['manufacturer_data'] = $this->AM->getSelectResult('manufacturer');
		$data['type_data'] = $this->AM->getSelectResult('type');
		$data['model_data'] = $this->db->select('model.*, manufacturer.manufacturer_name, type.type')
		->from('model')
		->join('manufacturer', 'manufacturer.id = model.manufacturer_id')
		->join('type', 'type.id = model.type_id')
		->get()
		->result();


		// echo '<pre>';
		// print_r($data); exit;
		$this->load->view('admin/admin-manage-models', $data);
	}


	function getModelData($model_id) {
		$data['model_data'] = $this->db->select('model.*, manufacturer.manufacturer_name, type.type')
		->from('model')
		->join('manufacturer', 'manufacturer.id = model.manufacturer_id')
		->join('type', 'type.id = model.type_id')
		->where('model.id', $model_id)
		->get()
		->row_array();
		$data['manufacturer_data'] = $this->AM->getSelectResult('manufacturer');
		$data['type_data'] = $this->AM->getSelectResult('type');
		echo json_encode($data); exit;
	} 


	public function manage_models_at_branch(){
		$data['modelAtBranch_data'] = $this->db->select('model_at_branch.*, model_at_branch.id as main_id, manufacturer.manufacturer_name, type.type, city.city_name, branch.branch_name, model.model_name')
		->from('model_at_branch')
		->join('manufacturer', 'manufacturer.id = model_at_branch.manufacturer_id')
		->join('type', 'type.id = model_at_branch.type_id')
		->join('city', 'city.id = model_at_branch.city_id')
		->join('branch', 'branch.id = model_at_branch.branch_id')
		->join('model', 'model.id = model_at_branch.model_id')
		->order_by('id', 'desc')
		->get()
		->result();
		//echo $this->db->last_query();die;
		// echo '<pre>';
		// print_r($data['modelAtBranch_data']);
		// exit;
		$this->load->view('admin/admin-manage-models-at-branch', $data);
	}


	public function manage_models_branch_create(){
		$cityData['city_data'] = $this->AM->getSelectResult('city');
		$cityData['manufacturer_data'] = $this->AM->getSelectResult('manufacturer');
		$cityData['type_data'] = $this->AM->getSelectResult('type');
		$this->load->view('admin/admin-manage-models-branch-create', $cityData);
	}


	public function get_models_at_branch($id){

		$data['city_data'] = $this->AM->getSelectResult('city');
		$data['manufacturer_data'] = $this->AM->getSelectResult('manufacturer');
		$data['type_data'] = $this->AM->getSelectResult('type');
		$data['branch_data'] = $this->AM->getSelectResult('branch');
		$data['model_data'] = $this->AM->getSelectResult('model');
		$data['model_data_id'] = $id;

		$data['modelAtBranch_data'] = $this->db->select('model_at_branch.*, manufacturer.manufacturer_name, type.type, city.city_name, branch.branch_name, model.model_name')
		->from('model_at_branch')
		->join('manufacturer', 'manufacturer.id = model_at_branch.manufacturer_id')
		->join('type', 'type.id = model_at_branch.type_id')
		->join('city', 'city.id = model_at_branch.city_id')
		->join('branch', 'branch.id = model_at_branch.branch_id')
		->join('model', 'model.id = model_at_branch.model_id')
		->where('model_at_branch.id', $id)
		->order_by('id', 'desc')
		->get()
		->row_array();


		/*echo '<pre>';
		print_r($data);
		exit;*/
		$this->load->view('admin/admin-manage-models-at-branch-edit', $data);
	}


	public function manage_coupon_create(){
		$data["coupon_data"] = $this->db->select('*')->from('coupons')->get()->result();
		$this->load->view('admin/admin-manage-coupon', $data);
	}

	public function manage_order_list(){
		$data["order_data"] = $this->db->select('booking_order.*, user.name')->from('booking_order')
		->join('user', 'user.id = booking_order.user_id')->get()->result();
		$this->load->view('admin/admin-orders-list', $data);
	}

	public function manage_user_list(){
		$data["user_data"] = $this->db->select('*')->from('user')->order_by('id','desc')
		->get()->result();
		$this->load->view('admin/admin-user-list', $data);
	}
	

	//get branch by city id
	public function getBranchByID(){
		$post = $this->input->post();
		$data = $this->AM->getSelectWhereResult('*','branch',array("city_id" => $post['id']));
		$branchOptionData = "";
		if(!empty($data)) {
			foreach($data as $option){
				$branchOptionData .= "<option value='{$option->id}'>{$option->branch_name}</option>";
			}
		} 
        echo $branchOptionData;die;
	}

	//get branch by city id
	public function getModelByID(){
		$post = $this->input->post();
		$data = $this->AM->getSelectWhereResult('*','model',array('type_id' => $post['typeID'], "manufacturer_id" => $post['manufacturerID']));
		$modelOptionData = "";
		if(!empty($data)) {
			foreach($data as $option){
				$modelOptionData .= "<option value='{$option->id}'>{$option->model_name}</option>";
			}
		} 
		echo $modelOptionData;die;
	}

	function getCityData($city_id) {
		$data = $this->db->get_where('city',array('id'=>$city_id))->row_array();
		echo json_encode($data); exit;
	}
    
	//add City
    public function addCity() {
		$post = $this->input->post();
		$filePath = "";
		if (!empty($_FILES['icon_url']['name'])) { 
			 // Set preference 
			$config['upload_path'] = 'assets/admin/images/city'; 
			$config['allowed_types'] = 'jpg|jpeg|png|gif'; 
			$config['max_size'] = '1000'; // max_size in kb 
			$config['file_name'] = $_FILES['icon_url']['name']; 

			// Load upload library 
			$this->load->library('upload', $config);

			// File upload
			if ($this->upload->do_upload('icon_url')) { 
				// Get data about the file
				$uploadData = $this->upload->data();
				$filePath = 'assets/admin/images/city/'.$uploadData['file_name'];	
			} 
		}

		$cityData = [
			"city_name" =>  $post['city_name'],
			"icon_url"  =>  (!empty($filePath)) ? $filePath : NULL,
            "remark"    =>  $post['remark']
		];

		if(!empty($this->input->post('city_id'))) {
			if(empty($filePath)) {
				unset($cityData['icon_url']);
			}
			$this->db->where('id',$this->input->post('city_id'));
			$this->db->update('city',$cityData);
			$this->session->set_flashdata('success_msg','<div class="alert alert-success" role="alert">
			City updated successfully
			</div>');
			redirect(base_url('manage-cities'));
		}

		$city = $this->AM->insertData('city', $cityData);
		if($city) {
			$cityData['message'] = "City added successfully";
			$this->load->view('admin/admin-manage-cities', $cityData);
			$this->session->set_flashdata('success_msg','<div class="alert alert-success" role="alert">
			City Added successfully
			</div>');
			redirect(base_url('manage-cities'));
		} else {
		   redirect(base_url('manage-cities'));
		}

	}


	//add branch
	public function addBranch() {
		$post = $this->input->post();
		$filePath = "";
		if (!empty($_FILES['photo_url']['name'])) { 
			 // Set preference 
			$config['upload_path'] = 'assets/admin/images/branch'; 
			$config['allowed_types'] = 'jpg|jpeg|png|gif'; 
			$config['max_size'] = '1000'; // max_size in kb 
			$config['file_name'] = $_FILES['photo_url']['name']; 

			// Load upload library 
			$this->load->library('upload', $config);

			// File upload
			if ($this->upload->do_upload('photo_url')) { 
				// Get data about the file
				$uploadData = $this->upload->data();
				$filePath = 'assets/admin/images/branch/'.$uploadData['file_name'];	
			} 
		}

		$branchData = [
			"city_id"         =>  $post['city_id'],
			"branch_name"     =>  $post['branch_name'],
            "address"         =>  $post['address'],
			"contact_no"      =>  $post['contact_no'],
			"google_map_link" =>  $post['google_map_link'],
			"photo_url"      =>   (!empty($filePath)) ? $filePath : NULL,
			"remark"       =>     $post['remark']
		];

		if(!empty($this->input->post('branch_id'))) {
			if(empty($filePath)) {
				unset($branchData['photo_url']);
			}
			$this->db->where('id',$this->input->post('branch_id'));
			$this->db->update('branch',$branchData);
			$this->session->set_flashdata('success_msg','<div class="alert alert-success" role="alert">
			Branch updated successfully
			</div>');
			redirect(base_url('manage-branch'));
		}

		$branch = $this->AM->insertData('branch', $branchData);
		if($branch) {
			$this->session->set_flashdata('success_msg','<div class="alert alert-success" role="alert">
			Branch added successfully
			</div>');
			redirect(base_url('manage-branch'));
		} else {
		    
		}

	}

	//add Manufacturer
	public function addManufacturer(){
		$post = $this->input->post();
		$manufacturerData = [
			"manufacturer_name" =>  $post['manufacturer_name'],
			"remark"   =>  $post['remark'],
		];

		if(!empty($this->input->post('manufacture_id'))) {
			$this->db->where('id',$this->input->post('manufacture_id'));
			$this->db->update('manufacturer',$manufacturerData);
			//echo $this->db->last_query(); 
			//exit('IN');
			$this->session->set_flashdata('success_msg','<div class="alert alert-success" role="alert">
			Manufacturer updated successfully
			</div>');
			redirect(base_url('manage-manufacturer'));
		}


		$manufacturer = $this->AM->insertData('manufacturer', $manufacturerData);
		if($manufacturer) {
			redirect(base_url('manage-manufacturer'));
		} else {

		}
	}


	//add model
	public function addModel() {
		$post = $this->input->post();
		$filePath = "";
		if (!empty($_FILES['image_url']['name'])) { 
			 // Set preference 
			$config['upload_path'] = 'assets/admin/images/model'; 
			$config['allowed_types'] = 'jpg|jpeg|png|gif'; 
			$config['max_size'] = '1000'; // max_size in kb 
			$config['file_name'] = $_FILES['image_url']['name']; 

			// Load upload library 
			$this->load->library('upload', $config);

			// File upload
			if ($this->upload->do_upload('image_url')) { 
				// Get data about the file
				$uploadData = $this->upload->data();
				$filePath = 'assets/admin/images/model/'.$uploadData['file_name'];	
			} 
		}
		$modelData = [
			"manufacturer_id"  =>   $post['manufacturer_id'],
			"type_id"          =>   $post['type_id'],
			"model_name"       =>   $post['model_name'],
			"image_url"        =>   (!empty($filePath)) ? $filePath : NULL,
			"remark"           =>   $post['remark']

		];


		if(!empty($this->input->post('model_id'))) {
			if(empty($filePath)) {
				unset($modelData['image_url']);
			}

			$this->db->where('id',$this->input->post('model_id'));
			$this->db->update('model',$modelData);
			//echo $this->db->last_query(); 
			//exit('IN');
			$this->session->set_flashdata('success_msg','<div class="alert alert-success" role="alert">
			Model updated successfully
			</div>');
			redirect(base_url('manage-models'));
		}

		$model = $this->AM->insertData('model', $modelData);
		if($model) {
			redirect(base_url('manage-models'));
		} else {
		    
		}

	}

	//add model at branch
	public function addModelAtBranch() {
		$post = $this->input->post();
		$modelAtBranchData = [
			"city_id"    		   =>  $post['city_id'],
			"branch_id"     	   =>  $post['branch_id'],
			"manufacturer_id"      =>  $post['manufacturer_id'],
			"type_id"              =>  $post['type_id'],
			"model_id"             =>  $post['model_id'],
			"deposit_amount"       =>  $post['deposit_amount'],
			//"min_charge"		   =>  $post['min_charge'],
			"available_qty"		   =>  $post['available_qty'],
			"hourly_rate"          =>  $post['hourly_rate'],
			"perday_rate"          =>  $post['perday_rate'],
			"weekly_rate"          =>  $post['weekly_rate'],
			"monthly_rate"          =>  $post['monthly_rate'],
			// "thirty_day_amount"    =>  $post['thirty_day_amount'],
			"free_km"              =>  $post['free_km'],
			"extra_km"             =>  $post['extra_km'],
			"remark"               =>  $post['remark'],
		];

		$model = $this->AM->insertData('model_at_branch', $modelAtBranchData);

		if($model) {
			redirect(base_url('manage-models-at-branch'));
		} else {
			
		}

	}

	//add model at branch
	public function editModelAtBranch() {
		$post = $this->input->post();
		$id = $post['model_data_id'];
		$modelAtBranchData = [
			"city_id"    		   =>  $post['city_id'],
			"branch_id"     	   =>  $post['branch_id'],
			"manufacturer_id"      =>  $post['manufacturer_id'],
			"type_id"              =>  $post['type_id'],
			"model_id"             =>  $post['model_id'],
			"deposit_amount"       =>  $post['deposit_amount'],
			"available_qty"		   =>  $post['available_qty'],
			//"min_charge"		   =>  $post['min_charge'],
			"hourly_rate"          =>  $post['hourly_rate'],
			"perday_rate"          =>  $post['perday_rate'],
			"weekly_rate"          =>  $post['weekly_rate'],
			"monthly_rate"          =>  $post['monthly_rate'],
			// "thirty_day_amount"    =>  $post['thirty_day_amount'],
			"free_km"              =>  $post['free_km'],
			"extra_km"             =>  $post['extra_km'],
			"remark"               =>  $post['remark'],
		];

		//$model = $this->AM->insertData('model_at_branch', $modelAtBranchData);
		$this->db->where('id',$id);
		$this->db->update('model_at_branch',$modelAtBranchData);
		//if($model) {
		$this->session->set_flashdata('success_msg','<div class="alert alert-success" role="alert">
			Model Branch updated successfully
			</div>');
			redirect(base_url('manage-models-at-branch'));
		//} else {
			
		//}

	}


   
	function getCouponData($id) {
		$data = $this->db->get_where('coupons',array('id'=>$id))->row_array();
		echo json_encode($data); exit;
	}	


	//add model at coupon
	public function addCoupon(){
		$post = $this->input->post();
		$couponData = [
			"qty"      =>  $post['qty'],
			"coupon"   =>  $post['coupon'],
			"coupon_amount" => $post['coupon_amount']
		];

		if(!empty($post['coupon_id'])) {

			$coupon = $this->db->where('id',$post['coupon_id']);	
			$coupon = $this->db->update('coupons', $couponData);
			$this->session->set_flashdata('success_msg','<div class="alert alert-success" role="alert">
			Coupon updated successfully
			</div>');	
			redirect(base_url('manage-coupon-create'));
		}
		$coupon = $this->AM->insertData('coupons', $couponData);
		if($coupon) {
			redirect(base_url('manage-coupon-create'));
		} else {

		}
        
	}

	function deletecoupon() {
	$post = $this->input->post();
		$id = $post['id'];
		
		$this->db->where('id', $id);
        $this->db->delete('coupons');
		echo "Coupon deleted successfully";exit();		
	}

	//free bike 
	public function freeBike(){
		$post = $this->input->post();
		$qty = $this->db->select('available_qty')->from('model_at_branch')->where('id', $post['id'])->get()->row();

		$this->db->where('id',  $post['id']);
		$setValue = array("available_qty" => $qty->available_qty+1);
		$updatData = $this->db->update('model_at_branch', $setValue);
         

		$this->db->where('id',  $post['orderid']);
		$Value = array("book_status" => 0);
		$updatData = $this->db->update('booking_order', $Value);

		if($updatData){
			echo "Free Bike successfully";exit();
		}		
	}

	public function deleteData(){
		$post = $this->input->post();
		$id = $post['id'];
		$table = $post['flag'];
		$this->db->where('id', $id);
        $this->db->delete($table);
		if($post['flag'] === 'city')
		{
			echo "City deleted successfully";exit();
		}
	}

	
	public function deleteBranch(){
		$post = $this->input->post();
		$id = $post['id'];
		
		$this->db->where('id', $id);
        $this->db->delete('branch');
		echo "Branch deleted successfully";exit();
	}

	function deleteModelBranch() {
		$post = $this->input->post();
		$id = $post['id'];
		
		$this->db->where('id', $id);
        $this->db->delete('model_at_branch');
		echo "Modal Branch deleted successfully";exit();	
	}

	
	function getBranchData($branch_id) {
		$data = $this->db->get_where('branch',array('id'=>$branch_id))->row_array();
		$data['city_data'] = $this->AM->getSelectResult('city');
		echo json_encode($data); exit;
	}

	function deleteManufacture() {
		$post = $this->input->post();
		$id = $post['id'];
		
		$this->db->where('id', $id);
        $this->db->delete('manufacturer');
		echo "Manufacturer deleted successfully";exit();	
	}

	function deleteModel() {
		$post = $this->input->post();
		$id = $post['id'];
		
		$this->db->where('id', $id);
        $this->db->delete('model');
		echo "Model deleted successfully";exit();	
	}

	function getManufactureData($manufacture_id) {
		$data = $this->db->get_where('manufacturer',array('id'=>$manufacture_id))->row_array();
		echo json_encode($data); exit;
	}

	public function terms_and_condition(){
		// $cityData['city_data'] = $this->AM->getSelectResult('city');
		// $cityData['manufacturer_data'] = $this->AM->getSelectResult('manufacturer');
		// $cityData['type_data'] = $this->AM->getSelectResult('type');
		$data['terms'] = $this->db->get_where('terms_condition',array('id'=>'1'))->row_array();
		$this->load->view('admin/terms_and_condition',$data);
	}

	public function terms_and_condition_update()
	{
		$remark = $this->input->post('remark');
		$this->db->where('id','1');
		$this->db->update('terms_condition',array('terms_condition'=>$remark));
			
		$this->session->set_flashdata('success_msg','<div class="alert alert-success" role="alert">
			Terms and condition updated successfully
			</div>');
		redirect(base_url('terms_and_condition'));
	}

	public function inventory_management(){
		// $data['inventory'] = $this->AM->getSelectResult('inventory_management');
		$data['inventory'] = $this->db->select('*')->from('inventory_management')->get()->result_array();
		// echo"<pre>";	print_r($data);die;
		$this->load->view('admin/inventory_management',$data);
	}

	public function crate_inventory_management(){
		$this->load->view('admin/create_inventory',$data);
	}

	public function crateInventory()
	{
		$post = $this->input->post();
		$bike = "";
		$bike_start= '';
		$bike_end ='';
		if (!empty($_FILES['bike']['name'])) { 
			 // Set preference 
			$config['upload_path'] = 'assets/admin/inventory'; 
			$config['allowed_types'] = '*'; 
			//$config['max_size'] = '1000'; // max_size in kb 
			//$config['file_name'] = $_FILES['image_url']['name']; 

			// Load upload library 
			$this->load->library('upload', $config);

			// File upload
			if ($this->upload->do_upload('bike')) { 
				// Get data about the file
				$uploadData = $this->upload->data();
				$bike = $uploadData['file_name'];	
			} 
		}
		if (!empty($_FILES['bike_start']['name'])) { 
			 // Set preference 
			$config['upload_path'] = 'assets/admin/inventory'; 
			$config['allowed_types'] = '*'; 
			//$config['max_size'] = '1000'; // max_size in kb 
			//$config['file_name'] = $_FILES['image_url']['name']; 

			// Load upload library 
			$this->load->library('upload', $config);

			// File upload
			if ($this->upload->do_upload('bike_start')) { 
				// Get data about the file
				$uploadData = $this->upload->data();
				$bike_start = $uploadData['file_name'];	
			} 
		}

		if (!empty($_FILES['bike_end']['name'])) { 
			 // Set preference 
			$config['upload_path'] = 'assets/admin/inventory'; 
			$config['allowed_types'] = '*'; 
			//$config['max_size'] = '1000'; // max_size in kb 
			//$config['file_name'] = $_FILES['image_url']['name']; 

			// Load upload library 
			$this->load->library('upload', $config);

			// File upload
			if ($this->upload->do_upload('bike_end')) { 
				// Get data about the file
				$uploadData = $this->upload->data();
				$bike_end = $uploadData['file_name'];	
			} 
		}
		$modelData = [
			"user_name"  =>   $post['user_name'],
			"city"          =>   $post['city'],
			"branch"       =>   $post['branch'],
			"manufacturer"  =>   $post['manufacturer'],
			"type"          =>   $post['type'],
			"model"       =>   $post['model'],
			"deposit_amount"  =>   $post['deposit_amount'],
			"price"          =>   $post['price'],
			"access_price"       =>   $post['access_price'],
			"access_hours"       =>   $post['access_hours'],
			"damage_price"  =>   $post['damage_price'],
			"final_price"          =>   $post['final_price'],
			"image"        =>   (!empty($bike)) ? $bike : NULL,
			"start_reading"        =>   (!empty($bike_start)) ? $bike_start : NULL,
			"end_reading"        =>   (!empty($bike_end)) ? $bike_end : NULL,
			"remark"           =>   $post['remark'],
			'create_date' 	=>date('Y-m-d H:i:s')

		];

		$this->AM->insertData('inventory_management', $modelData);

		$this->session->set_flashdata('success_msg','<div class="alert alert-success" role="alert">
			Inventory added successfully
			</div>');	
			redirect(base_url('inventory-management'));
		
	}

	public function update_inventory($id)
	{
		$data['inventory'] = $this->db->get_where('inventory_management',array('id'=>$id))->row_array();
		//echo "<pre>";print_r($data);die;

		$this->load->view('admin/update_inventory',$data);
	}

	function delete_inventory($id) {
		
		$this->db->where('id', $id);
        $this->db->delete('inventory_management');
		$this->session->set_flashdata('success_msg','<div class="alert alert-success" role="alert">
			Inventory deleted successfully
			</div>');	
			redirect(base_url('inventory-management'));
	}

	public function updateInventory()
	{
		$post = $this->input->post();
		$bike = "";
		$bike_start= '';
		$bike_end ='';
		if (!empty($_FILES['bike']['name'])) { 
			 // Set preference 
			$config['upload_path'] = 'assets/admin/inventory'; 
			$config['allowed_types'] = '*'; 
			//$config['max_size'] = '1000'; // max_size in kb 
			//$config['file_name'] = $_FILES['image_url']['name']; 

			// Load upload library 
			$this->load->library('upload', $config);

			// File upload
			if ($this->upload->do_upload('bike')) { 
				// Get data about the file
				$uploadData = $this->upload->data();
				$bike = $uploadData['file_name'];	
			} 
		}
		if (!empty($_FILES['bike_start']['name'])) { 
			 // Set preference 
			$config['upload_path'] = 'assets/admin/inventory'; 
			$config['allowed_types'] = '*'; 
			//$config['max_size'] = '1000'; // max_size in kb 
			//$config['file_name'] = $_FILES['image_url']['name']; 

			// Load upload library 
			$this->load->library('upload', $config);

			// File upload
			if ($this->upload->do_upload('bike_start')) { 
				// Get data about the file
				$uploadData = $this->upload->data();
				$bike_start = $uploadData['file_name'];	
			} 
		}

		if (!empty($_FILES['bike_end']['name'])) { 
			 // Set preference 
			$config['upload_path'] = 'assets/admin/inventory'; 
			$config['allowed_types'] = '*'; 
			//$config['max_size'] = '1000'; // max_size in kb 
			//$config['file_name'] = $_FILES['image_url']['name']; 

			// Load upload library 
			$this->load->library('upload', $config);

			// File upload
			if ($this->upload->do_upload('bike_end')) { 
				// Get data about the file
				$uploadData = $this->upload->data();
				$bike_end = $uploadData['file_name'];	
			} 
		}
		$modelData = [
			"user_name"  =>   $post['user_name'],
			"city"          =>   $post['city'],
			"branch"       =>   $post['branch'],
			"manufacturer"  =>   $post['manufacturer'],
			"type"          =>   $post['type'],
			"model"       =>   $post['model'],
			"deposit_amount"  =>   $post['deposit_amount'],
			"price"          =>   $post['price'],
			"access_price"       =>   $post['access_price'],
			"access_hours"       =>   $post['access_hours'],
			"damage_price"  =>   $post['damage_price'],
			"final_price"          =>   $post['final_price'],
			"image"        =>   (!empty($bike)) ? $bike : NULL,
			"start_reading"        =>   (!empty($bike_start)) ? $bike_start : NULL,
			"end_reading"        =>   (!empty($bike_end)) ? $bike_end : NULL,
			"remark"           =>   $post['remark'],
			'create_date' 	=>date('Y-m-d H:i:s')

		];

		$this->db->where('id',$post['id']);
		$this->db->update('inventory_management',$modelData);

		$this->session->set_flashdata('success_msg','<div class="alert alert-success" role="alert">
			Inventory updated successfully
			</div>');	
			redirect(base_url('inventory-management'));
		
	}


	public function about_us(){
		$data['aboutus_data'] = $this->db->select('*')->from('about_us')->get()->row();	
		$this->load->view('admin/about_us',$data);
	}

	public function contact_us(){
		$data['contactus_data'] = $this->db->select('*')->from('contact_us')->get()->result();
		$this->load->view('admin/admin_contact_us',$data);
	}

	public function editAboutUs(){
		$post = $this->input->post();

		$filePathOne = "";
		$filePathTwo = "";
		$filePathThree = "";
		$filePathFour = "";

		$aboutUsData = [
			"description_one"   =>  $post["description_one"],
			"description_two"   =>  $post["description_two"],
			"description_three" =>  $post["description_three"],
			"description_four"  =>  $post["description_four"]
		];

		if (!empty($_FILES['image_one']['name'])) { 
			 // Set preference 
			$config['upload_path'] = 'assets/admin/aboutus'; 
			$config['allowed_types'] = 'jpg|jpeg|png|gif'; 
			$config['max_size'] = '1000'; // max_size in kb 
			$config['file_name'] = $_FILES['image_one']['name']; 

			// Load upload library 
			$this->load->library('upload', $config);

			// File upload
			if ($this->upload->do_upload('image_one')) { 
				// Get data about the file
				$uploadData = $this->upload->data();
				$aboutUsData['image_one'] = 'assets/admin/aboutus/'.$uploadData['file_name'];	
			} 
		}

		if (!empty($_FILES['image_two']['name'])) { 
			// Set preference 
		   $config['upload_path'] = 'assets/admin/aboutus'; 
		   $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
		   $config['max_size'] = '1000'; // max_size in kb 
		   $config['file_name'] = $_FILES['image_two']['name']; 

		   // Load upload library 
		   $this->load->library('upload', $config);

		   // File upload
		   if ($this->upload->do_upload('image_two')) { 
			   // Get data about the file
			   $uploadData = $this->upload->data();
			   $aboutUsData['image_two'] = 'assets/admin/aboutus/'.$uploadData['file_name'];	
		   } 
	    }

	   	if (!empty($_FILES['image_three']['name'])) { 
			 // Set preference 
			$config['upload_path'] = 'assets/admin/aboutus'; 
			$config['allowed_types'] = 'jpg|jpeg|png|gif'; 
			$config['max_size'] = '1000'; // max_size in kb 
			$config['file_name'] = $_FILES['image_three']['name']; 

			// Load upload library 
			$this->load->library('upload', $config);

			// File upload
			if ($this->upload->do_upload('image_three')) { 
				// Get data about the file
				$uploadData = $this->upload->data();
				$aboutUsData['image_three'] = 'assets/admin/aboutus/'.$uploadData['file_name'];	
			} 
		}

		if (!empty($_FILES['image_four']['name'])){ 
			// Set preference 
		   $config['upload_path'] = 'assets/admin/aboutus'; 
		   $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
		   $config['max_size'] = '1000'; // max_size in kb 
		   $config['file_name'] = $_FILES['image_four']['name']; 

		   // Load upload library 
		   $this->load->library('upload', $config);

		   // File upload
		   if ($this->upload->do_upload('image_four')) { 
			   // Get data about the file
			   $uploadData = $this->upload->data();
			   $aboutUsData['image_four'] = 'assets/admin/aboutus/'.$uploadData['file_name'];	
		   } 
	    }

		$this->db->where('id',$post['id']);
		$this->db->update('about_us',$aboutUsData);

		$this->session->set_flashdata('success_msg','<div class="alert alert-success" role="alert">
			About Us updated successfully
			</div>');	
			redirect(base_url('about-us'));
	}

	
	public function dashboard(){

		$data['user'] = $this->AM->getCount('id','user');
		$data['city'] = $this->AM->getCount('id','city');
		$data['totalOrder'] = $this->AM->getCount('id','booking_order');
		$data['coupons'] = $this->AM->getCount('id','coupons');
		$data['branch'] = $this->AM->branchCount();
		$data['earning'] = $this->AM->earning();
		$data['extraHelmet'] = $this->AM->extraHelmet();
		$data['upcoming'] = $this->AM->upcomingBooking();
		$data['complete'] = $this->AM->completeBooking();
		$data['running'] = $this->AM->runningBooking();
		$data['bikes'] = $this->AM->totalBikes();
		// echo $this->db->last_query();die;
		
		// echo"<pre>"; print_r($data);die;
		$this->load->view('admin/dashboard',$data);
	}

	public function upcoming_order_list(){
		$date= date('Y-m-d');
		$data["order_data"] = $this->db->select('booking_order.*, user.name')->from('booking_order')->where('DATE(from_date) >', $date)
		->join('user', 'user.id = booking_order.user_id')->get()->result();
		$this->load->view('admin/upcoming-orders-list', $data);
	}

	public function running_order_list(){
		$date= date('Y-m-d');
		$data["order_data"] = $this->db->select('booking_order.*, user.name')->from('booking_order')->where('DATE(from_date) <=', $date)->where('DATE(to_date) >=', $date)
		->join('user', 'user.id = booking_order.user_id')->get()->result();
		$this->load->view('admin/running-orders-list', $data);
	}

	public function complete_order_list(){
		$date= date('Y-m-d');
		$data["order_data"] = $this->db->select('booking_order.*, user.name')->from('booking_order')->where('DATE(to_date) <', $date)
		->join('user', 'user.id = booking_order.user_id')->get()->result();
		$this->load->view('admin/complete-orders-list', $data);
	}

	/*function getModelData($model_id) {
		$data = $this->db->get_where('model',array('id'=>$model_id))->row_array();
		echo json_encode($data); exit;
	}*/
}

