<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Database\QueryException;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    // Menyimpan kategori baru
    public function store(StoreCategoryRequest $request)
    {
       
        
        Category::create($request->all());
        return redirect()->route('category.index')->with('success', 'Category berhasil di tambahkan.');
    }

    // Menampilkan form edit kategori
    public function edit($id)
    {
        $category = Category::find($id);
        return view('category.edit', compact('category'));
    }

    // Memperbarui kategori
    public function update(UpdateCategoryRequest $request, $id)
    {
        // Validasi input
      

        // Mengupdate data
        $category = Category::find($id);
        $category->update($request->all());

        return redirect()->route('category.index')->with('success', 'Category berhasil di perbarui.');
    }

    // Menghapus kategori
    public function destroy($id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();
            return redirect()->route('category.index')->with('success', 'Category berhasil dihapus.');
        } catch (QueryException $e) {
            return redirect()->route('category.index')->with('error', 'Category gagal dihapus karena ada data yang terkait.');
        }
    }
}
