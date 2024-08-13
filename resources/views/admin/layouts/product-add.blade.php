<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') </title>
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->

    <!--plugin css file -->
    <link rel="stylesheet" href="/admin_files/css/multi-select.css"><!-- Multi Select Css -->
    <link rel="stylesheet" href="/admin_files/css/bootstrap-tagsinput.css"><!-- Bootstrap Tagsinput Css -->
    <link rel="stylesheet" href="/admin_files/css/cropper.min.css"><!--Cropperer Css -->   
    <link rel="stylesheet" href="/admin_files/css/dropify.min.css"><!-- Dropify Css -->
    <link rel="stylesheet" href="/admin_files/css/responsive.dataTables.min.css"><!-- Datatable Css -->
    <link rel="stylesheet" href="/admin_files/css/dataTables.bootstrap5.min.css"><!-- Datatable Css -->

    <!-- Project css file  -->
    <link rel="stylesheet" href="/admin_files/css/ebazar.style.min.css">
    <style>
        .set1{
            border-radius: 50px;
            background: #e0e0e0;
            box-shadow:  -15px 15px 30px #8b8b8b,
                        15px -15px 30px #ffffff;
        }

        /* Style for the "Add Specification" button */
        #add-specification {
            margin-top: 5px;
            padding: 0.5rem 1rem;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 0.3rem;
            cursor: pointer;
        }

        /* Style for the "Add Specification" button when hovered over */
        #add-specification:hover {
            background-color: #3E8E41;
        }
        .specsRow{
            display: flex;
            row-gap: 10px;
        }
        .fa-shuffle:hover{
            cursor: pointer;
        }
        
    </style>
    <script src="https://kit.fontawesome.com/6d1cd4a3d1.js" crossorigin="anonymous"></script>
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