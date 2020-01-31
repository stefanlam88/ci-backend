<?php
$json = array(
	"ids" => array(1,2,3,4)
);

$URL = $APIURL."api/location/bulk_delete";
$method = "DELETE";
$json = json_encode($json);
$response = call($URL, $json, $method);

$required[] = array(
	'p' => "[ids:[1,2,3,4]]",
	't' => 'int(11)',
	'd' => "<strong>[ids]</strong>  required for API POST"
);
?>
