<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of products with search, category filter, sorting, and pagination.
     */
    public function index(Request $request): View
    {
        $search = $request->query('q');
        $kategori = $request->query('kategori');
        $sort = $request->query('sort', 'harga_desc');
        $perPage = 5;

        $query = Produk::query();

        if (! empty($search)) {
            $query->where('nama_produk', 'like', '%'.$search.'%');
        }

        if (! empty($kategori)) {
            $query->where('kategori', $kategori);
        }

        match ($sort) {
            'harga_asc' => $query->orderBy('harga', 'asc'),
            'nama_asc' => $query->orderBy('nama_produk', 'asc'),
            'nama_desc' => $query->orderBy('nama_produk', 'desc'),
            default => $query->orderBy('harga', 'desc'),
        };

        $produk = $query->paginate($perPage)->withQueryString();

        $daftarKategori = Produk::query()
            ->select('kategori')
            ->distinct()
            ->pluck('kategori');

        return view('produk', [
            'produk' => $produk,
            'daftarKategori' => $daftarKategori,
            'search' => $search,
            'kategori' => $kategori,
            'sort' => $sort,
        ]);
    }
}
