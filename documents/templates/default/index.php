<div class="page-header">
	<h1>API Documentation & Sample</h1>
</div>
    
<div class="col-sm-12">
   	<?php
	//	IMPORTANT - LOAD ALL THE CLASSES
	foreach (glob('templates/apis/*') as $path) {
		$foldername = basename(str_replace(".php", "", $path));
		if($foldername){
			?>
    <div class="col-sm-6">
 		<h3><?php echo ucwords(str_replace("_", " ", $foldername));?></h3>
   	 	<ul style="list-style:none">
   			<?php
			foreach (glob('templates/apis/'.$foldername.'/*.php') as $file) {
				$filename = basename(str_replace(".php", "", $file));
				?>
   			<li>     
        		<a href="index.php?category=<?php echo $foldername;?>&docs=<?php echo $filename;?>" target="_blank">
					<?php echo ucwords(str_replace("_", " ", $filename));?>
           		</a>
        	</li>	
				<?php
			}
			?>
   		</ul>   
  	</div>      
            <?php
		}
	}	
	?>	
	</ul>
</div>
