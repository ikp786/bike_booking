<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('UserModel','UM');
		$this->load->library('session');
		$this->load->helper('custom_helper');
		
		
	}
		public function index()
		{
			$data['city_data'] = $this->db->select('*')->from('city')->get()->result();
			$this->load->view('user/index', $data);
		}
		public function my_account()
		{
			$this->load->view('user/my_account');
		}

		public function product()
		{  
			$post = $this->input->post();
			// echo"<pre>"; print_r($post);die;

			$data['city_data'] = $this->db->select('*')->from('city')->get()->result();
			$data['manufacturer_data'] = $this->db->select('*')->from('manufacturer')->get()->result();
			$data['model_data'] = $this->db->select('*')->from('model')->get()->result(); 
			$data['type_data'] = $this->db->select('*')->from('type')->get()->result(); 
			if(!empty($post)) {
				if(  !empty($post['city_id']) || !empty($post['booked_type_id']) || !empty($post['from_date']) ||!empty($post['to_date'])){
					$data['post_data'] = [
						'city_id'        =>  $post['city_id'],
						'booked_type_id' =>  $post['booked_type_id'],
						'from_date'      =>  $post['from_date'],
						'to_date'        =>  $post['to_date']
					]; 
				}
				if(!empty($post['from_date']) && !empty($post['to_date'])  &&  !empty($post['booked_type_id'])){
					$this->session->set_userdata('from_date', $post['from_date']);
					$this->session->set_userdata('to_date', $post['to_date']);
					$this->session->set_userdata('booked_type_id', $post['booked_type_id']);
				}
			}else{
				$data['post_data'] =  "" ;
			}
			//product fetch query
			// $this->db->distinct();
			$this->db->select('model_at_branch.*, manufacturer.manufacturer_name, type.type, city.city_name, branch.branch_name, model.model_name, model.image_url');
			$this->db->from('model_at_branch');
			$this->db->join('manufacturer', 'manufacturer.id = model_at_branch.manufacturer_id');
			$this->db->join('type', 'type.id = model_at_branch.type_id');
			$this->db->join('city', 'city.id = model_at_branch.city_id');
			$this->db->join('branch', 'branch.id = model_at_branch.branch_id');
			$this->db->join('model', 'model.id = model_at_branch.model_id');
			$this->db->where("available_qty > ", 0);

			//inner join `booking_order` on `model_at_branch`.`id` = `booking_order`.`model_at_branch_id`

			if(isset($post['city_id'])) {
				if($post['city_id'] != 0 && $post['city_id']!= -1) {
					$this->db->where('model_at_branch.city_id', $post['city_id']);
				}
			}
			if(isset($post['manufacturer_id'])) { 
				$this->db->where_in('model_at_branch.manufacturer_id', $post['manufacturer_id']);
			}
			if(isset($post['model_id'])) { 
				$this->db->where_in('model_at_branch.model_id', $post['model_id']);
			}
			if(isset($post['type_id'])) { 
				$this->db->where_in('model_at_branch.type_id', $post['type_id']);
			}
			$query = $this->db->get();
			$data['product_data'] = $query->result();

			// echo "<pre>";print_r($data['product_data']);die;
			$this->load->view('user/product', $data);
		}

		function secondsToTime($inputSeconds) {

		    $secondsInAMinute = 60;
		    $secondsInAnHour  = 60 * $secondsInAMinute;
		    $secondsInADay    = 24 * $secondsInAnHour;

		    // extract days
		    $days = floor($inputSeconds / $secondsInADay);

		    // extract hours
		    $hourSeconds = $inputSeconds % $secondsInADay;
		    $hours = floor($hourSeconds / $secondsInAnHour);

		    // extract minutes
		    $minuteSeconds = $hourSeconds % $secondsInAnHour;
		    $minutes = floor($minuteSeconds / $secondsInAMinute);

		    // extract the remaining seconds
		    $remainingSeconds = $minuteSeconds % $secondsInAMinute;
		    $seconds = ceil($remainingSeconds);

		    // return the final array
		    $obj = array(
		        'd' => (int) $days,
		        'h' => (int) $hours,
		        'm' => (int) $minutes,
		        's' => (int) $seconds,
		    );
		    return $obj;
		}

		
		public function product_details(){

			$modelId = $this->uri->segment(2);	
			$cityId = $this->uri->segment(3);	
			$data['product_data']  = $this->db->select('model_at_branch.*, manufacturer.manufacturer_name, type.type, city.city_name, branch.branch_name, model.model_name, model.image_url')
			->from('model_at_branch')
			->join('manufacturer', 'manufacturer.id = model_at_branch.manufacturer_id')
			->join('type', 'type.id = model_at_branch.type_id')
			->join('city', 'city.id = model_at_branch.city_id')
			->join('branch', 'branch.id = model_at_branch.branch_id')
			->join('model', 'model.id = model_at_branch.model_id')
			->where("model_at_branch.model_id", $modelId)
			->where("model_at_branch.city_id", $cityId)
			->get()
			->result();

			
			// echo "<pre>";print_r($data['product_data']);die;
			
			if (strpos($_SESSION["from_date"], 'am')) { 
			    $data['product_data'][0]->from_date = str_replace('am', "", $_SESSION["from_date"]); 	
			}else  { 
			    $data['product_data'][0]->from_date  = str_replace('pm', "", $_SESSION["from_date"]); 	
			}
			if (strpos($_SESSION["to_date"], 'am')) { 
			    $data['product_data'][0]->to_date = str_replace('am', "", $_SESSION["to_date"]); 	
			}else  { 
			    $data['product_data'][0]->to_date  = str_replace('pm', "", $_SESSION["to_date"]); 	
			}

			$FromDate = date("d-m-Y", strtotime($data['product_data'][0]->from_date));
			$ToDate = date("d-m-Y", strtotime($data['product_data'][0]->to_date));
			// print_r($ToDate);die;

			// echo "<pre>";print_r($data['product_data'][0]->from_date);echo"<br>";
			// echo "<pre>";print_r($data['product_data'][0]->to_date);die;

			$seconds = strtotime($data['product_data'][0]->to_date) - strtotime($data['product_data'][0]->from_date);
			$hours = $seconds / 60 / 60;


			//echo"<pre>"; print_r($hours); print_r($data);die;

			// $data['product_data'][0]->from_date = $_SESSION["from_date"];
			// $data['product_data'][0]->to_date = $_SESSION["to_date"];

			$date1 = new DateTime($FromDate);
			$date2 = new DateTime($ToDate);
			//echo "<pre>";print_r($data);die;
			$interval = $date1->diff($date2);

			$booked_type_id = $_SESSION['booked_type_id'];



			
			$fDate = explode("-", $FromDate);
			$tDate = explode("-", $ToDate);
			$data['product_data'][0]->months = 0;
			$data['product_data'][0]->weeks = 0;
			$data['product_data'][0]->days = 0;

			//echo $booked_type_id;echo"<br>"; die();
			// echo "<pre>";print_r($FromDate);echo"<br>";
			// echo "<pre>";print_r($ToDate);die;
			$data['product_data'][0]->hours = '0';
			$data['product_data'][0]->days = '0';
			$data['product_data'][0]->hour = '0';

			if($booked_type_id == 4)
			{
				$mainHou = $this->secondsToTime($hours*60*60);
				$data['product_data'][0]->hours = $hours;
				$data['product_data'][0]->days = $mainHou['d'];
				$data['product_data'][0]->hour = $mainHou['h'];

			}	
			else if($fDate[0] == $tDate[0])
			{
				$data['product_data'][0]->days = 1;

			}else if($tDate[0] != $fDate[0] && $interval->days <=5)
			{
				if($booked_type_id == 1)
				{
					$data['product_data'][0]->days = $interval->days + 1;
				}	
				else
				{
					$data['product_data'][0]->days = $interval->days + 1;
				}	
			}else if($tDate[0] != $fDate[0] && $interval->days > 5 && $interval->days <= 12 )
			{
				$totalDays = $interval->days + 1;
				$data['product_data'][0]->weeks = 1;
				$data['product_data'][0]->days = $totalDays - 7;
			}else if($tDate[0] != $fDate[0] && $interval->days > 12 && $interval->days <= 20 )
			{
				$totalDays = $interval->days + 1;
				$data['product_data'][0]->weeks = 2;
				$data['product_data'][0]->days = $totalDays - 14;
			}else if($tDate[0] != $fDate[0] && $interval->days > 20 && $interval->days <= 27 )
			{
				$totalDays = $interval->days + 1;
				$data['product_data'][0]->weeks = 3;
				$data['product_data'][0]->days = $totalDays - 21;
			}else if($tDate[0] != $fDate[0] && $interval->days > 27 && $interval->days <= 34 )
			{
				$totalDays = $interval->days ;
				$data['product_data'][0]->months = 1;
				$data['product_data'][0]->days = $totalDays - 30;
			}else if($tDate[0] != $fDate[0] && $interval->days > 34 && $interval->days <= 41 )
			{
				$totalDays = $interval->days + 1;
				$data['product_data'][0]->months = 1;
				$data['product_data'][0]->weeks = 1;
				$data['product_data'][0]->days = $totalDays - 30 - 7;
			}else if($tDate[0] != $fDate[0] && $interval->days > 41 && $interval->days <= 48 )
			{
				$totalDays = $interval->days + 1;
				$data['product_data'][0]->months = 1;
				$data['product_data'][0]->weeks = 2;
				$data['product_data'][0]->days = $totalDays - 30 - 14;
			}else if($tDate[0] != $fDate[0] && $interval->days > 48 && $interval->days <= 55 )
			{
				$totalDays = $interval->days + 1;
				$data['product_data'][0]->months = 1;
				$data['product_data'][0]->weeks = 3;
				$data['product_data'][0]->days = $totalDays - 30 - 21;
			}else if($tDate[0] != $fDate[0] && $interval->days > 55 && $interval->days <= 61 )
			{
				$totalDays = $interval->days + 1;
				$data['product_data'][0]->months = 2;
				$data['product_data'][0]->weeks = 0;
				$data['product_data'][0]->days = $totalDays - 60;
			}else if($tDate[0] != $fDate[0] && $interval->days > 61 && $interval->days <= 68 )
			{
				$totalDays = $interval->days + 1;
				$data['product_data'][0]->months = 2;
				$data['product_data'][0]->weeks = 1;
				$data['product_data'][0]->days = $totalDays - 60 - 7;
			}else if($tDate[0] != $fDate[0] && $interval->days > 68 && $interval->days <= 75 )
			{
				$totalDays = $interval->days + 1;
				$data['product_data'][0]->months = 2;
				$data['product_data'][0]->weeks = 2;
				$data['product_data'][0]->days = $totalDays - 60 - 14;
			}else if($tDate[0] != $fDate[0] && $interval->days > 75 && $interval->days <= 82 )
			{
				$totalDays = $interval->days + 1;
				$data['product_data'][0]->months = 2;
				$data['product_data'][0]->weeks = 3;
				$data['product_data'][0]->days = $totalDays - 60 - 21;
			}else if($tDate[0] != $fDate[0] && $interval->days > 82 && $interval->days <= 89 )
			{
				$totalDays = $interval->days + 1;
				$data['product_data'][0]->months = 3;
				$data['product_data'][0]->weeks = 0;
				$data['product_data'][0]->days = $totalDays - 60 ;
			}					

            // unset($_SESSION['from_date']); 
            // unset($_SESSION['to_date']); 
            // unset($_SESSION['booked_type_id']); 

            $data['branchDetails']  = $this->db->select("branch.branch_name,branch.address,branch.contact_no")
            ->from("branch")
            ->join('model_at_branch', 'model_at_branch.branch_id = branch.id')
            ->where("model_at_branch.model_id", $modelId)
            ->where("model_at_branch.city_id", $cityId)
            ->get()->row();

              
			// echo "<pre>";print_r($data);die;


			$this->load->view('user/product-details', $data);
		}	
		
	    public function contact_us(){
			$this->load->view('user/contact_us');
		}
	    public function about(){
			$data['aboutus_data'] = $this->db->select('*')->from('about_us')->get()->row();
			$this->load->view('user/about', $data);
		}
		public function safety(){
			$this->load->view('user/safety');
		}

		public function faq(){
			$this->load->view('user/faq');
		}

		public function login(){
			$this->load->view('user/login');
		}

		public function email_verefy(){
			$this->load->view('user/emereail-vfy');
		}

		public function password(){
			$this->load->view('user/password');
		}

		public function sign_up(){
			$this->load->view('user/sign-up');
		}
		
		private function password_check($email)
		{
		    $this->db->where('email', $email);
		    $query = $this->db->get('user');
		    if( $query->num_rows() > 0 ){ return TRUE; } else { return FALSE; }
		}

		function email_check()
		{
		    if (array_key_exists('email',$_POST)) {
		        if ( $this->password_check($this->input->post('email')) == TRUE ) {
		              echo json_encode(FALSE);
		        } else {
		              echo json_encode(TRUE);
		        }
		    }
		}

		private function contact_number_check($contact)
		{
		    $this->db->where('contact_no', $contact);
		    $query = $this->db->get('user');
		    if( $query->num_rows() > 0 ){ return TRUE; } else { return FALSE; }
		}

		function contact_check()
		{
		    if (array_key_exists('contact',$_POST)) {
		        if ( $this->contact_number_check($this->input->post('contact')) == TRUE ) {
		              echo json_encode(FALSE);
		        } else {
		              echo json_encode(TRUE);
		        }
		    }
		}

		public function userRegister(){

			$post = $this->input->post();
		// echo'<pre>';	print_r($_FILES);die;
			// if($post["email"]){
			// 	echo $this->sendMail("deepak","jadhav","deepak14jadhav@gmail.com",'98458'); die;

			// }
			$licence = "";
			if (!empty($_FILES['licence']['name'])) { 
				 // Set preference 
				$config['upload_path'] = 'assets/uploads'; 
				$config['allowed_types'] = '*'; 
				
				// Load upload library 
				$this->load->library('upload', $config);

				// File upload
				if ($this->upload->do_upload('licence')) { 
					// Get data about the file
					$uploadData = $this->upload->data();
					$licence = $uploadData['file_name'];	
				} 
			}

			$aadhar = "";
			if (!empty($_FILES['aadhar']['name'])) { 
				 // Set preference 
				$config['upload_path'] = 'assets/uploads'; 
				$config['allowed_types'] = '*'; 
				
				// Load upload library 
				$this->load->library('upload', $config);

				// File upload
				if ($this->upload->do_upload('aadhar')) { 
					// Get data about the file
					$uploadData1 = $this->upload->data();
					$aadhar = $uploadData1['file_name'];	
				} 
			}
			$other_doc = "";
			if (!empty($_FILES['other']['name'])) { 
				 // Set preference 
				$config['upload_path'] = 'assets/uploads'; 
				$config['allowed_types'] = '*'; 
				
				// Load upload library 
				$this->load->library('upload', $config);

				// File upload
				if ($this->upload->do_upload('other')) { 
					// Get data about the file
					$uploadData2 = $this->upload->data();
					$other_doc = $uploadData2['file_name'];	
				} 
			}

			$otp = rand(1000,9999);

			$userData = [
				"name"   => $post["name"],
				"email"       => $post["email"],
				"password"    => $post["password"],
				"licence"    => $licence,
				"aadhar"    => $aadhar,
				"other_doc" => $other_doc,
				'otp'		=>$otp,
				"contact_no"  => $post["contact_no"]
			];

			$city = $this->UM->insertData('user', $userData);
			if($city){
				$data['message'] = "Signup successfully done";
				$this->session->set_userdata('email',$post["email"]);
			}
			$this->sendEmail(ucwords($post["name"]),$post["email"],$otp);
			$this->load->view('user/otp', $data);			
		}

		public function otp()
		{
			if(isset($_POST) && !empty($_POST))
			{
				$email = $this->input->post('email');
				$otp = $this->input->post('otp');

				$this->db->select('id');
				$this->db->where('email',$email);
				$this->db->where('otp',$otp);
				$user = $this->db->get('user')->row_array();
				// echo $this->db->last_query();die;
				if(isset($user) && !empty($user))
				{
					$this->db->where('email',$email);
					$this->db->where('otp',$otp);
					$user = $this->db->update('user',array('otp_verify'=>'1'));

					$this->session->unset_userdata('email');
					redirect('login');
				}	
				else
				{
					$this->session->set_flashdata('error','Invalid Otp');
					$this->load->view('user/otp',$data);	
				}	
			}	
			else
			{
				$this->load->view('user/otp');	
			}	
		}

		public function checkLogin(){
			$post = $this->input->post();
			if(!empty($post['username']) && !empty($post['password'])){
				$this->db->select('*');
				$this->db->from("user");
				$this->db->group_start();
				$this->db->where("email" , $post['username']);
				$this->db->or_where("contact_no",  $post['username']);
				$this->db->group_end();
				$this->db->where("password",$post['password']);
				//$this->db->where("otp_verify",'1');
				$loginData = $this->db->get()->row();

				//echo $this->db->last_query();die;
				if(!empty($loginData)){

					if($loginData->otp_verify =='1')
					{
						$loginUser = array( 
						'name'  => $loginData->name,
						'email'     => $loginData->email, 
						'contact_no' => $loginData->contact_no,
						'user_id'    => $loginData->id,
						"user_login" => TRUE
					 );
					$this->session->set_userdata($loginUser);
					return redirect(base_url('product'));		
					}	
					else
					{
						$data['message'] = "Otp verification not done";
					}	
					
				}else{
					$data['message'] = "Invalid user name password";
				}
				return $this->load->view('user/login', $data);
			}else{
				 $this->load->view('user/login');
			}	
				
		}

		public function userlogin(){
			$post = $this->input->post();

			if(!empty($post['email']) && !empty($post['password'])){
				$loginData = $this->db->select('*')->from("user")
				->group_start()
				->where("email" , $post['email'])
				->or_where("contact_no",  $post['email'])
				->group_end()
				->where("password" ,  $post['password'])
				->get()
				->row();

				if(!empty($loginData)){
					$loginUser = array( 
						'name'  => $loginData->name,
						'email'     => $loginData->email, 
						'contact_no' => $loginData->contact_no,
						'user_id'    => $loginData->id,
						"user_login" => TRUE
					 );
					$this->session->set_userdata($loginUser);
					$data['success'] = 'true';
					echo json_encode($data);
				 	///echo "true";	//return redirect(base_url('product'));	
				}else{
					$data['success'] = 'false';
					echo json_encode($data);
					//$data['message'] = "Invalid user name password";
				}
				
			}else{
				$data['success'] = 'false';
				echo json_encode($data);
			}	
				
		}

		public function logout(){
			unset($_SESSION);
			session_destroy();
			redirect('login');
			// $this->load->view('user/login');			
		}

		public function orderBooking(){

		//echo"<pre>";	print_r($_SESSION);//die();

		$toDate = explode(' ', $_SESSION['to_date']);
		$td = explode('-',$toDate[0]);
		$Date = $td[2].'-'.$td[1].'-'.$td[0];
		$ToDate = $Date .' '.$toDate[1].':00'; 
		$fromDate = explode(' ', $_SESSION['from_date']);
		$fd = explode('-',$fromDate[0]);
		$fDate = $fd[2].'-'.$fd[1].'-'.$fd[0];
		$FromDate = $fDate .' '.$fromDate[1].':00'; 

			$post = $this->input->post();
			$order  = $this->db->select('model_at_branch.*, manufacturer.manufacturer_name, type.type, city.city_name, branch.branch_name, model.model_name, model.image_url')
			->from('model_at_branch')
			->join('manufacturer', 'manufacturer.id = model_at_branch.manufacturer_id')
			->join('type', 'type.id = model_at_branch.type_id')
			->join('city', 'city.id = model_at_branch.city_id')
			->join('branch', 'branch.id = model_at_branch.branch_id')
			->join('model', 'model.id = model_at_branch.model_id')
			->where("model_at_branch.id", $post['id'])
			->get()
			->row();

			$orderData = [
				"to_date"                => $ToDate,
				"from_date"              => $FromDate,
				"user_id"                => $this->session->user_id,
				"model_at_branch_id"     => $order->id,
				"model_name"             => $order->model_name,
				"image_url"              => $order->image_url,
				"refundtable_deposit"    => $order->deposit_amount,
				"pricing"                => 0,
				"total_amount"           => ($post['payAmount'])?$post['payAmount']:$order->deposit_amount,
				"coupon_code"			 => ($post['couponCode'])?$post['couponCode']:'',
				"coupon_Amt"			 => ($post['couponAmt'])?$post['couponAmt']:0,
				"status"                 => 1,
				"book_status"            => 1,
				"extaHelmet"            => $post['extaHelmet'],
				"booked_type_id"         => $_SESSION['booked_type_id']
			];
			$orderPlaced = $this->UM->insertData('booking_order', $orderData);	
			//echo $this->db->last_query();die ;
			$this->db->select('available_qty');
			$this->db->where('id',$order->id);
			$qty = $this->db->get('model_at_branch')->row_array();

			if($qty['available_qty'] > 0)
			{
				$rem_qty =  $qty['available_qty'] - 1 ;
				$setValue = array("available_qty" => $rem_qty);
				$this->db->where('id',  $order->id);
				$updatData = $this->db->update('model_at_branch', $setValue);
			}	
			
			if($orderPlaced){
				echo "1"; exit();	
			}else{
				echo "2"; exit();	
			}
		}
		
		//Apply coupons
		public function applyCoupon(){
			$post = $this->input->post();
			$couponAmount = 0; 
			if(!empty($post['couponcode'])){
				$couponDetails = $this->db->select("*")->from("coupons")->where("coupon", $post['couponcode'])->get()->row();
				if(!empty($couponDetails)){
					if($couponDetails->qty > 0){
						//$couponAmount = $order->deposit_amount - $couponDetails->coupon_amount;
						$updateCouponQty = array('qty' => $couponDetails->qty-1);
						$this->db->where('id', $couponDetails->id );
						$this->db->update('coupons', $updateCouponQty);
						echo $couponDetails->coupon_amount; exit();
					}
				}else {
					echo "Coupon Expired"; exit();
				}
			}else{
			    echo "Invalid Coupon"; exit();
			}
		}

		public function updateProfile(){
			$post = $this->input->post();
			$updateUser =[
				"name" => $post['name'],
				"email" => $post['email'],
				"contact_no" => $post['contact_no'],
				"address" => $post['address']
			];
			$this->db->where('id',  $_SESSION['user_id']);
			$updatData = $this->db->update('user', $updateUser);
			//echo $this->db->last_query();die;
			if($updatData){
				echo "Profile update successfully";exit();
			}
		}



    public function sendMail($firstName, $lastName, $sendTo, $otp)
	{
		// recipient 
		$to = $sendTo;

		// / sender /
		$from = 'noreply@badasoftware.com';
		$fromName = 'Bada Software';

		// / email subject /
		$subject = "Forgot Password mail for ".$sendTo."";

		// / mail body /
		$message = '<html>
		<head>
		</head>
		<body>
			<center><h1><b>Forgot Password Mail</b></h1></center><br>
			<p>Dear '.$firstName.' '.$lastName.', <br>
			You have received this mail because, we recieved a password reset request. If you did not make this request, you can ignore this mail.<br>
			OTP Code :-  <b>'.$otp.'</b><br>
			This code expires after 10 minutes. Use this code within 10 minutes to reset your password.<br><br>
			Thanks!
			
			<a href="http://www.badasoftware.com/">Visit our website</a>
		</body>
		</html>
		';

		// / To send HTML mail, the Content-type header must be set /
		$headers[] = 'MIME-Version: 1.0';
		$headers[] = 'Content-type: text/html; charset=iso-8859-1';

		// / Additional headers /
		$headers[] = 'To: '.$firstName.' '.$lastName.' <'.$to.'>';
		$headers[] = 'From: '.$fromName.' <'.$from.'>';
		$headers[] = 'Reply-To: '.$from.'';
		$headers[] = 'Cc: '.$from.'';
		$headers[] = 'Bcc: '.$from.'';

		$sent = mail($to, $subject, $message, implode("\r\n", $headers));

		return $sent;
	}

	public function terms_and_condition()
	{
		$data['terms'] = $this->db->select("*")->from("terms_condition")->where("id",'1')->get()->row();
		
		$this->load->view('user/terms_and_condition',$data);
	}
	// public function termsandcondition()
	// {
	// 	$this->load->view('user/terms_and_condition');
	// }
	public function pagenotfound404()
	{
		$this->load->view('user/pagenotfound404');
	}

	public function getAllBranch()
	{
		$productId = $this->input->post('productID');
		$model_id = $this->input->post('model_id');
		$city_id = $this->input->post('city_id');

		$this->db->select('model_at_branch.*, city.city_name, branch.branch_name, model.model_name, model.image_url');
		$this->db->from('model_at_branch');
		//$this->db->join('manufacturer', 'manufacturer.id = model_at_branch.manufacturer_id');
		//$this->db->join('type', 'type.id = model_at_branch.type_id');
		$this->db->join('city', 'city.id = model_at_branch.city_id');
		$this->db->join('branch', 'branch.id = model_at_branch.branch_id');
		$this->db->join('model', 'model.id = model_at_branch.model_id');
		$this->db->where("available_qty > ", 0);
		$this->db->where("model_at_branch.city_id", $city_id);
		$this->db->where("model_at_branch.model_id", $model_id);
		$data['branches'] = $this->db->get()->result_array();
		// echo $this->db->last_query();die;
		//echo"<pre>"; print_r($data);die;
		return $this->load->view('user/getAllBranch',$data);
	}

	public function updatePassword(){
		$post = $this->input->post();
		// print_r($post);die;

		$this->db->select("id,password");
		$this->db->from('user');
		$this->db->where("id",$post['id']);
		$this->db->where("password",$post['old_password']);
		$resp = $this->db->get()->row_array();
		//print_r($resp);die;

		if(isset($resp) && !empty($resp))
		{	
			$updateUser =["password" => $post['new_password'] ];
			$this->db->where('id',  $post['id']);
			$updatData = $this->db->update('user', $updateUser);
			//echo $this->db->last_query();die;
			if($updatData){
				
				echo "Password update successfully";exit();
			}
			else
			{
				echo "Please try again";exit();
			}	
		}
		else
		{
			echo "Old password not match";exit();
		}	
	}

	public function addContactUs(){
		$post = $this->input->post();

		$contactUsData = [
			"first_name"    =>  $post['first_name'],
			"last_name"     =>  $post['last_name'],
			"email"         =>  $post['email'],
			"phone_number"  =>  $post['phone_number'],
			"message"       =>  $post['message']
		];

		$this->UM->insertData('contact_us', $contactUsData);

		$this->session->set_flashdata('success_msg','<div class="alert alert-success" role="alert">
			Submitted successfully
			</div>');	
		  redirect(base_url('contact_us'));

	}

	public function filterData(){
		$post = $this->input->post();
			//echo"<pre>"; print_r($post);die;

				
		if(!empty($post['from_date']) && !empty($post['to_date'])  &&  !empty($post['booked_type_id'])){
			$this->session->set_userdata('from_date', $post['from_date']);
			$this->session->set_userdata('to_date', $post['to_date']);
			$this->session->set_userdata('booked_type_id', $post['booked_type_id']);
		}
		$this->db->select('model_at_branch.*, manufacturer.manufacturer_name, type.type, city.city_name, branch.branch_name, model.model_name, model.image_url');
		$this->db->from('model_at_branch');
		$this->db->join('manufacturer', 'manufacturer.id = model_at_branch.manufacturer_id');
		$this->db->join('type', 'type.id = model_at_branch.type_id');
		$this->db->join('city', 'city.id = model_at_branch.city_id');
		$this->db->join('branch', 'branch.id = model_at_branch.branch_id');
		$this->db->join('model', 'model.id = model_at_branch.model_id');
		$this->db->where("available_qty > ", 0);

		//inner join `booking_order` on `model_at_branch`.`id` = `booking_order`.`model_at_branch_id`

		if(isset($post['city_id'])) {
			if($post['city_id'] != 0 && $post['city_id']!= -1) {
				$this->db->where('model_at_branch.city_id', $post['city_id']);
			}
		}
		if(isset($post['manufacturer'])) { 
			$this->db->where_in('model_at_branch.manufacturer_id', $post['manufacturer']);
		}
		if(isset($post['model'])) { 
			$this->db->where_in('model_at_branch.model_id', $post['model']);
		}
		if(isset($post['type'])) { 
			$this->db->where_in('model_at_branch.type_id', $post['type']);
		}
		$query = $this->db->get();
		$data['product_data'] = $query->result();
		// echo $this->db->last_query();die;
			// echo "<pre>";print_r($data['product_data']);die;
		return 	$this->load->view('user/search_products', $data);
	}

	public function sendEmail($name,$email,$otp)
	{
		$this->load->library('email');
		$this->load->library('phpmailer_lib');
		$mail = $this->phpmailer_lib->load();
		$mail->isSMTP();
		$mail->Host     = 'ablworkspaces.com';
		$mail->SMTPAuth = true;
		//$mail->SMTPDebug = 2; 
		$mail->Username = 'tester77@ablworkspaces.com';
		$mail->Password = 'x123456@dsddad';
		$mail->SMTPSecure = 'ssl';
		$mail->Port     = 465;
		$mail->setFrom('admin@snaprides.co.in', 'Snaprider');

		$mail->addAddress($email);
		$mail->Subject = 'Signup Otp';

		$mail->isHTML(true);
		$mail->Body = "Dear ".$name." your Sign up OTP is : ".$otp." ";

		if($mail->send())
		{
			return TRUE;
		}	
		else
		{
			return FALSE;

		}	
	}

	public function resendOtp()
	{
		$otp = rand(1111,9999);
		$email = $this->input->post('email');
		$this->db->select('name');
		$this->db->where('email',$email);
		$user = $this->db->get('user')->row_array();
		if(isset($user) && !empty($user))
		{
			$this->db->where('email',$email);
			$this->db->update('user',array('otp'=>$otp));
			$name = $user['name'];
			$send = $this->sendEmail(ucwords($name),$email,$otp);
			if($send)
			{
				echo '1';
			}	
			else
			{
				echo "2";
			}	
		}	

	}

	public function  forget_password()
	{
		$email = $this->input->post('email');
		$this->db->select('id,name');
		$this->db->where('email',$email);
		$user = $this->db->get('user')->row_array();
		if(isset($user) && !empty($user))
		{
			$name = $user['name'];
			//$send = $this->sendEmail(ucwords($name),$email,$otp);

			$this->load->library('email');
			$this->load->library('phpmailer_lib');
			$mail = $this->phpmailer_lib->load();
			$mail->isSMTP();
			$mail->Host     = 'ablworkspaces.com';
			$mail->SMTPAuth = true;
			//$mail->SMTPDebug = 2; 
			$mail->Username = 'tester77@ablworkspaces.com';
			$mail->Password = 'x123456@dsddad';
			$mail->SMTPSecure = 'ssl';
			$mail->Port     = 465;
			$mail->setFrom('admin@snaprides.co.in', 'Snaprider');

			$mail->addAddress($email);
			$mail->Subject = 'Forget Password Link';

			$mail->isHTML(true);
			$mail->Body = "Dear ".ucwords($name)." you requested for reset password, Please click on link to reset your password : <a href='".base_url('User/reset_password/'.base64_encode($user['id']))."'>Click</a> ";

			if($mail->send())
			{
				echo '1';
			}	
			else
			{
				echo '2';

			}	

		}	
	}

	public function reset_password()
	{
		$this->load->view('user/reset_password');
	}

	public function update_password()
	{
	 	$id	= base64_decode($this->input->post('id'));
	 	$password	= $this->input->post('password');

	 	$this->db->where('id',$id);
	 	$update = $this->db->update('user',array('password'=>$password));
	 	if($update)
	 	{
	 		echo "1";
	 	}	
	 	else
	 	{
	 		echo '2';
	 	}	
	}

	
}

