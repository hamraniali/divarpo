<header class="mdc-top-app-bar my-font" dir="ltr" style="background-color: white;box-shadow: 3px 3px 3px #e0e0e0">
    <div class="mdc-top-app-bar__row" dir="rtl">
        <div class="desk-head">
            <button class="material-icons mdc-icon-button bold-font menu-btn" data-mdc-ripple-is-unbounded="true" style="color: black;margin-top: 7px;margin-right: 15px;">menu</button>
            <span class="mdc-top-app-bar__title my-font" style="line-height: 63px;padding-left: 23px;">
                    <a href="{{ route('home') }}"><img class="logo" src="{{ asset('/images/download.png') }}" alt="my site" style="margin-top: -18px"></a>
                </span>
        </div>

        <div class="mobile-head">
            <button class="material-icons mdc-icon-button bold-font menu-btn-mobile" data-mdc-ripple-is-unbounded="true" style="color: black;margin-top: 7px;margin-right: 15px;    position: absolute;
    right: 0;float: right">menu</button>
            <span class="mdc-top-app-bar__title my-font" style="line-height: 63px;padding-left: 23px;">
                    <a href="{{ route('home') }}"><img class="logo" src="{{ asset('/images/download.png') }}" alt="my site" style="margin-top: -7px"></a>
                </span>
        </div>
        <section class="mdc-top-app-bar__section section-search" style="padding-right: 30px;">
            <form action="{{ route('search') }}" style="display: contents!important;">
                @csrf
                <div style="width: 100%;height: 47px;border-radius: 150rem;display: inherit;padding-left: 10px;">
                    <input type="text" value="{{ isset($_GET['search']) && !empty($_GET['search']) ? $_GET['search'] : '' }}" name="search" class="box-search black-color" placeholder="جستوجو...">
                    <div style="width: 25%;height: 100%;background-color: #f5f5f5" class="border-input">
                        <select name="city" id="city" class="my-font search-select" style="color: black!important;">
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
                            <option value="abadan">abadan</option>
                            <option value="تهران"> تهران</option>
                            <option value="تهران"> تهران</option>
                        </select>
                    </div>
                    <div style="width: 25%;height: 100%;background-color: #f5f5f5" class="border-input">
                        <select name="category" id="category" class="my-font search-select" style="color: black!important;">
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
                    <div class="btn-search btn-ripple mdc-ripple-surface">
                        <button type="submit" class="material-icons red-color-back" data-mdc-ripple-is-unbounded="true" style="color: white!important;border-radius: 30px;border: none!important;height: 100%;width: 100%">search</button>
                    </div>
                </div>
            </form>
        </section>

        <a href="{{ route('createad') }}" class="my-font blue-color-back btn-ripple mdc-ripple-surface btn-sabt my-font bold-font desk-add blue-shadow" style="float: left">ثبت رایگان آگهی</a>
        <button class="material-icons mdc-icon-button bold-font menu-btn btn-profile" data-mdc-ripple-is-unbounded="true" style="color: black;margin-top: 7px;margin-right: 15px;position: absolute;left: 10px">person</button>
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
                    <a href="#"><img src="{{ asset('/images/download.png') }}" alt="my site"></a>
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

<aside class="mdc-drawer mdc-drawer--modal drawer-left" dir="ltr" style="box-shadow: none !important;border-left:none;border-top:none;border-bottom:none ">
    <div class="mdc-drawer__header">
        <button class="material-icons mdc-icon-button bold-font btn-profile-close"
                data-mdc-ripple-is-unbounded="true" style="color: black;    position: relative;
    top: 11px;">close</button>
        <hr>
    </div>
    <div class="mdc-drawer__content my-font">
        <nav class="mdc-list" dir="rtl">
            <a class="mdc-list-item my-font" href="{{ route('login') }}">
                <i class="material-icons mdc-list-item__graphic" aria-hidden="true">person</i>
                <span class="mdc-list-item__text new-a">ورود</span>
            </a>
            <a class="mdc-list-item my-font" href="{{ route('register') }}">
                <i class="material-icons mdc-list-item__graphic" aria-hidden="true">person_add</i>
                <span class="mdc-list-item__text new-a">ثبت نام</span>
            </a>
        </nav>
    </div>
</aside>
<div class="mdc-drawer-scrim"></div>