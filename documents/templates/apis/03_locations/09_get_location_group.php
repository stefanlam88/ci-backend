
<?php

$URL = $APIURL."api/locations/group";
$method = "GET";
$json = json_encode(array());
$response = call($URL, $json, $method);

$required[] = array(
	'p' => "-",
	't' => "-",
	'd' => "no required param (auto complete function)"
);

?>
