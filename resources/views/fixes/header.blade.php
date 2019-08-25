<header class="mdc-top-app-bar my-font" dir="ltr" style="background-color: white;box-shadow: 3px 3px 3px #e0e0e0">
    <div class="mdc-top-app-bar__row" dir="rtl">
        <div class="desk-head">
            <button class="material-icons mdc-icon-button bold-font menu-btn" data-mdc-ripple-is-unbounded="true" style="color: black;margin-top: 7px;margin-right: 15px;">menu</button>
            <span class="mdc-top-app-bar__title my-font" style="line-height: 63px;padding-left: 23px;">
                    <a href="{{ route('home') }}"><img class="logo" src="{{ asset('/images/download.png') }}" alt="my site" style="width: 90px;margin-top: -18px"></a>
                </span>
        </div>

        <div class="mobile-head">
            <button class="material-icons mdc-icon-button bold-font menu-btn-mobile" data-mdc-ripple-is-unbounded="true" style="color: black;margin-top: 7px;margin-right: 15px;    position: absolute;
    right: 0;float: right">menu</button>
            <span class="mdc-top-app-bar__title my-font" style="line-height: 63px;padding-left: 23px;">
                    <a href="{{ route('home') }}"><img class="logo" src="{{ asset('/images/download.png') }}" alt="my site" style="width: 90px;
    height: 40px;;margin-top: -7px"></a>
                </span>
        </div>
        <section class="mdc-top-app-bar__section section-search" style="padding-right: 30px;">
            <form action="{{ route('search') }}" style="display: contents!important;">
                @csrf
                <div style="width: 100%;height: 47px;border-radius: 150rem;display: inherit;padding-left: 10px;">
                    <input style="font-size: 14px!important;" type="text" value="{{ isset($_GET['search']) && !empty($_GET['search']) ? $_GET['search'] : '' }}" name="search" class="box-search black-color" placeholder="جستوجو...">
                    <div style="width: 25%;height: 100%;background-color: #f5f5f5" class="border-input">
                        <?php $cities = \App\City::all(); ?>
                        <div style="width: 100%;height: 100%;padding:13px;color: black;font-size:14px;background-color: white;cursor: pointer" class="city_select">
                            <input class="distric_city" name="distric" type="text" style="pointer-events:none;cursor: pointer;color: black;background-color: white;border: none" value="{{ isset($_GET['distric']) && !empty($_GET['distric']) ? $_GET['distric'] : '' }}" placeholder="موقعیت مکانی">
                            <span class="material-icons" style="float: left;position: relative;
    top: -4px;">arrow_back</span>
                        </div>
                    </div>
                    <div style="width: 25%;height: 100%;background-color: #f5f5f5" class="border-input">
                        <select name="category" id="category" class="my-font search-select" style="color: #636b6f!important;font-size: 14px !important;
    padding-right: 11px;
    padding-left: 11px;">
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
                    <div class="btn-search btn-ripple mdc-ripple-surface" style="width: 100px!important;background-color: rgb(133, 100, 4)!important;box-shadow: -3px 0 8px rgb(133, 100, 4)">
                        <button type="submit" class="material-icons" data-mdc-ripple-is-unbounded="true" style="background-color: rgb(133, 100, 4);color: white!important;border-radius: 30px;border: none!important;height: 100%;width: 100%">search</button>
                    </div>
                </div>
            </form>
        </section>

        <a href="{{ route('createad') }}" class="my-font blue-color-back btn-ripple mdc-ripple-surface btn-sabt my-font bold-font desk-add blue-shadow" style="float: left">ثبت رایگان آگهی<i class="material-icons" style="color: white;position: relative;top: 9px;right: 4px">add</i></a>
        @yield('head_left_icon')
    </div>
</header>
<a href="{{ route('createad') }}">
    <button class="mdc-fab mdc-fab blue-color-back floating-action-btn blue-shadow">
        <span class="material-icons mdc-fab__icon">add</span>
    </button>
