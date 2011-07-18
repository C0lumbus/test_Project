<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Oleg P.
 * Date: 15.07.11
 * Time: 14:52
 */
define ('DS', DIRECTORY_SEPARATOR);
$sitePath = realpath(dirname(__FILE__) . DS) . DS;
define ('sitePath', $sitePath);

// includes, can be replaced with spl_autoload function
// @TODO add spl_autoload function

include sitePath . 'model' . DS . 'Tree.php'; // Tree model
include sitePath . 'model' . DS . 'Element.php'; // Element model
include sitePath . 'view' . DS . 'View.php'; // main View class
include sitePath . 'controller' . DS . 'Controller.php'; // main Controller class
include sitePath . 'includes' . DS . 'request.php'; // view for block with elements tree


$controller = new Controller();
$controller->getPage();
?>