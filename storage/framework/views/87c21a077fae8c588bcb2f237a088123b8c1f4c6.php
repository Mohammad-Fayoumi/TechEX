<?php $__env->startSection('title'); ?>
	Contact
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<h1>Contact Page</h1>
	<?php if(count($peoples) > 0): ?>
		<ul>
			<?php foreach($peoples as $person): ?>
			<li><?php echo e($person); ?></li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('JS'); ?>
	<!-- <script type="text/javascript">alert('Welcome to contact page')</script> -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>