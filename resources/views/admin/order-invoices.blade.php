@extends('admin.layouts.order-invoices')

@section('title', 'Admin - OrderInvoice [TechDepot]')

@section('main-section')
            <!-- Body: Body -->
            <div class="body d-flex py-3">
                <div class="container-xxl">
                    <div class="row align-items-center">
                        <div class="border-0 mb-4">
                            <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                <h3 class="fw-bold mb-0">Order Invoices</h3>
                            </div>
                        </div>
                    </div> <!-- Row end  -->
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <table id="patient_table" class="table table-hover align-middle mb-0" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Item</th>
                                                <th>Billing Date</th>
                                                <th>Total Amount</th>
                                                <th>Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- <tr>
                                                <td><strong>#Order-78414</strong></td>
                                                <td><img src="images/product-1.jpg" class="avatar lg rounded me-2" alt="profile-image"><span> Oculus VR </span></td>
                                                <td>May 16, 2021</td>
                                                <td>$212</td>
                                                <td>Alexander007</td>
                                                <td>
                                                    <a class="btn btn-sm btn-white" href="invoices.html"><i class="icofont-print fs-5"></i></a>
                                                    <a class="btn btn-sm btn-white" href="invoices.html"><i class="icofont-download fs-5"></i></a>
                                                    <a class="btn btn-sm btn-white" href="invoices.html"><i class="icofont-send-mail fs-4"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>#Order-58414</strong></td>
                                                <td><img src="images/product-2.jpg" class="avatar lg rounded me-2" alt="profile-image"><span>Wall Clock</span></td>
                                                <td>May 22, 2021</td>
                                                <td>$612</td>
                                                <td>Joan123</td>
                                                <td>
                                                    <a class="btn btn-sm btn-white" href="invoices.html"><i class="icofont-print fs-5"></i></a>
                                                    <a class="btn btn-sm btn-white" href="invoices.html"><i class="icofont-download fs-5"></i></a>
                                                    <a class="btn btn-sm btn-white" href="invoices.html"><i class="icofont-send-mail fs-4"></i></a>
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

    <!-- Plugin Js-->
    <script src="/admin_files/js/dataTables.bundle.js"></script>

    <!-- Jquery Page Js -->
    <script src="/admin_files/js/template.js"></script>

    <script src="/admin_files/js/cookie.js"></script>
    <script src="/admin_files/js/checkuser.js"></script>
    <script src="/admin_files/js/orderInvoice.js"></script>
        <!-- sweet alert -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection