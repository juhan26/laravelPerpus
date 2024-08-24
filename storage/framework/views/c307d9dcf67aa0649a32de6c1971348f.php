<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Book</title>
</head>

<body>
    <?php echo $__env->make('components.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container col-md-6 mt-5">
        <h1 class="mb-4">Buku</h1>

        <!-- Menampilkan Pesan Sukses atau Error -->
        <?php echo $__env->make('components.session', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <form action="<?php echo e(route('book.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label for="name" class="form-label">Tambah Buku:</label>
                <input class="form-control mb-3" name="title" type="text" placeholder="Masukkan judul buku"
                    aria-label="Nama Book" value="<?php echo e(old('title')); ?>">

                <label for="category_id" class="form-label">Kategori:</label>
                <select class="form-control mb-3" name="category_id" aria-label="Category">
                    <option value="">Pilih Kategori</option>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>" <?php echo e(old('category_id') == $category->id ? 'selected' : ''); ?>>
                            <?php echo e($category->category_name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

                <label for="author_id" class="form-label">Penulis:</label>
                <select class="form-control mb-3" name="author_id" aria-label="Author">
                    <option value="">Pilih Penulis</option>
                    <?php $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
                        <option value="<?php echo e($author->id); ?>" <?php echo e(old('author_id') == $author->id ? 'selected' : ''); ?>>
                            <?php echo e($author->name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

                <label for="publisher_id" class="form-label">Penerbit:</label>
                <select class="form-control mb-3" name="publisher_id" aria-label="Publisher">
                    <option value="">Pilih Penerbit</option>
                    <?php $__currentLoopData = $publishers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $publisher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($publisher->id); ?>" <?php echo e(old('publisher_id') == $publisher->id ? 'selected' : ''); ?>>
                            <?php echo e($publisher->publisher_name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <label for="publisher_year" class="form-label">Tahun Terbit:</label>
                <input class="form-control mb-3" name="publisher_year" type="text" placeholder="Masukkan tahun terbit"
                    aria-label="Tahun Publisher" value="<?php echo e(old('publisher_year')); ?>">

            </div>
            <button class="btn btn-success mb-4" type="submit">Submit</button>
        </form> 

        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Judul Buku</th>
                    <th>Kategori</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($row['title']); ?></td>
                        <td><?php echo e($row['category']['category_name']); ?></td>
                        <td><?php echo e($row['author']['name']); ?></td>
                        <td><?php echo e($row['publisher']['publisher_name']); ?></td>
                        <td><?php echo e($row['publisher_year']); ?></td>
                        <td>

                            <a href="<?php echo e(route('book.edit', $row['id'])); ?>" class="btn btn-success btn-sm">
                                <i class="fas fa-pencil-alt">Edit</i>
                            </a>
                            <form action="<?php echo e(route('book.destroy', $row['id'])); ?>" method="POST"
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
                        <td colspan="5" class="text-center">Tidak ada data buku</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php echo $__env->make('components.dependencies', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH /Users/juhn/Herd/LaravelPerpus/resources/views/Book/index.blade.php ENDPATH**/ ?>