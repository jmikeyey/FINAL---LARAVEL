@extends('admin.layouts.incharge-add')

@section('title', 'Admin - InchargeAdd [TechDepot]')

@section('main-section')
<div class="body d-flex py-3">
    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Add Incharge</h3>
                </div>
            </div>
        </div> <!-- Row end  -->
        <div class="row mb-3">
            <div class="col-12">
                <div class="card mb-3">
                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                        <h6 class="mb-0 fw-bold ">Incharge Form</h6> 
                    </div>
                    <div class="card-body">
                        <form id="registrationForm">
                            <div class="row g-3 align-items-center">
                                <div class="col-md-6">
                                    <label for="firstname" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="firstname" required="">
                                </div>
                                <div class="col-md-6">
                                    <label for="lastname" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="lastname" required="">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Phone Number</label>
                                    <input type="number" class="form-control" id="phonenumber" required="">
                                </div>
                                <div class="col-md-6">
                                    <label for="emailaddress" class="form-label">Email Address (username)</label>
                                    <input type="email" class="form-control" id="emailaddress" required="">
                                </div>
                                <div class="col-md-6">
                                    <label for="lastname" class="form-label">Password</label>
                                    <input type="text" class="form-control" id="password" required="">
                                </div>
                                <div class="col-md-6">
                                    <label for="lastname" class="form-label">Confirm Password</label>
                                    <input type="text" class="form-control" id="confirmPassword" required="">
                                </div>
                                <div class="col-md-6"></div>
                                <div class="col-md-6">
                                    <div id="passwordMatchError" class="invalid-feedback" style="display: none;">Passwords do not match</div>
                                </div>
                                    <label class="form-label">Gender</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios11" value="Male" checked="">
                                                <label class="form-check-label" for="exampleRadios11">
                                                Male
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios22" value="Female">
                                                <label class="form-check-label" for="exampleRadios22">
                                                Female
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary mt-4">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!-- Row end  --> 
    </div>
</div>
@endsection

@section('dependencies')
<!-- Jquery Core Js -->
<script src="/admin_files/js/libscripts.bundle.js"></script>

<!-- Jquery Page Js -->
<script src="/admin_files/js/template.js"></script>

<script src="/admin_files/js/cookie.js"></script>
<script src="/admin_files/js/checkuser.js"></script>
<script>
    $('#registrationForm').submit(function(e) {
        e.preventDefault();
        // Get form values
        const firstName = $('#firstname').val();
        const lastName = $('#lastname').val();
        const phoneNumber = $('#phonenumber').val();
        const emailAddress = $('#emailaddress').val();
        const password = $('#password').val();
        const confirmPassword = $('#confirmPassword').val();
        
        // Get the checked radio button value for gender
        const gender = $('input[name="exampleRadios"]:checked').val();

        if (password !== confirmPassword) {
            $('#confirmPassword').addClass('is-invalid');
            $('#passwordMatchError').text('Passwords do not match').show();
        } else {
            // Passwords match - proceed with form submission or other actions
            $('#confirmPassword').removeClass('is-invalid');
            $('#passwordMatchError').hide();
            // Construct the object with all form values
            const formData = {
                firstname: firstName,
                lastname: lastName,
                number: phoneNumber,
                email: emailAddress,
                password: password,
                gender: gender,
                usertype: 'staff'
            };
            console.log(formData); //
            $.ajax({
                url: `${link_path}api/user/user_addCust`,
                method: 'POST',
                data: formData,
                success: (res) =>{
                    console.log(res)
                    if (res.type === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: `${res.message}`,
                        }).then((result) => {
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: `${res.message}`,
                        })
                    }
                }
            })
            
        }
    });
</script>
    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection