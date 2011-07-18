<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Oleg P.
 *
 * Main template of site
 */
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="ru" dir="ltr" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title><?php echo $this->pageTitle; ?> </title>
	<link rel="stylesheet" href="css/jquery.treeview.css" />

	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/jquery.cookie.js" type="text/javascript"></script>
	<script src="js/jquery.treeview.js" type="text/javascript"></script>

	<script type="text/javascript" src="js/tree.js"></script>
</head>
<body>
<div style="float: left; width: 150px; border: 1px red dashed; padding: 5px">
	<?php echo $this->leftBlock; ?>
</div>
<div style="float: left; width: 870px; border: 1px black solid; padding: 5px">
	<?php echo $this->body; ?>
</div>
</body>
</html>