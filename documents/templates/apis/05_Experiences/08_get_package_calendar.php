<?php

$URL = $APIURL."api/packages/calendar/23";
$method = "GET";
$json = json_encode(array());
$response = call($URL, $json, $method);

$required[] = array(
	'p' => $APIURL."api/packages/calendar/<strong>[package_id]</strong>",
	't' => 'int(11)',
	'd' => "<strong>[package_id]</strong>  required for API url"
);
?>
