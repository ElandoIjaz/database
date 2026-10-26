<?php

namespace Tests\Feature;

use App\Models\Produk;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProdukSearchTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test page can be rendered.
     */
    public function test_user_can_view_produk_page(): void
    {
        $response = $this->get(route('produk.index'));

        $response->assertStatus(200);
        $response->assertSee('Katalog Produk Tokoku');
    }

    /**
     * Test search for "Laptop", category "Elektronik", sorted by highest price.
     */
    public function test_user_can_search_laptop_in_elektronik_sorted_by_highest_price(): void
    {
        // 1. Data yang cocok
        Produk::create([
            'nama_produk' => 'Laptop Asus Vivobook',
            'kategori' => 'Elektronik',
            'harga' => 7500000,
            'stok' => 15,
        ]);

        Produk::create([
            'nama_produk' => 'Laptop Lenovo IdeaPad',
            'kategori' => 'Elektronik',
            'harga' => 6800000,
            'stok' => 8,
        ]);

        // 2. Data yang mengandung "Laptop" tapi BUKAN kategori "Elektronik"
        Produk::create([
            'nama_produk' => 'Buku Panduan Laptop',
            'kategori' => 'Buku',
            'harga' => 85000,
            'stok' => 30,
        ]);

        // 3. Data kategori "Elektronik" tapi BUKAN "Laptop"
        Produk::create([
            'nama_produk' => 'Monitor LG 24 Inch',
            'kategori' => 'Elektronik',
            'harga' => 1850000,
            'stok' => 12,
        ]);

        $response = $this->get(route('produk.index', [
            'q' => 'Laptop',
            'kategori' => 'Elektronik',
            'sort' => 'harga_desc',
            'page' => 1,
        ]));

        $response->assertStatus(200);

        // Hanya 2 item yang cocok
        $response->assertSee('Laptop Asus Vivobook');
        $response->assertSee('Laptop Lenovo IdeaPad');
        $response->assertDontSee('Buku Panduan Laptop');
        $response->assertDontSee('Monitor LG 24 Inch');

        // Pastikan terurut dari yang termahal: Asus (7.500.000) sebelum Lenovo (6.800.000)
        $response->assertSeeInOrder([
            'Laptop Asus Vivobook',
            'Laptop Lenovo IdeaPad',
        ]);
    }

    /**
     * Test pagination limits results to 5 items per page.
     */
    public function test_pagination_limits_to_five_items_per_page(): void
    {
        for ($i = 1; $i <= 7; $i++) {
            Produk::create([
                'nama_produk' => "Laptop Brand {$i}",
                'kategori' => 'Elektronik',
                'harga' => 5000000 + ($i * 100000),
                'stok' => 10,
            ]);
        }

        $response = $this->get(route('produk.index', [
            'q' => 'Laptop',
            'kategori' => 'Elektronik',
            'sort' => 'harga_desc',
            'page' => 1,
        ]));

        $response->assertStatus(200);

        // Pada halaman 1 hanya ada 5 item
        $data = $response->viewData('produk');
        $this->assertCount(5, $data->items());
        $this->assertEquals(7, $data->total());
    }

    /**
     * Test SQL injection payload is safely parameterized.
     */
    public function test_search_is_safe_from_sql_injection(): void
    {
        $response = $this->get(route('produk.index', [
            'q' => "' OR '1'='1",
            'kategori' => "Elektronik' OR 1=1 --",
            'sort' => 'harga; DROP TABLE produk; --',
        ]));

        // Tidak boleh menghasilkan SQL error (500), melainkan 200 dengan query yang aman
        $response->assertStatus(200);
    }
}
