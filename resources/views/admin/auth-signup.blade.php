<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>TechDepot </title>
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->

    <!-- project css file  -->
    <link rel="stylesheet" href="css/ebazar.style.min.css">
</head>
<body>
    <div id="ebazar-layout" class="theme-blue">

        <!-- main body area -->
        <div class="main p-2 py-3 p-xl-5">
            
            <!-- Body: Body -->
            <div class="body d-flex p-0 p-xl-5">
                <div class="container-xxl">

                    <div class="row g-0">
                        <div class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center rounded-lg auth-h100">
                            <div style="max-width: 25rem;">
                                <div class="text-center mb-5">
                                    <i class="bi bi-bag-check-fill  text-primary" style="font-size: 90px;"></i>
                                </div>
                                <div class="mb-5">
                                    <h2 class="color-900 text-center">A few clicks is all it takes.</h2>
                                </div>
                                <!-- Image block -->
                                <div class>
                                    <img src="fonts/login-img.svg" alt="login-img">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 d-flex justify-content-center align-items-center border-0 rounded-lg auth-h100">
                            <div class="w-100 p-3 p-md-5 card border-0 shadow-sm" style="max-width: 32rem;">
                                <!-- Form -->
                                <form class="row g-1 p-3 p-md-4 reg-form" id="reg-form">
                                    <div class="col-12 text-center mb-5">
                                        <h1>Create your account</h1>
                                        <span>Free access to our dashboard.</span>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-2">
                                            <label class="form-label">Full name</label>
                                            <input type="text" class="form-control form-control-lg" name="firstname" placeholder="John">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-2">
                                            <label class="form-label">&nbsp;</label>
                                            <input type="text" class="form-control form-control-lg" name="lastname" placeholder="Doe">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-2">
                                            <label class="form-label">Email address</label>
                                            <input type="email" class="form-control form-control-lg" name="email" placeholder="name@example.com">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-2">
                                            <label class="form-label">Password</label>
                                            <input type="password" class="form-control form-control-lg" name="password" placeholder="8+ characters required">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-2">
                                            <label class="form-label">Profile Picture</label>
                                            <input type="file" class="form-control form-control-lg" name="profile_pic">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="mb-2">
                                            <label class="form-label">Gender</label>
                                            <input type="text" class="form-control form-control-lg" name="gender" placeholder="Male/Female">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-2">
                                            <label class="form-label">Phonenumber</label>
                                            <input type="number" class="form-control form-control-lg" name="number" placeholder="+63">
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="mb-2">
                                            <label class="form-label">Birthdate</label>
                                            <input type="date" class="form-control form-control-lg" name="bod">
                                        </div>
                                    </div>
                                    <div class="col-12 text-center mt-4">
                                        <button type="submit" href="auth-signin.html" class="btn btn-lg btn-block btn-light lift text-uppercase" alt="SIGNUP">SIGN UP</button>
                                    </div>
                                    <div class="col-12 text-center mt-4">
                                        <span>Already have an account? <a href="auth-signin.html" title="Sign in" class="text-secondary">Sign in here</a></span>
                                    </div>
                                </form>
                                <!-- End Form -->
                                
                            </div>
                        </div>
                    </div> <!-- End Row -->
                    
                </div>
            </div>

        </div>

    </div>
    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Jquery Core Js -->
    <script src="js/libscripts.bundle.js"></script>
    <script src="js/cookie.js"></script>
    <script src="js/admin-signup.js"></script>
</body>
</html>