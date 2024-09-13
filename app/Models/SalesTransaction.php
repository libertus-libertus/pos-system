<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesTransaction extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'customer_id', 'total_price', 'payment_method', 'transaction_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function salesTransactionDetails()
    {
        return $this->hasMany(SalesTransactionDetail::class);
    }
}
