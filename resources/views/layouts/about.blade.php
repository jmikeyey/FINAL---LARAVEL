<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>@yield('title')</title>
    <meta name="description" content />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://kit.fontawesome.com/d1c03249e2.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" type="image/x-icon" href="fonts/favicon.svg" />

    <link rel="stylesheet"
        href="css/A.bootstrap.min.css%2BLineIcons.3.0.css%2Btiny-slider.css%2Bglightbox.min.css%2CMcc.OzR7N5fb_Y.css.pagespeed.cf.svKjl5Nf5n.css" />
    <link rel="stylesheet" href="css/A.main.css.pagespeed.cf.wZnWV-GMUP.css" />
    <style>
        /* <!--table,div,span,font,p{display:none} --> */
    </style>
    <!-- cookie -->
    <script src="js/cookie.js"></script>
    <style>
        .image {
            object-fit: cover;
        }
    </style>

    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/general-style.css">
</head>

<body>
    @yield('pre-loader')
    @include('partials.header')
    @yield('breadcrumbs')
    @yield('about-us')
    @yield('team-section')
    @include('partials.footer')
    @yield('dependencies')
</body>

</html>
