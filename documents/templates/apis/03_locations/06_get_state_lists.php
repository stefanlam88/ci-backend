<?php

$URL = $APIURL."api/location/129/state";
$method = "GET";
$json = json_encode(array());
$response = call($URL, $json, $method);

$required[] = array(
	'p' => $APIURL."api/location/<strong>[country_id]</strong>/state",
	't' => 'int(11)',
	'd' => "<strong>[country_id]</strong>   required for API url"
);
?>
