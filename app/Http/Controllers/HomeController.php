<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\Author;
use App\Models\Publisher;
use App\Models\Transaction;

class HomeController extends Controller
{
    public function index()
    {
        $users = auth()->user();
        $books = Book::count();
        $categories = Category::count();
        $authors = Author::count();
        $publishers = Publisher::count();
        $transactions = Transaction::count();

        return view('home.index', compact('users', 'books', 'categories', 'authors', 'publishers', 'transactions'));
    }
}
