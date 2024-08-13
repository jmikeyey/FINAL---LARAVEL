<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link rel="icon" href="/incharge_files/favicon.ico" type="/image/x-icon"> <!-- Favicon-->

    <!-- plugin css file  -->
    <link rel="stylesheet" href="/incharge_files/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="/incharge_files/css/dataTables.bootstrap5.min.css">
    
    <!-- project css file  -->
    <link rel="stylesheet" href="/incharge_files/css/ebazar.style.min.css">
    <style>
        tbody tr td:first-child::before{
            content: '#';
            font-weight: bold;
        }
        tbody tr td:nth-child(2){
            width: 300px;
        }
        a .text-black{
            font-size: 1.5rem;
            padding: 8px 12px;
            border: 1px solid rgba(0, 0, 0, 0.08);
            border-radius: 6px;
        }
        a .text-black:hover{
            background-color: aliceblue;
        }
    </style>
    <link rel="stylesheet" href="/incharge_files/css/sweetAlert.css">
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