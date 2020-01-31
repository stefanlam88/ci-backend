<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Return class
 * Extend Function for Rest Client library
**/
class Rest {
	
	protected $server;
	protected $auth;                
	protected $username;      
	protected $password;     
	
	public function __construct(){
        // Get the CodeIgniter reference
        $this->_CI =& get_instance();
	}
	
	public function config($server, $username, $password, $auth = "basic"){
		$this->server = $server;
		$this->auth = $auth;
		$this->username = $username;
		$this->password = $password;
	}
	
	/*********************************************************************************************************
		CURL Call
	*********************************************************************************************************/
	public function call($url, $json = array(), $type = "POST", $header = array()){
		$headers = array();
		$headers[] = "Content-Type: application/json";
			
		if($header){
			foreach($header as $h){
				$headers[] = $h;
			}
		}
			
		$curl = curl_init($this->server."/".$url);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
		
		if($this->auth == "basic"){
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_USERPWD, $this->username . ':' . $this->password);
		}
		
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_TIMEOUT, 30);
		if($type == "POST" || $type == "DELETE"){
			curl_setopt($curl, CURLOPT_POST, 1);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
		}
			
		if($type == "PUT"){
			curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
			curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
		}
			
		if($type == "DELETE"){
			curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
		}
			
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$return = curl_exec($curl);
		curl_close($curl);
		return $return;
	}
}

