<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/css/material-components-web.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/css/material-components-web.min.css.map') }}"/>
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/css/mobile.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/css/tablet.css') }}"/>
    <title>divarPo</title>
</head>
<body>
    <header class="mdc-top-app-bar my-font" dir="ltr" style="background-color: white;box-shadow: 3px 3px 3px #e0e0e0">
        <div class="mdc-top-app-bar__row" dir="rtl">
                    <button class="material-icons mdc-icon-button bold-font menu-btn" data-mdc-ripple-is-unbounded="true" style="color: black;margin-top: 7px;margin-right: 15px;font">menu</button>
                    <span class="mdc-top-app-bar__title my-font" style="line-height: 63px;padding-left: 23px;">
                    <a href="#"><img class="logo" src="{{ asset('/images/download.png') }}" alt="my site" style="margin-top: 14px"></a>
                </span>
            <section class="mdc-top-app-bar__section section-search" style="padding-right: 30px;">
                <div style="width: 100%;height: 47px;border-radius: 150rem;display: inherit;padding-left: 10px;">
                    <input type="text" class="box-search" placeholder="جستوجو...">
                    <div style="width: 25%;height: 100%;background-color: #f5f5f5" class="border-input">
                        <select name="city" id="city" class="my-font search-select" style="color: black!important;">
                            <option selected value="">شهر</option>
                            <option> salam</option>
                            <option> salam</option>
                            <option> salam</option>
                            <option> salam</option>
                            <option> salam</option>
                        </select>
                    </div>
                    <div style="width: 25%;height: 100%;background-color: #f5f5f5" class="border-input">
                        <select name="city" id="city" class="my-font search-select" style="color: black!important;">
                            <option selected value="">دسته بندی</option>
                            <option> salam</option>
                            <option> salam</option>
                            <option> salam</option>
                            <option> salam</option>
                            <option> salam</option>
                        </select>
                    </div>
                    <div class="btn-search btn-ripple mdc-ripple-surface">
                        <button class="material-icons red-color-back" data-mdc-ripple-is-unbounded="true" style="color: white!important;border-radius: 30px;border: none!important;height: 100%;width: 100%">search</button>
                    </div>
                </div>
            </section>

            <a href="#" class="my-font blue-color-back btn-ripple mdc-ripple-surface btn-sabt my-font bold-font" style="float: left">ثبت رایگان آگهی</a>

        </div>
    </header>

    <aside class="mdc-drawer mdc-drawer--modal" dir="rtl" style="box-shadow: none !important;border-right:none;border-top:none;border-bottom:none ">
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
                <a class="mdc-list-item mdc-list-item--activated my-font" href="#" aria-current="page">
                    <i class="material-icons mdc-list-item__graphic" aria-hidden="true">home</i>
                    <span class="mdc-list-item__text">صفحه اصلی</span>
                </a>
                <a class="mdc-list-item my-font" href="#">
                    <i class="material-icons mdc-list-item__graphic" aria-hidden="true">add</i>
                    <span class="mdc-list-item__text">اضافه کردن آگهی</span>
                </a>
                <a class="mdc-list-item my-font" href="#">
                    <i class="material-icons mdc-list-item__graphic" aria-hidden="true">person</i>
                    <span class="mdc-list-item__text">لوازم من</span>
                </a>
            </nav>
        </div>
    </aside>

    <div class="mdc-drawer-scrim" style="display: none"></div>
    <br>
    <br>
    <br>
    <br>
    <div>
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

            @for($i=0 ; $i<15;$i++)
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card" style="margin-top: 10px">
                        <div class="card-body box-agahi box-agahi-title">
                            <div style="width: 100%;height: 150px;display: inline-flex;background-color: #9e9e9e">
                                <div style="width: 50%;height: 100%;border-bottom: solid 1px #e0e0e0;background-image: url('https://material-components.github.io/material-components-web-catalog/static/media/photos/3x2/2.jpg')"></div>
                                <div style="width: 50%;height: 100%;background-color: white;border-bottom: 1px #e0e0e0 solid;padding: 7px;text-align: right;direction: rtl">
                                <span style="font-size: 16px;font-weight: bold">
ظبط ماشین خارجی
                                </span>
                                    <div style="    position: absolute;
    bottom: 59px;">
                                        <span style="font-size: 15px;">امانیه</span>
                                        <br>
                                        <span style="color: #9e9e9e;font-size: 12px;">لحظاتی گذشته</span>
                                    </div>
                                </div>
                            </div>
                            <div style="width: 100%;height: 47px;direction: rtl;padding: 7px;line-height: 37px">
                                <span>قیمت : </span><span style="font-weight: bold;color: #ef5661">230.000</span>
                                <button class="material-icons mdc-icon-button" style="float: left;    position: relative;
    bottom: 7px;" data-mdc-ripple-is-unbounded="true">bookmark_border
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>


</body>
<script src="{{ asset('/js/material-components-web.min.js') }}"></script>
<script type="text/javascript">
    drawer = mdc.drawer.MDCDrawer.attachTo(document.querySelector(".mdc-drawer"));
    const listEl = document.querySelector('.menu-btn');
    const close = document.querySelector('.menu-btn-close');
    const mainContentEl = document.querySelector('.main-content');

        listEl.addEventListener('click', (event) => {
            drawer.open = true;
        });
    close.addEventListener('click', (event) => {
        drawer.open = false;
    });

    document.body.addEventListener('MDCDrawer:closed', () => {
        mainContentEl.querySelector('input, button').focus();
    });
</script>
<script type="text/javascript">
    const buttons = document.querySelectorAll('.mdc-list-item,.btn-ripple,button,a');
    for (const button of buttons) {
        mdc.ripple.MDCRipple.attachTo(button);
    }
</script>
<script type="text/javascript">
    const switchControl = new MDCSwitch(document.querySelector('.mdc-switch'));
</script>
</html>