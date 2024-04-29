<?php

namespace App\Models;
use App\Models\Produk;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'transaksis';
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'layanan_id');
    }
    public function payment()
    {
        return $this->hasMany(Payment::class);
    }
}
