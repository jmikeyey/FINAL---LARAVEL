@extends('admin.layouts.incharge-detail')

@section('title', 'Admin - InchargeAdd [TechDepot]')

@section('main-section')
    <div class="body d-flex py-3">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0">View Incharge</h3>
                        <button type="submit" id="edit_incharge" class="btn btn-primary btn-set-task w-sm-100 py-2 px-5 text-uppercase">Edit</button>
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
                                        <input type="text" class="form-control" id="firstname" required="" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="lastname" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="lastname" required="" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Phone Number</label>
                                        <input type="number" class="form-control" id="phonenumber" required="" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="emailaddress" class="form-label">Email Address (username)</label>
                                        <input type="email" class="form-control" id="emailaddress" required="" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="lastname" class="form-label">Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="password" required="" readonly>
                                            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                                <i class="bi bi-eye-slash-fill"></i>
                                            </button>
                                        </div>
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
                                                                        <!-- Add the checkbox above the password fields -->
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="toogleResetPassword">
                                                <label class="form-check-label" for="toogleResetPassword">
                                                    Reset Password
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                        </div>
                                        <!-- Password fields hide & show -->
                                        <div class="col-md-6" id="passwordFields" style="display: none;">
                                            <label for="lastname" class="form-label">New Password</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="togglePasswordConfirm" name="togglePasswordConfirm" >
                                                <button class="btn btn-outline-secondary" type="button" id="toggleButtonConfirm">
                                                    <i class="bi bi-eye-slash-fill" id="eyeIconPassword"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="col-md-6" id="confirmPasswordField" style="display: none;">
                                            <label for="lastname" class="form-label">Confirm Password</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"  >
                                                <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">
                                                    <i class="bi bi-eye-slash-fill" id="eyeIconConfirmPassword"></i>
                                                </button>
                                            </div>
                                        </div>

                                    </div>

                                    <button type="submit" class="btn btn-primary mt-4 submit_btn">Submit</button>
                                </div>
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
        $(document).ready(()=>{
            const searchparams = new URLSearchParams(window.location.search);
            const id = searchparams.get('id');
            if(!id){
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "Can't view if no incharge selected!",
                footer: '<a href="incharge">Go to Incharge List</a>'
                }).then(()=>{
                    location.replace('incharge')
                })
                $('#submitBTN').prop('disabled', true)
            }else{
                // console.log(id)
                $.ajax({
                    url: `${link_path}api/incharge/getsolo?id=${id}`,
                    method: "GET",
                    dataType: "json",
                    success: (data) =>{
                        // console.log(data)
                        let info = data.data[0];
                        let firstname = $("#firstname");
                        let lastname = $("#lastname");
                        let phonenumber = $("#phonenumber");
                        let emailaddress = $("#emailaddress");
                        let password = $("#password");
                        firstname.val(info.firstname)
                        lastname.val(info.lastname)
                        phonenumber.val(info.phonenumber)
                        emailaddress.val(info.email)
                        password.val(info.password)
                    },
                    error: (xhr, ajaxOptions, thrownError)=>{
                        console.log(errorThrown)
                        console.log(xhr)
                        console.log(ajaxOptions)
                    }
                })
            }
        })
        $(document).ready(function() {
            // Initially hide the submit button
            $('#registrationForm button[type="submit"]').hide();
            $('#exampleRadios11').prop('disabled', true);
            $('#exampleRadios22').prop('disabled', true);

            // Function to toggle input fields' disabled property
            function toggleRadioDisabled(isDisabled) {
                $('#exampleRadios11').prop('disabled', isDisabled);
                $('#exampleRadios22').prop('disabled', isDisabled);
            }
            // Function to toggle input fields' readonly attribute
            function toggleEditable(isEditable) {
                $('#registrationForm input, #registrationForm select').prop('readonly', !isEditable);
            }

            // On click of the edit button, toggle editing and show/hide submit button
            $('#edit_incharge').click(function(e) {
                e.preventDefault();
                const isEditable = ($('#edit_incharge').text().trim() === 'Edit');

                if (isEditable) {
                    $('#edit_incharge').text('View');
                    $('#registrationForm button[type="submit"]').show();
                    toggleRadioDisabled(false); // Enable radio buttons
                } else {
                    $('#edit_incharge').text('Edit');
                    $('#registrationForm button[type="submit"]').hide();
                    toggleRadioDisabled(true);
                }

                toggleEditable(isEditable); // Enable/disable editing
            });
        });

        $(document).ready(function() {
            $('#togglePassword').on('click', function() {
                const passwordField = $('#password');
                const fieldType = passwordField.attr('type');

                // Toggle password visibility
                if (fieldType === 'password') {
                    passwordField.attr('type', 'text');
                    $('#togglePassword i').removeClass('bi-eye-slash-fill').addClass('bi-eye-fill');
                } else {
                    passwordField.attr('type', 'password');
                    $('#togglePassword i').removeClass('bi-eye-fill').addClass('bi-eye-slash-fill');
                }
            });
            // Function to toggle password visibility for password field
            $('#toggleButtonConfirm').click(function() {
                var passwordField = $('#togglePasswordConfirm');
                var icon = $('#eyeIconPassword');

                if (passwordField.attr('type') === 'password') {
                    passwordField.attr('type', 'text');
                    icon.removeClass('bi-eye-slash-fill').addClass('bi-eye-fill');
                } else {
                    passwordField.attr('type', 'password');
                    icon.removeClass('bi-eye-fill').addClass('bi-eye-slash-fill');
                }
            });


            // Function to toggle password visibility for confirm password field
            $('#toggleConfirmPassword').click(function() {
                var confirmPasswordField = $('#confirmPassword');
                var icon = $('#eyeIconConfirmPassword');

                if (confirmPasswordField.attr('type') === 'password') {
                    confirmPasswordField.attr('type', 'text');
                    icon.removeClass('bi-eye-slash-fill').addClass('bi-eye-fill');
                } else {
                    confirmPasswordField.attr('type', 'password');
                    icon.removeClass('bi-eye-fill').addClass('bi-eye-slash-fill');
                }
            });

        });
        $(document).ready(function() {
            $('#toogleResetPassword').change(function() {
                if ($(this).is(':checked')) {
                    $('#passwordFields, #confirmPasswordField').show();
                } else {
                    $('#passwordFields, #confirmPasswordField').hide();
                }
            });
        });

        $('#registrationForm').submit(function(e) {
            e.preventDefault();
            $('.submit_btn').show();
            const password = $('#togglePasswordConfirm').val();
            const confirmPassword = $('#confirmPassword').val();

            if (password !== confirmPassword) {
                $('#confirmPassword').addClass('is-invalid');
                $('#passwordMatchError').text('Passwords do not match').show();
            } else {
                // Passwords match - proceed with form submission or other actions
                $('#confirmPassword').removeClass('is-invalid');
                $('#passwordMatchError').hide();
                
                const firstName = $('#firstname').val();
                const lastName = $('#lastname').val();
                const phoneNumber = $('#phonenumber').val();
                const emailAddress = $('#emailaddress').val();
                const gender = $('input[name="exampleRadios"]:checked').val();
                let password;
                if ($('#toogleResetPassword').is(':checked')) {
                    console.log('it is checked')
                    password = $('#confirmPassword').val();
                    let oldPassword = $('#password').val();
                    if(password === oldPassword){
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top',
                            iconColor: 'white',
                            showConfirmButton: false,
                            timer: 1500,
                            timerProgressBar: true
                        })
                        Toast.fire({
                            icon: 'error',
                            title: 'Same password with the old one'
                        })
                        return;
                    }
                } else {
                    console.log('it is not checked')
                    password = $('#password').val();
                }
                const searchparams = new URLSearchParams(window.location.search);
                const id = searchparams.get('id');
                const formData = {
                    firstname: firstName,
                    lastname: lastName,
                    number: phoneNumber,
                    email: emailAddress,
                    password: password,
                    gender: gender,
                    usertype: 'staff',
                    user_id: id
                };
                console.log(formData); //
                
                $.ajax({
                    url: `${link_path}api/incharge/update`,
                    method: 'POST',
                    data: formData,
                    success: (data) =>{
                        console.log(data)
                        if (data.type === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: `${data.message}`,
                            }).then((result) => {
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: `${data.message}`,
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