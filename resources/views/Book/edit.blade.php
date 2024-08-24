<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Edit Book</title>
</head>

<body>
    @include('components.sidebar')
    <div class="container col-md-6 mt-5">
        <h1 class="mb-4">Edit Book</h1>

        @include('components.session')

        <form action="{{ route('book.update', $book->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Judul Book:</label>
                <input class="form-control mb-3" name="title" type="text" placeholder="Masukkan judul buku"
                    aria-label="Nama Book" value="{{ old('title', $book->title) }}">

                <label for="category_id" class="form-label">Category:</label>
                <select class="form-control mb-3" name="category_id" aria-label="Category">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->category_name }}
                        </option>
                    @endforeach
                </select>

                <label for="author_id" class="form-label">Author:</label>
                <select class="form-control mb-3" name="author_id" aria-label="Author">
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}"
                            {{ old('author_id', $book->author_id) == $author->id ? 'selected' : '' }}>
                            {{ $author->name }}
                        </option>
                    @endforeach
                </select>

                <label for="publisher_id" class="form-label">Publisher:</label>
                <select class="form-control mb-3" name="publisher_id" aria-label="Publisher">
                    @foreach ($publishers as $publisher)
                        <option value="{{ $publisher->id }}"
                            {{ old('publisher_id', $book->publisher_id) == $publisher->id ? 'selected' : '' }}>
                            {{ $publisher->publisher_name }}
                        </option>
                    @endforeach
                </select>

                </select>
                <label for="publisher_year" class="form-label">Publisher Year:</label>
                <input class="form-control mb-3" name="publisher_year" type="text"
                    placeholder="Masukkan tahun terbit" aria-label="Tahun Publisher"
                    value="{{ old('publisher_year', $book->publisher_year) }}">
            </div>
            <button class="btn btn-success mb-4" type="submit">Submit</button>
            <a class="btn btn-secondary mb-4" href="{{ route('book.index') }}">Kembali</a>
        </form>
    </div>
    @include('components.dependencies')
</body>

</html>
