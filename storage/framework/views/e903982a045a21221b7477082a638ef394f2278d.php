<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
 
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css.master.css">  
    <title><?php echo $__env->yieldContent('titre'); ?></title>
    </head>
    <?php echo $__env->make('/layout/partials/_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <body>
        <body style="background-color:#f2b505;">
            <div class="flex-center position-ref full-height"></div>
            <div class="contenu">
                <div class="title m-b-md">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>

    </body>
    <footer class="main-footer" style="max-height: 10%;text-align: center">
        <strong>Copyright © 2020 <a href=http://lyceekastler.fr>Lycée Alfred Kastler 33400 Talence</a>.</strong> All rights reserved.
    </footer>

</html><?php /**PATH /home/jeremy/Documents/2020-melifox/src/meliserveur-master/resources/views/layout/master.blade.php ENDPATH**/ ?>