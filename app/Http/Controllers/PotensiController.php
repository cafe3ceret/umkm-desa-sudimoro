<?php

namespace App\Http\Controllers;

use App\Models\Potensi;
use App\Models\SiteSetting;

class PotensiController extends Controller
{
    public function index()
    {
        $potensis = Potensi::orderBy('order')->get();
        $setting = SiteSetting::getSetting();

        return view('potensi.index', compact('potensis', 'setting'));
    }
}
