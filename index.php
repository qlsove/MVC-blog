<!DOCTYPE html>
<html>
   <head>
		<meta charset="utf-8"/>
		<title>Your Personal Blog</title>
		<script type="text/javascript" src="js/ckeditor/ckeditor.js"></script>
		<link rel="stylesheet" type="text/css" href="css/style.css">
   </head>
   <body>
		<div class="wrapper">
			<?php 
			//error_reporting(0); 
			require_once("app/controllers/controller.php");
			require_once("app/model/model.php");
			$blog=new Controller;
			$result=$blog->header();?>
			<div class="content">
				<?php 
				$blog->main();?>
			</div>
		</div>
	</body>
</html>