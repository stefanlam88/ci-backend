<?php

$URL = $APIURL."api/location/129/country/2307";
$method = "GET";
$json = json_encode(array());
$response = call($URL, $json, $method);

$required[] = array(
	'p' => $APIURL."api/location/<strong>[country_id]</strong>/country/<strong>[state_id]</strong>",
	't' => 'int(11)',
	'd' => "<strong>[country_id]</strong>  <strong>[state_id]</strong>  required for API url"
);
?>
