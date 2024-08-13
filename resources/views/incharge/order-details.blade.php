@extends('incharge.layouts.order-details')

@section('title', 'Admin - OrderDetails [TechDepot]')

@section('main-section')
    <!-- Body: Body --> 
    <div class="body d-flex py-3">  
        <div class="container-xxl content-holder"> 
            <div class="row align-items-center"> 
                <div class="border-0 mb-4"> 
                    <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0">Order Details: #Order-<span id="order-id"></span></h3>
                    </div>
                </div>
            </div> <!-- Row end  -->
            <div class="row g-3 mb-3 row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-4">
                <div class="col">
                    <div class="alert-success alert mb-0">
                        <div class="d-flex align-items-center">
                            <div class="avatar rounded no-thumbnail bg-success text-light"><i class="fa fa-shopping-cart fa-lg" aria-hidden="true"></i></div>
                            <div class="flex-fill ms-3 text-truncate">
                                <div class="h6 mb-0">Order Created at</div>
                                <span class="small order-created"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="alert-danger alert mb-0">
                        <div class="d-flex align-items-center">
                            <div class="avatar rounded no-thumbnail bg-danger text-light"><i class="fa fa-user fa-lg" aria-hidden="true"></i></div>
                            <div class="flex-fill ms-3 text-truncate">
                                <div class="h6 mb-0">Name</div>
                                <span class="small order-name"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="alert-warning alert mb-0">
                        <div class="d-flex align-items-center">
                            <div class="avatar rounded no-thumbnail bg-warning text-light"><i class="fa fa-envelope fa-lg" aria-hidden="true"></i></div>
                            <div class="flex-fill ms-3 text-truncate">
                                <div class="h6 mb-0">Email</div>
                                <span class="small order-email"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="alert-info alert mb-0">
                        <div class="d-flex align-items-center">
                            <div class="avatar rounded no-thumbnail bg-info text-light"><i class="fa fa-phone-square fa-lg" aria-hidden="true"></i></div>
                            <div class="flex-fill ms-3 text-truncate">
                                <div class="h6 mb-0">Contact No (+63)</div>
                                <span class="small order-contact"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- Row end  -->
            <div class="row g-3 mb-3 row-cols-1 row-cols-md-1 row-cols-lg-3 row-cols-xl-3 row-cols-xxl-3 row-deck"> 
                <div class="col">
                    <div class="card auth-detailblock">
                        <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                            <h6 class="mb-0 fw-bold "><i class="fa-solid fa-location-dot"></i> Delivery Address</h6>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label col-6 col-sm-5">Region:</label>
                                    <strong><span class="order-region"></span></strong>
                                </div>
                                <div class="col-12">
                                    <label class="form-label col-6 col-sm-5">Province:</label>
                                    <strong><span class="order-province"></span></strong>
                                </div>
                                <div class="col-12">
                                    <label class="form-label col-6 col-sm-5">City / Municipality:</label>
                                    <strong><span class="order-city"></span></strong>
                                </div>
                                <div class="col-12">
                                    <label class="form-label col-6 col-sm-5">Barangay:</label>
                                    <strong><span class="order-barangay"></span></strong>
                                </div>
                                <div class="col-12">
                                    <label class="form-label col-6 col-sm-5">More info:</label><br>
                                    <span class="order-detailed"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <!-- <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                            <h6 class="mb-0 fw-bold ">Invoice Detail</h6>
                            <a href="#" class="text-muted">Download</a>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label col-6 col-sm-5">Number:</label>
                                    <strong><span class="invo">#</span></strong>
                                </div>
                                <div class="col-12">
                                    <label class="form-label col-6 col-sm-5">Seller GST :</label>
                                    <span><strong>AFQWEPX17390VJ</strong></span>
                                </div>
                                <div class="col-12">
                                    <label class="form-label col-6 col-sm-5">Purchase GST :</label>
                                    <span><strong>NVFQWEPX1730VJ</strong></span>
                                </div>
                            </div>
                        </div> -->
                        <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                            <h6 class="mb-0 fw-bold ">Status Orders</h6>
                        </div>
                        <div class="card-body">
                            <form class="updateStatus">
                                <div class="row g-3 align-items-center">
                                    <div class="col-md-12">
                                        <label class="form-label">Order ID</label>
                                        <input type="text" class="form-control order-id" readonly>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Order Status</label>
                                        <select class="form-select optionValue" aria-label="Default select example" name="optionSelect">
                                            <option class=".normalStatus" value="">Select Status</option>
                                            <option value="Pending">Pending</option>
                                            <option value="To Ship">To Ship</option>
                                            <option value="To Receive">To Receive</option>
                                            <option value="Completed">Completed</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label col-8 col-sm-8">Payment Method:</label>
                                        <i><span class="order-method">N/A</span></i>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-4 text-uppercase">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div> <!-- Row end  -->
            <div class="row g-3 mb-3">
                <div class="col-xl-12 col-xxl-12">
                    <div class="card">
                        <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                            <h6 class="mb-0 fw-bold ">Order Summary</h6>
                        </div>
                        <div class="card-body">
                            <div class="product-cart">
                                <div class="checkout-table table-responsive">
                                    <table id="myCartTable" class="table display dataTable table-hover align-middle" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="product">Product Image</th>
                                                <th>Product Name</th>
                                                <th class="quantity">Quantity</th>
                                                <th class="price">Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- <tr>
                                                <td>
                                                    <img src="images/product-2.jpg" class="avatar rounded lg" alt="Product">
                                                </td>
                                                <td>
                                                    <h6 class="title">Wall Clock <span class="d-block fs-6 text-primary">Pr-1004</span></h6>
                                                </td>
                                                <td>
                                                    1
                                                </td>
                                                <td>
                                                    <p class="price">$399.00</p>
                                                </td>
                                            </tr> -->
                                        </tbody>
                                    </table>
                                </div>
                                <div class="checkout-coupon-total checkout-coupon-total-2 d-flex flex-wrap justify-content-end">
                                    <div class="checkout-total">
                                        <div class="single-total">
                                            <p class="value">Subotal Price:</p>
                                            <p class="price order-subtotal">0</p>
                                        </div>
                                        <div class="single-total">
                                            <p class="value">Shipping Cost (+):</p>
                                            <p class="price order-shipping">0</p>
                                        </div>
                                        <div class="single-total">
                                            <p class="value">Discount (-):</p>
                                            <p class="price order-discount">0</p>
                                        </div>
                                        <div class="single-total total-payable">
                                            <p class="value">Total Payable:</p>
                                            <p class="price oder-total">0</p>
                                        </div>
                                    </div>
                                </div>
                            </div>     
                        </div>
                    </div>
                </div>
                <!-- <div class="col-xl-12 col-xxl-4">
                    <div class="card mb-3">
                        STATUS ORDERS
                    </div>
                </div> -->
            </div> <!-- Row end  -->

        </div>
    </div>
@endsection

@section('dependencies')
    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Jquery Core Js -->
    <script src="/incharge_files/js/libscripts.bundle.js"></script>

    <!-- Plugin Js-->
    <script src="/incharge_files/js/dataTables.bundle.js"></script>

    <!-- Jquery Page Js -->
    <script src="/incharge_files/js/template.js"></script>


    <script src="/incharge_files/js/cookie.js"></script>
    <script src="/incharge_files/js/checkuser.js"></script>
    <script src="/incharge_files/js/orderDetails.js"></script>
@endsection