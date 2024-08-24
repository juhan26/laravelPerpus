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
    @include('components.sidebar')
    <div class="container col-md-6 mt-5">
        <h1 class="mb-4">Author</h1>

        <!-- Menampilkan Pesan Sukses atau Error -->
        @include('components.session')
        <form action="{{ route('author.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Tambah Author:</label>
                <input class="form-control mb-3" name="name" type="text" placeholder="Masukkan nama Author"
                    aria-label="Nama Author" value="{{ old('name') }}">
                <label for="address" class="form-label">Alamat:</label>
                <textarea class="form-control mb-3" name="address" type="text" placeholder="Masukkan Alamat"
                    aria-label="address" value="">{{ old('address') }}</textarea>
                <label for="phone" class="form-label">Nomor Telepon:</label>
                <input class="form-control mb-3" name="phone" type="text" placeholder="Masukkan nomor telepon"
                    aria-label="phone" value="{{ old('phone') }}">
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
                @forelse ($authors as $row)
                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $row['name'] }}</td>
                        <td>{{ $row['address'] }}</td>
                        <td>{{ $row['phone'] }}</td>
                        <td>
                            <a href="{{ route('author.edit', $row['id']) }}" class="btn btn-success btn-sm">
                                <i class="fas fa-pencil-alt">Edit</i>
                            </a>
                            <form action="{{ route('author.destroy', $row['id']) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                    <i class="fas fa-trash">Hapus</i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data kategori</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
   @include('components.dependencies');
</body>

</html>
