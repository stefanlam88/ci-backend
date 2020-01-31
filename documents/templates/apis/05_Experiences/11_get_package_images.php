<?php

$URL = $APIURL."api/packages/images/23";
$method = "GET";
$json = json_encode(array());
$response = call($URL, $json, $method);

$required[] = array(
	'p' => $APIURL."api/packages/images/<strong>[package_id]</strong>",
	't' => 'int(11)',
	'd' => "<strong>[package_id]</strong>  required for API url"
);
?>
