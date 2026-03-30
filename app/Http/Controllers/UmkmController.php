<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SiteSetting;

class UmkmController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(9);
        $setting = SiteSetting::getSetting();

        return view('umkm.index', compact('products', 'setting'));
    }
}
