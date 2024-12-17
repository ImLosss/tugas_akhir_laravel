<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class InventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Inventaris::with('category')->get();

        return view('admin.inventaris.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();

        return view('admin.inventaris.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'category' => 'required|exists:categories,id',
            'jumlah' => 'required|numeric|min:1',
            'baik' => 'required',
            'rusak' => 'required',
        ]);

        if($request->jumlah != ($request->baik + $request->rusak)) return redirect()->back()->with('alert', 'info')->with('message', 'Jumlah baik dan rusak tidak seimbang');

        Inventaris::create([
            'nama_barang' => $request->nama_barang,
            'category_id' => $request->category,
            'jumlah' => $request->jumlah,
            'baik' => $request->baik,
            'rusak' => $request->rusak
        ]);

        return redirect()->route('inventaris')->with('alert', 'success')->with('message', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['data'] = Inventaris::findOrFail($id);
        $data['category'] = Category::all();

        return view('admin.inventaris.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_barang' => 'required',
            'category' => 'required|exists:categories,id',
            'jumlah' => 'required|numeric|min:1',
            'baik' => 'required',
            'rusak' => 'required'
        ]);

        if($request->jumlah != ($request->baik + $request->rusak + $request->pinjam)) return redirect()->back()->with('alert', 'info')->with('message', 'Jumlah baik, rusak dan pinjam tidak seimbang');

        $data = Inventaris::findOrFail($id);

        $data->update([
            'nama_barang' => $request->nama_barang,
            'category_id' => $request->category,
            'jumlah' => $request->jumlah,
            'baik' => $request->baik,
            'rusak' => $request->rusak
        ]);

        return redirect()->route('inventaris')->with('alert', 'success')->with('message', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Inventaris::findOrFail($id);

        $data->delete();

        return redirect()->route('inventaris')->with('alert', 'success')->with('message', 'Data berhasil dihapus');
    }
}
