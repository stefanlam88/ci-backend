<?php
$_REQUEST['category'] = empty($_REQUEST['category']) ? "default" : $_REQUEST['category'];
$_REQUEST['docs'] = empty($_REQUEST['docs']) ? "index" : $_REQUEST['docs'];


if($_REQUEST['category'] == "default"){
	$path = "templates/default/".$_REQUEST['docs'].".php";
}else{
	$path = "templates/apis/".$_REQUEST['category']."/".$_REQUEST['docs'].".php";
}

if (file_exists($path)) {
	require_once($path);

	if($_REQUEST['docs'] != "index"){
		$required = empty($required) ? array() : $required;
	?>
<script type="text/javascript">
// wait for document ready
$(document).ready(function() {
	$('#Request').JSONView('<?php echo $json;?>');
 	$('#Response').JSONView('<?php echo json_encode($response);?>');
});
</script>

<div class="page-header">
 	<h1><?php echo ucwords(str_replace("_", " ", $_REQUEST['docs']));?></h1>
</div>

<div class="panel-group">
	<!-- API Endpoint  -->
	<div class="panel panel-default">
    	<div class="panel-heading">
         	<h4 class="panel-title">API Endpoint / URL</h4>
     	</div>
       	<div class="panel-body"><?php echo $URL;?> </div>
   	</div>
    <!-- API Endpoint  -->
    <!-- API Method  -->
	<div class="panel panel-default">
    	<div class="panel-heading">
         	<h4 class="panel-title">Method</h4>
     	</div>
       	<div class="panel-body"><?php echo $method;?></div>
   	</div>
    <!-- API Method  -->
    <!-- API Request  -->
	<div class="panel panel-default">
    	<div class="panel-heading">
         	<h4 class="panel-title">Request</h4>
     	</div>
       	<div id="Request" class="panel-body"></div>
   	</div>
    <!-- API Request  -->
    <!-- Response -->
    <div class="panel panel-default">
    	<div class="panel-heading">
         	<h4 class="panel-title">Response</h4>
     	</div>
       	<div id="Response" class="panel-body"></div>
  	</div>
	<!-- Response -->

    <!-- Required -->
    <?php
	if($required){
		?>
    <div class="panel panel-default">
    	<div class="panel-heading">
         	<h4 class="panel-title">Require Fields</h4>
     	</div>
       	<div class="panel-body">
        	<table class="table table-bordered">
            	<tr>
                	<th width="150">Parameters</th>
                    <th width="100">Data Type</th>
                    <th>Description</th>
                </tr>
                <?php
				foreach($required as $req){
					?>
               	<tr>
                	<td><?php echo $req['p'];?></td>
                    <td><?php echo $req['t'];?></td>
                    <td><?php echo $req['d'];?></td>
                </tr>
                    <?php
				}
				?>
            </table>

        </div>
  	</div>
    	<?php
	}
	?>
	<!-- Required -->
</div>
	<?php
	}

}else{
	echo "No api found.";
}
?>
