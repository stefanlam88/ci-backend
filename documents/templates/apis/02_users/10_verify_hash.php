<?php
//Encrypt Password
$json = array(
  'hash'=>'xxxxxx'
);
$URL = $APIURL."api/user/verify/hash";
$method = "POST";
$json = json_encode($json);
$response = call($URL, $json, $method);

$required[] = array(
	'p' => "hash",
	't' => 'varchar(50)',
	'd' => "<strong>hash</strong>  required for API POST"
);
?>
