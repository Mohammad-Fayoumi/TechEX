<?php $__env->startSection('title'); ?>
	Post
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<?php /*<h1>ID:  <?php echo e($id); ?></h1>*/ ?>
	<?php /*<h1>Name: <?php echo e($name); ?></h1>*/ ?>
	<?php /*<h1>E-mail: <?php echo e($email); ?></h1>*/ ?>
	<?php foreach($posts as $post): ?>
        <h1><?php echo e($post->title); ?></h1>
        <div>
            <p><?php echo e($post->content); ?></p>
        </div>
    <?php endforeach; ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>