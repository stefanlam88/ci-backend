<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Return class
 * Extend Function for Rest_Controller library
**/
class Rest_return {

	public function __construct(){
        // Get the CodeIgniter reference
        $this->_CI =& get_instance();
	}

	/*********************************************************************************************************
		Column Alias Rearrange
	*********************************************************************************************************/
	public function alias($columns){
		$array = array();
		if($columns){
			foreach($columns as $alias => $column){
				$array[] = $column." AS ".$alias;
			}
		}
		return $array;
	}


	/*********************************************************************************************************
		Return Format
	*********************************************************************************************************/
	public function response($status, $code = "", $message = "", $data = ""){
		if($status == true){
			$response['status'] = true;
			$response['message'] = $message;
			if(!empty($data)){
				$response['data'] = $data;
			}
		}else if($status == false){
			$response['status'] = false;
			$error = $this->errorCode($code);
			$response['message'] = $error['message']." ".$message;
			$response['errorCode'] = $error['code'];
		}

		return $response;
	}

	/*********************************************************************************************************
		Error Code
	*********************************************************************************************************/
	private function errorCode($code = "10000"){
		$return['code'] = $code;
		switch($code){
			case "10000": //Multiple Parameter missing.
				$return['message'] = "Required Parameter Missing : Unable to identify parameter.";
				break;
			case "10001": //Single Parameter missing.
				$return['message'] = "A Parameter is Invalid : Unable to identify parameter.";
				break;
			case "10002": //Repeated Action.
				$return['message'] = "Repeated action. Please try again.";
				break;
			case "10003": //Invalid Email Format
				$return['message'] = "Invalid email address format.";
				break;
			case "20000": //Invalid credential.
				$return['message'] = "Invalid credential.";
				break;
			case "20001": //Account Exist.
				$return['message'] = "Account exists";
				break;
			case "20002": //Password not match.
				$return['message'] = "Password does not match.";
				break;
			case "20003": //Email Exist.
				$return['message'] = "Email exists";
				break;
			case "20004": //Wrong password.
				$return['message'] = "Wrong password.";
				break;
			case "20005": //Wrong password or email.
				$return['message'] = "Wrong password or email address.";
				break;
			case "20006": //Request already sent.
				$return['message'] = "Request already sent.";
				break;
			case "20007": //Request already sent.
					$return['message'] = "Verification link is expired. Kindly request a new verification link again.";
					break;
			case "20008": //Request already sent.
					$return['message'] = "Email Address not exists.";
					break;
			case "20009": //Request already sent.
					$return['message'] = "Invalid activation link. Please request again.";
					break;
			case "30000":
				$return['message'] = "Upload error found : ";
				break;
			case "30001":
				$return['message'] = "Partial files upload error found : ";
				break;
			case "30002":
				$return['message'] = "All files upload error found : ";
				break;
			case "40000":
				$return['message'] = "No data found.";
				break;
			case "40001":
				$return['message'] = "Action failed.";
				break;
			case "50001":
				$return['message'] = "Location already exists.";
				break;
			case "60001":
					$return['message'] = "Category already exists.";
					break;
			case "70001":
					$return['message'] = "Experience already exists.";
					break;
			case "70002":
					$return['message'] = "Experience approve and reject must be either Y or N.";
					break;
			case "70003":
					$return['message'] = "Experience has already been added as favourite.";
					break;
			case "80001":
						$return['message'] = "Trip name already exists.";
					break;
			case "80002":
						$return['message'] = "Trip Id not exists.";
					break;
			case "80003":
						$return['message'] = "Trip event date exists.";
					break;
			case "80004":
						$return['message'] = "Trip event id not exists.";
					break;


		}
		return $return;
	}
}
