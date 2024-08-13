@extends('admin.layouts.order-list')

@section('title', 'Admin - OrderList [TechDepot]')

@section('main-section')
    <!-- Body: Body -->
    <div class="body d-flex py-3">  
        <div class="container-xxl"> 
            <div class="row align-items-center"> 
                <div class="border-0 mb-4"> 
                    <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0">Orders List</h3>
                    </div>
                </div>
            </div> <!-- Row end  -->
            <div class="row g-3 mb-3"> 
                <div class="col-md-12">
                    <div class="card"> 
                        <div class="card-body"> 
                            <table id="myDataTable" class="table table-hover align-middle mb-0" style="width: 100%;">  
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Item</th>
                                        <th>Customer Name</th>
                                        <th>Payment Info</th>
                                        <th>Total Amount</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- LAYOUT -->
                                    <!-- <tr>
                                        <td><a href="order-details.html"><strong>#Order-58414</strong></a></td>
                                        <td><img src="images/product-2.jpg" class="avatar lg rounded me-2" alt="profile-image"><span>Wall Clock</span></td>
                                        <td>Brian</td>
                                        <td>COD</td>
                                        <td>
                                            $220
                                        </td>
                                        <td><span class="badge bg-success">Pending</span></td>
                                        <td>
                                            <a href="order-details.html">
                                                <i class="fas fa-eye fa-2x"></i>
                                            </a>
                                            
                                        </td>
                                    </tr>  -->
                                </tbody>
                            </table>
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

    <!-- Plugin Js -->
    <script src="/admin_files/js/dataTables.bundle.js"></script>  

    <!-- Jquery Page Js -->
    <script src="/admin_files/js/template.js"></script>

    <script src="/admin_files/js/cookie.js"></script>
    <script src="/admin_files/js/checkuser.js"></script>
    <script src="/admin_files/js/orderList.js"></script>
        <!-- sweet alert -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection