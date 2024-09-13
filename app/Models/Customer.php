<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone', 'address'];

    public function salesTransactions()
    {
        return $this->hasMany(SalesTransaction::class);
    }
}
