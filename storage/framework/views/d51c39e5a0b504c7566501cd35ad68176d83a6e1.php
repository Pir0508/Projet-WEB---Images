<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2"  style="margin-top:5em;">
                <?php if(count($users) > 0): ?>
                    <table class="table table-bordered">
                        <tr>
                            <th>#</th>
                            <th><?php echo e(__('message.name')); ?></th>
                            <th><?php echo e(__('message.email')); ?></th>
                            <th><?php echo e(__('message.actions')); ?></th>
                        </tr>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($user->id); ?></td>
                                <td><?php echo e($user->name); ?></td>
                                <td><?php echo e($user->email); ?></td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="<?php echo e(route('user.show', $user)); ?>"><?php echo e(__('message.see')); ?></a></li>
                                            <li><a href="<?php echo e(route('user.edit', $user)); ?>"><?php echo e(__('message.modify')); ?></a></li>
                                            <li>
                                                <a href="<?php echo e(route('user.destroy', $user)); ?>"
                                                   onclick="event.preventDefault();
                                                     document.getElementById('delete-form-<?php echo e($user->id); ?>').submit();">
                                                    <?php echo e(__('message.delete')); ?>

                                                </a>

                                                <form id="delete-form-<?php echo e($user->id); ?>" action="<?php echo e(route('user.destroy', $user)); ?>" method="POST" style="display: none;">
                                                    <?php echo e(csrf_field()); ?>

                                                    <input type="hidden" name="_method" value="DELETE">
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                <?php else: ?>
                    <p><?php echo e(__('message.errorUser')); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>