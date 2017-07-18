<?php $__env->startSection('title'); ?>
  Index | MyWebSite
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
#allpictures{
  position:relative;
}
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(Auth::check()): ?>
      <div class="container" id="allpictures">
        <div class="btn-group">
          <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo e(__('message.filter')); ?> <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
              <li><a href="<?php echo e(route('image.index', array('filtre'=>'asc'))); ?>"><?php echo e(__('message.dateAsc')); ?></a></li>
              <li><a href="<?php echo e(route('image.index', array('filtre'=>'desc'))); ?>"><?php echo e(__('message.dateDesc')); ?></a></li>
              <li><a href="<?php echo e(route('image.index', array('filtre'=>'nom'))); ?>"><?php echo e(__('message.name')); ?></a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-xs-3">
              <a href="#" class="thumbnail">
                <img src="/img/<?php echo e($element->user_id); ?>/<?php echo e($element->nom); ?>" alt="img" class="pictures" id="picture_<?php echo e($element->user_id); ?>_<?php echo e($element->nom); ?>"/>
              </a>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript">
  function filter(params){
    alert('debut');
    $.ajax({
      type: "POST",
      url: '/filterImg',
      data: { id: params }
    })
    .done(function( response ) {
      alert( 'ok' );
    });
    .error(function(){
      alert("nok");
    });
    .always(function(){
      alert("always");
    });
  }

  function test(params){

  }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>