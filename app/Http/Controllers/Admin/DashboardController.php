<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Potensi;
use App\Models\Product;
use App\Models\Slider;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'sliders' => Slider::count(),
            'potensis' => Potensi::count(),
            'products' => Product::count(),
        ];
        return view('admin.dashboard.index', compact('stats'));
    }
}
