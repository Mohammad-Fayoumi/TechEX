<?php $__env->startSection('title'); ?>
	Post
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<h1>ID:  <?php echo e($id); ?></h1>
	<h1>Name: <?php echo e($name); ?></h1>
	<h1>E-mail: <?php echo e($email); ?></h1>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>