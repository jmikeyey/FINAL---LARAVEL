@extends('admin.layouts.index')

@section('title', 'Admin - Home [TechDepot]')

@section('main-section')
        <!-- Body: Body -->
        <div class="body d-flex py-3">
            <div class="container-xxl">

                <div class="row g-3 mb-3 row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-4">
                    <div class="col">
                        <div class="alert-success alert mb-0">
                            <div class="d-flex align-items-center">
                                <div class="avatar rounded no-thumbnail bg-success text-light"><i
                                        class="fa fa-dollar fa-lg"></i></div>
                                <div class="flex-fill ms-3 text-truncate">
                                    <div class="h6 mb-0">Revenue</div>
                                    <span class="small total-revenue"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="alert-danger alert mb-0">
                            <div class="d-flex align-items-center">
                                <div class="avatar rounded no-thumbnail bg-danger text-light"><i
                                        class="fa fa-credit-card fa-lg"></i></div>
                                <div class="flex-fill ms-3 text-truncate">
                                    <div class="h6 mb-0">Expense</div>
                                    <span class="small">₱ 0</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="alert-warning alert mb-0">
                            <div class="d-flex align-items-center">
                                <div class="avatar rounded no-thumbnail bg-warning text-light"><i
                                        class="fa fa-smile-o fa-lg"></i></div>
                                <div class="flex-fill ms-3 text-truncate">
                                    <div class="h6 mb-0">Customers</div>
                                    <span class="small total-customers"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="alert-info alert mb-0">
                            <div class="d-flex align-items-center">
                                <div class="avatar rounded no-thumbnail bg-info text-light"><i
                                        class="fa fa-shopping-bag" aria-hidden="true"></i></div>
                                <div class="flex-fill ms-3 text-truncate">
                                    <div class="h6 mb-0 ">Categories</div>
                                    <span class="small cat-count"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- Row end  -->

                <div class="row g-3">
                    <div class="col-lg-12 col-md-12">
                        <div class="tab-filter d-flex align-items-center justify-content-between mb-3 flex-wrap">
                            <ul class="nav nav-tabs tab-card tab-body-header rounded  d-inline-flex w-sm-100">
                                <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab"
                                        href="#summery-today">Today</a></li>
                                <li class="nav-item"><a class="nav-link" data-bs-toggle="tab"
                                        href="#summery-week">Week</a></li>
                            </ul>
                            <div class="date-filter d-flex align-items-center mt-2 mt-sm-0 w-sm-100">
                                <div class="input-group">
                                    <input id="input-date" type="date" class="form-control">
                                    <button class="btn btn-primary" type="button"><i
                                            class="icofont-filter fs-5"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content mt-1">
                            <!-- today -->
                            <div class="tab-pane fade show active" id="summery-today">
                                <div class="row g-1 g-sm-3 mb-3 row-deck">
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                        <div class="card">
                                            <div
                                                class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                <div class="left-info">
                                                    <span class="text-muted">Orders</span>
                                                    <div><span class="fs-6 fw-bold me-2 total-orders"></span></div>
                                                </div>
                                                <div class="right-icon">
                                                    <i
                                                        class="icofont-shopping-cart fs-3 color-lavender-purple"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                        <div class="card">
                                            <div
                                                class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                <div class="left-info">
                                                    <span class="text-muted">Avg Sale</span>
                                                    <div><span class="fs-6 fw-bold me-2 total-sales"></span></div>
                                                </div>
                                                <div class="right-icon">
                                                    <i class="icofont-sale-discount fs-3 color-santa-fe"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                        <div class="card">
                                            <div
                                                class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                <div class="left-info">
                                                    <span class="text-muted">Avg Item Sold</span>
                                                    <div><span class="fs-6 fw-bold me-2 total-sold"></span></div>
                                                </div>
                                                <div class="right-icon">
                                                    <i class="icofont-calculator-alt-2 fs-3 color-danger"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                        <div class="card">
                                            <div
                                                class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                <div class="left-info">
                                                    <span class="text-muted">Total Sale</span>
                                                    <div><span class="fs-6 fw-bold me-2 today-revenue"></span>
                                                    </div>
                                                </div>
                                                <div class="right-icon">
                                                    <i class="icofont-calculator-alt-1 fs-3 color-lightblue"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                        <div class="card">
                                            <div
                                                class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                <div class="left-info">
                                                    <span class="text-muted">Total Products</span>
                                                    <div><span class="fs-6 fw-bold me-2 total-products"></span>
                                                    </div>
                                                </div>
                                                <div class="right-icon">
                                                    <i class="icofont-bag fs-3 color-light-orange"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                        <div class="card">
                                            <div
                                                class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                <div class="left-info">
                                                    <span class="text-muted">Top Selling Item</span>
                                                    <div><span class="fs-6 fw-bold me-2 top-selling"></span></div>
                                                </div>
                                                <div class="right-icon">
                                                    <i class="icofont-star fs-3 color-lightyellow"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- row end -->
                            </div>
                            <!-- week -->
                            <div class="tab-pane fade" id="summery-week">
                                <div class="row g-3 mb-4 row-deck">
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                        <div class="card">
                                            <div
                                                class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                <div class="left-info">
                                                    <span class="text-muted ">Order</span>
                                                    <div><span class="fs-6 fw-bold me-2 week-orders"></span></div>
                                                </div>
                                                <div class="right-icon">
                                                    <i
                                                        class="icofont-shopping-cart fs-3 color-lavender-purple"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                        <div class="card">
                                            <div
                                                class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                <div class="left-info">
                                                    <span class="text-muted">Avg Sale</span>
                                                    <div><span class="fs-6 fw-bold me-2 week-averageSale"></span>
                                                    </div>
                                                </div>
                                                <div class="right-icon">
                                                    <i class="icofont-sale-discount fs-3 color-santa-fe"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                        <div class="card">
                                            <div
                                                class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                <div class="left-info">
                                                    <span class="text-muted">Avg Item Sale</span>
                                                    <div><span class="fs-6 fw-bold me-2 week-itemSale"></span>
                                                    </div>
                                                </div>
                                                <div class="right-icon">
                                                    <i class="icofont-calculator-alt-2 fs-3 color-danger"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                        <div class="card">
                                            <div
                                                class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                <div class="left-info">
                                                    <span class="text-muted">Total Sale</span>
                                                    <div><span class="fs-6 fw-bold me-2 week-revenue"></span></div>
                                                </div>
                                                <div class="right-icon">
                                                    <i class="icofont-calculator-alt-1 fs-3 color-lightblue"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                        <div class="card">
                                            <div
                                                class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                <div class="left-info">
                                                    <span class="text-muted">Total Products</span>
                                                    <div><span class="fs-6 fw-bold me-2 total-products"></span>
                                                    </div>
                                                </div>
                                                <div class="right-icon">
                                                    <i class="icofont-bag fs-3 color-light-orange"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                        <div class="card">
                                            <div
                                                class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                <div class="left-info">
                                                    <span class="text-muted">Top Selling Item</span>
                                                    <div><span class="fs-6 fw-bold me-2 top-selling"></span></div>
                                                </div>
                                                <div class="right-icon">
                                                    <i class="icofont-star fs-3 color-lightyellow"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- row end -->
                            </div>
                        </div>
                    </div>
                </div><!-- Row end  -->




                <div class="row g-3 mb-3">
                    <div class="col-md-12">
                        <div class="card">
                            <div
                                class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                                <h6 class="m-0 fw-bold">Recent Transactions</h6>
                            </div>
                            <div class="card-body">
                                <table id="myDataTable" class="table table-hover align-middle mb-0"
                                    style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Item</th>
                                            <th>Customer Name</th>
                                            <th>Payment Info</th>
                                            <th>Total Amount</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- <tr>
                                            <td><strong>#Order-58414</strong></td>
                                            <td><img src="images/product-2.jpg" class="avatar lg rounded me-2" alt="profile-image"><span>Wall Clock</span></td>
                                            <td>Brian</td>
                                            <td>Debit Card</td>
                                            <td>
                                                $220
                                            </td>
                                            <td><span class="badge bg-success">Complited</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>#Order-28414</strong></td>
                                            <td><img src="images/product-1.jpg" class="avatar lg rounded me-2" alt="profile-image"><span>Oculus VR</span></td>
                                            <td>Adam H</td>
                                            <td>Debit Card</td>
                                            <td>
                                                $20
                                            </td>
                                            <td><span class="badge bg-warning">Progress</span></td>
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
    <script src="/admin_files/js/dataTables.bundle.js"></script>

    <!-- Jquery Page Js -->
    <script src="/admin_files/js/template.js"></script>

    <script src="/admin_files/js/cookie.js"></script>

    <script src="/admin_files/js/checkuser.js"></script>
    <script src="/admin_files/js/dashboard.js"></script>
@endsection