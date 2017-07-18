<?php $__env->startSection('title'); ?>
  Index | MyWebSite
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
  .pictures{
    max-width : 200px;
  }

  #profil_picture{
    max-height : 100px;
  }

  .info{
    position:fixed;
    margin-top:-15em;
  }

  .pict{
    position:absolute;
    left:30em;
    margin-top:-15em;
  }
#myModal_profile{
  z-index:9999;
  position:fixed;
}

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(Auth::check()): ?>
      <div class="container">
        <div class="row">
        <div class="col-md-3 info">
            <div class="panel panel-default">
          <div class="panel-body">
          <?php if($user->profil_picture==""): ?>
              <img src="/img/default.jpg" alt="profil Picture" class="profil_picture" data-toggle="modal" data-target="#myModal_profile" id="profil_picture" />
          <?php else: ?>
              <img src="/img/avatar/<?php echo e($user->profil_picture); ?>" alt="profil_picture" class="profil_picture" data-toggle="modal" data-target="#myModal_profile" id="profil_picture" />
          <?php endif; ?>



          <div>
            <?php echo e(__('message.name')); ?> : <?php echo e($user->name); ?>

          </div>
          <div>
            <?php echo e(__('message.email')); ?> : <?php echo e($user->email); ?>

          </div>
          </div>
        </div>
      </div>

      <div class="col-md-8 pict">
        <div class="panel panel-default">
          <div class="panel-body">
            <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col-xs-3">
                <a href="#" class="thumbnail">
                  <img src="/img/<?php echo e($element->user_id); ?>/<?php echo e($element->nom); ?>" alt="img" class="pictures" data-toggle="modal" data-target="#myModal_<?php echo e($element->user_id); ?>_<?php echo e($element->fullname); ?>" id="picture_<?php echo e($element->user_id); ?>_<?php echo e($element->nom); ?>"/>
                </a>
              </div>
              <div id="myModal_<?php echo e($element->user_id); ?>_<?php echo e($element->fullname); ?>"  class="modal fade">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title"><?php echo e($element->fullname); ?></h4>
                          </div>
                          <div class="modal-body">
                            <img src="img/<?php echo e($element->user_id); ?>/<?php echo e($element->nom); ?>" alt="img" class="pictures" id="picture_<?php echo e($element->user_id); ?>_<?php echo e($element->nom); ?>"/>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo e(__('message.close')); ?></button>
                              <a href="<?php echo e(route('image.destroy', $element)); ?>" onclick="event.preventDefault(); document.getElementById('delete-form_<?php echo e($element->user_id); ?>_<?php echo e($element->fullname); ?>').submit();">
                                <button type="button" class="btn btn-primary"><?php echo e(__('message.delete')); ?></button>
                              </a>
                              <form id="delete-form_<?php echo e($element->user_id); ?>_<?php echo e($element->fullname); ?>" action="<?php echo e(route('image.destroy', $element)); ?>" method="POST" style="display: none;">
                                  <?php echo e(csrf_field()); ?>

                                  <input type="hidden" name="_method" value="DELETE">
                              </form>
                        </div>
                    </div>
                </div>
              </div>




      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
    </div>
</div>
</div>

<div id="myModal_profile"  class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><?php echo e(__('message.profilePicture')); ?></h4>
            </div>
            <div class="modal-body">
              <form action="<?php echo e(route('user.update', $user)); ?>" method="post" enctype="multipart/form-data">
                  <?php echo e(csrf_field()); ?>

                  <input type="hidden" name="_method" value="put">
                  <div class="form-group">
                      <label for="image"><?php echo e(__('message.chooseFile')); ?></label>
                      <input type="file" class="form-control" id="profil_picture" name="profil_picture">
                  </div>
                  <button type="submit" class="btn btn-default"><?php echo e(__('message.save')); ?></button>
              </form>
            </div>
      </div>
  </div>
</div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript">
  function filter(params){
    $.ajax({
          type: "POST",
          url: 'ImageController@Show',
          data: {"id" : params},
          success: function(response) {
              alert(response);
          }
          error:function(){
            alert('nok');
          }
          always:function(){
            alert('always');
          }
      })
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>