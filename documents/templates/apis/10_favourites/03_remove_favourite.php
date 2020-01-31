<?php
$json = array(
	"ids" => array(3)
);

$URL = $APIURL."api/favourites/delete";
$method = "POST";
$json = json_encode($json);
$response = call($URL, $json, $method);

$required[] = array(
	'p' => "[ids:[4]]",
	't' => 'int(11)',
	'd' => "<strong>[ids]</strong>  required for API POST" 
);
?>
