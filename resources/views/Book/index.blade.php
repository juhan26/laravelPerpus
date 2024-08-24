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
    @include('components.sidebar')
    <div class="container col-md-6 mt-5">
        <h1 class="mb-4">Buku</h1>

        <!-- Menampilkan Pesan Sukses atau Error -->
        @include('components.session')
        <form action="{{ route('book.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Tambah Buku:</label>
                <input class="form-control mb-3" name="title" type="text" placeholder="Masukkan judul buku"
                    aria-label="Nama Book" value="{{ old('title') }}">

                <label for="category_id" class="form-label">Kategori:</label>
                <select class="form-control mb-3" name="category_id" aria-label="Category">
                    <option value="">Pilih Kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->category_name }}
                        </option>
                    @endforeach
                </select>

                <label for="author_id" class="form-label">Penulis:</label>
                <select class="form-control mb-3" name="author_id" aria-label="Author">
                    <option value="">Pilih Penulis</option>
                    @foreach ($authors as $author)    
                        <option value="{{ $author->id }}" {{ old('author_id') == $author->id ? 'selected' : '' }}>
                            {{ $author->name }}
                        </option>
                    @endforeach
                </select>

                <label for="publisher_id" class="form-label">Penerbit:</label>
                <select class="form-control mb-3" name="publisher_id" aria-label="Publisher">
                    <option value="">Pilih Penerbit</option>
                    @foreach($publishers as $publisher)
                        <option value="{{ $publisher->id }}" {{ old('publisher_id') == $publisher->id ? 'selected' : '' }}>
                            {{ $publisher->publisher_name }}
                        </option>
                    @endforeach
                </select>
                <label for="publisher_year" class="form-label">Tahun Terbit:</label>
                <input class="form-control mb-3" name="publisher_year" type="text" placeholder="Masukkan tahun terbit"
                    aria-label="Tahun Publisher" value="{{ old('publisher_year') }}">

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
                @forelse ($books as $row)
                    <tr>
                        <td>{{ $row['title'] }}</td>
                        <td>{{ $row['category']['category_name'] }}</td>
                        <td>{{ $row['author']['name'] }}</td>
                        <td>{{ $row['publisher']['publisher_name'] }}</td>
                        <td>{{ $row['publisher_year'] }}</td>
                        <td>

                            <a href="{{ route('book.edit', $row['id']) }}" class="btn btn-success btn-sm">
                                <i class="fas fa-pencil-alt">Edit</i>
                            </a>
                            <form action="{{ route('book.destroy', $row['id']) }}" method="POST"
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
                        <td colspan="5" class="text-center">Tidak ada data buku</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @include('components.dependencies')
</body>

</html>
