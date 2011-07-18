<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Oleg P.
 * Date: 16.07.11
 * Time: 23:11
 */
 
class Controller {
	private $itemID = '', $elements, $element;
	function __construct() {
		$item = Request::getVar('item', '');
		$this->itemID = $item;
		return true;
	}

	/**
	 * get tree of elements
	 *
	 * @return bool
	 */
	function getTree() {
		$model = new TreeModel();
		$model->getTree();

		$newItems = $model->newItems;

		$this->elements = $newItems;
		$view = View::getInstance();


		$view->template = 'treeElements';
		$view->newItems = $newItems;
		$view->loadTemplate();


		$data = $view->output;
		$view->leftBlock = $data;

		return true;
	}

	/**
	 * get selected element for View
	 * 
	 * @return bool
	 */
	function getElement() {
		$view = View::getInstance();
		$view->template = 'element';

		$element = null;
		if($this->itemID) { // get element name if element is selected
			$model = new ElementModel($this->elements, $this->itemID);
			$element = $model->getElement();
		}

		$view->element = $element;
		$view->render();

		return true;
	}

	/**
	 * get all page
	 * @return bool
	 */
	function getPage() {
		$this->getTree();
		$this->getElement();

		$view = View::getInstance();
		$view->template = 'index'; // set main template
		$view->loadLayout();
		$view->displayBody();

		return true;
	}
}