@extends('incharge.layouts.admin-profile')

@section('title', 'Admin - Profile [TechDepot]')

@section('main-section')
            <!-- Body: Body -->
            <div class="body d-flex py-3">
                <div class="container-xxl">
                    <div class="row align-items-center">
                        <div class="border-0 mb-4">
                            <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                <h3 class="fw-bold mb-0">Incharge Profile</h3>
                            </div>
                        </div>
                    </div> <!-- Row end  -->
                    <div class="row g-3">
                        <div class="col-xl-4 col-lg-5 col-md-12">
                            <div class="card profile-card flex-column mb-3">
                                <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                    <h6 class="mb-0 fw-bold ">Profile</h6>
                                </div>
                                <div class="card-body d-flex profile-fulldeatil flex-column">
                                    <div class="profile-block text-center w220 mx-auto">
                                        <a href="#" class="admin_image">
                                            
                                        </a>
                                        <button class="btn btn-primary" style="position: absolute;top:15px;right: 15px;" data-bs-toggle="modal" data-bs-target="#editprofile"><i class="icofont-edit"></i></button>
                                        <div class="about-info d-flex align-items-center mt-3 justify-content-center flex-column">
                                            <span class="text-muted small">Incharge ID : <span class="admin_id"></span></span>
                                        </div>
                                    </div>
                                    <div class="profile-info w-100">
                                        <h6 class="mb-0 mt-2  fw-bold d-block fs-6 text-center admin_name"></h6>
                                        <span class="py-1 fw-bold small-11 mb-0 mt-1 text-muted text-center mx-auto d-block"><span class="admin_age"></span>, Philippines</span>
                                        <div class="row g-2 pt-2">
                                            <div class="col-xl-12">
                                                <div class="d-flex align-items-center">
                                                    <i class="icofont-ui-touch-phone"></i>
                                                    <span class="ms-2 admin_phone"></span>
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="d-flex align-items-center">
                                                    <i class="icofont-email"></i>
                                                    <span class="ms-2 admin_email">adrianallan@gmail.com</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="d-flex align-items-center">
                                                    <i class="icofont-birthday-cake"></i>
                                                    <span class="ms-2 admin_birthday">19/03/1980</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-7 col-md-12">
                            <div class="card auth-detailblock">
                                <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                    <h6 class="mb-0 fw-bold ">Authentication Details</h6>
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#authchange"><i class="icofont-edit"></i></button>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <label class="form-label col-6 col-sm-5">User Name :</label>
                                            <strong><span class="admin_user"></span></strong>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label col-6 col-sm-5">Login Password :</label>
                                            <strong><span class="admin_pass"></span></strong>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label col-6 col-sm-5">Last Password change:</label>
                                            <span><strong>1 Day Ago</strong></span>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <br><hr>
                                <div class="card mb-3">
                                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                        <h6 class="mb-0 fw-bold ">Payment Method</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="payment-info">
                                            <h5 class="payment-name text-muted"><i class="icofont-visa-alt fs-3"></i> GCASH (09386834879)</h5>
                                            
                                            <br>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Edit Password-->
            <div class="modal fade" id="authchange" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title  fw-bold" id="expeditLabel"> Edit Authentication</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="updatePass">
                        <div class="modal-body">
                            <div class="deadline-form">
                                <div class="row g-3 mb-3">
                                    <div class="col-sm-12">
                                        <input type="hidden" class="form-control" id="user_id" name="user-id" readonly> 
                                        <label for="item1" class="form-label">User Name</label>
                                        <input type="text" class="form-control" id="user_name" name="user_name" readonly> 
                                    </div>
                                    <div class="col-sm-12">
                                        <label for="taxtno111" class="form-label">Old Password</label>
                                        <input type="password" class="form-control" id="user_pass" name="current-password">
                                    </div>
                                    <div class="col-sm-12">
                                        <label for="taxtno11" class="form-label">New Password</label>
                                        <input type="text" class="form-control" id="new_pass" name="new-password">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Done</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
            <div class="modal fade" id="editprofile" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title  fw-bold" id="expeditLabel1111"> Edit Profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="form_info">
                        <div class="modal-body">
                            
                            <div class="deadline-form">
                                    <div class="row g-3 mb-3">
                                        <div class="col-sm-12">
                                            <input type="hidden" name="user_id" class="user_id">
                                            <label for="item100" class="form-label">Firstname</label>
                                            <input type="text" class="form-control uFname" name="fname"  > 
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="item100" class="form-label">Lastname</label>
                                            <input type="text" class="form-control uLname" id="item100" name="lname"  > 
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="taxtno200" class="form-label">Profile Image</label>
                                            <input type="file" class="form-control" id="taxtno200" name="file" accept=".jpg, .jpeg, .png">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="abc1" class="form-label">Birthday date</label>
                                        <input type="date" class="form-control w-100 uDob" id="abc1" name="bod" >
                                    </div>
                                    <div class="row g-3 mb-3">
                                        <div class="col-sm-6">
                                        <label for="mailid" class="form-label">Mail</label>
                                        <input type="text" class="form-control uEmail" id="mailid" name="email"  >
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="phoneid" class="form-label">Phone</label>
                                            <input type="text" class="form-control uNumber" id="phoneid" name="number"  class="uNumber">
                                        </div>
                                    </div>
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
@endsection


@section('dependencies')
    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Jquery Core Js -->
    <script src="/incharge_files/js/libscripts.bundle.js"></script>

    <!-- Jquery Page Js -->
    <script src="/incharge_files/js/template.js"></script>

    <script src="/incharge_files/js/cookie.js"></script>
    <script src="/incharge_files/js/checkuser.js"></script>
    <script src="/incharge_files/js/admin-profile.js"></script>
@endsection