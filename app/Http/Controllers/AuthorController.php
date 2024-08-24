<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Models\Author;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::all();
        return view('author.index', compact('authors'));
    }

    // Menyimpan kategori baru
    public function store(StoreAuthorRequest $request)
    {
        // Menyimpan data
        Author::create($request->all());
        return redirect()->route('author.index')->with('success', 'Author berhasil di tambahkan.');
    }

    // Menampilkan form edit kategori
   public function edit($id)
{
    $author = Author::find($id);

    if (!$author) {
        return redirect()->route('author.index')->with('error', 'Author not found.');
    }

    return view('author.edit', compact('author'));
}

public function update(UpdateAuthorRequest $request, $id)
{
    $author = Author::find($id);

    if (!$author) {
        return redirect()->route('author.index')->with('error', 'Author not found.');
    }

    $author->update($request->all());

    return redirect()->route('author.index')->with('success', 'Author berhasil diperbarui.');
}


    // Menghapus kategori
    public function destroy($id)
    {
        try {
            $author = Author::find($id);
            $author->delete();
            return redirect()->route('author.index')->with('success','Author berhasil di hapus.');
        } catch (QueryException $e) {
            return redirect()->route('author.index')->with('error', 'Author gagal dihapus karena ada data yang terkait.');
        }
    }
}
