<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>
        @yield('title')
    </title>
    <meta name="description" content />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="fonts/favicon.svg" />
    <script src="https://kit.fontawesome.com/d1c03249e2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet"
        href="css/A.bootstrap.min.css%2BLineIcons.3.0.css%2Btiny-slider.css%2Bglightbox.min.css%2CMcc.OzR7N5fb_Y.css.pagespeed.cf.svKjl5Nf5n.css" />
    <link rel="stylesheet" href="css/A.main.css.pagespeed.cf.wZnWV-GMUP.css" />
    <!-- cookie -->
    <script src="js/cookie.js"></script>
    <style>
        .error-toast {
            background-color: #f27474 !important;
            color: white;
        }

        .success-toast {
            background-color: #a5dc86 !important;
        }
    </style>
     <link rel="stylesheet" href="css/general-style.css">
</head>
<body>
    @yield('pre-loader')
    @include('partials.header')
    @yield('breadcrumbs')
    @if(request()->has('id'))
        @yield('item-section')
    @else
        <!-- Hide the yielded section or provide an alternative content -->
        <center>
            <h6 style="padding: 50px">Bad Request.</h6>
        </center>
    @endif
    @yield('modal')
    @include('partials.footer')
    @yield('dependencies')
</body>

</html>
