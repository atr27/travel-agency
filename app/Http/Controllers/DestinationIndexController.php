<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Setting;
use Illuminate\Http\Request;

class DestinationIndexController extends Controller
{
    public function index()
    {
        $destinations = Destination::all();
        $setting = Setting::first();
        return view('frontend.destination.index', compact('destinations', 'setting'));
    }
}
