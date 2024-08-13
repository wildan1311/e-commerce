<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiDetail extends Model
{
    use HasFactory;

    public $table = 'transaksi_detail';

    public $fillable = [
        'transaksi_id',
        'product_id',
        'quantity',
        'price',
        'sub_total',
    ];

    public function transaksi(){
        return $this->belongsTo(Transaksi::class, 'transaksi_id', 'id');
    }
}
