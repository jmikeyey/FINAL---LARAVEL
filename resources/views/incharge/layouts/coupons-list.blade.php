<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>TechDepot</title>
    <link rel="icon" href="/admin_files/favicon.ico" type="image/x-icon"> <!-- Favicon-->

    <!-- plugin css file  -->
    <link rel="stylesheet" href="/incharge_files/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="/incharge_files/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="/incharge_files/css/sweetAlert.css">
    <!-- project css file  -->
    <link rel="stylesheet" href="/incharge_files/css/ebazar.style.min.css">
</head>
<body>
    <div id="ebazar-layout" class="theme-blue">                          
        
        @include('incharge.partials.sidebar')

        <!-- main body area -->
        <div class="main px-lg-4 px-md-4"> 

            @include('incharge.partials.header')

            @yield('main-section')
        
            @include('incharge.partials.modal')
            
        </div>                                 

    </div> 
    @yield('dependencies')
</body>
</html>