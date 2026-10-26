<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanan';
    public $timestamps = false;
    
    protected $fillable = [
        'pelanggan_id', 
        'produk_id', 
        'jumlah', 
        'status', 
        'tanggal_pesan', 
        'catatan'
    ];

    // Relasi ke tabel pelanggan
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id');
    }

    // Relasi ke tabel produk
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}