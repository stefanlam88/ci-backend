<?php
//Create package
$json = array(
  "trip_id" => 23,
  "trip_event_type" => "2",
  "trip_event_title" => "This is my event title",
  "trip_event_time" => "12:00:00",
  "trip_event_date" => "2018-12-04",
  "trip_event_duration" => "4",
  "trip_event_booked_through" => "Expedia",
  "trip_event_confirmation" => "4",
  "trip_event_order_number" => "MMXX123",
  "trip_event_carrier" => "",
  "trip_event_terminal" => "1",
  "trip_event_gate" => "1",
  "trip_event_provider" => "",
  "trip_event_price" => 199.05,
  "trip_event_currency" => "MYR",
  "trip_event_status" => "active",
  "trip_event_notes" => "My trip note"

);

$URL = $APIURL."api/trip/1/itinerary";
$method = "PUT";
$json = json_encode($json);
$response = call($URL, $json, $method);

$required[] = array(
	'p' => 'trip_id',
	't' => 'int(11)',
	'd' => "<strong>trip_id</strong>  required for API PUT"
);
$required[] = array(
	'p' => $APIURL."api/trip/<strong>[trip_event_id]</strong>/itinerary",
	't' => 'int(11)',
	'd' => "<strong>[trip_event_id]</strong>  required for API PUT, Get Itinerary details"
);

?>
