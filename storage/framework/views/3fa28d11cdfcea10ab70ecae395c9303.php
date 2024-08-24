<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Author</title>
</head>

<body>
    <?php echo $__env->make('components.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container col-md-6 mt-5">
        <h1 class="mb-4">Author</h1>

        <!-- Menampilkan Pesan Sukses atau Error -->
        <?php echo $__env->make('components.session', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <form action="<?php echo e(route('author.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label for="name" class="form-label">Tambah Author:</label>
                <input class="form-control mb-3" name="name" type="text" placeholder="Masukkan nama Author"
                    aria-label="Nama Author" value="<?php echo e(old('name')); ?>">
                <label for="address" class="form-label">Alamat:</label>
                <textarea class="form-control mb-3" name="address" type="text" placeholder="Masukkan Alamat"
                    aria-label="Address" value="<?php echo e(old('address')); ?>"></textarea>
                <label for="phone" class="form-label">Nomor Telepon:</label>
                <input class="form-control mb-3" name="phone" type="text" placeholder="Masukkan nomor telepon"
                    aria-label="phone" value="<?php echo e(old('phone')); ?>">
            </div>
            <button class="btn btn-success mb-4" type="submit">Submit</button>
        </form>

        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Penerbit</th>
                    <th>Alamat</th>
                    <th>Nomor Telepon</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($row['id']); ?></td>
                        <td><?php echo e($row['name']); ?></td>
                        <td><?php echo e($row['address']); ?></td>
                        <td><?php echo e($row['phone']); ?></td>
                        <td>
                            <a href="<?php echo e(route('author.edit', $row['id'])); ?>" class="btn btn-success btn-sm">
                                <i class="fas fa-pencil-alt">Edit</i>
                            </a>
                            <form action="<?php echo e(route('author.destroy', $row['id'])); ?>" method="POST"
                                style="display:inline-block;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                    <i class="fas fa-trash">Hapus</i>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data kategori</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
   <?php echo $__env->make('components.dependencies', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
</body>

</html>
<?php /**PATH /Users/juhn/Herd/LaravelPerpus/resources/views/Author/index.blade.php ENDPATH**/ ?>