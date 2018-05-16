<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
	<title>TeachEX-<?php echo $__env->yieldContent('title'); ?></title>
</head>
<body>
	<div class="container">

	 <?php /* <?php echo $__env->yieldContent; ?> it is a blade's engine function to display content in html  */ ?>

		<?php echo $__env->yieldContent('content'); ?>

	</div>

	<?php echo $__env->yieldContent('footer'); ?>
	<?php echo $__env->yieldContent('JS'); ?>

</body>
</html>