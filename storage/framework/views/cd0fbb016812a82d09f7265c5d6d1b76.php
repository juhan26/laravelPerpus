<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Transaction</title>
</head>

<body>
    <?php echo $__env->make('components.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container col-md-6 mt-5">
        <h1 class="mb-4">Transaction</h1>

        <!-- Menampilkan Pesan Sukses atau Error -->
        <?php echo $__env->make('components.session', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <form action="<?php echo e(route('transaction.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label for="borrower" class="form-label">Nama Peminjam:</label>
                <input class="form-control mb-3" name="borrower" type="text" placeholder="Masukkan nama peminjam"
                    aria-label="Nama Peminjam" value="<?php echo e(old('borrower')); ?>">
                    
                <label for="book_id" class="form-label">Buku:</label>
                <select class="form-control mb-3" name="book_id" aria-label="Book">
                    <option value="">Pilih Buku</option>
                    <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($book->id); ?>" <?php echo e(old('book_id') == $book->id ? 'selected' : ''); ?>>
                            <?php echo e($book->title); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

                <label for="borrowed_at" class="form-label">Tanggal Pinjam:</label>
                <input class="form-control mb-3" name="borrow_date" type="date" placeholder="Masukkan tanggal pinjam"
                    aria-label="Tanggal Pinjam" value="<?php echo e(old('borrow_date')); ?>">

                <label for="returned_at" class="form-label">Tanggal Kembali:</label>
                <input class="form-control mb-3" name="return_date" type="date" placeholder="Masukkan tanggal kembali"
                    aria-label="Tanggal Kembali" value="<?php echo e(old('return_date')); ?>">

                <label for="description" class="form-label">Description (optional):</label>
                <textarea class="form-control mb-3" name="description" placeholder="Masukkan deskripsi"
                    aria-label="Description"><?php echo e(old('description')); ?></textarea>
            </div>
            <button class="btn btn-success mb-4" type="submit">Submit</button>
        </form>

        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Nama Peminjam</th>
                    <th>Nama Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                    <th>Description</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($transaction->borrower); ?></td>
                        <td><?php echo e($transaction->book ? $transaction->book->title : 'Book not found'); ?></td>
                        <td><?php echo e($transaction->borrow_date); ?></td>
                        <td><?php echo e($transaction->return_date); ?></td>
                        <td><span class="badge rounded-pill text-bg-primary"><?php echo e($transaction->status); ?></span></td>
                        <td><?php echo e($transaction->description); ?></td>
                        <td>
                            <?php if($transaction->status == 'borrowed'): ?>
                                <form action="<?php echo e(route('transaction.return', ['id' => $transaction->id])); ?>" method="POST" style="display:inline-block;">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn btn-warning btn-sm" onclick="return confirm('Anda yakin ingin menandai sudah dikembalikan?');">
                                        <i>Return</i>
                                    </button>
                                </form>
                            <?php else: ?>
                            <?php endif; ?>

                            <a href="<?php echo e(route('transaction.edit', $transaction->id)); ?>" class="btn btn-success btn-sm">
                                <i class="fas fa-pencil-alt">Edit</i>
                            </a>
                            <form action="<?php echo e(route('transaction.destroy', $transaction->id)); ?>" method="POST"
                                style="display:inline-block;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                    <i class="bi bi-trash">Hapus</i>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data transaksi</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php echo $__env->make('components.dependencies', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH /Users/juhn/Herd/LaravelPerpus/resources/views/transaction/index.blade.php ENDPATH**/ ?>