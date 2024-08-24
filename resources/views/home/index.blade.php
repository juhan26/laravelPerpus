<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Home</title>
    <style>
        .welcome-heading {
            background-color: #f0f0f0;
            padding: 10px 0;
            border-bottom: 1px solid #ccc;
        }
    </style>
</head>

<body>
    @include('components.sidebar')
    <div class="container col-md-6 mt-5">
        <h1 class="mb-5 text-center welcome-heading">Selamat datang, {{ Auth::user()->name }}</h1>
        <div class="mt-3">
            <h4>Jumlah Data:</h4>
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('book.index') }}" class="card-title" style="text-decoration: none; font-size: 1.5rem;">Buku</a>
                            <p class="card-text" style="text-decoration: none; font-size: 20px;">{{ $books }}</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('category.index') }}" class="card-title" style="text-decoration: none;font-size: 1.5rem;">Kategori</a>
                            <p class="card-text" style="text-decoration: none; font-size: 20px;">{{ $categories }}</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('author.index') }}" class="card-title" style="text-decoration: none; font-size: 1.5rem;">Penulis</a>
                            <p class="card-text" style="text-decoration: none; font-size: 20px;">{{ $authors }}</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('publisher.index') }}" class="card-title" style="text-decoration: none; font-size: 1.5rem;">Penerbit</a>
                            <p class="card-text" style="text-decoration: none; font-size: 20px;">{{ $publishers }}</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('transaction.index') }}" class="card-title" style="text-decoration: none; font-size: 1.5rem;">Transaksi</a>
                            <p class="card-text" style="text-decoration: none; font-size: 20px;">{{ $transactions }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
