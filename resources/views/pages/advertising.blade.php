@extends('main')
@section('title')
    <?php
          $city = \App\City::find($advertising->city_id);
          $district = \App\District::find($advertising->district_id);
          $category = \App\Category::find($advertising->category_id);
          $user = \App\User::find($advertising->user_id);
    ?>
    {{ $advertising->name . ' - ' . $city->name . ' - ' . $district->name }}
@endsection
@section('head_left_icon')
    <a href="{{ \Illuminate\Support\Facades\URL::previous() }}" class="material-icons mdc-icon-button bold-font btn-left-side" data-mdc-ripple-is-unbounded="true" style="color: black;margin-top: 7px;margin-right: 15px;position: absolute;left: 10px">arrow_back</a>
@endsection
@section('style')
    <link rel="stylesheet" href="{{ asset('/css/owl.carousel.min.css') }}">
@endsection
@section('content')
    <div class="container" style=";border-radius: 150rem;direction: rtl;height: auto;padding: 5px;background-color: white;box-shadow: 0 0 8px #e0e0e0">
         <span style="font-size: 12px"><a href="{{ route('home') }}"><i class="material-icons mdc-icon-button btn-ripple" data-mdc-ripple-is-unbounded="true" style="color: #9e9e9e">home</i></a>
             <span class="material-icons" style="position:relative;color: #9e9e9e;margin: 0 6px">keyboard_arrow_left</span>
             <span style="position:relative;bottom: 8px;color: #9e9e9e;font-weight: bold">{{ $city->name }}</span>
             <span class="material-icons" style="position:relative;color: #9e9e9e;margin: 0 6px">keyboard_arrow_left</span>
             <span style="position:relative;bottom: 8px;color: #9e9e9e;font-weight: bold"><a style="font-size: 12px;letter-spacing: 0!important;color: #9e9e9e!important;font-weight: bold" href="/search?distric={{ $district->name }}" class="mdc-button my-font btn-ripple mdc-ripple-surface--accent" data-mdc-ripple-is-unbounded="true">{{ $district->name }}</a></span>
             <span class="material-icons" style="position:relative;color: #9e9e9e;margin: 0 6px">keyboard_arrow_left</span>
             <span style="position:relative;bottom: 8px;color: #9e9e9e;font-weight: bold"><a style="font-size: 12px;letter-spacing: 0!important;color: #9e9e9e!important;font-weight: bold" href="/search?category={{ $category->id }}" class="mdc-button my-font btn-ripple mdc-ripple-surface--accent" data-mdc-ripple-is-unbounded="true">{{ $category->name }}</a></span>
             <span class="material-icons" style="position:relative;color: #9e9e9e;margin: 0 6px">keyboard_arrow_left</span>
             <span style="position:relative;bottom: 8px;color: #9e9e9e;font-weight: bold">{{ $advertising->name }}</span>
         </span>
    </div>
    <br>
    <div class="container pad-desk-true">
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12" style=";float: right;height: auto;padding: 5px;background-color: white;box-shadow: 0 0 8px #e0e0e0;border-radius: 5px">
            @if(count($advertising->images) > 0)
                <div id="owl-demo" class="owl-carousel owl-theme" style="background-color: #fff;border-radius: 5px;">
                    @if(array_key_exists(1 , $advertising->images))
                        <div class="item" style="background-color: #e0e0e0 !important;"><img src="{{ $advertising->images[1] }}" class="image-size-mod-desk"></div>
                        @elseif(array_key_exists(2 , $advertising->images))
                        <div class="item" style="background-color: #e0e0e0 !important;"><img src="{{ $advertising->images[2] }}" class="image-size-mod-desk"></div>
                        @else
                        <div class="item" style="background-color: #e0e0e0 !important;"><img src="{{ $advertising->images[3] }}" class="image-size-mod-desk"></div>
                    @endif
                    @if(array_key_exists(2 , $advertising->images))
                            <div class="item" style="background-color: #e0e0e0 !important;"><img src="{{ $advertising->images[2] }}" class="image-size-mod-desk"></div>
                        @elseif(array_key_exists(3,$advertising->images))
                            <div class="item" style="background-color: #e0e0e0 !important;"><img src="{{ $advertising->images[3] }}" class="image-size-mod-desk"></div>
                    @endif
                        @if(array_key_exists(3 , $advertising->images))
                            <div class="item" style="background-color: #e0e0e0 !important;"><img src="{{ $advertising->images[3] }}" class="image-size-mod-desk"></div>
                        @endif

                </div>
                <div class="owl-prev" style="position: absolute!important;top: 0%!important;right: 0px!important;height: 0!important;"></div>
                <div class="owl-next" style="position: absolute!important;top: 0%!important;left: 0px!important;height: 0!important;"></div>
            @else
                <div style=";background-color: #e0e0e0;border-radius: 5px;height: 90px;text-align: center;line-height: 5px">
                    <img width="80" style="opacity: 0.1;margin-top: 5px" src="{{ asset('/images/icons8-cute-color-128.png') }}" alt="photo">
                </div>
            @endif
            <div style="direction: rtl;padding: 20px">
                <h3 class="my-font">{{ $advertising->name }}</h3>
                <?php
                $ekhtelaf = strtotime(\Carbon\Carbon::now()) - strtotime($advertising->created_at);
                $date = \Morilog\Jalali\Jalalian::forge(strtotime(\Carbon\Carbon::now()) - $ekhtelaf)->ago();
                ?>
                <span style="font-size: 12px;color: #9e9e9e">{{ $date }}</span>
                <span style="font-size: 12px;color: #9e9e9e">در شهر</span>
                <span style="font-size: 12px;color: rgb(133, 100, 4)">{{ $city->name }}</span>
                <span style="font-size: 12px;color: #9e9e9e">محله</span>
                <span style="font-size: 12px;color: rgb(133, 100, 4)">{{ $district->name }}</span>
                <span style="font-size: 12px;color: #9e9e9e">دسته بندی</span>
                <span style="font-size: 12px;color: rgb(133, 100, 4)">{{ $category->name }}</span>
                <hr>
                <p>
                    {{ $advertising->description }}
                </p>
                <hr>
                <span>وضعیت: </span>
                <span style="font-size: 13px;color: rgb(133, 100, 4);font-weight: bold">{{ $advertising->status }}</span>
                <br>
                <br>
                <span>قیمت: </span>
                <span style="font-size: 13px;color: rgb(133, 100, 4);font-weight: bold">{{ $advertising->price }}</span>
                <br>
                <br>
                @if(auth()->check())
                    <button style="width: 100%;height: auto;padding:10px;color: white;font-size: 16px;border: none;border-radius: 5px;font-weight: bold" class="blue-shadow blue-color-back my-font btn-ripple mdc-ripple-surface"> تماس  {{ $user->phone }}</button>
                @else
                    <a href="{{ route('register') }}" style="letter-spacing: 0!important;background-color: #856404;box-shadow: 0 0 8px #856404;width: 100%;height: auto;padding:10px;color: white;font-size: 16px;border: none;border-radius: 5px;font-weight: bold" class="my-font btn-ripple mdc-ripple-surface mdc-button">برای تماس ثبت نام کنید</a>
                @endif
            </div>
        </div>
        <div class="pad-desk sticky-phone">
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 form-camera" style="height: auto;padding: 30px;background-color: white;box-shadow: 0 0 8px #e0e0e0;border-radius: 5px">
                <center><div style="background-color: #e0e0e0!important;border:5px solid rgb(0, 191, 214);border-radius: 150rem;width: 89px;height: 89px;background: url({{ asset('/images/icons8-circled-user-male-skin-type-3-80.png') }}) no-repeat center;"></div></center>
                <br>
                <center>
                    <div style="font-size: 18px;color: #9e9e9e;direction: rtl">
                        <span>{{ $user->name }}</span>
                        <span>{{ $user->family }}</span>
                    </div>
                </center>
                <br>

                @if(auth()->check())
                   <button style="width: 100%;height: auto;padding:10px;color: white;font-size: 16px;border: none;border-radius: 5px;font-weight: bold" class="blue-shadow blue-color-back my-font btn-ripple mdc-ripple-surface"> تماس  {{ $user->phone }}</button>
                @else
                    <a href="{{ route('register') }}" style="letter-spacing: 0!important;background-color: #856404;box-shadow: 0 0 8px #856404;width: 100%;height: auto;padding:10px;color: white;font-size: 16px;border: none;border-radius: 5px;font-weight: bold" class="my-font btn-ripple mdc-ripple-surface mdc-button">برای تماس ثبت نام کنید</a>
                @endif

            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript" src="{{ asset('/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/owl.carousel.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $("#owl-demo").owlCarousel({

                navigation : true, // Show next and prev buttons
                slideSpeed : 300,
                paginationSpeed : 400,
                singleItem:true,
                nav:true,
                navText: [
                    "<i class='material-icons'>keyboard_arrow_left</i>",
                    "<i class='material-icons'>keyboard_arrow_right</i>"
                ],
                navClass:[
                    'owl-prev',
                    'owl-next'
                ],
                // "singleItem:true" is a shortcut for:
                items : 1,
                // itemsDesktop : false,
                // itemsDesktopSmall : false,
                // itemsTablet: false,
                // itemsMobile : true
            });
        });
    </script>
    <script type="text/javascript">
        // $(document).ready(function () {
        //     $( ".owl-prev").html('<i class="material-icons">keyboard_arrow_left</i>');
        //     $( ".owl-next").html('<i class="material-icons">keyboard_arrow_right</i>');
        // });
    </script>
@endsection