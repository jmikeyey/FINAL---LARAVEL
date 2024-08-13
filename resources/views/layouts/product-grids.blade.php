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
    <script src="https://kit.fontawesome.com/6d1cd4a3d1.js" crossorigin="anonymous"></script>
    <!-- cookie -->
    <script src="js/cookie.js"></script>
    <style>
        .product-link {
            color: #0d6efd;
            background-color: transparent;
        }

        .butt-link {
            color: #0d6efd;
        }

        .butt-link:hover {
            color: white;
        }

        .product-link:hover {
            background-color: #0d6efd;
            color: white;
        }

        .button_ {
            margin-top: 5px;
            text-align: center;
        }

        .showAllButton {
            all: unset;
        }

        .single-product .product-image .new-tag {
            background: #0167f3;
            border-radius: 2px;
            font-size: 12px;
            color: #fff;
            font-weight: 700;
            position: absolute;
            top: 0;
            padding: 5px 10px;
            left: 0;
            z-index: 22;
        }

        .colored-toast {
            background-color: #a5dc86 !important;
        }
    </style>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/product-grid.css">
    <link rel="stylesheet" href="css/general-style.css">
</head>

<body>
    @yield('pre-loader')
    @include('partials.header')
    @yield('breadcrumbs')
    @yield('products-section')
    @include('partials.footer')
    @yield('dependencies')
</body>

</html>
