@extends('main')
@section('title')
   ورود
@endsection
@section('head_left_icon')
    <a href="{{ \Illuminate\Support\Facades\URL::previous() }}" class="material-icons mdc-icon-button bold-font btn-left-side" data-mdc-ripple-is-unbounded="true" style="color: black;margin-top: 7px;margin-right: 15px;position: absolute;left: 10px">arrow_back</a>
@endsection
@section('content')
    <div class="container" dir="rtl">
        <div style="direction: rtl;width: 100%;height: auto;padding: 30px;display: inline-block;background-color: white;border: 1px solid #e0e0e0;box-shadow: 0px 0px 8px #e0e0e0">
            <h2 class="bold-font">فرم ورود</h2>
            <hr>
            @if(session('status') == 'error')
            <div style="text-align: center;height: auto;background-color: #b91d19; line-height: 51px;padding: 10px;   color: #856404;
    background-color: #fff3cd;border-radius: 150rem;
    border-color: #ffeeba;">
                <span>{{ session('message') }}</span>
            </div>
            @endif
            <form action="{{ route('signin') }}" method="POST">
                @csrf
                <div class="mdc-text-field text-field mdc-text-field--outlined mdc-text-field--with-leading-icon col-lg-5 col-md-5 col-sm-12 col-xs-12 buti-border" style="@error('phone') border-right: 5px solid #ef5661!important; @enderror;height: 48px;float: right;margin-top: 10px">
                    <i class="material-icons mdc-text-field__icon">phone</i>
                    <input value="{{ old('phone') }}" name="phone" type="text" style="font-size: 16px;margin-right: 30px;border: none;width: 100%" class="my-font" placeholder="شماره تلفن خود را وارد کنید..." aria-describedby="text-field-outlined-leading-helper-text">
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
                <div class="mdc-text-field text-field mdc-text-field--outlined mdc-text-field--with-leading-icon col-lg-5 col-md-5 col-sm-12 col-xs-12 buti-border form-set" style="@error('password') border-right: 5px solid #ef5661!important; @enderror;height: 48px;float: right;margin-top: 10px">
                    <i class="material-icons mdc-text-field__icon">lock</i>
                    <input value="{{ old('password') }}" type="password" name="password" style="font-size: 16px;margin-right: 30px;border: none;width: 100%" class="my-font" placeholder="رمز عبور مورد نظر خود را وارد کنید..." aria-describedby="text-field-outlined-leading-helper-text">
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
                    <button type="submit" style="width: 199px;height: 45px;color: white;font-size: 16px;border: none;border-radius: 5px;font-weight: bold" class="blue-shadow blue-color-back my-font btn-ripple mdc-ripple-surface">ورود</button>
                </div>

                    <div class="mdc-text-field mdc-text-field--textarea col-lg-5 col-md-5 col-sm-12 col-xs-12 form-set" style="text-align: center;line-height: 47px;margin-top: 20px;float: right;justify-content:space-around">
                        <a href="{{ route('register') }}" type="submit" style="width: 199px;height: 45px;color: white;font-size: 16px;border: none;border-radius: 5px;font-weight: bold" class="blue-color my-font btn-ripple mdc-ripple-surface--accent	mdc-ripple-surface">می خواهید ثبت نام کنید؟</a>
                    </div>
            </form>
        </div>
    </div>
@endsection











{{--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>--}}
