<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    public $table = 'transaksi';

    public $fillable = [
        'user_id',
        'status',
        'total',
    ];

    public function transaksiDetail(){
        return $this->hasMany(TransaksiDetail::class, 'transaksi_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
