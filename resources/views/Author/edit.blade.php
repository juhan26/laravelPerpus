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
    @include('components.sidebar')
    <div class="container col-md-6 mt-5">
        <h1 class="mb-4">Edit Author</h1>

        <!-- Menampilkan Pesan Sukses atau Error -->
        @include('components.session')

        @if($author)
        <form action="{{ route('author.update', $author->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nama Author:</label>
                <input class="form-control mb-3" name="name" type="text" value="{{ $author->name }}" aria-label="Nama Author">
                <label for="address" class="form-label">Alamat:</label>
                <textarea class="form-control mb-3" name="address" aria-label="Address">{{ $author->address }}</textarea>
                <label for="phone" class="form-label">Nomor Telepon:</label>
                <input class="form-control mb-3" name="phone" type="text" value="{{ $author->phone }}" aria-label="Nomor Telepon">
            </div>
            <button class="btn btn-success mb-4" type="submit">Update</button>
            <a class="btn btn-secondary mb-4" href="{{ route('author.index') }}">Kembali</a>
        </form>
        @else
        <p>Author not found.</p>
        @endif
    </div>
    @include('components.dependencies')
</body>
</html>
