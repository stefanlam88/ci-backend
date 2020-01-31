<?php
$json = array(
	"ids" => array(5,6)
);

$URL = $APIURL."api/packages/images/bulk_delete";
$method = "POST";
$json = json_encode($json);
$response = call($URL, $json, $method);


$required[] = array(
	'p' => "[ids:[5,6]]",
	't' => 'int(11)',
	'd' => "<strong>[ids]</strong>  required for API POST"
);
?>
