<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Edit Transaction</title>
</head>

<body>
    <?php echo $__env->make('components.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container col-md-6 mt-5">
        <h1 class="mb-4">Edit Transaction</h1>

        <!-- Menampilkan Pesan Sukses atau Error -->
        <?php echo $__env->make('components.session', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <form action="<?php echo e(route('transaction.update', $transaction->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="mb-3">
                <label for="borrower" class="form-label">Nama Peminjam:</label>
                <input class="form-control mb-3" name="borrower" type="text" placeholder="Masukkan nama peminjam"
                    aria-label="Nama Peminjam" value="<?php echo e($transaction->borrower); ?>">
                    
                <label for="book_id" class="form-label">Buku:</label>
                <select class="form-control mb-3" name="book_id" aria-label="Book">
                    <option value="">Pilih Buku</option>
                    <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($book->id); ?>" <?php echo e($transaction->book_id == $book->id ? 'selected' : ''); ?>>
                            <?php echo e($book->title); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

                <label for="borrowed_at" class="form-label">Tanggal Pinjam:</label>
                <input class="form-control mb-3" name="borrow_date" type="date" placeholder="Masukkan tanggal pinjam"
                    aria-label="Tanggal Pinjam" value="<?php echo e($transaction->borrow_date); ?>">

                <label for="returned_at" class="form-label">Tanggal Kembali:</label>
                <input class="form-control mb-3" name="return_date" type="date" placeholder="Masukkan tanggal kembali"
                    aria-label="Tanggal Kembali" value="<?php echo e($transaction->return_date); ?>">

                <label for="description" class="form-label">Deskripsi (opsional):</label>
                <textarea class="form-control mb-3" name="description" placeholder="Masukkan deskripsi"
                    aria-label="Deskripsi"><?php echo e($transaction->description); ?></textarea>
            </div>
            <button class="btn btn-success mb-4" type="submit">Update</button>
        </form>
    </div>
    <?php echo $__env->make('components.dependencies', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH /Users/juhn/Herd/LaravelPerpus/resources/views/Transaction/edit.blade.php ENDPATH**/ ?>