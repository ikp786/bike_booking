<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Controller extends CI_Controller {



    function __construct() {
        parent::__construct();

        date_default_timezone_set('Asia/Calcutta'); 

    }

    

    public function _saveActivity($username,$inserted_user_id,$comment,$url,$package_name,$package_id){
        
        date_default_timezone_set('Asia/Calcutta'); 
        $date = date("Y-m-d H:i:s");
        
        $this->db->insert('activity', array('username'=>$username,'user_id'=>$inserted_user_id,'comment' =>$comment,'url'=>$url,'package_name' => $package_name,'package_id' =>$package_id,'added_date'=>$date));
        
    }
    
    public function _saveNotification($inserted_user_id,$p_uid,$text){
        
        $date = date("Y-m-d H:i:s");
        
        $this->db->insert('notification', array(
                        'from_user_id'=>$inserted_user_id,
                        'to_user_id'=>$p_uid,
                        'text'=>$text,
                        'added_date'=>$date,
                        ));
        
    }

     public function _sendOtp($message,$mobileNo)
         {
            
            http://fastsms.fastsmsindia.com/api/sendhttp.php?authkey=36974ANcIqIDw260519f38&mobiles=91".$mobileNo."&message=$message&unicode=1&response=json&sender=GNJGRP&route=6&country=0&DLT_TE_ID=1207162287257813065
            
    $message = urlencode($message);
    $route = "4";
    $curl = curl_init();

  curl_setopt_array($curl, array(
  //CURLOPT_URL => "http://bulksms.mysmsmantra.com:8080/WebSMS/SMSAPI.jsp?username=gunjangroup&password=123456&sendername=IPSJOP&mobileno=91".$mobileNo."&message=$message",
    CURLOPT_URL => "http://fastsms.fastsmsindia.com/api/sendhttp.php?authkey=36974ANcIqIDw260519f38&mobiles=91".$mobileNo."&message=$message&unicode=1&response=json&sender=GNJGRP&route=6&country=0&DLT_TE_ID=1207162287257813065",
    // CURLOPT_URL => "http://sms.fastsmsindia.com/api/sendhttp.php?authkey=36974ANcIqIDw260519f38&mobiles=91".$mobileNo."&message=$message&sender=NEWMSG&route=6&country=0",
//   http://fastsms.fastsmsindia.com/api/sendhttp.php?authkey=36974ANcIqIDw260519f38&mobiles=91".$mobileNo."&message=$message&sender=MEALBX&route=6&country=0
//  "http://sms.fastsmsindia.com/api/sendhttp.php?authkey=36974ANcIqIDw260519f38&mobiles=919636377696&message=1234.%20-%20This%20is%20one%20time%20password%20for%20verify%20your%20Gunjan%20Group%20account.&sender=NEWMSG&route=4&country=0"
  
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
));


 $response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
if ($response == 'Invalid mobile number.') {
  return false;
}else{
return true;
}
    }


    public function _sendMail($from,$to,$subject,$body){
        $this->load->library('email');
        $config = array();
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'mail.premad.in';
        $config['smtp_user'] = 'support@premad.in';
        $config['smtp_pass'] = '123456';
         
        $config['smtp_port'] = 587;
        
        $this->email->initialize($config);
        
        $this->email->set_mailtype("html");


        $this->email->from("khanebrahim643@gmail.com");
        $this->email->to($to);
        $this->email->subject($subject);    
        $this->email->message($body);
        //$send = $this->email->send();
        //return $send;
            
         if($this->email->send()){
            //this is to check if email is sent
return true;
        }else{
            //else error
            show_error($this->email->print_debugger());
        }
    }


 
}