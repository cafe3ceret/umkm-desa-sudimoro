<?php

namespace App\Http\Controllers;

use App\Models\Potensi;
use App\Models\PotensiDesa;
use App\Models\Product;
use App\Models\Slider;
use App\Models\SiteSetting;

class HomeController extends Controller
{
    public function index()
    {
        $sliders     = Slider::where('is_active', true)->orderBy('order')->get();
        $potensis    = Potensi::orderBy('order')->take(6)->get();
        $potensiDesa = PotensiDesa::orderBy('order')->orderBy('created_at', 'desc')->take(6)->get();
        $products    = Product::latest()->take(6)->get();
        $setting     = SiteSetting::getSetting();

        return view('home.index', compact('sliders', 'potensis', 'potensiDesa', 'products', 'setting'));
    }
}
