<?
$APIURL = "http://".$_SERVER['SERVER_NAME']."/locahost/locahost-api/";

require_once("templates/inc-header.php");
require_once("templates/inc-container.php");
require_once("templates/inc-footer.php");



function call($url, $json = array(), $type = "POST", $header = array()){
	$username = "admin";
	$password = "1234";
	$headers = array();
	$headers[] = "Content-Type: application/json";

	if($header){
		foreach($header as $h){
			$headers[] = $h;
		}
	}

   	$curl = curl_init($url);
  	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	curl_setopt($curl, CURLOPT_USERPWD, $username . ':' . $password);
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
  	return json_decode($return, true);
}
?>
