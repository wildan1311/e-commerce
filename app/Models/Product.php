<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    public $fillable = [
        'name',
        'price',
        'stock',
        'isActive',
        'image'
    ];

    public function transaksiDetail(){
        return $this->hasMany(TransaksiDetail::class, 'product_id', 'id');
    }
}