</a>
<aside class="mdc-drawer mdc-drawer--modal drawer-right" dir="rtl" style="box-shadow: none !important;border-right:none;border-top:none;border-bottom:none ">
    <div class="mdc-drawer__header">
        <button class="material-icons mdc-icon-button bold-font menu-btn-close"
                data-mdc-ripple-is-unbounded="true" style="color: black;    position: relative;
    top: 11px;">close</button>
        <span class="mdc-top-app-bar__title my-font" style="padding-left: 23px;">
                    <a href="#"><img style="width: 90px" src="{{ asset('/images/download.png') }}" alt="pasbede"></a>
                </span>
        <hr>
    </div>
    <div class="mdc-drawer__content my-font">
        <nav class="mdc-list">
            <a class="mdc-list-item my-font" href="{{ route('home') }}" aria-current="page">
                <i class="material-icons mdc-list-item__graphic" aria-hidden="true">home</i>
                <span class="mdc-list-item__text new-a">صفحه اصلی</span>
            </a>
            <a class="mdc-list-item my-font" href="{{ route('createad') }}">
                <i class="material-icons mdc-list-item__graphic" aria-hidden="true">add</i>
                <span class="mdc-list-item__text new-a">اضافه کردن آگهی</span>
            </a>
            @if(auth()->check())
                <a class="mdc-list-item my-font" href="#!">
                    <i class="material-icons mdc-list-item__graphic" aria-hidden="true">person</i>
                    <span class="mdc-list-item__text new-a">لوازم من</span>
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="mdc-list-item my-font" style="width: 100%;background-color: transparent;border: none">
                        <i class="material-icons mdc-list-item__graphic" aria-hidden="true">exit_to_app</i>
                        <span class="mdc-list-item__text new-a" style="color: #ef5661">خروج</span>
                    </button>
                </form>
            @else
                <a class="mdc-list-item my-font" href="{{ route('login') }}">
                    <i class="material-icons mdc-list-item__graphic" aria-hidden="true">person</i>
                    <span class="mdc-list-item__text new-a">ورود</span>
                </a>
                <a class="mdc-list-item my-font" href="{{ route('register') }}">
                    <i class="material-icons mdc-list-item__graphic" aria-hidden="true">person_add</i>
                    <span class="mdc-list-item__text new-a">ثبت نام</span>
                </a>
            @endif
            <div class="bottom-drawer my-font">
                طراحی و برنامه نویسی
                <span style="font-weight: bold;color: rgb(133, 100, 4)">ali.hamrani80@gmail.com</span>
            </div>
        </nav>
    </div>
</aside>
<div class="mdc-drawer-scrim"></div>

<aside class="mdc-drawer mdc-drawer--modal drawer-left" dir="ltr" style="box-shadow: none !important;border-left:none;border-top:none;border-bottom:none ">
    <div class="mdc-drawer__header">
        <button class="material-icons mdc-icon-button bold-font btn-profile-close"
                data-mdc-ripple-is-unbounded="true" style="color: black;    position: relative;
    top: 11px;">close</button>
        <hr>
    </div>
    <div class="mdc-drawer__content my-font">
        <nav class="mdc-list" dir="rtl">
            @if(auth()->check())
                <a class="mdc-list-item my-font" href="#!">
                    <i class="material-icons mdc-list-item__graphic" aria-hidden="true">person</i>
                    <span class="mdc-list-item__text new-a">لوازم من</span>
                </a>
                <a class="mdc-list-item my-font" href="{{ route('createad') }}">
                    <i class="material-icons mdc-list-item__graphic" aria-hidden="true">add</i>
                    <span class="mdc-list-item__text new-a">اضافه کرده آگهی</span>
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="mdc-list-item my-font" style="width: 100%;background-color: transparent;border: none">
                        <i class="material-icons mdc-list-item__graphic" aria-hidden="true">exit_to_app</i>
                        <span class="mdc-list-item__text new-a" style="color: #ef5661">خروج</span>
                    </button>
                </form>
            @else
                <a class="mdc-list-item my-font" href="{{ route('login') }}">
                    <i class="material-icons mdc-list-item__graphic" aria-hidden="true">person</i>
                    <span class="mdc-list-item__text new-a">ورود</span>
                </a>
                <a class="mdc-list-item my-font" href="{{ route('register') }}">
                    <i class="material-icons mdc-list-item__graphic" aria-hidden="true">person_add</i>
                    <span class="mdc-list-item__text new-a">ثبت نام</span>
                </a>
            @endif
        </nav>
    </div>
</aside>
<div class="mdc-drawer-scrim"></div>


<div class="mdc-dialog dialog_city"
     role="alertdialog"
     aria-modal="true"
     aria-labelledby="my-dialog-title"
     aria-describedby="my-dialog-content"
     dir="rtl">
    <div class="mdc-dialog__container my-font">
        <div class="mdc-dialog__surface">
            <!-- Title cannot contain leading whitespace due to mdc-typography-baseline-top() -->
            <h2 class="mdc-dialog__title my-font" id="my-dialog-title" style="text-align: center !important;">
                <button class="material-icons mdc-icon-button close_city" data-mdc-ripple-is-unbounded="true" style="float: right;position: relative;right: -10px">close</button>
                <span style="font-size: 18px;    position: absolute;
    top: 16px;
    right: 153px;">شهر ها</span>
            </h2>
            <div class="mdc-dialog__content" id="my-dialog-content">
                <ul class="mdc-list mdc-list--avatar-list">
                    <?php
                    $cities = \App\City::all();
                    $districs = \App\District::all();
                    ?>
                    @foreach($cities as $city)
                            <select onchange="changeDistric(this.value)" name="distric" class="my-font" id="distric" style="cursor: pointer;border-radius: 5px;padding: 10px;width: 100%;height: 40px;background-color: white;border: 1px solid #e0e0e0;margin-top: 10px;font-size: 14px">
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
                    <button style="width: 199px;height: 45px;color: white;font-size: 16px;border: none;border-radius: 5px;font-weight: bold" class="close_city2 blue-shadow blue-color-back form-camera-set my-font btn-ripple mdc-ripple-surface">تایید</button>
                </div>
            </div>
        </div>
    </div>
    <div class="mdc-dialog__scrim"></div>
</div>