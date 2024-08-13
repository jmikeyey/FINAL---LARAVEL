@extends('admin.layouts.auth-signin')

@section('title', 'Admin - Signin [TechDepot]')

@section('main-section')
    <div class="main p-2 py-3 p-xl-5 ">
                
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
                                <img src="/admin_files/fonts/login-img.svg" alt="login-img">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 d-flex justify-content-center align-items-center border-0 rounded-lg auth-h100">
                        <div class="w-100 p-3 p-md-5 card border-0 shadow-sm" style="max-width: 32rem;">
                            <!-- Form -->
                            <form class="row g-1 p-3 p-md-4 login-form">
                                <div class="col-12 text-center mb-5">
                                    <h1>Sign in</h1>
                                    <span>Free access to our dashboard.</span>
                                </div>
                                <div class="col-12 text-center mb-4">
                                    <a class="btn btn-lg btn-light btn-block" href="#">
                                        <span class="d-flex justify-content-center align-items-center">
                                            <img class="avatar xs me-2" src="/admin_files/fonts/google.svg" alt="Image Description">
                                            Sign in with Google
                                        </span>
                                    </a>
                                    <span class="dividers text-muted mt-4">OR</span>
                                </div>
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Email address</label>
                                        <input type="email" id="reg-email" class="form-control form-control-lg" placeholder="name@example.com">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-2">
                                        <div class="form-label">
                                            <span class="d-flex justify-content-between align-items-center">
                                                Password
                                                <a class="text-secondary" href="auth-password-reset.html">Forgot Password?</a>
                                            </span>
                                        </div>
                                        <input type="password" id="reg-pass" class="form-control form-control-lg" placeholder="***************">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Remember me
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 text-center mt-4">
                                    <button type="submit" class="btn btn-lg btn-block btn-light lift text-uppercase" atl="signin">SIGN IN</button>
                                </div>
                            </form>
                            <!-- End Form -->
                            
                        </div>
                    </div>
                </div> <!-- End Row -->
                
            </div>
        </div>

    </div>
@endsection

@section('dependencies')
    <!-- Jquery Core Js -->
    <script src="/admin_files/js/libscripts.bundle.js"></script>

    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/admin_files/js/cookie.js"></script>
    <script>
        const link_path = 'http://127.0.0.1:8000/';

        let user = Cookies.get("name");

        if (!user) {
            // Cookie is empty or does not exist
            console.log("User not logged in");
        } else {
            // Cookie is not empty
            console.log("User logged in");
            $.ajax({
                url: `${link_path}api/login/get_user.php?id=${user}`,
                method: 'GET',
                dataType: 'json',
                success: (data) => {
                    console.log(data);
                    let data1 = data.data[0];
                    // Continue with the rest of your code
                },
                error: (xhr, status, error) => {
                    console.log("AJAX error:", xhr);
                    console.log("AJAX error:", error);
                    console.log("AJAX error:", status);
                }
            });
        }


        //             if (data1.usertype !== 'admin') {
        //                 location.replace("auth-signin.html");
        //                 Cookies.remove("name");
        //             }
        // location.replace("auth-signin.html");
    </script>
    <script src="/admin_files/js/admin-login.js"></script>
@endsection