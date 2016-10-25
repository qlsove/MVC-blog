<?php
	require_once("app/controller/controller.php");
	require_once("app/model/model.php");
	$blog = new Controller();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Your Personal Blog</title>
		<script type="text/javascript" src="assets/js/ckeditor/ckeditor.js"></script>
		<link rel="icon" href="assets/img/favicon.ico" type="image/x-icon"/>
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	</head>
	<body>
		<?php $blog->main();?>
	</body>
</html>