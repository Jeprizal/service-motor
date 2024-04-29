<?php

namespace App\Models;
use App\Models\Transaksi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'produks';
    public function transaksis()
{
    return $this->hasMany(Transaksi::class, 'layanan_id', 'id');
}


}
