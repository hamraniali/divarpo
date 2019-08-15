<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/css/material-components-web.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/css/material-components-web.min.css.map') }}"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}"/>
    <title>divarPo</title>
</head>
<body>
    <header class="mdc-top-app-bar my-font" dir="ltr" style="background-color: white;box-shadow: 3px 3px 3px #e0e0e0">
        <div class="mdc-top-app-bar__row" dir="rtl">
                    <button class="material-icons mdc-icon-button bold-font menu-btn" data-mdc-ripple-is-unbounded="true" style="color: black;margin-top: 7px;margin-right: 15px;font">menu</button>
                    <span class="mdc-top-app-bar__title my-font" style="line-height: 63px;padding-left: 23px;">
                    <a href="#"><img src="{{ asset('/images/download.png') }}" alt="my site" style="margin-top: 14px"></a>
                </span>
            <section class="mdc-top-app-bar__section" style="padding-right: 30px;">
                <div style="width: 100%;height: 47px;border-radius: 150rem;display: inherit;padding-left: 10px;">
                    <input type="text" class="box-search" placeholder="جستوجو...">
                    <div style="width: 25%;height: 100%;background-color: #f5f5f5" class="border-input">
                        <select name="city" id="city" class="my-font search-select">
                            <option selected value="">شهر</option>
                            <option> salam</option>
                            <option> salam</option>
                            <option> salam</option>
                            <option> salam</option>
                            <option> salam</option>
                        </select>
                    </div>
                    <div style="width: 25%;height: 100%;background-color: #f5f5f5" class="border-input">
                        <select name="city" id="city" class="my-font search-select">
                            <option selected value="">دسته بندی</option>
                            <option> salam</option>
                            <option> salam</option>
                            <option> salam</option>
                            <option> salam</option>
                            <option> salam</option>
                        </select>
                    </div>
                    <div class="btn-search">
                        <button class="mdc-icon-button material-icons red-color-back" data-mdc-ripple-is-unbounded="true" style="color: white!important;border-radius: 30px">search</button>
                    </div>
                </div>
            </section>

            <a href="#" class="my-font blue-color-back btn-ripple mdc-ripple-surface btn-sabt my-font bold-font">ثبت رایگان آگهی</a>

        </div>
    </header>

    <aside class="mdc-drawer mdc-drawer--modal" dir="rtl" style="box-shadow: none !important;border-right:none;border-top:none;border-bottom:none ">
        <div class="mdc-drawer__header">
            <button class="material-icons mdc-icon-button bold-font menu-btn-close"
                    data-mdc-ripple-is-unbounded="true" style="color: black;margin-top: 7px;">close</button>
            <span class="mdc-top-app-bar__title my-font" style="line-height: 63px;padding-left: 23px;">
                    <a href="#"><img src="{{ asset('/images/download.png') }}" alt="my site" style="margin-top: 14px"></a>
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
                    <i class="material-icons mdc-list-item__graphic" aria-hidden="true">plus</i>
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
</html>