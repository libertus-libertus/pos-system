<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category_id', 'price', 'stock', 'description', 'image'];

    // Relasi ke Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relasi Product bisa muncul di banyak detail transaksi
    public function transactionDetails()
    {
        return $this->hasMany(TransactionDetail::class);
    }

}
