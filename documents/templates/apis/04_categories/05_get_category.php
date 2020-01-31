<?php

$URL = $APIURL."api/categories/2";
$method = "GET";
$json = json_encode(array());
$response = call($URL, $json, $method);

$required[] = array(
	'p' => $APIURL."api/categories/<strong>[event_type_sub_id]</strong>",
	't' => 'int(11)',
	'd' => "<strong>[event_type_sub_id]</strong>  required for API url"
);
?>
