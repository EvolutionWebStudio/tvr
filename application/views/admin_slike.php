<?php echo "<ul>";
	$imgdir = 'images/clanci/';
	$totimg = count($params);  //The total count of all the images
	//Echo out the images and their paths incased in an li.
	for($x=0; $x < $totimg; $x++)
	{
		echo "<li><img src='".base_url().$imgdir . $params[$x] ."' width=100px; height=100px; /></li>"; echo $imgdir . $params[$x];
	}  
		echo "</ul>";  
	
?>