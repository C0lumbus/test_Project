<?php
/**
 * Created by Oleg P.
 * User: Oleg P.
 * Date: 18.07.11
 * Time: 17:13
 */
 
?>
<h1>Element <?php
	if($element) {
		echo $element['name'];
	}
	else {
		echo "not selected.";
	}
?></h1>