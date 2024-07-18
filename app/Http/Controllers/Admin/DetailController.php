<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\Setting;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function show(Destination $destination)
    {
        $setting = Setting::first();
        return view('frontend.destination.detail', compact('destination', 'setting'));
    }
}
