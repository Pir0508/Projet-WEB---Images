<!doctype html>
<html lang="<?php echo e(config('app.locale')); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo $__env->yieldContent('title'); ?></title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="css\style.css" rel="stylesheet" type"text/css" />
        <link href="css\font-awesome.min.css" rel="stylesheet">
        <!-- Styles -->
        <style>

            <?php echo $__env->yieldContent('style'); ?>

            .flag{
              max-width: 20px;
            }

            .flagListe{
              width: 20px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
                <nav class="navbar navbar-default navbar-fixed-top">
                  <div class="container">
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand" href="#"><?php echo e(__('message.title')); ?></a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                      <ul class="nav navbar-nav">
                        <?php if(Auth::check()): ?>
                          <li><a href="<?php echo e(url('/home')); ?>"><span class="glyphicon glyphicon-home">&nbsp;</span><?php echo e(__('message.home')); ?></a></li>
                          <li><a href="<?php echo e(route('image.create')); ?>"><span class="glyphicon glyphicon-plus">&nbsp;</span><?php echo e(__('message.addPicture')); ?></a></li>
                          <li><a href="<?php echo e(route('image.index')); ?>"><span class="glyphicon glyphicon-globe">&nbsp;</span><?php echo e(__('message.seePicture')); ?></a></li>
                        <?php if(Auth::user()->admin == 1): ?>
                          <li><a href="<?php echo e(route('user.create')); ?>"><span class="glyphicon glyphicon-user">&nbsp;</span><?php echo e(__('message.addUser')); ?></a></li>
                          <li><a href="<?php echo e(route('user.show', auth()->user()->id)); ?>"><span class="glyphicon glyphicon-pencil">&nbsp;</span><?php echo e(__('message.modifUser')); ?></a></li>
                        <?php endif; ?>
                          <li><a href="<?php echo e(route('user.edit', auth()->user()->id)); ?>"><span class="glyphicon glyphicon-cog">&nbsp;</span><?php echo e(__('message.manageAccount')); ?></a></li>
                        <?php else: ?>
                          <li><a href="<?php echo e(url('/login')); ?>"><span class="glyphicon glyphicon-log-in">&nbsp;</span><?php echo e(__('message.connexion')); ?></a></li>
                          <li><a href="<?php echo e(url('/register')); ?>"><span class="glyphicon glyphicon-save">&nbsp;</span><?php echo e(__('message.signin')); ?></a></li>
                        <?php endif; ?>
                      </ul>
                      <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <?php echo e(__('message.lang')); ?> <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu flagListe">
                          <?php $__currentLoopData = Config::get('languages'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <?php if($lang != App::getLocale()): ?>
                                 <li>
                                     <a href="<?php echo e(route('lang.switch', $lang)); ?>"><?php echo e($language); ?></a>
                                 </li>
                             <?php endif; ?>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                      </div>
                    </div>
                  </div>
                </nav>
            <div class="content">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </body>

    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <script src="jquery-3.2.1.min.js"></script>
    <script type="text/javascript">
      function changeLang(lang){

      }
    </script>
    <?php echo $__env->yieldContent('script'); ?>

</html>
