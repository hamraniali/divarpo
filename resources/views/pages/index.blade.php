@extends('main')
@section('content')
    <div class="container">
        <form action="{{ route('search') }}">
            <div class="box-filter-search">
                @csrf
                <input name="search" placeholder="جستوجو..." type="text" style="border-radius: 5px;width: 100%;height: 45px;background-color: white;border: 1px solid #e0e0e0;padding: 10px;direction: rtl;" value="{{ isset($_GET['search']) && !empty($_GET['search']) ? $_GET['search'] : '' }}">
                <div style="display: flex;margin-top: 10px;width: 100%">
                    <div style="width: 50%">
                        <select name="city" id="city" class="filter-select" style="width: 100%;border-radius: 5px !important;float: right!important;margin: 0 !important;">
                            @if(isset($_GET['city']) && !empty($_GET['city']))
                                <?php
                                $city_name = $_GET['city'];
                                ?>
                                <option selected value="{{ $city_name }}">
                                    {{ $city_name }}
                                </option>
                            @else
                                <option selected value="">شهر</option>
                            @endif
                            <option value="">شهر</option>
                            <option value="">شهر</option>
                            <option value="">شهر</option>
                        </select>
                    </div>
                    <div style="width: 50%">
                        <select name="category" id="category" class="filter-select" style="width: 100%;border-radius: 5px !important;float: left!important;">
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
        </form>

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
            <select name="filter" id="fliter" class="filter-select">
                <option value="" selected>جدیدترین</option>
                <option value="">جدیدترین</option>
                <option value="">جدیدترین</option>
                <option value="">جدیدترین</option>
            </select>
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
                                <div style="width: 100%;height: 150px;display: inline-flex;background-color: #9e9e9e">
                                    <div style="width: 50%;height: 100%;border-bottom: solid 1px #e0e0e0;background-image: url('https://material-components.github.io/material-components-web-catalog/static/media/photos/3x2/2.jpg')"></div>
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
                                            <span style="color: #9e9e9e;font-size: 12px;">{{ $advertising->created_at }}</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div style="width: 100%;height: 47px;direction: rtl;padding: 7px;line-height: 37px">
                                <span>قیمت : </span><span style="font-weight: bold;color: #ef5661">{{ $advertising->price }} ریال </span>
                                <button class="material-icons mdc-icon-button" style="float: left;    position: relative;
    bottom: 7px;" data-mdc-ripple-is-unbounded="true">bookmark_border
                                </button>
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
        <button class="my-font btn-ripple mdc-ripple-surface mdc-ripple-surface--accent btn-sabt my-font bold-font" style="border: none;border: 2px solid rgb(0, 191, 214) !important;background-color: #f5f5f5;color: rgb(0, 191, 214) !important;">
            <i class="material-icons" style="    position: relative;
    top: 9px;">expand_more
            </i>نمایش همه آگهی ها
        </button>
    </div>
@endsection