<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Database\QueryException;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        $categories = Category::all();
        $authors = Author::all();
        $publishers = Publisher::all();

        return view('Book.index', compact('books', 'categories', 'authors', 'publishers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(StoreBookRequest $request)
    {
        Book::create($request->all());
        return redirect()->route('book.index')->with('success', 'Book berhasil di tambahkan.');
    }

    public function create()
{
    $categories = Category::all();
    $authors = Author::all();
    $publishers = Publisher::all();

    // dd($categories, $authors, $publishers);

    return view('book.create', compact('categories', 'authors', 'publishers'));
}


    public function edit($id)
    {
        $book = book::find($id);
    
        if (!$book) {
            return redirect()->route('book.index')->with('error', 'book not found.');
        }

        $categories = Category::all();
        $authors = Author::all();
        $publishers = Publisher::all();
    
        return view('book.edit', compact('book', 'categories', 'authors', 'publishers'));
    }
    
    public function update(UpdateBookRequest $request, $id)
    {
        $book = book::find($id);
    
        if (!$book) {
            return redirect()->route('book.index')->with('error', 'book not found.');
        }
    
        $book->update($request->all());
    
        return redirect()->route('book.index')->with('success', 'book berhasil diperbarui.');
    }
    
    
    //     // Menghapus kategori
        public function destroy($id)
        {
            try {
                $book = book::find($id);
                $book->delete();
                return redirect()->route('book.index')->with('success','Book berhasil di hapus.');

            } catch (QueryException $e) {
            
            return redirect()->route('book.index')->with('error', 'Buku gagal dihapus karena ada data yang terkait.');
        }
        }
}
