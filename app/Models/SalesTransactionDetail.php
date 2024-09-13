<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesTransactionDetail extends Model
{
    use HasFactory;

    protected $fillable = ['transaction_id', 'product_id', 'quantity', 'price', 'subtotal'];

    public function salesTransaction()
    {
        return $this->belongsTo(SalesTransaction::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
