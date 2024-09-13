<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $total_products = Product::count();
        return view('dashboard', compact('total_products'));
    }
}
