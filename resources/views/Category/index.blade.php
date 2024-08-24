<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Category</title>
</head>

<body>
    @include('components.sidebar')
    <div class="container col-md-6 mt-5">
        <h1 class="mb-4">Category</h1>

        <!-- Menampilkan Pesan Sukses atau Error -->
        @include('components.session')
        <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="category_name" class="form-label">Tambah Kategori:</label>
                <input class="form-control" name="category_name" type="text" placeholder="Masukkan nama kategori"
                    aria-label="Nama Kategori" value="{{ old('category_name') }}">
            </div>
            <button class="btn btn-success mb-4" type="submit">Submit</button>
        </form>

        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row['category_name'] }}</td>
                        <td>
                            <a href="{{ route('category.edit', $row['id']) }}" class="btn btn-success btn-sm">
                                <i class="fas fa-pencil-alt">Edit</i>
                            </a>


                            <form action="{{ route('category.destroy', $row['id']) }}" method="POST"
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
                        <td colspan="3" class="text-center">Tidak ada data kategori</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
   @include('components.dependencies');
</body>

</html>
