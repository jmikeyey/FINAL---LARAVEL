<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>@yield('title')</title>
    <meta name="google-signin-client_id"
        content="699895725817-ieup4ulaa3vdl5e05emivl7daqvvkr14.apps.googleusercontent.com">
    <meta name="description" content />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="fonts/favicon.svg" />

    <link rel="stylesheet"
        href="css/A.bootstrap.min.css%2BLineIcons.3.0.css%2Btiny-slider.css%2Bglightbox.min.css%2CMcc.OzR7N5fb_Y.css.pagespeed.cf.svKjl5Nf5n.css" />
    <link rel="stylesheet" href="css/A.main.css.pagespeed.cf.wZnWV-GMUP.css" />
    <!-- cookie js -->
    <script src="./js/cookie.js"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script src="https://kit.fontawesome.com/d1c03249e2.js" crossorigin="anonymous"></script>
</head>

<body>
    @yield('pre-loader')
    @include('partials.header')
    @yield('breadcrumbs')
    @yield('forms')
    @include('partials.footer')
    @yield('dependencies')
</body>

</html>
