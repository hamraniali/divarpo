<?php

namespace App\Http\Controllers;

use App\Advertising;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $advertisings = Advertising::active()->latest()->paginate(20);
        return view('pages.index' , compact('advertisings'));
    }

    public function search(Request $request)
    {
        $advertisings = Advertising::active()->search($request->all())->latest()->paginate(20);
        return view('pages.search' , compact('advertisings'));
    }
}
