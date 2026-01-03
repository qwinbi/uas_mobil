<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_mobil',
        'brand',
        'harga_sewa',
        'status',
        'foto',
        'deskripsi',
        'tipe',
        'tahun',
        'transmisi',
        'kapasitas',
    ];

    protected $casts = [
        'harga_sewa' => 'decimal:2',
    ];

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function peminjamans()
    {
        return $this->hasMany(Peminjaman::class);
    }

    public function isTersedia()
    {
        return $this->status === 'tersedia';
    }

    public function isDisewa()
    {
        return $this->status === 'disewa';
    }
}