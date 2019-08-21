@extends('main')
@section('title')
    تایید شماره تلفن
@endsection
@section('head_left_icon')
    <a href="{{ \Illuminate\Support\Facades\URL::previous() }}" class="material-icons mdc-icon-button bold-font btn-left-side" data-mdc-ripple-is-unbounded="true" style="color: black;margin-top: 7px;margin-right: 15px;position: absolute;left: 10px">arrow_back</a>
@endsection
@section('content')
    <div class="container" dir="rtl">
        <div style="direction: rtl;width: 100%;height: auto;padding: 30px;display: inline-block;background-color: white;border: 1px solid #e0e0e0;box-shadow: 0px 0px 8px #e0e0e0">
            <h2 class="bold-font">تایید شماره تلفن</h2>
            <span style="font-size: 12px;color: #636b6f">کد فعاسازی به شماره شما ارسال خواهد شد.</span>
            <br>
            <span style="font-size: 12px;color: #636b6f">برای فعالسازی اکانت خود کد ارسال شده را در زیر وارد کنید.</span>
            <hr>
            <form action="{{ route('checkcode') }}" method="POST">
                @csrf
                <div class="mdc-text-field text-field mdc-text-field--outlined mdc-text-field--with-leading-icon col-lg-5 col-md-5 col-sm-12 col-xs-12 buti-border" style="height: 48px;float: right;margin-top: 10px;@error('code') border-right: 5px solid #ef5661!important; @enderror">
                    <i class="material-icons mdc-text-field__icon">mobile</i>
                    <input value="{{ old('code') }}" name="code" type="number" style="font-size: 16px;margin-right: 30px;border: none;width: 100%" class="my-font" placeholder="کد فعالسازی" aria-describedby="text-field-outlined-leading-helper-text">
                    <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                        <div class="mdc-notched-outline__leading">

                        </div>
                        <div class="mdc-notched-outline__notch" style="">
                            {{--<label class="mdc-floating-label my-font" for="text-field-outlined-leading" style="font-size: 24px;font-weight: bold">نام:</label>--}}
                        </div>
                        <div class="mdc-notched-outline__trailing">

                        </div>
                    </div>
                </div>
                <div class="mdc-text-field mdc-text-field--textarea col-lg-5 col-md-5 col-sm-12 col-xs-12 form-set" style="margin-top: 20px;float: right;justify-content:space-around">
                    <button type="submit" style="width: 199px;height: 45px;color: white;font-size: 16px;border: none;border-radius: 5px;font-weight: bold" class="blue-shadow blue-color-back my-font btn-ripple mdc-ripple-surface">تایید</button>
                </div>
            </form>
        </div>
    </div>
@endsection