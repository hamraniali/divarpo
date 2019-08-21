@extends('main')
@section('title')
    ثبت رایگان آگهی
@endsection
@section('head_left_icon')
    <a href="{{ \Illuminate\Support\Facades\URL::previous() }}" class="material-icons mdc-icon-button bold-font btn-left-side" data-mdc-ripple-is-unbounded="true" style="color: black;margin-top: 7px;margin-right: 15px;position: absolute;left: 10px">arrow_back</a>
@endsection
@section('content')
    @if(auth()->check())
        @if(auth()->user()->active == 1)
        <form action="{{ route('createAdvertising') }}" method="POST">
            <div class="container" dir="rtl">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="float: right;direction: rtl;height: auto;padding: 30px;display: inline-block;background-color: white;border: 1px solid #e0e0e0;box-shadow: 0px 0px 8px #e0e0e0">
                    <h2 class="bold-font">ثبت رایگان آگهی</h2>
                    <hr>
                    @if(session('status') == 'error')
                        <div style="text-align: center;height: auto;background-color: #b91d19; line-height: 51px;padding: 10px;   color: #856404;
    background-color: #fff3cd;border-radius: 150rem;
    border-color: #ffeeba;">
                            <span>{{ session('message') }}</span>
                        </div>
                    @endif
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
                        <div class="mdc-text-field text-field mdc-text-field--outlined mdc-text-field--with-leading-icon col-lg-12 col-md-12 col-sm-12 col-xs-12 buti-border" style="padding: 0;height: 48px;float: right;margin-top: 10px;@error('status') border-right: 5px solid #ef5661!important; @enderror">
                            <select name="status" id="status" class="my-font" style=";padding:13px;font-size:16px;width: 100%;height: 100%;border: 1px solid #9e9e9e;background-color: transparent;border-radius: 5px">
                            <option value="{{ old('status') == '' || old('status') == null ? '' : old('status') }}" selected>{{ old('status') == '' || old('status') == null ? 'وضعیت' : old('status') }}</option>
                                <option value="آماده اجاره">آماده اجاره</option>
                                <option value="در دست مستاجر">در دست مستاجر</option>
                                <option value="خارج از دسترس">خارج از دسترس</option>
                            </select>
                        </div>
                        <div class="mdc-text-field text-field mdc-text-field--outlined mdc-text-field--with-leading-icon col-lg-12 col-md-12 col-sm-12 col-xs-12 buti-border " style="padding: 0;height: 48px;float: right;margin-top: 10px;@error('district_id') border-right: 5px solid #ef5661!important; @enderror">
                            <div style="border-radius: 5px;border: 1px solid #9e9e9e;width: 100%;height: 100%;padding:13px;color: black;font-size:14px;background-color: white;cursor: pointer " class="city_select2">
                                <input class="distric_city2" name="district_id" type="text" style="pointer-events:none;cursor: pointer;color: black;background-color: white;border: none" value="{{ old('district_id') != null && !empty(old('district_id')) ? old('district_id') : '' }}" placeholder="موقعیت مکانی">
                                <span class="material-icons" style="float: left;position: relative;top: -4px;">arrow_back</span>
                            </div>
                        </div>
                        <div class="mdc-text-field text-field mdc-text-field--outlined mdc-text-field--with-leading-icon col-lg-12 col-md-12 col-sm-12 col-xs-12 buti-border" style="padding: 0;height: 48px;float: right;margin-top: 10px;@error('category') border-right: 5px solid #ef5661!important; @enderror">
                            <select name="category" id="category" class="my-font" style=";padding:13px;font-size:16px;width: 100%;height: 100%;border: 1px solid #9e9e9e;background-color: transparent;border-radius: 5px">
                                <?php $categories = \App\Category::all(); ?>
                                <option value="{{ old('category') == '' || old('category') == null ? '' : old('category') }}">{{ old('category') == '' || old('category') == null ? 'دسته بندی' : \App\Category::find(old('category'))->name }}</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                </div>
                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 form-camera" style="direction: rtl;height: auto;padding: 30px;float: left;display: inline-block;background-color: white;border: 1px solid #e0e0e0;box-shadow: 0px 0px 8px #e0e0e0;">
                        <h2 class="bold-font">اضافه کردن عکس</h2>
                        <hr>

                            @error('image1')
                                <div style="text-align: center;height: auto;background-color: #b91d19; line-height: 51px;padding: 10px;   color: #856404;
            background-color: #fff3cd;border-radius: 150rem;
            border-color: #ffeeba;">
                                    <span>فرمت عکس باید png , jpeg , jpg و حجم آن کمتر از 2048 باشد</span>
                                </div>
                                <br>
                            @enderror
                        @error('image2')
                        <div style="text-align: center;height: auto;background-color: #b91d19; line-height: 51px;padding: 10px;   color: #856404;
            background-color: #fff3cd;border-radius: 150rem;
            border-color: #ffeeba;">
                            <span>فرمت عکس باید png , jpeg , jpg و حجم آن کمتر از 2048 باشد</span>
                        </div>
                        <br>
                        @enderror
                        @error('image3')
                        <div style="text-align: center;height: auto;background-color: #b91d19; line-height: 51px;padding: 10px;   color: #856404;
            background-color: #fff3cd;border-radius: 150rem;
            border-color: #ffeeba;">
                            <span>فرمت عکس باید png , jpeg , jpg و حجم آن کمتر از 2048 باشد</span>
                        </div>
                        <br>
                        @enderror

                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6" style="float: right;height: 100px">
                            <input type="file" name="image1" id="file1" class="image1" onchange="image1func()"/>
                            <label for="file1" class="btn-3" style="width: 100%;border-radius: 5px!important;height: 100%"><span class="material-icons" style="    top: 27px;
    position: relative;
    font-size: 40px;" id="image-icon1">camera_alt</span></label>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6" style="float: right;height: 100px">
                            <input type="file" name="image2" id="file2" class="image2" onchange="image2func()"/>
                            <label for="file2" class="btn-3" style="width: 100%;border-radius: 5px!important;height: 100%"><span class="material-icons" style="    top: 27px;
    position: relative;
    font-size: 40px;" id="image-icon2">camera_alt</span></label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6" style="float: right;height: 100px">
                            <input type="file" name="image3" id="file3" class="image3" onchange="image3func()"/>
                            <label for="file3" class="btn-3 form-camera-set" style="width: 100%;border-radius: 5px!important;height: 100%"><span class="material-icons" style="    top: 27px;
    position: relative;
    font-size: 40px;" id="image-icon3">camera_alt</span></label>
                        </div>
                        <div class="mdc-text-field mdc-text-field--textarea col-lg-12 col-md-12 col-sm-12 col-xs-12 form-camera-set" style="margin-top: 20px;float: right;justify-content:space-around;">
                            <button type="submit" style="width: 199px;height: 45px;color: white;font-size: 16px;border: none;border-radius: 5px;font-weight: bold" class="blue-shadow blue-color-back form-camera-set my-font btn-ripple mdc-ripple-surface">ثبت آگهی</button>
                        </div>
                    </div>

                {{--<input type="file" class="image11" onchange="image1func()"><span class="material-icons" id="image-icon1">camera_alt</span></input>--}}
                {{--<input type="file" class="image22" onchange="image2func()"><span class="material-icons" id="image-icon2">camera_alt</span></input>--}}
                {{--<input type="file"><i class="material-icons">camera_alt</i></input>--}}
            </div>
        </form>
        {{--///////////////////////////////////////////////////////////////////////////////////////////--}}
        <div class="mdc-dialog dialog_city2"
             role="alertdialog"
             aria-modal="true"
             aria-labelledby="my-dialog-title"
             aria-describedby="my-dialog-content"
             dir="rtl">
            <div class="mdc-dialog__container my-font">
                <div class="mdc-dialog__surface">
                    <!-- Title cannot contain leading whitespace due to mdc-typography-baseline-top() -->
                    <h2 class="mdc-dialog__title my-font" id="my-dialog-title" style="text-align: center !important;">
                        <button class="material-icons mdc-icon-button close_city22" data-mdc-ripple-is-unbounded="true" style="float: right;position: relative;right: -10px">close</button>
                        <span style="font-size: 18px;    position: absolute;
    top: 16px;
    right: 153px;">شهر ها</span>
                    </h2>
                    <div class="mdc-dialog__content" id="my-dialog-content">
                        <ul class="mdc-list mdc-list2 mdc-list--avatar-list">
                            <?php
                            $cities = \App\City::all();
                            $districs = \App\District::all();
                            ?>
                            @foreach($cities as $city)
                                <select onchange="changeDistric2(this.value)" name="distric" class="my-font" id="distric" style="cursor: pointer;border-radius: 5px;padding: 10px;width: 100%;height: 40px;background-color: white;border: 1px solid #e0e0e0;margin-top: 10px;font-size: 14px;">
                                    <option value="" selected>{{ $city->name }}</option>
                                    @foreach($districs as $distric)
                                        @if($distric->city_id == $city->id)
                                            <option value="{{ $distric->name }}">{{ $distric->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            @endforeach
                        </ul>
                        <div class="mdc-text-field mdc-text-field--textarea col-lg-12 col-md-12 col-sm-12 col-xs-12 form-camera-set" style="margin-top: 20px;float: right;justify-content:space-around;">
                            <button style="width: 199px;height: 45px;color: white;font-size: 16px;border: none;border-radius: 5px;font-weight: bold" class="close_city222 blue-shadow blue-color-back form-camera-set my-font btn-ripple mdc-ripple-surface">تایید</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mdc-dialog__scrim"></div>
        </div>
        {{--///////////////////////////////////////////////////////////////////////////////////--}}
         @else
            <div style="text-align: center" class="container">
                <div style="text-align: center;height: auto;background-color: #b91d19; line-height: 51px;padding: 10px;   color: #856404;
    background-color: #fff3cd;border-radius: 150rem;
    border-color: #ffeeba;">
                    <span>برای ثبت رایگان آگهی باید شماره خود را فعال کنید کنید</span>
                    <br>
                    <form action="{{ route('sendcode') }}">
                        <button class=" my-font btn-ripple" style="border: none;background-color: #856404;color: white;font-size: 16px;padding: 10px 33px;border-radius: 5px;padding: 0 30px !important;">فعالسازی</button>
                    </form>
                </div>
            </div>
         @endif
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
@section('script')
    <script type="text/javascript">
        function image1func() {
            const image1 = document.querySelector('.image1');
            const image_icon1 = document.getElementById('image-icon1');
            if (image1.files.length === 1) {
                image_icon1.innerHTML = 'check';
            }
            else if(image1.files.length === 0) {
                image_icon1.innerHTML = 'camera_alt';
            }
        }
        function image2func() {
            const image2 = document.querySelector('.image2');
            const image_icon2 = document.getElementById('image-icon2');
            if (image2.files.length === 1) {
                image_icon2.innerHTML = 'check';
            }
            else if(image2.files.length === 0) {
                image_icon2.innerHTML = 'camera_alt';
            }
        }
        function image3func() {
            const image3 = document.querySelector('.image3');
            const image_icon3 = document.getElementById('image-icon3');
            if (image3.files.length === 1) {
                image_icon3.innerHTML = 'check';
            }
            else if(image3.files.length === 0) {
                image_icon3.innerHTML = 'camera_alt';
            }
        }
    </script>
    <script type="text/javascript">
        const dialog2 = new mdc.dialog.MDCDialog(document.querySelector('.dialog_city2'));
        // const dialog_dis = new mdc.dialog.MDCDialog(document.querySelector('.dialog_distric'));
        const list2 = new mdc.list.MDCList(document.querySelector('.dialog_city2 .mdc-list2'));
        const city_select2 = document.querySelector('.city_select2');
        const close_city22 = document.querySelector('.close_city22');
        const close_city222 = document.querySelector('.close_city222');
        city_select2.addEventListener('click' , (e) => {
            dialog2.open();
        });
        close_city22.addEventListener('click' , (e) => {
            dialog2.close();
            const distric_city2 = document.querySelector('.distric_city2');
            distric_city2.setAttribute('value' , '');
        });
        close_city222.addEventListener('click' , (e) => {
            dialog2.close();
        });
        // back_to_city.addEventListener('click' ,(e) => {
        //     dialog_dis.close();
        //     dialog.open();
        // });
        // close_all.addEventListener('click' ,(e) => {
        //     dialog_dis.close();
        //
        // });
        dialog2.listen('MDCDialog:opened', () => {
            list2.layout();
        });


    </script>
    <script type="text/javascript">
        function changeDistric2(id) {
            const distric_city2 = document.querySelector('.distric_city2');
            distric_city2.setAttribute('value' , id);
        }
    </script>
@endsection

