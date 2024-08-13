@extends('admin.layouts.customers')

@section('title', 'Admin - Customers [TechDepot]')

@section('main-section')
            <!-- Body: Body -->       
            <div class="body d-flex py-lg-3 py-md-2">
                <div class="container-xxl">
                    <div class="row align-items-center">
                        <div class="border-0 mb-4">
                            <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                <h3 class="fw-bold mb-0">Customers Information</h3>
                            </div>
                        </div>
                    </div> <!-- Row end  -->
                    <div class="row clearfix g-3">
                        <div class="col-sm-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <table id="myProjectTable" class="table table-hover align-middle mb-0" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Customers</th> 
                                                <th>Register  Date</th>
                                                <th>Mail</th>
                                                <th>Phone</th> 
                                                <th>Total Order</th>
                                                <th>Actions</th>  
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- <tr>
                                                <td><strong></strong></td>
                                                <td>
                                                    <a href="customer-detail.html">
                                                        <img class="avatar rounded" src="fonts/avatar2.svg" alt>
                                                        <span class="fw-bold ms-1">Ryan	Randall</span>
                                                    </a>
                                                </td>
                                                <td>
                                                    12/03/2021
                                                </td>
                                                <td>RyanRandall@gmail.com</td>
                                                <td>303-555-0151</td>
                                                <td>4568</td>
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#expedit"><i class="icofont-edit text-success"></i></button>
                                                        <button type="button" class="btn btn-outline-secondary deleterow"><i class="icofont-eye text-danger"></i></button>
                                                    </div>
                                                </td>
                                            </tr> -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row End -->
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
    <script>
        // project data table
        // $(document).ready(function() {
        //     $('.deleterow').on('click',function(){
        //     var tablename = $(this).closest('table').DataTable();  
        //     tablename
        //             .row( $(this)
        //             .parents('tr') )
        //             .remove()
        //             .draw();

        //     } );
        // });
    </script>


    <script src="/admin_files/js/cookie.js"></script>
    <script src="/admin_files/js/checkuser.js"></script>
    <script src="/admin_files/js/userCustomers.js"></script>
@endsection