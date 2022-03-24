<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function getTime(){

	$time = date("H");

	 for($n=$time; $n<=20; $n++)
	 {
	 	$t[] = 	$n.':00';
	 }	
   	
   	return $t;
}



?>