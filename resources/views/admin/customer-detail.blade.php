@extends('admin.layouts.customer-detail')

@section('title', 'Admin - CustomersDetails [TechDepot]')

@section('main-section')
    <!-- Body: Body -->
    <div class="body d-flex py-3">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0">Customer Detail</h3>
                    </div>
                </div>
            </div> <!-- Row end  -->
            <div class="row g-3 mb-xl-3">
                <div class="col-xxl-4 col-xl-12 col-lg-12 col-md-12">
                    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-1 row-deck g-3">
                        <div class="col">
                            <div class="card profile-card">
                                <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                    <h6 class="mb-0 fw-bold ">Profile</h6>
                                </div>
                                <div class="card-body d-flex profile-fulldeatil flex-column">
                                    <div class="profile-block text-center w220 mx-auto">
                                        <a href="#" class="profile_img">
                                            
                                        </a>
                                        <div class="about-info d-flex align-items-center mt-3 justify-content-center flex-column">
                                            <span class="text-muted small">ID : #<span class="user-id"></span></span>
                                        </div>
                                    </div>
                                    <div class="profile-info w-100">
                                        <h6 class="mb-0 mt-2  fw-bold d-block fs-6 text-center"> <span class="user-name"></span> </h6>
                                        <span class="py-1 fw-bold small-11 mb-0 mt-1 text-muted text-center mx-auto d-block"><span class="user-small-info"></span></span>
                                        
                                        <div class="row g-2 pt-2">
                                            <div class="col-xl-12">
                                                <div class="d-flex align-items-center">
                                                    <i class="icofont-ui-touch-phone"></i>
                                                    <span class="ms-2"><span class="user-phone"></span> </span>
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="d-flex align-items-center">
                                                    <i class="icofont-email"></i>
                                                    <span class="ms-2"><span class="user-email"></span></span>
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="d-flex align-items-center">
                                                    <i class="icofont-birthday-cake"></i>
                                                    <span class="ms-2"><span class="user-bday"></span></span>
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="d-flex align-items-center">
                                                    <i class="icofont-address-book"></i>
                                                    <span class="ms-2"><span class="user-location"></span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                    <h6 class="mb-0 fw-bold ">Expence Count</h6>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-end text-center">
                                        <div class="p-2">
                                            <h6 class="mb-0 fw-bold total-purchase"></h6>
                                            <span class="text-muted">Total</span>
                                        </div>
                                        <div class="p-2 ms-4">
                                            <h6 class="mb-0 fw-bold total-ave">$149.16</h6>
                                            <span class="text-muted">Avg Month</span>
                                        </div>
                                    </div>
                                    <div id="apex-circle-gradient"></div>
                                    <!-- <div class="row">
                                        <div class="col">
                                            <span class="mb-3 d-block">Food</span>
                                            <div class="progress-bar  bg-secondary" role="progressbar" style="width: 55%; height: 5px;"></div>
                                            <span class="mt-2 d-block text-secondary">$597 spend</span>
                                        </div>
                                        <div class="col">
                                            <span class="mb-3 d-block">Cloth</span>
                                            <div class="progress-bar  bg-primary" role="progressbar" style="width: 60%; height: 5px;"></div>
                                            <span class="mt-2 d-block text-primary">$845 spend</span>
                                        </div>
                                        <div class="col">
                                            <span class="mb-3 d-block">Other</span>
                                            <div class="progress-bar  bg-lavender-purple" role="progressbar" style="width: 70%; height: 5px;"></div>
                                            <span class="mt-2 d-block color-lavender-purple">$348 spend</span> 
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-8 col-xl-12 col-lg-12 col-md-12">
                    <div class="row g-3 mb-3 row-cols-1 row-cols-md-1 row-cols-lg-2 row-deck"> 
                        <div class="col">
                            <div class="card auth-detailblock">
                                <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                    <h6 class="mb-0 fw-bold ">Delivery Address</h6>
                                    <span class="is-default">default</span>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <label class="form-label col-6 col-sm-5">Barangay:</label>
                                            <strong><span class="order-barangay"></span></strong>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label col-6 col-sm-5">City:</label>
                                            <strong><span class="order-city"></span></strong>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label col-6 col-sm-5">Province:</label>
                                            <strong><span class="order-province"></span></strong>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label col-6 col-sm-5">Phone (+63):</label>
                                            <strong><span class="order-phone"></span></strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card"> 
                        <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                            <h6 class="mb-0 fw-bold ">Customer Order</h6>
                        </div>
                        <div class="card-body"> 
                            <table id="myProjectTable" class="table table-hover align-middle mb-0" style="width: 100%;">  
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Item</th>
                                        <th>Payment Info</th>
                                        <th>Order Date</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- <tr>
                                        <td><a href="order-details.html"><strong>#Order-78414</strong></a></td>
                                        <td><img src="images/product-1.jpg" class="avatar lg rounded me-2" alt="profile-image"><span> Oculus VR </span></td>
                                        <td>Credit Card</td>
                                        <td>June 16, 2021</td>
                                        <td>
                                            $420
                                        </td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- Row end  -->
        </div>
    </div>
@endsection

@section('dependencies')
    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Jquery Core Js -->
    <script src="/admin_files/js/libscripts.bundle.js"></script>

    <!-- Plugin Js -->
    <script src="/admin_files/js/apexcharts.bundle.js"></script>
    <script src="/admin_files/js/dataTables.bundle.js"></script>

    <!-- Jquery Page Js -->
    <script src="/admin_files/js/template.js"></script>
    <script src="/admin_files/js/profile.js"></script>


    <script src="/admin_files/js/cookie.js"></script>
    <script src="/admin_files/js/checkuser.js"></script>
    <script src="/admin_files/js/userCustDetails.js"></script>
@endsection