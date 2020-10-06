<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!-- begin::Head -->
<head>
    <base href="/">
    <meta charset="utf-8" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if (!empty($pageTitle))
        <title>{{ $pageTitle }}</title>
    @else
        <title>@yield('title', config('app.name', 'Laravel'))</title>
    @endif

    <!--<meta name="description" content="Updates and statistics">-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <!--begin::Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">

    <!--end::Fonts -->

    <!--begin::Page Vendors Styles(used by this page) -->
    <!--<link href="assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />-->

    <!--end::Page Vendors Styles -->

    <!--begin::Global Theme Styles(used by all pages) -->
    <!-- <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
     <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />-->

    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->
    <!--<link href="assets/css/skins/header/base/light.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/skins/header/menu/light.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/skins/brand/dark.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/skins/aside/dark.css" rel="stylesheet" type="text/css" />-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
    @stack('styles')

    <!--end::Layout Skins -->
    <link rel="shortcut icon" href="/assets/media/logos/favicon.ico" />
</head>
<!-- end::Head -->

<!-- begin::Body -->
<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
<!-- begin:: Page -->

<!-- begin:: Header Mobile -->
<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
    <div class="kt-header-mobile__logo">
        <a href="/">
            <img alt="Logo" src="/images/logo-light.png" height="80"/>
        </a>
    </div>
    <div class="kt-header-mobile__toolbar">
        <button class="kt-header-mobile__toggler kt-header-mobile__toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
        <button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
    </div>
</div>

<!-- end:: Header Mobile -->
<div class="kt-grid kt-grid--hor kt-grid--root">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
        <!-- begin:: Aside -->
        @include('_left')
        <!-- end:: Aside -->
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

            <!-- begin:: Header -->
            @include('_header')
            <!-- end:: Header -->
            <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
                <!-- begin:: Content Head -->
                @include('_content-header')
                <!-- end:: Content Head -->
                <!-- begin:: Content -->
                <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                    @yield('content')
                </div>
                <!-- end:: Content -->
            </div>
            <!-- begin:: Footer -->
            @include('_footer')
            <!-- end:: Footer -->
        </div>
    </div>
</div>
<!-- end:: Page -->

<!-- begin::Quick Panel -->
<!--@ include('_quick-panel')-->
<!-- end::Quick Panel -->
<!-- begin::Scrolltop -->
<div id="kt_scrolltop" class="kt-scrolltop">
    <i class="fa fa-arrow-up"></i>
</div>
<!-- end::Scrolltop -->
<!-- begin::Sticky Toolbar -->
<!--@ include('_sticky-toolbar')-->
<!-- end::Sticky Toolbar -->
<!-- begin::Demo Panel -->
<!--@ include('_demo-panel')-->
<!-- end::Demo Panel -->
<!--Begin:: Chat-->
<!--@ include('_chat')-->
<!--End:: Chat-->
<!-- begin::Global Config(global config for global JS sciprts) -->
<script>
    var KTAppOptions = {
        "colors": {
            "state": {
                "brand": "#5d78ff",
                "dark": "#282a3c",
                "light": "#ffffff",
                "primary": "#5867dd",
                "success": "#34bfa3",
                "info": "#36a3f7",
                "warning": "#ffb822",
                "danger": "#fd3995"
            },
            "base": {
                "label": [
                    "#c5cbe3",
                    "#a1a8c3",
                    "#3d4465",
                    "#3e4466"
                ],
                "shape": [
                    "#f0f3ff",
                    "#d9dffa",
                    "#afb4d4",
                    "#646c9a"
                ]
            }
        }
    };
</script>

<!-- end::Global Config -->

<!--begin::Global Theme Bundle(used by all pages) -->
<!--<script src="assets/plugins/global/plugins.bundle.js" type="text/javascript"></script>
<script src="assets/js/scripts.bundle.js" type="text/javascript"></script>-->
<script src="{{ asset('js/app.js') }}"></script>

<!--end::Global Theme Bundle -->

<!--begin::Page Vendors(used by this page) -->
<!--<script src="assets/plugins/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>-->
<script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM" type="text/javascript"></script>
<!--<script src="assets/plugins/custom/gmaps/gmaps.js" type="text/javascript"></script>-->

<!--end::Page Vendors -->

<!--begin::Page Scripts(used by this page) -->
<!--<script src="assets/js/pages/dashboard.js" type="text/javascript"></script>-->
<!--<script src="{{ asset('js/dashboard.js') }}"></script>-->

@stack('scripts')

<!--end::Page Scripts -->
</body>

<!-- end::Body -->
</html>
