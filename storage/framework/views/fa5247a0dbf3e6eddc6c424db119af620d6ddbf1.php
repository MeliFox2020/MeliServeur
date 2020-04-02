<footer class="app-footer">
    <div class="site-footer-right">
        <?php if(rand(1,100) == 100): ?>
            <i class="voyager-rum-1"></i> <?php echo e(__('voyager::theme.footer_copyright2')); ?>

        <?php else: ?>
            <?php echo __('voyager::theme.footer_copyright'); ?> <a href="http://thecontrolgroup.com" target="_blank">The Control Group</a>
        <?php endif; ?>
        <?php $version = Voyager::getVersion(); ?>
        <?php if(!empty($version)): ?>
            - <?php echo e($version); ?>

        <?php endif; ?>
    </div>
</footer>
<?php /**PATH /home/jeremy/Documents/2020-melifox/src/meliserveur-master/vendor/tcg/voyager/src/../resources/views/partials/app-footer.blade.php ENDPATH**/ ?>