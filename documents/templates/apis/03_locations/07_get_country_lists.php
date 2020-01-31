<?php

$URL = $APIURL."api/locations/countries";
$method = "GET";
$json = json_encode(array());
$response = call($URL, $json, $method);

$required[] = array(
	'p' => "-",
	't' => '-',
	'd' => "no required param"
);
?>
