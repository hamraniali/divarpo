<?php

namespace App\Http\Controllers;

use App\Advertising;
use Illuminate\Http\Request;

class AdvertisingController extends Controller
{
    public function create()
    {
        return view('pages.createAdd');
    }

    public function show($id)
    {
        $advertising = Advertising::find($id);
        return view('pages.advertising' , compact('advertising'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:255',
            'price' => 'required|max:255',
            'description' => 'required',
            'status' => 'required',
            'city' => 'required',
            'category' => 'required',
        ]);
        return response($request->all());
    }
}
