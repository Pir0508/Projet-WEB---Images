<?php $__env->startSection('style'); ?>
  #passwd {
      position: relative;
  }

  #passwd input[type="password"] {
      padding-right: 30px;
  }

  #passwd .glyphicon {
      right: 30px;
      position: absolute;
      top: 10px;
  }

  #repasswd {
      position: relative;
  }

  #repasswd input[type="password"] {
      padding-right: 30px;
  }

  #repasswd .glyphicon {
      right: 30px;
      position: absolute;
      top: 10px;
  }
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo e(__('message.signin')); ?></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('register')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <label for="name" class="col-md-4 control-label"><?php echo e(__('message.name')); ?></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" required autofocus>

                                <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label"><?php echo e(__('message.email')); ?></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required>

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>" id="passwd">
                            <label for="password" class="col-md-4 control-label"><?php echo e(__('message.password')); ?></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                                <span onmouseover="showPassword('password');" onmouseout="hidePassword('password');" class="glyphicon glyphicon-eye-open"></span>

                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group" id="repasswd">
                            <label for="password-confirm" class="col-md-4 control-label"><?php echo e(__('message.repassword')); ?></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                <span onmouseover="showPassword('password-confirm');" onmouseout="hidePassword('password-confirm');" class="glyphicon glyphicon-eye-open"></span>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <?php echo e(__('message.signin')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<script type="text/javascript">
  function showPassword(id){
    var input = document.querySelector('#'+id).type = "text";
  }

  function hidePassword(id){
    var input = document.querySelector('#'+id).type = "password";
  }
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>