<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Status;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Produk::with(['kategori', 'status'])
            ->whereHas('status', function ($query) {
                $query->where('nama_status', 'bisa dijual');
            })
            ->orderBy('id_produk', 'desc')
            ->paginate(10);

        $totalCanSell = Produk::whereHas('status', function ($query) {
            $query->where('nama_status', 'bisa dijual');
        })->count();

        $totalCannotSell = Produk::whereHas('status', function ($query) {
            $query->where('nama_status', 'tidak bisa dijual');
        })->count();

        return view('products.index', compact('products', 'totalCanSell', 'totalCannotSell'));
    }

    public function create()
    {
        $categories = Kategori::all();
        $statuses = Status::all();
        return view('products.create', compact('categories', 'statuses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'kategori_id' => 'required|exists:kategoris,id_kategori',
            'status_id' => 'required|exists:statuses,id_status',
        ], [
            'required' => ':attribute tidak boleh kosong.',
            'numeric' => ':attribute harus berupa angka.',
            'exists' => ':attribute yang dipilih tidak valid.',
        ], [
            'nama_produk' => 'Nama produk',
            'harga' => 'Harga',
            'kategori_id' => 'Kategori',
            'status_id' => 'Status',
        ]);

        Produk::create($request->all());

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(string $id)
    {
        $product = Produk::findOrFail($id);
        $categories = Kategori::all();
        $statuses = Status::all();
        return view('products.edit', compact('product', 'categories', 'statuses'));
    }

    public function update(Request $request, string $id)
    {
        $product = Produk::findOrFail($id);

        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'kategori_id' => 'required|exists:kategoris,id_kategori',
            'status_id' => 'required|exists:statuses,id_status',
        ], [
            'required' => ':attribute tidak boleh kosong.',
            'numeric' => ':attribute harus berupa angka.',
            'exists' => ':attribute yang dipilih tidak valid.',
        ], [
            'nama_produk' => 'Nama produk',
            'harga' => 'Harga',
            'kategori_id' => 'Kategori',
            'status_id' => 'Status',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $product = Produk::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus.');
    }
}
