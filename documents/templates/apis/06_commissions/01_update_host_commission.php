<?php
$json = array(
  "commission_percent" => 6,
  "flat_rate"=> 108.25,
  "commission_status" => "active",
  "commission_remark" => "This is remark for host view",
  "user_id" => 2,
  "max_unit_sell" => 20,
  "commission_type" => "flatRate"
);

$URL = $APIURL."api/commissions/3/host/2";
$method = "PUT";
$json = json_encode($json);
$response = call($URL, $json, $method);

$required[] = array(
	'p' => "commission_percent",
	't' => 'int(11)',
	'd' => "<strong>commission_percent</strong>  required for API POST"
);

$required[] = array(
	'p' => "flat_rate",
	't' => 'float(2 decimal places)',
	'd' => "<strong>flat_rate</strong>  required for API POST"
);

$required[] = array(
	'p' => "commission_status",
	't' => 'varchar(20)',
	'd' => "commission_status {active|inactive} (Optional)"
);

$required[] = array(
	'p' => "commission_remark",
	't' => 'int(11)',
	'd' => "<strong>commission_remark</strong>  required for API POST"
);

$required[] = array(
	'p' => "user_id",
	't' => 'int(11)',
	'd' => "<strong>user_id</strong>  required for API POST"
);

$required[] = array(
	'p' => "max_unit_sell",
	't' => 'int(11)',
	'd' => "<strong>max_unit_sell</strong>  required for API POST"
);

$required[] = array(
	'p' => "commission_type",
	't' => 'int(11)',
	'd' => "<strong>trip_id</strong>  required for API POST"
);


?>
