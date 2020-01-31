<?php
$json = array();

$URL = $APIURL."api/user/2";
$method = "DELETE";
$json = json_encode($json);
$response = call($URL, $json, $method);

$required = array();

$required[] = array(
	'p' => $APIURL."api/user/<strong>[user_id]</strong>",
	't' => 'int(11)',
	'd' => "<strong>[user_id]</strong>  required for API url"
);
?>
