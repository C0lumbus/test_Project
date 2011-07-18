<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Oleg P.
 * Date: 16.07.11
 * Time: 23:10
 * To change this template use File | Settings | File Templates.
 */
?>
<h1>Elements tree</h1>
<?php
function buildTree($items, $parent = 0) {
	$elementId = '';
	if($parent == 0) { // add class and id to parent <ul>
		$elementId = ' id="navigation" class="treeview-red"';
	}
	$output = "<ul$elementId>\n";
	foreach ($items as $item)
	{
		$hasChild	= $item['has_child'];
		$id 		= $item['id'];
		$parent_id	= $item['parent_id'];
		$name		= $item['name'];
		if ($parent_id == $parent){
			$output .= "	<li><a href='?item=$id'>$name</a></span>"; // link for navigation
			if ($hasChild) {
				$output .= buildTree($items, $id); // get children by recursive call of function
			}
			$output .= "</li>\n";
		}
	}
	$output.= "</ul>\n";
	return $output;
}
echo buildTree($newItems);