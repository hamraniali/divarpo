{{--                       #
                          ali
                         #####
                        ########
                       ##########
                      ############
                     ##############
                    ################
                   ##################
                  ####################
                 ######################
                ######             ######
               ###########################
              #############################
             ###############################
            ##########             ##########
           ###########             ###########
          ############             ############
         #############             #############
        ##############             ##############
       ###############             ###############
      ################             ################
     #################             #################
    ##################             ##################--}}


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
    @yield('style')
    <title>@yield('title')</title>
</head>
<body>
    @include('fixes.header')
    <br>
    <br>
    <br>
    <br>
    <div class="content">
        @yield('content')
    </div>

</body>
<script src="{{ asset('/js/material-components-web.min.js') }}"></script>
<script type="text/javascript">
    drawer = mdc.drawer.MDCDrawer.attachTo(document.querySelector(".drawer-right"));
    drawer2 = mdc.drawer.MDCDrawer.attachTo(document.querySelector(".drawer-left"));
    const listEl = document.querySelector('.menu-btn');
    const mobEl = document.querySelector('.menu-btn-mobile');
    const close = document.querySelector('.menu-btn-close');
    const mainContentEl = document.querySelector('.main-content');
    const mobEl2 = document.querySelector('.btn-profile');
    const close2 = document.querySelector('.btn-profile-close');

    listEl.addEventListener('click', (event) => {
        if (drawer2.open === true) {
            drawer2.open = false
        }
            drawer.open = true;
    });
    mobEl.addEventListener('click', (event) => {
        if (drawer2.open === true) {
            drawer2.open = false
        }
        drawer.open = true;
    });
    close.addEventListener('click', (event) => {
        drawer.open = false;
    });

    document.body.addEventListener('MDCDrawer:closed', () => {
        mainContentEl.querySelector('input, button').focus();
    });

    // const mainContentEl = document.querySelector('.main-content');

    mobEl2.addEventListener('click', (event) => {
        if (drawer.open === true) {
            drawer.open = false
        }
        drawer2.open = true;
    });
    close2.addEventListener('click', (event) => {
        drawer2.open = false;
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
{{--<script type="text/javascript">--}}
    {{--const switchControl = new MDCSwitch(document.querySelector('.mdc-switch'));--}}
{{--</script>--}}
@yield('script')
</html>