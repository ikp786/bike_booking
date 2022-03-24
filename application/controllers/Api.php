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
				'data' => array(),
			);
		} else {
			$this->form_validation->set_rules('contact_no', 'Contact Number', 'required|is_unique[user.contact_no]');
			if ($this->form_validation->run() == FALSE) {
				$ddd = current(array_values($this->form_validation->error_array()));
				$output = array(
					'status' => Failure,
					'message' => $ddd,
					'data' => array(),
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
					'data' => array(),
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
				"status" => Failure,
				"message" => 'bad request',
				'data' => array(),
			);
		} else {
			$this->form_validation->set_rules('username', 'Username', 'required');
			if ($this->form_validation->run() == FALSE) {
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
			if ($this->isValidEmail($username)) {
				$userData = $this->db->where('email', $username)->get('user')->row();
			} else {
				$userData = $this->db->where('contact_no', $username)->get('user')->row();
			}
			if ($this->checkUserId($userData->id)) {
				$otp = rand(1000, 9999);
				$message = $otp . " - This is one time password for forget password your Bike Booking account.";
				$mobileNo = $userData->contact_no;

				$to = $userData->Email;
				$subject = 'Bike Booking: Otp Email';
				$body = $message;
				$from = 'dushyant@gmail.com';


				if ($this->isValidEmail($username)) {
					parent::_sendMail($from, $to, $subject, $body);
				} else {
					$result = parent::_sendOtp($message, $mobileNo);
				}




				if ($result == 1) {
					$userDAta = $this->db->where('contact_no', $contact_no)->get('user')->row();
					$data = ['user_id' => $userDAta->id, 'otp' => $otp];
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
						'message' => 'Invalid Username.',
						'data' => array(),
					);
					echo json_encode($output);
					die;
				}
			} else {
				$output = array(
					'status' => Failure,
					'message' => 'Invalid Username',
					'data' => array(),
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
				"message" => 'bad request',
				'data' => array(),
			);
		} else {

			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Pasword', 'required');
			if ($this->form_validation->run() == FALSE) {
				$ddd = current(array_values($this->form_validation->error_array()));
				$output = array(
					'status' => Failure,
					'message' => $ddd,
					'data' => array(),
				);
				echo json_encode($output);
				die;
			}


			$username = isset($_POST['username']) ? $_POST['username'] : '';
			$password = isset($_POST['password']) ?  md5($_POST['password']) : '';
			if ($this->isValidEmail($username)) {
				$this->db->where('email', $username);
			} else {
				$this->db->where('contact_no', $username);
			}
			$this->db->where('password', $password);
			$check_exists = $this->db->get('user');
			// $check_exists = $this->db->where('email', $username)->where('password', $password)->get('user')->num_rows();
			if ($check_exists->num_rows() > 0) {
				$data = $check_exists->row_array();
				$output = array(
					"status" => 200,
					"message" => 'User Login successfully.',
					'data' => $data
				);
			} else {
				$output = array(
					"status" => 401,
					"message" => 'Wrong username or password.',
					'data' => array()
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
			$this->form_validation->set_rules('user_id', 'User Id', 'required');
			$this->form_validation->set_rules('password', 'Pasword', 'required');
			if ($this->form_validation->run() == FALSE) {
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
				$update = $this->db->where('id', $user_id)->update('user', ['password' => md5($password)]);
				if ($update) {
					$output = array(
						"status" => 200,
						"message" => 'Password Update successfully.',
						'data' => []
					);
				} else {
					$output = array(
						"status" => 401,
						"message" => 'Some error occured.',
						'data' => array()
					);
				}
			} else {
				$output = array(
					"status" => 401,
					"message" => 'wrong User Id.',
					'data' => array()
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
						"status" => 401,
						"message" => 'Some error occured.',
						'data' => array()
					);
				}
			} else {
				$output = array(
					"status" => 401,
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
			$this->form_validation->set_rules('user_id', 'User Id', 'required');
			$this->form_validation->set_rules('new_password', 'New Pasword', 'required');
			$this->form_validation->set_rules('old_password', 'Old Pasword', 'required');
			if ($this->form_validation->run() == FALSE) {
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
				$userData = $this->getUserData($user_id);
				// print_r($userData);die;
				// echo $userData->id;die;
				if ($userData->password != md5($old_password)) {

					$output = array(
						"status" => 401,
						"message" => 'Old Password Not match.',
						'data' => array()
					);
					echo json_encode($output);
					die;
				}
				$data = array('password' => md5($new_password));
				$update = $this->db->where('id', $user_id)->update('user', $data);

				if ($update) {
					$output = array(
						"status" => 200,
						"message" => 'Password Update successfully.',
						'data' => []
					);
				} else {
					$output = array(
						"status" => 401,
						"message" => 'Some error occured.',
						'data' => array()
					);
				}
			} else {
				$output = array(
					"status" => 401,
					"message" => 'wrong User Id.',
					'data' => array()
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

	private function checkAlreadyContact($email)
	{
		$check_exists = $this->db->where('contact_no', $email)->get('user')->num_rows();
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
				"status" => Failure,
				"message" => 'bad request',
				'data' => array(),
			);
		} else {
			$this->form_validation->set_rules('name', 'name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|is_unique[user.email]');
			$this->form_validation->set_rules('contact_no', 'Contact Number', 'required|is_unique[user.contact_no]');
			$this->form_validation->set_rules('password', 'Password', 'required');
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
			$name = isset($_POST['name']) ? $_POST['name'] : '';
			$email = isset($_POST['email']) ?  $_POST['email'] : '';
			$password = isset($_POST['password']) ? md5($_POST['password']) : '';
			$contact_no = isset($_POST['contact_no']) ? $_POST['contact_no'] : '';
			if ($this->checkAlreadyEmail($email)) {
				$data = array(
					'name' => $name,
					'email' => $email,
					'password' => $password,
					'contact_no' => $contact_no,
					'created_at' => date('Y-m-d h:i:s'),
					'updated_at' => date('Y-m-d h:i:s')
				);
				$this->db->insert('user', $data);
				$insert_id = $this->db->insert_id();
				if ($insert_id != '') {
					$output = array(
						"status" => 200,
						"message" => 'User Register Successfully',
						'data' => $data,
					);
				} else {
					$output = array(
						"status" => 401,
						"message" => 'User Register UnSuccessfully',
						'data' => array(),
					);
				}
			} else {
				$output = array(
					"status" => 401,
					"message" => 'E-mail Already Exist.',
					'data' => array(),
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
						"status" => 401,
						"message" => 'some error occured',
						'data' => array(),
					);
				}
			} else {
				$output = array(
					"status" => 401,
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
					"status" => 401,
					"message" => 'Invaild Data User',
					'data' => array(),
				);
			}
		}
		echo json_encode($output);
		die;
	}
}
