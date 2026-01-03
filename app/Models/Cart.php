<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'mobil_id',
        'tanggal_sewa',
        'tanggal_kembali',
        'jumlah_hari',
        'total_harga',
        'status',
    ];

    protected $casts = [
        'tanggal_sewa' => 'date',
        'tanggal_kembali' => 'date',
        'total_harga' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mobil()
    {
        return $this->belongsTo(Mobil::class);
    }

    public function calculateTotal()
    {
        $this->jumlah_hari = $this->tanggal_sewa->diffInDays($this->tanggal_kembali);
        $this->total_harga = $this->jumlah_hari * $this->mobil->harga_sewa;
        return $this;
    }
}