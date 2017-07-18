<?php $__env->startSection('style'); ?>
  #passwd {
      position: relative;
  }

  #passwd input[type="password"] {
      padding-right: 30px;
  }

  #passwd .glyphicon {
      right: 10px;
      position: absolute;
      top: 35px;
  }
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-top:5em;">
            <form action="<?php echo e(route('user.update', $user)); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="_method" value="put">
                <div class="form-group">
                    <label for="name"><?php echo e(__('message.name')); ?></label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo e($user->name); ?>" required>
                </div>
                <div class="form-group">
                    <label for="email"><?php echo e(__('message.email')); ?></label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo e($user->email); ?>" required>
                </div>
                <div class="form-group" id="passwd">
                    <label for="password"><?php echo e(__('message.password')); ?></label>
                    <input type="password" class="form-control" id="password" name="password" required>
                    <span onmouseover="showPassword();" onmouseout="hidePassword();" class="glyphicon glyphicon-eye-open"></span>
                </div>
                <button type="submit" class="btn btn-default"><?php echo e(__('message.update')); ?></button>
            </form>

            <a href="<?php echo e(route('logout')); ?>"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                <button type="button" class="btn btn-danger"><?php echo e(__('message.disconnect')); ?></button>
            </a>

            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                <?php echo e(csrf_field()); ?>

            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<script type="text/javascript">
  function showPassword(){
    var input = document.querySelector('#password').type = "text";
  }

  function hidePassword(){
    var input = document.querySelector('#password').type = "password";
  }
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>