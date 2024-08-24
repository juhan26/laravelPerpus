<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-1YCnBgtykcMSlB2ylz1KfU5DQC7DFtB+J5y5Rk9jrC00+rYYQqcNEaKAcKw5E5eRHZmcG0m5P2fStUgLJoUfnQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="vendor/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/css/all.min.css">
    <link rel="stylesheet" href="assets/css/additional.css">
    <script src="vendor/js/jquery.min.js"></script>
    <script src="vendor/js/bootstrap.min.js"></script>
    <script src="assets/js/sidebarcollapse.js"></script>
    <title>OK</title>
    <style>
        #sidebar {
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            z-index: 999;
            background: #343a40;
            color: #fff;
            transition: all 0.3s;
        }

        #sidebar .sidebar-header {
            padding: 20px;
            background: #343a40;
        }

        #sidebar ul.components {
            padding: 20px 0;
            border-bottom: 1px solid #47748b;
        }

        #sidebar ul li a {
            padding: 10px;
            font-size: 1.1em;
            display: block;
            color: #fff;
            text-decoration: none;
        }

        #sidebar ul li a:hover {
            color: #343a40;
            background: #fff;
        }

        #sidebar ul li.active>a {
            color: #343a40;
            background: #fff;
        }

        #sidebar ul li a span {
            margin-left: 10px;
        }
    </style>
</head>

<body>

    <nav id="sidebar" class="shadow">
        <div class="sidebar-header">
            <h4>Perpustakaan</h4>
        </div>
        <ul class="list-unstyled components">
            <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
                <a href="{{ route('home') }}">
                    <i class="fas fa-home"></i>
                    <span>Beranda</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('category.index') ? 'active' : '' }}">
                <a href="{{ route('category.index') }}">
                    <i class="fas fa-warehouse"></i>
                    <span>Category</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('author.index') ? 'active' : '' }}">
                <a href="{{ route('author.index') }}">
                    <i class="fas fa-car"></i>
                    <span>Penulis</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('publisher.index') ? 'active' : '' }}">
                <a href="{{ route('publisher.index') }}">
                    <i class="far fa-address-card"></i>
                    <span>Penerbit</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('book.index') ? 'active' : '' }}">
                <a href="{{ route('book.index') }}">
                    <i class="fas fa-warehouse"></i>
                    <span>Buku</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('transaction.index') ? 'active' : '' }}">
                <a href="{{ route('transaction.index') }}">
                    <i class="far fa-address-card"></i>
                    <span>Transaksi</span>
                </a>
            </li>
            @guest
                <li class="{{ request()->routeIs('login') ? 'active' : '' }}">
                    <a href="{{ route('login') }}">
                        <i class="fas fa-sign-in-alt"></i>
                        <span>Login</span>
                    </a>
                </li>
                <li class="{{ request()->routeIs('register') ? 'active' : '' }}">
                    <a href="{{ route('register') }}">
                        <i class="fas fa-user-plus"></i>
                        <span>Register</span>
                    </a>
                </li>
            @else
            <div class="container mt-3">
                <li class="">
                    <div class="container mr-5"> 
                        <a href="{{ route('logout') }}" class="btn btn-outline-danger btn-sm p-1" style="hover:color: #white;
                        background: #c32020; display: flex; align-items: center; " onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i>
                            <span class="mx-2">Logout ({{ Auth::user()->name }})</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </div>
            


            @endguest
        </ul>
    </nav>

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+G5iDz9/jtt3e0S1RKfUelrG9eVi1" crossorigin="anonymous">
    </script>

</body>

</html>
