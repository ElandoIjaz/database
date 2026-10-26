<?php

namespace Tests\Feature;

use App\Models\Pesanan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PesananAdminSearchTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test admin search filters active orders since 2025-10-10 with non-empty notes.
     */
    public function test_admin_search_filters_active_orders_with_notes_since_october_10_2025(): void
    {
        // 1. Data yang MEMENUHI syarat:
        // - ID 101: dikirim, 2025-10-12, catatan: "Kirim sebelum Jumat"
        $pesanan1 = Pesanan::create([
            'pelanggan_id' => 1,
            'produk_id' => 1,
            'jumlah' => 1,
            'status' => 'dikirim',
            'tanggal_pesan' => '2025-10-12',
            'catatan' => 'Kirim sebelum Jumat',
        ]);

        // - ID 102: diproses, 2025-10-16, catatan: "Hadiah ulang tahun"
        $pesanan2 = Pesanan::create([
            'pelanggan_id' => 2,
            'produk_id' => 2,
            'jumlah' => 1,
            'status' => 'diproses',
            'tanggal_pesan' => '2025-10-16',
            'catatan' => 'Hadiah ulang tahun',
        ]);

        // - ID 103: diproses, 2025-10-18, catatan: "Tolong cek garansi"
        $pesanan3 = Pesanan::create([
            'pelanggan_id' => 3,
            'produk_id' => 3,
            'jumlah' => 1,
            'status' => 'diproses',
            'tanggal_pesan' => '2025-10-18',
            'catatan' => 'Tolong cek garansi',
        ]);

        // 2. Data yang TIDAK MEMENUHI syarat:
        // - Status aktif, tanggal >= 2025-10-10, tapi catatan NULL
        Pesanan::create([
            'pelanggan_id' => 4,
            'produk_id' => 1,
            'jumlah' => 1,
            'status' => 'diproses',
            'tanggal_pesan' => '2025-10-13',
            'catatan' => null,
        ]);

        // - Status aktif, tanggal >= 2025-10-10, tapi catatan STRING KOSONG
        Pesanan::create([
            'pelanggan_id' => 5,
            'produk_id' => 2,
            'jumlah' => 1,
            'status' => 'dikirim',
            'tanggal_pesan' => '2025-10-15',
            'catatan' => '',
        ]);

        // - Status aktif, ada catatan, tapi tanggal SEBELUM 2025-10-10
        Pesanan::create([
            'pelanggan_id' => 6,
            'produk_id' => 3,
            'jumlah' => 1,
            'status' => 'diproses',
            'tanggal_pesan' => '2025-10-07',
            'catatan' => 'Catatan lama',
        ]);

        // - Tanggal >= 2025-10-10, ada catatan, tapi status SELESAI (bukan aktif)
        Pesanan::create([
            'pelanggan_id' => 7,
            'produk_id' => 1,
            'jumlah' => 1,
            'status' => 'selesai',
            'tanggal_pesan' => '2025-10-14',
            'catatan' => 'Sudah selesai',
        ]);

        // - Tanggal >= 2025-10-10, ada catatan, tapi status DIBATALKAN (bukan aktif)
        Pesanan::create([
            'pelanggan_id' => 8,
            'produk_id' => 2,
            'jumlah' => 1,
            'status' => 'dibatalkan',
            'tanggal_pesan' => '2025-10-18',
            'catatan' => 'Dibatalkan user',
        ]);

        // Jalankan request ke endpoint pencarian admin
        $response = $this->get(route('admin.pesanan'));

        $response->assertStatus(200);

        // Hanya 3 data yang memenuhi kriteria
        $data = $response->viewData('pesanan');
        $this->assertCount(3, $data);

        // Urutan: Tanggal terlama, lalu ID
        $this->assertEquals($pesanan1->id, $data[0]->id);
        $this->assertEquals($pesanan2->id, $data[1]->id);
        $this->assertEquals($pesanan3->id, $data[2]->id);

        // Pastikan catatan yang sesuai muncul di HTML
        $response->assertSee('Kirim sebelum Jumat');
        $response->assertSee('Hadiah ulang tahun');
        $response->assertSee('Tolong cek garansi');

        // Pastikan catatan dari pesanan yang tidak memenuhi syarat TIDAK muncul
        $response->assertDontSee('Catatan lama');
        $response->assertDontSee('Sudah selesai');
        $response->assertDontSee('Dibatalkan user');
    }
}
