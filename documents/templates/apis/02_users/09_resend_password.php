<?php
//Encrypt Password
$json = array();
$URL = $APIURL."api/user/1/password/resend";
$method = "POST";
$json = json_encode($json);
$response = call($URL, $json, $method);

$required[] = array(
	'p' => $APIURL."api/user/<strong>[user_id]</strong>/password/resend",
	't' => 'int(11)',
	'd' => "<strong>[user_id]</strong>  required for API url"
);
?>
