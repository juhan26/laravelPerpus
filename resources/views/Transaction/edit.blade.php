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
    @include('components.sidebar')
    <div class="container col-md-6 mt-5">
        <h1 class="mb-4">Edit Transaction</h1>

        <!-- Menampilkan Pesan Sukses atau Error -->
        @include('components.session')
        <form action="{{ route('transaction.update', $transaction->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="borrower" class="form-label">Nama Peminjam:</label>
                <input class="form-control mb-3" name="borrower" type="text" placeholder="Masukkan nama peminjam"
                    aria-label="Nama Peminjam" value="{{ $transaction->borrower }}">
                    
                <label for="book_id" class="form-label">Buku:</label>
                <select class="form-control mb-3" name="book_id" aria-label="Book">
                    <option value="">Pilih Buku</option>
                    @foreach($books as $book)
                        <option value="{{ $book->id }}" {{ $transaction->book_id == $book->id ? 'selected' : '' }}>
                            {{ $book->title }}
                        </option>
                    @endforeach
                </select>

                <label for="borrowed_at" class="form-label">Tanggal Pinjam:</label>
                <input class="form-control mb-3" name="borrow_date" type="date" placeholder="Masukkan tanggal pinjam"
                    aria-label="Tanggal Pinjam" value="{{ $transaction->borrow_date }}">

                <label for="returned_at" class="form-label">Tanggal Kembali:</label>
                <input class="form-control mb-3" name="return_date" type="date" placeholder="Masukkan tanggal kembali"
                    aria-label="Tanggal Kembali" value="{{ $transaction->return_date }}">

                <label for="description" class="form-label">Deskripsi (opsional):</label>
                <textarea class="form-control mb-3" name="description" placeholder="Masukkan deskripsi"
                    aria-label="Deskripsi">{{ $transaction->description }}</textarea>
            </div>
            <button class="btn btn-success mb-4" type="submit">Update</button>
            <a class="btn btn-secondary mb-4" href="{{ route('transaction.index') }}">Kembali</a>
        </form>
    </div>
    @include('components.dependencies')
</body>

</html>
