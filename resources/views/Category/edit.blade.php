<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Edit Category</title>
</head>
<body>
    @include('components.sidebar')
    <div class="container col-md-6 mt-5">
        <h1 class="mb-4">Edit Category</h1>
        @include('components.session')

        <form action="{{ route('category.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="category_name" class="form-label">Edit Kategori:</label>
                <input class="form-control" name="category_name" type="text" value="{{ $category->category_name }}" aria-label="Nama Kategori">
            </div>
            <button class="btn btn-success mb-4" type="submit">Update</button>
            <a class="btn btn-secondary mb-4" href="{{ route('category.index') }}">Kembali</a>
        </form>
    </div>
    @include('components.dependencies');
</body>
</html>
