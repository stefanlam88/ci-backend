<?php
$json = array(
	"user_id" => 2,
  "package_id" => 23
);

$URL = $APIURL."api/packages/images";
$method = "POST";
$json = json_encode($json);
//$response = call($URL, $json, $method);
$response = array();
?>
<div class="page-header">
 	<h1><?php echo ucwords(str_replace("_", " ", $_REQUEST['docs']));?> Form</h1>
</div>

<form action="<?php echo $URL;?>" method="post" enctype="multipart/form-data" class="form-horizontal">
  <input type="hidden" name="user_id" value="2"></input>
  <input type="hidden" name="package_id" value="23"></input>
	<div class="form-group">
		<div class="col-sm-6">
    		<input type="file" name="file[]" class="form-control"/>
        </div>

    </div>
    <div class="form-group">
		<div class="col-sm-6">
    		<input type="file" name="file[]" class="form-control"/>
        </div>

    </div>
    <input type="submit" value="Upload" class="btn btn-sm btn-primary" />
</form>

<?php
$required[] = array(
	'p' => 'user_id',
	't' => 'varchar(32)',
	'd' => "<strong>user_id</strong>  required for API POST"
);

$required[] = array(
	'p' => 'package_id',
	't' => 'varchar(32)',
	'd' => "<strong>package_id</strong>  required for API POST"
);

$required[] = array(
	'p' => 'file[]',
	'd' => "<strong>file[]</strong>  required for API POST"
);

?>
