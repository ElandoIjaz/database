<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Display a listing of orders or filtered admin view.
     */
    public function index(Request $request): View
    {
        $isAdminFilter = $request->boolean('admin_filter')
            || $request->has('sejak')
            || $request->has('status');

        if ($isAdminFilter) {
            $statuses = $request->input('status', ['diproses', 'dikirim']);
            if (is_string($statuses)) {
                $statuses = explode(',', $statuses);
            }

            $sejakTanggal = (string) $request->input('sejak', '2025-10-10');
            $hanyaAdaCatatan = $request->boolean('ada_catatan', true);

            $query = Pesanan::query()
                ->select(['id', 'tanggal_pesan', 'status', 'catatan'])
                ->whereIn('status', (array) $statuses)
                ->where('tanggal_pesan', '>=', $sejakTanggal);

            if ($hanyaAdaCatatan) {
                $query->whereNotNull('catatan')
                    ->where('catatan', '!=', '');
            }

            $pesanan = $query->orderBy('tanggal_pesan', 'asc')
                ->orderBy('id', 'asc')
                ->get();

            return view('pesanan', [
                'pesanan' => $pesanan,
                'isAdminView' => true,
                'sejakTanggal' => $sejakTanggal,
                'statuses' => (array) $statuses,
                'hanyaAdaCatatan' => $hanyaAdaCatatan,
            ]);
        }

        $pesanan = Pesanan::with(['pelanggan', 'produk'])->get();

        return view('pesanan', [
            'pesanan' => $pesanan,
            'isAdminView' => false,
            'sejakTanggal' => '2025-10-10',
            'statuses' => ['diproses', 'dikirim'],
            'hanyaAdaCatatan' => true,
        ]);
    }

    /**
     * Dedicated admin search endpoint.
     */
    public function adminSearch(Request $request): View
    {
        $request->merge(['admin_filter' => true]);

        return $this->index($request);
    }
}
