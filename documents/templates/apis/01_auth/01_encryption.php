<?php
$json = array();
$URL = $APIURL."api/auth/encryption/123456";
$method = "GET";
$json = json_encode($json);
$response = call($URL, $json, $method);

$required = array();

$required[] = array(
	'p' => $APIURL."api/auth/encryption/<strong>[encryptionKey]</strong>",
	't' => 'varchar(20)',
	'd' => "<strong>[encryptionKey]</strong> Encryption key required for API url"
);
?>
