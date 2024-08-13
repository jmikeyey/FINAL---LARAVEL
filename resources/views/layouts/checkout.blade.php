<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>@yield('title')</title>
    <meta name="description" content />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="fonts/favicon.svg" />

    <link rel="stylesheet"
        href="css/A.bootstrap.min.css%2BLineIcons.3.0.css%2Btiny-slider.css%2Bglightbox.min.css%2CMcc.OzR7N5fb_Y.css.pagespeed.cf.svKjl5Nf5n.css" />
    <link rel="stylesheet" href="css/A.main.css.pagespeed.cf.wZnWV-GMUP.css" />
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="css/checkout.css">
    <!-- cookie -->
    <script src="js/cookie.js"></script>
    <script src="https://kit.fontawesome.com/d1c03249e2.js" crossorigin="anonymous"></script>
    <style>
        .radio-container {
            display: flex;
            align-items: center;
        }

        .radio-container input[type="radio"] {
            display: none;
        }

        .radio-container label {
            display: inline-block;
            margin-left: 10px;
        }

        .radio-button {
            display: inline-block;
            padding: 10px 20px;
            border: 2px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            color: #333;
            font-weight: bold;
            cursor: pointer;
        }

        .radio-container input[type="radio"]:checked+label .radio-button {
            background-color: #2196F3;
            color: #fff;
        }
    </style>
    <link rel="stylesheet" href="css/general-style.css">
</head>

<body>
    @yield('pre-loader')
    @include('partials.header')
    @yield('breadcrumbs')
    @yield('wrapper')
    @yield('modal')
    @include('partials.footer')
    @yield('dependencies')
</body>

</html>
