<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Edit Publishers</title>
</head>
<body>
    <?php echo $__env->make('components.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container col-md-6 mt-5">
        <h1 class="mb-4">Edit Publishers</h1>
        <?php echo $__env->make('components.session', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


            
        <form action="<?php echo e(route('publisher.update', $publisher->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="mb-3">
                <label for="publisher_name" class="form-label">Edit Publisher:</label>
                <input class="form-control" name="publisher_name" type="text" value="<?php echo e($publisher->publisher_name); ?>" aria-label="Nama Publisher">
            </div>
            <button class="btn btn-success mb-4" type="submit">Update</button>
        </form>
     
    </div>
    <?php echo $__env->make('components.dependencies', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH /Users/juhn/Herd/LaravelPerpus/resources/views/Publisher/edit.blade.php ENDPATH**/ ?>