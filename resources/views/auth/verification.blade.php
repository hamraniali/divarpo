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
            @if(session('status') == 'error')
                <div style="text-align: center;height: auto;background-color: #b91d19; line-height: 51px;padding: 10px;   color: #856404;
    background-color: #fff3cd;border-radius: 150rem;
    border-color: #ffeeba;">
                    <span>{{ session('message') }}</span>
                </div>
            @endif
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
            <form action="{{ route('sendcode') }}">
                <div class="mdc-text-field mdc-text-field--textarea col-lg-5 col-md-5 col-sm-12 col-xs-12" style="margin-top: 20px;float: right;justify-content: space-around">
                    <span style="display: block" id="text-countdown">ارسال مجدد کد فعالسازی در  <span style="color:#856404" id="countdown"></span> ثانیه دیگر</span>
                    <button id="btn-submit" type="submit" style="width: 199px;height: 45px;background: transparent;font-size: 16px;border: none;border-radius: 5px;font-weight: bold;color: #856404;" class="my-font btn-ripplet mdc-ripple-surface">ارسال مجدد</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        document.getElementById("btn-submit").style.display = "none";
        var timeleft = 60;
        var downloadTimer = setInterval(function(){
            document.getElementById("countdown").innerHTML = timeleft;
            timeleft -= 1;
            if(timeleft <= 0){
                clearInterval(downloadTimer);
                document.getElementById("btn-submit").style.display = "block";
                document.getElementById("text-countdown").style.display = "none";
            }
        }, 1000);
    </script>
@endsection