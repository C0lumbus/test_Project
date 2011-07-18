<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Oleg P.
 * Date: 16.07.11
 * Time: 23:09
 */

class TreeModel {
	public $items, $newItems = Array(), $counter = 0;

	function __construct() {
		$password = 'qazwsxedc';
		$user = 'root';
		$server = 'localhost';
		$database = 'stuzo_test';
		mysql_connect($server, $user, $password);
		mysql_select_db($database);
	}
	/**
	 * @return bool
	 */
	function getTree() {

		$query = "SELECT * FROM items;";

		$result = mysql_query($query);
		$items = Array();
		while($row = mysql_fetch_array($result)) {
			$id = $row['id'];
			$parent_id = $row['parent_id'];
			$name = $row['name'];
			$items[$parent_id][$id] = $name;
		}

		$this->items = $items;
		$level = 0;

		$this->getChild(0, $level);

		return true;
	}

	/**
	 * @param $parentId
	 * @param $level
	 * @return bool
	 */
	function getChild($parentId, $level) {
		if($this->hasChild($parentId)) {
			if($parentId != 0) {
				$level++;
			}

			//get child
			foreach($this->items[$parentId] as $childKey => $value) {
				$this->newItems[$this->counter]['level'] = $level;
				$this->newItems[$this->counter]['name'] = $value;
				$this->newItems[$this->counter]['id'] = $childKey;
				$this->newItems[$this->counter]['parent_id'] = $parentId;
				$this->newItems[$this->counter]['has_child'] = 1;
				$this->counter++;
				$this->getChild($childKey, $level);
			}
			$this->newItems[$this->counter - 1]['last'] = 1; // last li element in set <ul><li>
			return true;
		}
		else { // no child
			$this->newItems[$this->counter - 1]['has_child'] = 0;
			return false;
		}
	}

	/**
	 * @param $parentId
	 * @return bool
	 */
	function hasChild($parentId) {
		if(isset($this->items[$parentId])) {
			return true;
		}
		else {
			return false;
		}
	}
}