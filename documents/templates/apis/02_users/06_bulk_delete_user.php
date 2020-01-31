<?php
$json = array(
	"ids" => array(2,3)
);

$URL = $APIURL."api/users/delete";
$method = "POST";
$json = json_encode($json);
$response = call($URL, $json, $method);

$required[] = array(
	'p' => "[ids:[2,3]]",
	't' => 'int(11)',
	'd' => "<strong>[ids]</strong>  required for API POST"
);
?>
