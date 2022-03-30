<?php
defined('BASEPATH') or exit('No direct script access allowed');
define('Success', 'Success');
define('Failure', 'Failure');
class Api extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		// $this->load->model('AdminModel','AM');		
		// $this->load->library('session');
		// $this->load->library('email');		
	}

	public function SentOtp()
	{
		$method = $this->input->server('REQUEST_METHOD');
		if ($method != 'POST') {
			$output = array(
				"status" => Failure,
				"message" => 'bad request',
			);
		} else {
			$body = file_get_contents('php://input');
			$postData  = (array) json_decode($body);

			if (!array_key_exists("contact_no", $postData)) {
				$this->form_validation->set_rules('contact_no', 'Contact Number', 'required');
			}
			$contact_no = isset($postData['contact_no']) ? $postData['contact_no'] : '';
			if ($this->checkAlreadyContact($contact_no)) {
				$output = array(
					'status' => 400,
					'message' => 'Contact Number Already Exist.',
				);
				echo json_encode($output);
				die;
			}
			$otp = rand(1000, 9999);
			$message = $otp . " - This is one time password for verify your Bike Booking account.";
			$mobileNo = $_POST['contact_no'];
			$result = parent::_sendOtp($message, $mobileNo);
			if ($result == 1) {
				$output = array(
					"status" => 200,
					"message" => 'Otp sent successfully.',
					'otp' => $otp
				);
				echo json_encode($output);
				die;
			} else {
				$output = array(
					'status' => Failure,
					'message' => 'Invalid mobile number.',
				);
				echo json_encode($output);
				die;
			}
		}
		echo json_encode($output);
		die;
	}


	public function forgetPasswordOtp()
	{
		$method = $this->input->server('REQUEST_METHOD');
		if ($method != 'POST') {
			$output = array(
				"status" => Failure
			);
		} else {
			$body = file_get_contents('php://input');
			$postData  = (array) json_decode($body);
			if (!array_key_exists("username", $postData)) {
				$this->form_validation->set_rules('username', 'Username', 'required');
			}
			$this->form_validation->set_rules('test', 'TestValidation', 'required', array('required' => 'validationErrorMessage'));
			if ($this->form_validation->run() == FALSE) {
				$ddd = current(array_values($this->form_validation->error_array()));
				$output = array(
					'status' => 400,
					'message' => $ddd,
				);
				if ($ddd != 'validationErrorMessage') {
					echo json_encode($output);
					die;
				}
			}
			$username = $postData['username'];
			if ($this->isValidEmail($username)) {
				$userData = $this->db->where('email', $username)->get('user')->row();
			} else {
				$userData = $this->db->where('contact_no', $username)->get('user')->row();
			}
			if (!empty($userData)) {
				$otp = rand(1000, 9999);
				$message = $otp . " - This is one time password for forget password your Bike Booking account.";
				$mobileNo = $userData->contact_no;

				$to = $userData->Email;
				$subject = 'Bike Booking: Otp Email';
				$body = $message;
				$from = 'dushyant@gmail.com';
				// if ($this->isValidEmail($username)) {
				// parent::_sendMail($from, $to, $subject, $body);
				// } else {
				// $result = parent::_sendOtp($message, $mobileNo);
				// }
				if (true) {
					$userDAta = $this->db->where('contact_no', $mobileNo->contact_no)->get('user')->row();
					$data = ['user_id' => $userData->id, 'otp' => $otp];
					$output = array(
						"status" => 200,
						"message" => 'Otp sent successfully.',
						'data' => $data
					);
					echo json_encode($output);
					die;
				} else {
					$output = array(
						'status' => Failure,
						'message' => 'Invalid Username.'
					);
					echo json_encode($output);
					die;
				}
			} else {
				$output = array(
					'status' => Failure,
					'message' => 'Invalid Username'
				);
				echo json_encode($output);
				die;
			}
		}
		echo json_encode($output);
		die;
	}

	private function isValidEmail($email)
	{
		return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
	}
	public function Login()
	{
		$method = $this->input->server('REQUEST_METHOD');
		if ($method != 'POST') {
			$output = array(
				"status" => Failure,
				"message" => 'bad request'
			);
		} else {
			$body = file_get_contents('php://input');
			$postData  = (array) json_decode($body);
			if (!array_key_exists("username", $postData)) {
				$this->form_validation->set_rules('username', 'Username', 'required');
			}
			if (!array_key_exists("password", $postData)) {
				$this->form_validation->set_rules('password', 'password', 'required');
			}
			$this->form_validation->set_rules('test', 'TestValidation', 'required', array('required' => 'validationErrorMessage'));
			if ($this->form_validation->run() == FALSE) {
				$ddd = current(array_values($this->form_validation->error_array())); //die;
				$output = array(
					'status' => 400,
					'message' => $ddd,
				);
				if ($ddd != 'validationErrorMessage') {
					echo json_encode($output);
					die;
				}
			}
			$username = isset($postData['username']) ? $postData['username'] : '';
			$password = isset($postData['password']) ?  md5($postData['password']) : '';
			if ($this->isValidEmail($username)) {
				$this->db->where('email', $username);
			} else {
				$this->db->where('contact_no', $username);
			}
			$this->db->select('id,name,email,contact_no,address,otp_verify');
			$this->db->where('password', $password);
			$check_exists = $this->db->get('user');
			if ($check_exists->num_rows() > 0) {
				$data = $check_exists->row_array();
				$output = array(
					"status" => 200,
					"message" => 'User Login successfully.',
					'data' => $data
				);
			} else {
				$output = array(
					"status" => 400,
					"message" => 'Wrong username or password.',
				);
			}
		}
		echo json_encode($output);
		die;
	}

	public function updatePassword()
	{
		$method = $this->input->server('REQUEST_METHOD');
		if ($method != 'POST') {
			$output = array(
				"status" => Failure,
				"message" => 'bad request',
				'data' => array(),
			);
		} else {

			$body = file_get_contents('php://input');
			$postData  = (array) json_decode($body);
			if (!array_key_exists("user_id", $postData)) {
				$this->form_validation->set_rules('user_id', 'User Id', 'required');
			}
			if (!array_key_exists("password", $postData)) {
				$this->form_validation->set_rules('password', 'password', 'required');
			}
			$this->form_validation->set_rules('test', 'TestValidation', 'required', array('required' => 'validationErrorMessage'));
			if ($this->form_validation->run() == FALSE) {
				$ddd = current(array_values($this->form_validation->error_array()));
				$output = array(
					'status' => 400,
					'message' => $ddd,
				);
				if ($ddd != 'validationErrorMessage') {
					echo json_encode($output);
					die;
				}
			}

			$user_id  = $postData['user_id'];
			$password = $postData['password'];
			if ($this->checkUserId($user_id)) {
				$update = $this->db->where('id', $user_id)->update('user', ['password' => md5($password)]);
				if ($update) {
					$output = array(
						"status" => 200,
						"message" => 'Password Update successfully.',
					);
				} else {
					$output = array(
						"status" => 400,
						"message" => 'Some error occured.',
					);
				}
			} else {
				$output = array(
					"status" => 400,
					"message" => 'wrong User Id.',
				);
			}
		}
		echo json_encode($output);
		die;
	}

	public function uploadRideDocument()
	{
		$method = $this->input->server('REQUEST_METHOD');
		if ($method != 'POST') {
			$output = array(
				"status" => Failure,
				"message" => 'bad request',
				'data' => array(),
			);
		} else {
			$this->form_validation->set_rules('user_id', 'User Id', 'required');
			if (empty($_FILES['aadhar']['name'])) {
				$this->form_validation->set_rules('aadhar', 'Aadhar Card Front', 'required');
			}
			if (empty($_FILES['aadhar_back']['name'])) {
				$this->form_validation->set_rules('aadhar_back', 'Aadhar Card Back', 'required');
			}
			if (empty($_FILES['selfie_photo']['name'])) {
				$this->form_validation->set_rules('selfie_photo', 'Selfie Photo', 'required');
			}
			if (empty($_FILES['licence']['name'])) {
				$this->form_validation->set_rules('licence', 'Licence Photo', 'required');
			}
			if ($this->form_validation->run() == FALSE) {
				// echo 'dfffffffffffffffff';die;
				// print_r($this->form_validation->error_array());
				// die;
				$ddd = current(array_values($this->form_validation->error_array()));
				$output = array(
					'status' => Failure,
					'message' => $ddd,
					'data' => array(),
				);
				echo json_encode($output);
				die;
			}
			extract($_POST);
			if ($this->checkUserId($user_id)) {
				$target_dir = BASEPATH . "../assets/uploads/";
				$error_doc = array();
				$documents = array();
				if (isset($_FILES['selfie_photo']) && $_FILES['selfie_photo']['name'] != '') {
					$documents['selfie_photo'] = $_FILES['selfie_photo'];
				}
				if (isset($_FILES['licence']) && $_FILES['licence']['name'] != '') {
					$documents['licence'] = $_FILES['licence'];
				}
				if (isset($_FILES['aadhar']) && $_FILES['aadhar']['name'] != '') {
					$documents['aadhar'] = $_FILES['aadhar'];
				}
				if (isset($_FILES['aadhar_back']) && $_FILES['aadhar_back']['name'] != '') {
					$documents['aadhar_back'] = $_FILES['aadhar_back'];
				}
				// print_r($documents);die;
				foreach ($documents as $key => $val) {
					// print_r($val);die;
					$random_string = rand(1000, 999999);
					$file_name_arr = $val["name"];
					$file_name_new = $random_string . '_' . $file_name_arr;
					$file_name = str_replace(" ", "", $file_name_new);
					$target_file = $target_dir . basename($file_name);
					$target_file_arr[] = $target_file;
					$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
					if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "pdf") {
						$error_doc[$key] = 'Sorry, only JPG, JPEG, PNG & PDF files are allowed.';
					} else {
						if (move_uploaded_file($val["tmp_name"], $target_file)) {
							$data = array($key => $file_name);
							$update = $this->db->where('id', $user_id)->update('user', $data);
						} else {
							$error_doc[$key] = 'Sorry, there was an error uploading your file.';
						}
					}
				}
				if ($update) {
					$output = array(
						"status" => 200,
						"message" => 'Document Upload successfully.',
						'data' => []
					);
				} else {
					$output = array(
						"status" => 400,
						"message" => 'Some error occured.',
						'data' => array()
					);
				}
			} else {
				$output = array(
					"status" => 400,
					"message" => 'wrong User Id.',
					'data' => array()
				);
			}
		}
		echo json_encode($output);
		die;
	}



	public function changePassword()
	{
		$method = $this->input->server('REQUEST_METHOD');
		if ($method != 'POST') {
			$output = array(
				"status" => Failure,
				"message" => 'bad request',
				'data' => array(),
			);
		} else {
			$body = file_get_contents('php://input');
			$postData  = (array) json_decode($body);
			if (!array_key_exists("user_id", $postData)) {
				$this->form_validation->set_rules('user_id', 'User Id', 'required');
			}
			if (!array_key_exists("new_password", $postData)) {
				$this->form_validation->set_rules('new_password', 'New Pasword', 'required');
			}
			if (!array_key_exists("old_password", $postData)) {
				$this->form_validation->set_rules('old_password', 'Old Pasword', 'required');
			}
			$this->form_validation->set_rules('test', 'TestValidation', 'required', array('required' => 'validationErrorMessage'));
			if ($this->form_validation->run() == FALSE) {
				$ddd = current(array_values($this->form_validation->error_array())); //die;
				$output = array(
					'status' => 400,
					'message' => $ddd,
				);
				if ($ddd != 'validationErrorMessage') {
					echo json_encode($output);
					die;
				}
			}
			$user_id 	  = isset($postData['user_id']) ? $postData['user_id'] : 0;
			$old_password = isset($postData['old_password']) ? $postData['old_password'] : '';
			$new_password = isset($postData['new_password']) ? $postData['new_password'] : '';
			if ($this->checkUserId($user_id)) {
				$userData = $this->getUserData($user_id);
				if ($userData->password != md5($old_password)) {
					$output = array(
						"status" => 400,
						"message" => 'Old Password Not match.'
					);
					echo json_encode($output);
					die;
				}
				$data = array('password' => md5($new_password));
				$update = $this->db->where('id', $user_id)->update('user', $data);
				if ($update) {
					$output = array(
						"status" => 200,
						"message" => 'Password Update successfully.'
					);
				} else {
					$output = array(
						"status" => 400,
						"message" => 'Some error occured.'
					);
				}
			} else {
				$output = array(
					"status" => 400,
					"message" => 'wrong User Id.'
				);
			}
		}
		echo json_encode($output);
		die;
	}

	function checkAlreadyEmail($email)
	{
		$check_exists = $this->db->where('email', $email)->get('user')->num_rows();
		if ($check_exists > 0) {
			return false;
		} else {
			return true;
		}
	}

	function checkAlreadyContact($mobileNo)
	{
		$check_exists = $this->db->where('contact_no', $mobileNo)->get('user')->num_rows();
		if ($check_exists > 0) {
			return true;
		} else {
			return false;
		}
	}

	private function checkUserId($id)
	{
		$check_exists = $this->db->where('id', $id)->get('user')->num_rows();
		if ($check_exists > 0) {
			return true;
		} else {
			return false;
		}
	}

	private function getUserData($id)
	{
		$check_exists = $this->db->where('id', $id)->get('user')->row();
		if (!empty($check_exists)) {
			return $check_exists;
		} else {
			return false;
		}
	}


	public function signUp()
	{



		$method = $this->input->server('REQUEST_METHOD');
		if ($method != 'POST') {
			$output = array(
				"status" => 400,
				"message" => 'bad request'
			);
		} else {
			$body = file_get_contents('php://input');
			$postData  = (array) json_decode($body);
			if (!array_key_exists("name", $postData)) {
				$this->form_validation->set_rules('name', 'name', 'required');
			}
			if (!array_key_exists("email", $postData)) {
				$this->form_validation->set_rules('email', 'Email', 'required');
			}
			if (!array_key_exists("contact_no", $postData)) {
				$this->form_validation->set_rules('contact_no', 'Contact Number', 'required');
			}
			if (!array_key_exists("password", $postData)) {
				$this->form_validation->set_rules('password', 'password', 'required');
			}
			$this->form_validation->set_rules('test', 'TestValidation', 'required', array('required' => 'validationErrorMessage'));

			if ($this->form_validation->run() == FALSE) {
				$ddd = current(array_values($this->form_validation->error_array())); //die;
				$output = array(
					'status' => 400,
					'message' => $ddd,
				);
				if ($ddd != 'validationErrorMessage') {
					echo json_encode($output);
					die;
				}
			}
			$name = isset($postData['name']) ? $postData['name'] : '';
			// echo $name;die;
			$email = isset($postData['email']) ?  $postData['email'] : '';
			$password = isset($postData['password']) ? md5($postData['password']) : '';
			$contact_no = isset($postData['contact_no']) ? $postData['contact_no'] : '';
			if ($this->checkAlreadyContact($contact_no)) {
				$output = array(
					'status' => 400,
					'message' => 'Contact Number Already Exist.',
				);
				echo json_encode($output);
				die;
			}
			if ($this->checkAlreadyEmail($email)) {
				$data = array(
					'name' => $name,
					'email' => $email,
					'password' => $password,
					'contact_no' => $contact_no,
					'otp_verify' => 1,
					'created_at' => date('Y-m-d h:i:s'),
					'updated_at' => date('Y-m-d h:i:s')
				);
				$this->db->insert('user', $data);
				$insert_id = $this->db->insert_id();
				if ($insert_id != '') {

					$this->db->where('id', $insert_id);
					$this->db->select('id,name,email,contact_no,address,otp_verify');
					$userDAta = $this->db->get('user')->row();
					$output = array(
						"status"  => 200,
						"message" => 'User Register Successfully',
						'data'	  => $userDAta
					);
				} else {
					$output = array(
						"status" => 400,
						"message" => 'Some Error occured.',

					);
				}
			} else {
				$output = array(
					"status" => 400,
					"message" => 'E-mail Already Exist.',

				);
			}
		}
		echo json_encode($output);
		die;
	}

	public function updateProfile()
	{
		$method = $this->input->server('REQUEST_METHOD');
		if ($method != 'POST') {
			$output = array(
				"status" => Failure,
				"message" => 'bad request',
				'data' => array(),
			);
		} else {
			extract($_POST);
			$this->form_validation->set_rules('user_id', 'UserId', 'required');
			$this->form_validation->set_rules('name', 'name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|edit_unique[user.email.' . $user_id . ']');
			$this->form_validation->set_rules('contact_no', 'Contact Number', 'required|edit_unique[user.contact_no.' . $user_id . ']');
			if ($this->form_validation->run() == FALSE) {
				$ddd = current(array_values($this->form_validation->error_array())); //die;
				$output = array(
					'status' => Failure,
					'message' => $ddd,
					'data' => array(),
				);
				echo json_encode($output);
				die;
			}
			if ($this->checkUserId($user_id)) {
				$data = array(
					'name' => $name,
					'email' => $email,
					'contact_no' => $contact_no,
					'updated_at' => date('Y-m-d h:i:s')
				);
				$update = $this->db->where('id', $user_id)->update('user', $data);
				$target_dir = BASEPATH . "../assets/uploads/";
				$error_doc = array();
				$documents = array();
				if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['name'] != '') {
					$documents['profile_pic'] = $_FILES['profile_pic'];
				}
				if ($documents) {
					foreach ($documents as $key => $val) {
						$random_string = rand(1000, 999999);
						$file_name_arr = $val["name"];
						$file_name_new = $random_string . '_' . $file_name_arr;
						$file_name = str_replace(" ", "", $file_name_new);
						$target_file = $target_dir . basename($file_name);
						$target_file_arr[] = $target_file;
						$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
						if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "pdf") {
							$error_doc[$key] = 'Sorry, only JPG, JPEG, PNG & PDF files are allowed.';
						} else {
							if (move_uploaded_file($val["tmp_name"], $target_file)) {
								$data = array($key => $file_name);
								$update = $this->db->where('id', $user_id)->update('user', $data);
							} else {
								$error_doc[$key] = 'Sorry, there was an error uploading your file.';
							}
						}
					}
				}
				if ($update != '') {
					$output = array(
						"status" => 200,
						"message" => 'Profile update Successfully',
						'data' => [],
					);
				} else {
					$output = array(
						"status" => 400,
						"message" => 'some error occured',
						'data' => array(),
					);
				}
			} else {
				$output = array(
					"status" => 400,
					"message" => 'User id not Exist.',
					'data' => array(),
				);
			}
		}
		echo json_encode($output);
		die;
	}

	public function profile($id)
	{
		// echo $id;die;
		$method = $this->input->server('REQUEST_METHOD');
		if ($method != 'GET') {
			$output = array(
				"status" => Failure,
				"message" => 'bad request',
				'data' => array(),
			);
		} else {
			$id = isset($id) ? $id : '';
			$userDetails = $this->db->where('id', $id)->get('user')->row_array();
			if (!empty($userDetails)) {
				$output = array(
					"status" => 200,
					"message" => 'User Details',
					'data' => $userDetails,
				);
			} else {
				$output = array(
					"status" => 400,
					"message" => 'Invaild Data User',
					'data' => array(),
				);
			}
		}
		echo json_encode($output);
		die;
	}


	public function getCity()
	{
		$method = $this->input->server('REQUEST_METHOD');
		if ($method != 'GET') {
			$output = array(
				"status" => Failure,
				"message" => 'bad request',
				'data' => array(),
			);
		} else {

			$userDetails = $this->db->get('city')->result();
			if (!empty($userDetails)) {
				$output = array(
					"status" => 200,
					"message" => 'User Details',
					'data' => $userDetails,
				);
			} else {
				$output = array(
					"status" => 400,
					"message" => 'Sorry! city not found',
				);
			}
		}
		echo json_encode($output);
		die;
	}

	public function getAllBikes()
	{

		$method = $this->input->server('REQUEST_METHOD');
		if ($method != 'GET') {
			$output = array(
				"status" => Failure,
				"message" => 'bad request',
				'data' => array(),
			);
		} else {

			$data = $this->db
				->from('branch as b,model_at_branch as mab ')
				->select('m.id as model_id,m.model_name,mab.hourly_rate,mab.free_km,mf.manufacturer_name')
				->join('model as m', 'm.id = mab.model_id')
				->join('manufacturer mf', 'mf.id = m.manufacturer_id')
				->group_by('model_id')
				->get('branch')->result();
			if (!empty($data)) {
				$output = array(
					"status" => 200,
					"message" => 'Bike get successfully.',
					'data' => $data,
				);
			} else {
				$output = array(
					"status" => 400,
					"message" => 'Sorry! bike not found',
				);
			}
		}
		echo json_encode($output);
		die;
	}


	public function searchBikeByCity()
	{
		$method = $this->input->server('REQUEST_METHOD');
		if ($method != 'POST') {
			$output = array(
				"status" => Failure,
				"message" => 'bad request',
				'data' => array(),
			);
		} else {
			$body = file_get_contents('php://input');
			$postData  = (array) json_decode($body);
			$start_date  = $postData['start_date'];
			$end_date    = $postData['end_date'];
			$city_id     = $postData['city_id'];
			$data = $this->db
				->from('branch as b,model_at_branch as mab ')
				->select('m.id as model_id,m.model_name,mab.hourly_rate,mab.free_km,mf.manufacturer_name')
				->join('model as m', 'm.id = mab.model_id')
				->join('manufacturer mf', 'mf.id = m.manufacturer_id')
				// ->where('mab.city_id', $city_id)
				->group_by('model_id')
				->get('branch')->result();
			if (!empty($data)) {
				// print_r($data);die;
				$cnt = 1;
				foreach ($data as $key => $value) {
					// echo $value->model_id;die;
					// if($cnt == 2){
					// 	print_r($value);die;
					// }else{
						
					// }
					$checkTotalBikeInCity = $this->db
						->select('available_qty')
						->where(['city_id' => $city_id, 'model_id' => $value->model_id])
						->get('model_at_branch')->row();
					// $total = $this->db->where('model_id', $value->model_id)->where('city_id', $city_id)->count_all();

					$totalOrderThisModel = $this->db->where('from_date >=', $start_date)->where('to_date <=', $end_date)->where('model_id', $value->model_id)->where('city_id', $city_id)->get('booking_order')->num_rows();
// print_r($totalOrderThisModel);die;
// 					if($cnt == 2){
// 						echo 'dfd';die;
// 					}else{
						
// 					}
					// print_r($totalOrderThisModel);die;
					// $ddd[$key] = $value;
					// print_r($checkTotalBikeInCity);die;
					if(isset($checkTotalBikeInCity->available_qty) && is_int($totalOrderThisModel))
					$value->available_qty = (int) $checkTotalBikeInCity->available_qty - (int) $totalOrderThisModel;
					else
					$value->available_qty = 0;
					
					$cnt++;
				}

				// print_r($data);die;

				$output = array(
					"status" => 200,
					"message" => 'Bike get successfully.',
					'data' => $data,
				);
			} else {
				$output = array(
					"status" => 400,
					"message" => 'Sorry! bike not found',
				);
			}
		}
		echo json_encode($output);
		die;
	}
}
