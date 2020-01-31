<?php
$json = array(
  "package_approval" => "Approved"
);

$URL = $APIURL."api/packages/23/approval";
$method = "PUT";
$response = call($URL, $json, $method);


$required[] = array(
	'p' => $APIURL."api/packages/<strong>[package_id]</strong>/approval",
	't' => 'varchar(256)',
	'd' => "<strong>[package_id]</strong>  required for API url"
);

$required[] = array(
	'p' => "package_approval",
	't' => 'varchar(20)',
	'd' => "<strong>package_approval</strong> {Pending|Approved|Rejected} required for API PUT"
);
?>
