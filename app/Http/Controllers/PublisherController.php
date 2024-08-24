<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePublisherRequest;
use App\Http\Requests\UpdatePublisherRequest;
use App\Models\Publisher;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publishers = Publisher::all();
        return view('publisher.index', compact('publishers'));
    }

    // Menyimpan kategori baru
    public function store(StorePublisherRequest $request)
    {
        // Menyimpan data
        Publisher::create($request->all());
        return redirect()->route('publisher.index')->with('success', 'Publisher berhasil di tambahkan.');
    }

    // Menampilkan form edit kategori
    public function edit($id)
{
    $publisher = Publisher::find($id);

    if (!$publisher) {
        return redirect()->route('publisher.index')->with('error', 'Publisher not found.');
    }

    return view('publisher.edit', compact('publisher'));
}

public function update(UpdatePublisherRequest $request, $id)
{
    $publisher = Publisher::find($id);

    if (!$publisher) {
        return redirect()->route('publisher.index')->with('error', 'Publisher not found.');
    }

    $publisher->update($request->all());

    return redirect()->route('publisher.index')->with('success', 'Publisher berhasil diperbarui.');
}

    // Menghapus kategori
    public function destroy($id)
    {
        try {

            $publisher = Publisher::find($id);
            $publisher->delete();
            return redirect()->route('publisher.index')->with('success','Publisher berhasil di hapus.');

        } catch (QueryException $e) {
            
            return redirect()->route('publisher.index')->with('error', 'Publisher gagal dihapus karena ada data yang terkait.');
        }
    }
}
