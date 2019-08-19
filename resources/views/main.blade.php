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
    // const otherScreen = document.querySelector('.mdc-drawer-scrim"');

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
    // otherScreen.addEventListener('click', (event) => {
    //     drawer2.open = false;
    // });

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
</script>
<script type="text/javascript">
    const buttons = document.querySelectorAll('.mdc-list-item,.btn-ripple,button,a');
    for (const button of buttons) {
        mdc.ripple.MDCRipple.attachTo(button);
    }
</script>
<script type="text/javascript">
    const dialog = new mdc.dialog.MDCDialog(document.querySelector('.dialog_city'));
    // const dialog_dis = new mdc.dialog.MDCDialog(document.querySelector('.dialog_distric'));
    const list = new mdc.list.MDCList(document.querySelector('.dialog_city .mdc-list'));
    const city_select = document.querySelector('.city_select');
    const close_city = document.querySelector('.close_city');
    const close_city2 = document.querySelector('.close_city2');
    // const back_to_city = document.querySelector('.back_to_city');
    // const close_all = document.querySelector('.close_all');
    city_select.addEventListener('click' , (e) => {
        dialog.open();
    });
    close_city.addEventListener('click' , (e) => {
        dialog.close();
        const distric_city = document.querySelector('.distric_city');
        distric_city.setAttribute('value' , '');
    });
    close_city2.addEventListener('click' , (e) => {
        dialog.close();
    });
    // back_to_city.addEventListener('click' ,(e) => {
    //     dialog_dis.close();
    //     dialog.open();
    // });
    // close_all.addEventListener('click' ,(e) => {
    //     dialog_dis.close();
    //
    // });
    dialog.listen('MDCDialog:opened', () => {
        list.layout();
    });


</script>
<script type="text/javascript">
    function changeDistric(id) {
        const distric_city = document.querySelector('.distric_city');
        distric_city.setAttribute('value' , id);
    }
</script>
{{--<script type="text/javascript">--}}
    {{--const switchControl = new mdc.switchControl.MDCSwitch(document.querySelector('.mdc-switch'));--}}
{{--</script>--}}
@yield('script')
</html>