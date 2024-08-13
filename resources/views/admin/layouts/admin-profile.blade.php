<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>   
    <link rel="icon" href="/admin_files/favicon.ico" type="image/x-icon"> <!-- Favicon-->

    <!-- project css file  -->
    <link rel="stylesheet" href="/admin_files/css/ebazar.style.min.css">
    <link rel="stylesheet" href="/admin_files/css/sweetAlert.css">
</head>
<body>
    <div id="ebazar-layout" class="theme-blue">
        
        @include('admin.partials.sidebar')

        <!-- main body area -->
        <div class="main px-lg-4 px-md-4"> 

            @include('admin.partials.header')
            
            @yield('main-section')

            @include('admin.partials.modal')

        </div>       
    </div>

    @yield('dependencies')
</body>
</html> 