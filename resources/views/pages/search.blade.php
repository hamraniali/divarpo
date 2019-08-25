@extends('main')
@section('title')
    جستوجو
@endsection
@section('head_left_icon')
    <button class="material-icons mdc-icon-button bold-font menu-btn btn-profile" data-mdc-ripple-is-unbounded="true" style="color: black;margin-top: 7px;margin-right: 15px;position: absolute;left: 10px">person</button>
@endsection
@section('content')
    <div class="container">
        @if(session('status') == 'success')
            <div style="text-align: center;height: auto;background-color: #d4edda; line-height: 51px;padding: 10px;color: #155724;border-radius: 150rem;
    border-color: #ffeeba;">
                <span>{{ session('message') }}</span>
            </div>
        @endif
        <form action="{{ route('search') }}">
            <div class="box-filter-search">
                @csrf
                <input name="search" placeholder="جستوجو..." type="text" style="border-radius: 5px;width: 100%;height: 45px;background-color: white;border: 1px solid #e0e0e0;padding: 10px;direction: rtl;" value="{{ isset($_GET['search']) && !empty($_GET['search']) ? $_GET['search'] : '' }}">
                <div style="display: flex;margin-top: 10px;width: 100%">
                    <div style="width: 50%">
                        <?php $cities = \App\City::all(); ?>
                        <div style="border-radius: 5px;border: 1px solid #e0e0e0;width: 100%;height: 37px;padding:13px;color: black;font-size:14px;background-color: white;cursor: pointer" class="city_select0">
                            <input class="distric_city0" name="distric" type="text" style="    position: relative;
    bottom: 4px;width: 82px;text-align: right;pointer-events:none;cursor: pointer;color: black;background-color: white;border: none" value="{{ isset($_GET['distric']) && !empty($_GET['distric']) ? $_GET['distric'] : '' }}" placeholder="موقعیت مکانی">
                            <span class="material-icons" style="float: left;position: relative;
    top: -9px;color: #6c757d">location_on</span>
                        </div>
                    </div>
                    <div style="width: 50%">
                        <select name="category" id="category" class="filter-select" style="width: 100%;border-radius: 5px !important;float: left!important;;direction: rtl;color: #6c757d">
                            @if(isset($_GET['category']) && !empty($_GET['category']))
                                <?php
                                $category_id = $_GET['category'];
                                $selected_category = \App\Category::find($category_id);
                                if ($selected_category) {
                                ?>
                                <option selected value="{{ $category_id }}">
                                    {{ $selected_category->name }}
                                </option>
                                <?php } ?>
                            @else
                                <option selected value="">
                                    دسته بندی
                                </option>
                            @endif
                            <?php $categories = \App\Category::all() ?>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div style="width: 100%;height: 40px;margin-top: 10px;">
                    <button type="submit" style="width: 100%;height: 100%;color: white;font-size: 16px;border: none;border-radius: 150rem" class="blue-shadow blue-color-back my-font btn-ripple mdc-ripple-surface">ثبت فیلتر</button>
                </div>
            </div>


    </div>
    <br class="space-mob">
    <div class="container">

        <div class="box-filter my-font">
            <div class="mdc-switch mdc-switch--disabled" style="margin-top: 9px;margin-left: 10px">
                <div class="mdc-switch__track"></div>
                <div class="mdc-switch__thumb-underlay">
                    <div class="mdc-switch__thumb">
                        <input type="checkbox" id="another-basic-switch" class="mdc-switch__native-control" role="switch" disabled>
                    </div>
                </div>
            </div>
            <label for="another-basic-switch" style="margin-left: 10px;">عکس دار</label>
            <select name="filter" id="fliter" class="filter-select" onchange="this.form.submit()">
                    <option value="newest" {{ isset($_GET['filter']) ? $_GET['filter'] == 'newest' ? 'selected' : '' : 'selected' }}>جدیدترین</option>
                    <option value="oldest" {{ isset($_GET['filter']) ? $_GET['filter'] == 'oldest' ? 'selected' : '' : '' }}>قدیمی ترین</option>
            </select>
            </form>
        </div>
    </div>
    <div class="container" style="padding: 0;
    margin-top: 10px;">

        @if(count($advertisings) > 0)
            @foreach($advertisings as $advertising)
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card" style="margin-top: 10px">
                        <div class="card-body box-agahi box-agahi-title">
                            <a href="{{ route('advertising' , ['id' => $advertising->id]) }}">
                                <div style="width: 100%;height: 150px;display: inline-flex;background-color: #e0e0e0">
                                    <div style="width: 50%;height: 100%;border-bottom: solid 1px #e0e0e0;z-index: 1;background-image: url('{{ array_key_exists('thump' , $advertising->images) ? $advertising->images['thump'] : ''}}')">
                                    </div>
                                    <i class="material-icons" style="position: absolute;
    font-size: 40px;
    color: #e9e9e9;
    top: 69px;
    z-index: 0;
    left: 21%;">camera_alt</i>
                                    <div style="width: 50%;height: 100%;background-color: white;border-bottom: 1px #e0e0e0 solid;padding: 7px;text-align: right;direction: rtl">
                                <span style="font-size: 16px;font-weight: bold" class="black-color">
{{ $advertising->name }}
                                </span>
                                        <div style="position: absolute;
    bottom: 59px;">
                                            <?php
                                            $city = \App\City::find($advertising->city_id);
                                            $district = \App\District::find($advertising->district_id);
                                            ?>
                                            <span style="font-size: 15px;" class="black-color">{{ $city->name }} - </span>
                                            <span style="font-size: 13px;color: #636b6f">{{ $district->name }}</span>
                                            <br>
                                            <?php
                                            $ekhtelaf = strtotime(\Carbon\Carbon::now()) - strtotime($advertising->created_at);
                                            $date = \Morilog\Jalali\Jalalian::forge(strtotime(\Carbon\Carbon::now()) - $ekhtelaf)->ago();
                                            ?>
                                            <span style="color: #9e9e9e;font-size: 12px;">{{ $date }}</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div style="width: 100%;height: 47px;direction: rtl;padding: 7px;line-height: 37px">
                                <span>قیمت : </span><span style="font-weight: bold;color: #ef5661">{{ $advertising->price }} ریال </span>
                                <span style="float: left;font-size: 12px;color: #9e9e9e;left: 10px;font-weight: bold;    position: relative;
                                ;" data-mdc-ripple-is-unbounded="true">
                                    {{ $advertising->status }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div style="text-align: center" class="container">
                <div style="text-align: center;height: 50px;background-color: #b91d19; line-height: 51px;   color: #856404;
    background-color: #fff3cd;border-radius: 150rem;
    border-color: #ffeeba;">
                    آگهی یافت نشد
                </div>
            </div>
        @endif
    </div>

    <div class="container" style="text-align: center">
        {{--<button class="my-font btn-ripple mdc-ripple-surface mdc-ripple-surface--accent btn-sabt my-font bold-font" style="border: none;border: 2px solid rgb(0, 191, 214) !important;background-color: #f5f5f5;color: rgb(0, 191, 214) !important;">--}}
        {{--<i class="material-icons" style="    position: relative;--}}
        {{--top: 9px;">expand_more--}}
        {{--</i>نمایش همه آگهی ها--}}
        {{--</button>--}}
        <br>
        {{ $advertisings->links() }}
    </div>

    {{--///////////////////////////////////////////////////////////////////////////////////////////--}}
    <div class="mdc-dialog dialog_city0"
         role="alertdialog"
         aria-modal="true"
         aria-labelledby="my-dialog-title"
         aria-describedby="my-dialog-content"
         dir="rtl">
        <div class="mdc-dialog__container my-font">
            <div class="mdc-dialog__surface">
                <!-- Title cannot contain leading whitespace due to mdc-typography-baseline-top() -->
                <h2 class="mdc-dialog__title my-font" id="my-dialog-title" style="text-align: center !important;">
                    <button class="material-icons mdc-icon-button close_city00" data-mdc-ripple-is-unbounded="true" style="float: right;position: relative;right: -10px">close</button>
                    <span style="font-size: 18px;    position: absolute;
    top: 16px;
    right: 153px;">شهر ها</span>
                </h2>
                <div class="mdc-dialog__content" id="my-dialog-content">
                    <ul class="mdc-list mdc-list0 mdc-list--avatar-list">
                        <?php
                        $cities = \App\City::all();
                        $districs = \App\District::all();
                        ?>
                        @foreach($cities as $city)
                            <select onchange="changeDistric0(this.value)" name="distric" class="my-font" id="distric" style="cursor: pointer;border-radius: 5px;padding: 10px;width: 100%;height: 40px;background-color: white;border: 1px solid #e0e0e0;margin-top: 10px;font-size: 14px;">
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
                        <button style="width: 199px;height: 45px;color: white;font-size: 16px;border: none;border-radius: 5px;font-weight: bold" class="close_city000 blue-shadow blue-color-back form-camera-set my-font btn-ripple mdc-ripple-surface">تایید</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="mdc-dialog__scrim"></div>
    </div>
    {{--///////////////////////////////////////////////////////////////////////////////////--}}
@endsection
@section('script')
    <script type="text/javascript">
        const dialog0 = new mdc.dialog.MDCDialog(document.querySelector('.dialog_city0'));
        // const dialog_dis = new mdc.dialog.MDCDialog(document.querySelector('.dialog_distric'));
        const list0 = new mdc.list.MDCList(document.querySelector('.dialog_city0 .mdc-list0'));
        const city_select0 = document.querySelector('.city_select0');
        const close_city00 = document.querySelector('.close_city00');
        const close_city000 = document.querySelector('.close_city000');
        city_select0.addEventListener('click' , (e) => {
            dialog0.open();
        });
        close_city00.addEventListener('click' , (e) => {
            dialog0.close();
            const distric_city0 = document.querySelector('.distric_city0');
            distric_city0.setAttribute('value' , '');
        });
        close_city000.addEventListener('click' , (e) => {
            dialog0.close();
        });
        // back_to_city.addEventListener('click' ,(e) => {
        //     dialog_dis.close();
        //     dialog.open();
        // });
        // close_all.addEventListener('click' ,(e) => {
        //     dialog_dis.close();
        //
        // });
        dialog0.listen('MDCDialog:opened', () => {
            list0.layout();
        });


    </script>
    <script type="text/javascript">
        function changeDistric0(id) {
            const distric_city0 = document.querySelector('.distric_city0');
            distric_city0.setAttribute('value' , id);
        }
    </script>
@endsection