<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\Transaction;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        $transactions = Transaction::all();
        return view("transaction.index", compact("transactions", "books"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $authors = Author::all();
        $publishers = Publisher::all();

        // dd($categories, $authors, $publishers);

        return view('transaction.create', compact('categories', 'authors', 'publishers'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransactionRequest $request)
    {
        Transaction::create($request->all());
        return redirect()->route('transaction.index')->with('success', 'Transaksi berhasil di tambahkan.');
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $transaction = transaction::find($id);

        if (!$transaction) {
            return redirect()->route('transaction.index')->with('error', 'transaction not found.');
        }

        $books = Book::all();
        $categories = Category::all();
        $authors = Author::all();
        $publishers = Publisher::all();

        return view('transaction.edit', compact('transaction', 'categories', 'authors', 'publishers', 'books'));
    }

    public function update(UpdatetransactionRequest $request, $id)
    {
        $transaction = transaction::find($id);

        if (!$transaction) {
            return redirect()->route('transaction.index')->with('error', 'transaction not found.');
        }

        $transaction->update($request->all());

        return redirect()->route('transaction.index')->with('success', 'Transaction berhasil diperbarui.');
    }


    //     // Menghapus kategori
    public function destroy($id)
    {
        $transaction = transaction::find($id);
        $transaction->delete();
        return redirect()->route('transaction.index')->with('success', 'Transaction berhasil di hapus.');
    }

    public function return($id)
{
    $transaction = Transaction::findOrFail($id);

    // Set status to 'returned'
    $transaction->status = 'returned';
    $transaction->save();

    return redirect()->back()->with('success', 'Buku berhasil di kembalikan.');
}

}
