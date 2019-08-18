@extends('main')

@section('content')
    @if(!auth()->check())
        <form action="{{ route('createAdvertising') }}" method="POST">
            <div class="container" dir="rtl">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="float: right;direction: rtl;height: auto;padding: 30px;display: inline-block;background-color: white;border: 1px solid #e0e0e0;box-shadow: 0px 0px 8px #e0e0e0">
                    <h2 class="bold-font">ثبت رایگان آگهی</h2>
                    <hr>
                        @csrf
                        <div class="mdc-text-field text-field mdc-text-field--outlined mdc-text-field--with-leading-icon col-lg-12 col-md-12 col-sm-12 col-xs-12 buti-border" style="height: 48px;float: right;margin-top: 10px;@error('name') border-right: 5px solid #ef5661!important; @enderror">
                            <i class="material-icons mdc-text-field__icon">title</i>
                            <input type="text" value="{{ old('name') }}" name="name" style="font-size: 16px;margin-right: 30px;border: none;width: 100%" class="my-font" placeholder="عنوان آگهی را وارد کنید..." aria-describedby="text-field-outlined-leading-helper-text">
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
                        @error('name')
                             <b style="margin-top: 5px;color: #b91d19;margin-right: 10px">این بخش را کامل کنید</b>
                        @enderror
                        <div class="mdc-text-field text-field mdc-text-field--outlined mdc-text-field--with-leading-icon col-lg-12 col-md-12 col-sm-12 col-xs-12 buti-border " style="height: 48px;float: right;margin-top: 10px;@error('price') border-right: 5px solid #ef5661!important; @enderror">
                            <i class="material-icons mdc-text-field__icon">attach_money</i>
                            <input name="price" type="number" value="{{ old('price') }}" style="font-size: 16px;margin-right: 30px;border: none;width: 100%" class="my-font" placeholder="قیمت را وارد کنید..." aria-describedby="text-field-outlined-leading-helper-text">
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
                        @error('price')
                        <b style="margin-top: 5px;color: #b91d19;margin-right: 10px">این بخش را کامل کنید</b>
                        @enderror
                        <div class="mdc-text-field mdc-text-field--textarea col-lg-12 col-md-12 col-sm-12 col-xs-12 buti-border" style="margin-top: 10px;float: right;@error('description') border-right: 5px solid #ef5661!important; @enderror">
                            <i class="material-icons mdc-text-field__icon" style="top: 10px;position: relative">description</i>
                            <textarea name="description" id="textarea" style="font-size: 16px;margin-right: 30px;border: none;width: 100%;margin-top: 12px;" class="my-font" placeholder="توضیحات آگهی را وارد کنید..." rows="8" cols="40">{{ old('description') }}</textarea>
                            <div class="mdc-notched-outline">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">

                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                            </div>
                        </div>
                        @error('description')
                        <b style="margin-top: 5px;color: #b91d19;margin-right: 10px">این بخش را کامل کنید</b>
                        @enderror
                        <div class="mdc-text-field text-field mdc-text-field--outlined mdc-text-field--with-leading-icon col-lg-12 col-md-12 col-sm-12 col-xs-12 buti-border" style="padding: 0;height: 48px;float: right;margin-top: 10px">
                            <select name="status" id="status" class="my-font" style=";padding:13px;font-size:16px;width: 100%;height: 100%;border: 1px solid #9e9e9e;background-color: transparent;border-radius: 5px">
                                <option value="آماده اجاره">آماده اجاره</option>
                                <option value="در دست مستاجر">در دست مستاجر</option>
                                <option value="خارج از دسترس">خارج از دسترس</option>
                            </select>
                        </div>
                        <div class="mdc-text-field text-field mdc-text-field--outlined mdc-text-field--with-leading-icon col-lg-12 col-md-12 col-sm-12 col-xs-12 buti-border " style="padding: 0;height: 48px;float: right;margin-top: 10px">
                            <select name="city" id="city" class="my-font" style=";padding:13px;font-size:16px;width: 100%;height: 100%;border: 1px solid #9e9e9e;background-color: transparent;border-radius: 5px">
                                <option value="city1">شهر</option>
                                <option value="city1">city1</option>
                                <option value="city2">city2</option>
                                <option value="city3">city3</option>
                            </select>
                        </div>
                        <div class="mdc-text-field text-field mdc-text-field--outlined mdc-text-field--with-leading-icon col-lg-12 col-md-12 col-sm-12 col-xs-12 buti-border" style="padding: 0;height: 48px;float: right;margin-top: 10px">
                            <select name="category" id="category" class="my-font" style=";padding:13px;font-size:16px;width: 100%;height: 100%;border: 1px solid #9e9e9e;background-color: transparent;border-radius: 5px">
                                <option value="city1">دسته</option>
                                <option value="city1">city1</option>
                                <option value="city2">city2</option>
                                <option value="city3">city3</option>
                            </select>
                        </div>
                </div>
                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 form-camera" style="direction: rtl;height: auto;padding: 30px;float: left;display: inline-block;background-color: white;border: 1px solid #e0e0e0;box-shadow: 0px 0px 8px #e0e0e0;">
                        <h2 class="bold-font">اضافه کردن عکس</h2>
                        <hr>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6" style="float: right;height: 100px">
                            <input type="file" name="image1" id="file" />
                            <label for="file" class="btn-3" style="width: 100%;border-radius: 5px!important;height: 100%"><span class="material-icons" style="    top: 27px;
    position: relative;
    font-size: 40px;">add</span></label>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6" style="float: right;height: 100px">
                            <input type="file" name="image2" id="file"/>
                            <label for="file" class="btn-3" style="width: 100%;border-radius: 5px!important;height: 100%"><span class="material-icons" style="    top: 27px;
    position: relative;
    font-size: 40px;">camera_alt</span></label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6" style="float: right;height: 100px">
                            <input type="file" name="image3" id="file" />
                            <label for="file" class="btn-3 form-camera-set" style="width: 100%;border-radius: 5px!important;height: 100%"><span class="material-icons" style="    top: 27px;
    position: relative;
    font-size: 40px;">camera_alt</span></label>
                        </div>
                        <div class="mdc-text-field mdc-text-field--textarea col-lg-12 col-md-12 col-sm-12 col-xs-12 form-camera-set" style="margin-top: 20px;float: right;justify-content:space-around;">
                            <button type="submit" style="width: 199px;height: 45px;color: white;font-size: 16px;border: none;border-radius: 5px;font-weight: bold" class="blue-shadow blue-color-back form-camera-set my-font btn-ripple mdc-ripple-surface">ثبت آگهی</button>
                        </div>
                    </div>
            </div>
        </form>
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