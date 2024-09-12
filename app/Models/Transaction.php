<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'customer_id', 'total_amount', 'payment_method', 'transaction_date'];

    // Relasi Transaction ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi Transaction ke Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // Relasi Transaction bisa memiliki banyak detail transaksi
    public function transactionDetails()
    {
        return $this->hasMany(TransactionDetail::class);
    }

    // Relasi ke Payment
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
