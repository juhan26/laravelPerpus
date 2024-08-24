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
    @include('components.sidebar')
    <div class="container col-md-6 mt-5">
        <h1 class="mb-4">Transaction</h1>

        <!-- Menampilkan Pesan Sukses atau Error -->
        @include('components.session')
        <form action="{{ route('transaction.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="borrower" class="form-label">Nama Peminjam:</label>
                <input class="form-control mb-3" name="borrower" type="text" placeholder="Masukkan nama peminjam"
                    aria-label="Nama Peminjam" value="{{ old('borrower') }}">
                    
                <label for="book_id" class="form-label">Buku:</label>
                <select class="form-control mb-3" name="book_id" aria-label="Book">
                    <option value="">Pilih Buku</option>
                    @foreach($books as $book)
                        <option value="{{ $book->id }}" {{ old('book_id') == $book->id ? 'selected' : '' }}>
                            {{ $book->title }}
                        </option>
                    @endforeach
                </select>

                <label for="borrowed_at" class="form-label">Tanggal Pinjam:</label>
                <input class="form-control mb-3" name="borrow_date" type="date" placeholder="Masukkan tanggal pinjam"
                    aria-label="Tanggal Pinjam" value="{{ old('borrow_date') }}">

                <label for="returned_at" class="form-label">Tanggal Kembali:</label>
                <input class="form-control mb-3" name="return_date" type="date" placeholder="Masukkan tanggal kembali"
                    aria-label="Tanggal Kembali" value="{{ old('return_date') }}">

                <label for="description" class="form-label">Description (optional):</label>
                <textarea class="form-control mb-3" name="description" placeholder="Masukkan deskripsi"
                    aria-label="Description">{{ old('description') }}</textarea>
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
                @forelse ($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->borrower }}</td>
                        <td>{{ $transaction->book ? $transaction->book->title : 'Book not found' }}</td>
                        <td>{{ $transaction->borrow_date }}</td>
                        <td>{{ $transaction->return_date }}</td>
                        <td><span class="badge rounded-pill text-bg-primary">{{ $transaction->status }}</span></td>
                        <td>{{ $transaction->description }}</td>
                        <td>
                            @if ($transaction->status == 'borrowed')
                                <form action="{{ route('transaction.return', ['id' => $transaction->id]) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    <button type="submit" class="btn btn-warning btn-sm" onclick="return confirm('Anda yakin ingin menandai sudah dikembalikan?');">
                                        <i>Return</i>
                                    </button>
                                </form>
                            @else
                            @endif

                            <a href="{{ route('transaction.edit', $transaction->id) }}" class="btn btn-success btn-sm">
                                <i class="fas fa-pencil-alt">Edit</i>
                            </a>
                            <form action="{{ route('transaction.destroy', $transaction->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                    <i class="bi bi-trash">Hapus</i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data transaksi</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @include('components.dependencies')
</body>

</html>
