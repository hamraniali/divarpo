<?php

namespace App\Http\Controllers;

use App\Advertising;
use App\District;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

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
        $district = District::where('name' , $request->input('district_id'))->first();
        if ($district != null && $district != '') {
            $district_id = $district->id;
            $city_id = $district->city_id;
        }
        $images = [];
        ///// img one
        if ($request->file('image1') != null && $request->file('image1') != '') {
            $image = $request->file('image1');
            $image_thump = $this->resizeImage($image);
            $image1 = $this->uploadImage($image);
            $images += ['thump' => $image_thump, 1 => $image1];
        }
        ///// img two
        if ($request->file('image2') != null && $request->file('image2') != '') {
            $image = $request->file('image2');
            if ($request->file('image1') == null || $request->file('image1') == '') {
                $image_thump = $this->resizeImage($image);
                $images += ['thump' => $image_thump];
            }
            $image2 = $this->uploadImage($image);
            $images += [2 => $image2];
        }
        ///// img three

        if ($request->file('image3') != null && $request->file('image3') != '') {
            $image = $request->file('image3');
            if ($request->file('image1') == null || $request->file('image1') == '' &&
                $request->file('image2') == null || $request->file('image2') == '') {
                $image_thump = $this->resizeImage($image);
                $images += ['thump' => $image_thump];
            }
            $image3 = $this->uploadImage($image);
            $images += [ 3 => $image3];
        }

        if (auth()->check()) {
            if (auth()->user()->active == 1) {
                $insert = Advertising::create([
                    'category_id' => $request->input('category'),
                    'user_id' => auth()->user()->id,
                    'name' => $request->input('name'),
                    'description' => $request->input('description'),
                    'status' => $request->input('status'),
                    'district_id' => $district_id,
                    'city_id' => $city_id,
                    'price' => $request->input('price'),
                    'images' => $images,
                    'active' => 0
                ]);
                if ($insert) {
                    return redirect(route('home'))->with(['status' => 'success' , 'message' => 'آگهی شما ثبت شد و بعد از تایید نمایش داده می شود']);
                }
                else{
                    return redirect()->back()->with(['status' => 'error' , 'message' => 'مشکلی در فرایند ثبت بوجود آمده است. لطفا دوباره تلاش کنید']);
                }
            }
            else {
                return redirect(route('sendcode'))->with(['status' => 'error' , 'message' => 'برای اضافه کردن آگهی لازم است حساب خود را فعال کنید']);
            }
        }
        else {
            return redirect(route('login'))->with(['status' => 'error' , 'message' => 'برای اصافه کردن آگهی باید ثبت نام کنید']);
        }
    }


    public function resizeImage($image)
    {
        $filename = time().'.'.$image->getClientOriginalName();
        $image_resize = Image::make($image->getRealPath());
        $image_resize->resize(179, 150);
        $image_resize->save(public_path('images/thump/' .$filename));

        return '/images/thump/'.$filename;
    }


    public function uploadImage($image)    {
        // must be $request->file()...
        $filename = time().'.'.$image->getClientOriginalName();
        $destinationPath = public_path('/images/all');
        $image->move($destinationPath, $filename);

        return '/images/all/'.$filename;
    }
}
