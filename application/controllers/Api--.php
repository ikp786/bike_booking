<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

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
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $password = isset($_POST['password']) ?  $_POST['password'] : '' ;
			$check_exists = $this->db->where('email',$email)->where('password',$password)->get('user')->num_rows();
			if($check_exists > 0 ){
			   $data = $this->db->where('email',$email)->where('password',$password)->get('user')->row_array();
			   $output = array(
                "status" => 200,
                "message" => 'User Authorized',
                'data' => $data
               );
			}else{
			   $output = array(
                "status" => 401,
                "message" => 'UnAuthorized User!',
                'data' => array()
               );	
			}
        }
		echo json_encode($output); die;
	}
	
	function checkAlreadyEmail($email){
	 $check_exists = $this->db->where('email',$email)->get('user')->num_rows();
		 if($check_exists > 0){
			 return false;
		 }else{
			return true; 
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
			$name = isset($_POST['name']) ? $_POST['name'] : '';
			$email = isset($_POST['email']) ?  $_POST['email'] : '';
			$password = isset($_POST['password']) ? $_POST['password'] : '';
			$contact_no = isset($_POST['contact_no']) ? $_POST['contact_no'] : '';
		  if($this->checkAlreadyEmail($email)){
			$data = array(
			 'name' => $name,
			 'email' => $email,
			 'password' => $password,
			 'contact_no' => $contact_no,
			 'created_at' => date('Y-m-d h:i:s'),
			 'updated_at' => date('Y-m-d h:i:s')
			);
			$this->db->insert('user',$data);
			$insert_id = $this->db->insert_id();
			if($insert_id != ''){
			   $output = array(
                "status" => 200,
                "message" => 'User Register Successfully',
                'data' => $data,
               );
			}else{
			   $output = array(
                "status" => 401,
                "message" => 'User Register UnSuccessfully',
                'data' => array(),
               );	
			}
		  }else{
			 $output = array(
                "status" => 401,
                "message" => 'Already E-mail User',
                'data' => array(),
             ); 
			  
		  }
        }
		echo json_encode($output); die;
	}
	
	public function Profile()
	{
		$method = $this->input->server('REQUEST_METHOD');
        if ($method != 'GET') {
            $output = array(
                "status" => Failure,
                "message" => 'bad request',
                'data' => array(),
            );
        } else {
			$id = isset($_GET['id']) ? $_GET['id'] : '';
			$userDetails = $this->db->where('id',$id)->get('user')->row_array();
			if(!empty($userDetails)){
			   $output = array(
                "status" => 200,
                "message" => 'User Details',
                'data' => $userDetails,
               );
			}else{
			   $output = array(
                "status" => 401,
                "message" => 'Invaild Data User',
                'data' => array(),
               );	
			}
        }
		echo json_encode($output); die;
	}
}
