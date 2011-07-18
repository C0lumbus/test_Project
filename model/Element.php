<?php
/**
 * Created by Oleg P.
 * User: Oleg P.
 * Date: 18.07.11
 * Time: 17:23
 * To change this template use File | Settings | File Templates.
 */
 
class ElementModel {
	private $elements, $element, $elementID;
	function __construct($elements, $elementID) {
		$this->elements = $elements;
		$this->elementID = $elementID;
		return true;
	}

	/**
	 * get one element from elements array
	 *
	 * @return bool|array
	 */
	function getElement() {
		foreach($this->elements as $element) {
			if($element['id'] == $this->elementID) {
				return $element;
			}
		}

		return false;
	}
}