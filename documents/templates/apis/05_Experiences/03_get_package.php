<?php
$json = array();
$URL = $APIURL."api/packages/24";
$method = "GET";
$json = json_encode($json);
$data = call($URL, $json, $method);

$response = $data;

$required[] = array(
	'p' => $APIURL."api/packages/<strong>[package_id]</strong>",
	't' => 'int(11)',
	'd' => "<strong>[package_id]</strong>  required for API url"
);
?>
