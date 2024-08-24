<!-- resources/views/author/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Edit Author</title>
</head>
<body>
    <?php echo $__env->make('components.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container col-md-6 mt-5">
        <h1 class="mb-4">Edit Author</h1>

        <!-- Menampilkan Pesan Sukses atau Error -->
        <?php echo $__env->make('components.session', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php if($author): ?>
        <form action="<?php echo e(route('author.update', $author->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="mb-3">
                <label for="name" class="form-label">Nama Author:</label>
                <input class="form-control mb-3" name="name" type="text" value="<?php echo e($author->name); ?>" aria-label="Nama Author">
                <label for="address" class="form-label">Alamat:</label>
                <textarea class="form-control mb-3" name="address" aria-label="Address"><?php echo e($author->address); ?></textarea>
                <label for="phone" class="form-label">Nomor Telepon:</label>
                <input class="form-control mb-3" name="phone" type="text" value="<?php echo e($author->phone); ?>" aria-label="Nomor Telepon">
            </div>
            <button class="btn btn-success mb-4" type="submit">Update</button>
            <a class="btn btn-secondary mb-4" href="<?php echo e(route('author.index')); ?>">Kembali</a>
        </form>
        <?php else: ?>
        <p>Author not found.</p>
        <?php endif; ?>
    </div>
    <?php echo $__env->make('components.dependencies', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH /Users/juhn/Herd/LaravelPerpus/resources/views/author/edit.blade.php ENDPATH**/ ?>