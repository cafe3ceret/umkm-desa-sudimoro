<?php

namespace App\Http\Controllers;

use App\Models\PotensiDesa;

class PotensiDesaController extends Controller
{
    public function index()
    {
        $potensis = PotensiDesa::orderBy('order')->orderBy('created_at', 'desc')->get();
        return view('potensi-desa.index', compact('potensis'));
    }
}
