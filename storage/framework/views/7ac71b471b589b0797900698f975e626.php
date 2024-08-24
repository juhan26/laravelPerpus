<?php if(session('success')): ?>
<div class="alert alert-success d-flex align-items-center pr-3 p-2" role="alert">
    <svg class="bi flex-shrink-0 me-2 " width="24" height="24" role="img" aria-label="Success:">
        <use xlink:href="#check-circle-fill" />
    </svg>
    <div class="m-1">
        <?php echo e(session('success')); ?>

    </div>
</div>
<?php endif; ?>

<?php if(session('error')): ?>
<div class="alert alert-danger d-flex align-items-center pr-3 p-2" role="alert">
    <svg class="bi flex-shrink-0 me-2 " width="24" height="24" role="img" aria-label="Success:">
        <use xlink:href="#exclamation-triangle-fill" />
    </svg>
    <div class="m-1">
        <?php echo e(session('error')); ?>

    </div>
</div>
<?php endif; ?>

<?php if($errors->any()): ?>
<div class="alert alert-danger d-flex align-items-center p-2" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Error:">
        <use xlink:href="#exclamation-triangle-fill" />
    </svg>
   

        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p class="m-1"><?php echo e($error); ?></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


</div>
<?php endif; ?><?php /**PATH /Users/juhn/Herd/LaravelPerpus/resources/views/components/session.blade.php ENDPATH**/ ?>