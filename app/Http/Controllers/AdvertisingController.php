<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdvertisingController extends Controller
{
    public function create()
    {
        return view('pages.createAdd');
    }
}
