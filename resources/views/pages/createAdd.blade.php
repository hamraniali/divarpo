@extends('main')

@section('content')
    @if(auth()->check())

    @else
        <div style="text-align: center" class="container">
            <div style="text-align: center;height: auto;background-color: #b91d19; line-height: 51px;padding: 10px;   color: #856404;
    background-color: #fff3cd;border-radius: 150rem;
    border-color: #ffeeba;">
                <span>برای ثبت رایگان آگهی باید ثبت نام کنید</span>
                <br>
                <a href="{{ route('login') }}" class=" my-font btn-ripple" style="background-color: #856404;color: white;font-size: 16px;padding: 10px 33px;border-radius: 5px">ورود</a>
                <a href="{{ route('register') }}" class=" my-font btn-ripple" style="background-color: #856404;color: white;font-size: 16px;padding: 10px 35px;border-radius: 5px">ثبت نام</a>
            </div>
        </div>
    @endif
@endsection