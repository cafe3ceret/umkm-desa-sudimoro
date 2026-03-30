<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;

class MapController extends Controller
{
    public function index()
    {
        $setting = SiteSetting::getSetting();
        return view('map.index', compact('setting'));
    }
}
