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
            'district_id' => 'required',
            'category' => 'required',
        ]);
//        return response($status);
//        if ($status != "آماده اجاره" || $status != "در دست مستاجر" || $status != "خارج از دسترس") {
//            return back()->with(['status' => 'error' , 'message' => 'مشکلی در ثبت بوجود آمده است لطفا دوباره تلاش کنید!']);
//        }
        $images = [];
        if ($request->image1 != null && isset($request->image1)) {
            $this->validate($request , [
               'image1' => 'image|mimes:jpeg,png,jpg|max:2048'
            ]);
            $images += ['1' => $request->image1];
        }
        if ($request->image2 != null && isset($request->image2)) {
            $this->validate($request , [
                'image2' => 'image|mimes:jpeg,png,jpg|max:2048'
            ]);
            $images += ['2' => $request->image2];
        }
        if ($request->image3 != null && isset($request->image3)) {
            $this->validate($request , [
                'image2' => 'image|mimes:jpeg,png,jpg|max:2048'
            ]);
        $images += ['3' => $request->image3];
        }
        return response($images);
        return response($request->all());
    }
}
