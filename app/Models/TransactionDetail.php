<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $fillable = ['transaction_id', 'product_id', 'quantity', 'subtotal'];

    // Relasi TransactionDetail ke Transaction
    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    // Relasi TransactionDetail ke Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
