<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseTransaction extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'supplier_id', 'total_price', 'transaction_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function purchaseTransactionDetails()
    {
        return $this->hasMany(PurchaseTransactionDetail::class, 'transaction_id');
    }
}
