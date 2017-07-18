<?php $__env->startSection('style'); ?>

.firstbloc{
  border-bottom:2px solid #e7e7e7;
}


.black{
  color : grey;
  padding:1em;
}

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="row">
    <div class="firstbloc">
      <h1><?php echo e(__('message.title')); ?></h1>
      <h4><?php echo e(__('message.homeMessage')); ?></h4>
    </div>
    <div class="sociaux">
      <span class="lien">
        <a href="https://twitter.com/PiR05" target="_blank">
          <i class="fa fa-twitter fa-3x black"></i>
        </a>
      </span>
      <span class="lien">
        <a href="https://www.facebook.com/pierre.thiebert" target="_blank">
          <i class="fa fa-facebook-official fa-3x black"></i>
        </a>
      </span>
      <span class="lien">
        <a href="https://www.linkedin.com/in/pierre-thiebert-46a297b5" target="_blank">
          <i class="fa fa-linkedin fa-3x black"></i>
        </a>
      </span>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>