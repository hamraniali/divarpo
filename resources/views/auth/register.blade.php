@extends('main')

@section('content')
    <div class="container" dir="rtl">
        <div style="direction: rtl;width: 100%;height: auto;padding: 30px;display: inline-block;background-color: white;border: 1px solid #e0e0e0;box-shadow: 0px 0px 8px #e0e0e0">
            <h2 class="bold-font">فرم ثبت نام</h2>
            <hr>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mdc-text-field text-field mdc-text-field--outlined mdc-text-field--with-leading-icon col-lg-5 col-md-5 col-sm-12 col-xs-12" style="height: 48px;float: right;margin-top: 10px">
                    <i class="material-icons mdc-text-field__icon">person</i>
                    <input type="text" style="font-size: 16px;margin-right: 30px;border: none;width: 100%" class="my-font" placeholder="نام خود را وارد کنید..." aria-describedby="text-field-outlined-leading-helper-text">
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
                <div class="mdc-text-field text-field mdc-text-field--outlined mdc-text-field--with-leading-icon col-lg-5 col-md-5 col-sm-12 col-xs-12 form-set" style="float: right;margin-top: 10px;height: 48px">
                    <i class="material-icons mdc-text-field__icon">people</i>
                    <input type="text" style="font-size: 16px;margin-right: 30px;border: none;width: 100%" class="my-font" placeholder="نام خانوادگی خود را وارد کنید..." aria-describedby="text-field-outlined-leading-helper-text">
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
                <div class="mdc-text-field text-field mdc-text-field--outlined mdc-text-field--with-leading-icon col-lg-5 col-md-5 col-sm-12 col-xs-12" style="height: 48px;float: right;margin-top: 10px">
                    <i class="material-icons mdc-text-field__icon">phone</i>
                    <input type="text" style="font-size: 16px;margin-right: 30px;border: none;width: 100%" class="my-font" placeholder="شماره تلفن خود را وارد کنید..." aria-describedby="text-field-outlined-leading-helper-text">
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
                <div class="mdc-text-field text-field mdc-text-field--outlined mdc-text-field--with-leading-icon col-lg-5 col-md-5 col-sm-12 col-xs-12 form-set" style="height: 48px;float: right;margin-top: 10px">
                    <i class="material-icons mdc-text-field__icon">lock</i>
                    <input type="password" name="password" style="font-size: 16px;margin-right: 30px;border: none;width: 100%" class="my-font" placeholder="رمز عبور مورد نظر خود را وارد کنید..." aria-describedby="text-field-outlined-leading-helper-text">
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
                <div class="mdc-text-field mdc-text-field--textarea col-lg-5 col-md-5 col-sm-12 col-xs-12" style="margin-top: 10px;float: right">
                    <i class="material-icons mdc-text-field__icon" style="top: 10px;position: relative">location_on</i>
                    <textarea id="textarea" style="font-size: 16px;margin-right: 30px;border: none;width: 100%;margin-top: 12px;" class="my-font" placeholder="آدرس خود را وارد کنید..." rows="8" cols="40"></textarea>
                    <div class="mdc-notched-outline">
                        <div class="mdc-notched-outline__leading"></div>
                        <div class="mdc-notched-outline__notch">

                        </div>
                        <div class="mdc-notched-outline__trailing"></div>
                    </div>
                </div>
                <div class="mdc-text-field mdc-text-field--textarea col-lg-5 col-md-5 col-sm-12 col-xs-12" style="margin-top: 20px;float: right;justify-content:space-around">
                    <button type="submit" style="width: 199px;height: 45px;color: white;font-size: 16px;border: none;border-radius: 5px;font-weight: bold" class="blue-shadow blue-color-back my-font btn-ripple mdc-ripple-surface">ثبت نام</button>
                </div>
            </form>
        </div>
    </div>
@endsection
















{{--<div class="container">--}}
{{--<div class="row justify-content-center">--}}
{{--<div class="col-md-8">--}}
{{--<div class="card">--}}
{{--<div class="card-header">{{ __('Register') }}</div>--}}

{{--<div class="card-body">--}}
{{--<form method="POST" action="{{ route('register') }}">--}}
{{--@csrf--}}

{{--<div class="form-group row">--}}
{{--<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>--}}

{{--<div class="col-md-6">--}}
{{--<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>--}}

{{--@error('name')--}}
{{--<span class="invalid-feedback" role="alert">--}}
{{--<strong>{{ $message }}</strong>--}}
{{--</span>--}}
{{--@enderror--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="form-group row">--}}
{{--<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

{{--<div class="col-md-6">--}}
{{--<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">--}}

{{--@error('email')--}}
{{--<span class="invalid-feedback" role="alert">--}}
{{--<strong>{{ $message }}</strong>--}}
{{--</span>--}}
{{--@enderror--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="form-group row">--}}
{{--<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

{{--<div class="col-md-6">--}}
{{--<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">--}}

{{--@error('password')--}}
{{--<span class="invalid-feedback" role="alert">--}}
{{--<strong>{{ $message }}</strong>--}}
{{--</span>--}}
{{--@enderror--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="form-group row">--}}
{{--<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}

{{--<div class="col-md-6">--}}
{{--<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="form-group row mb-0">--}}
{{--<div class="col-md-6 offset-md-4">--}}
{{--<button type="submit" class="btn btn-primary">--}}
{{--{{ __('Register') }}--}}
{{--</button>--}}
{{--</div>--}}
{{--</div>--}}
{{--</form>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}