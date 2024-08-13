@extends('admin.layouts.invoices')

@section('title', 'Admin - Invoices [TechDepot]')

@section('main-section')
            <!-- Body: Body -->
            <div class="body d-flex py-lg-3 py-md-2">
                <div class="container-xxl">
                    
                    <div class="row align-items-center">
                        <div class="border-0 mb-4">
                            <div class="card-header no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                <h3 class="fw-bold mb-0 py-3 pb-2">Invoices</h3>
                                <div class="col-auto py-2 w-sm-100">
                                    <ul class="nav nav-tabs tab-body-header rounded invoice-set" role="tablist">
                                        <!-- <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#Invoice-list" role="tab">Invoice List</a></li> -->
                                        {{-- <li class="nav-item"><a class="nav-link  active" data-bs-toggle="tab" href="#Invoice-Simple" role="tab">Order Invoice</a></li> --}}
                                        <!-- <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#Invoice-Email" role="tab">Email invoice</a></li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Row end  -->

                    <div class="row justify-content-center">
                        <div class="col-lg-12 col-md-12">
                            <div class="tab-content">


                                <div class="tab-pane fade show active" id="Invoice-Simple">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-8 col-md-12">
                                            <div class="card p-xl-5 p-lg-4 p-0">
                                                <div class="card-body" id="invoice-body">
                                                    <div class="mb-3 pb-3 border-bottom">
                                                        Invoice
                                                        <strong><span class="order-date"></span></strong>
                                                        <span class="float-end"> <strong>Transaction ID: </strong><span class="order-id"></span></span>
                                                    </div>

                                                    <div class="row mb-4">
                                                        <div class="col-sm-6">
                                                            <h6 class="mb-3">From:</h6>
                                                            <div><strong>TechDepot</strong></div>
                                                            <div>Labo</div>
                                                            <div>Ozamiz City, Misamis Occidental</div>
                                                            <div>Email: aw8hurtz@gmail.com</div>
                                                            <div>Phone: (+63) 938-683-4879</div>
                                                        </div>
                                                        
                                                        <div class="col-sm-6">
                                                            <h6 class="mb-3">To:</h6>
                                                            <div><strong><span class="order-name"></span></strong></div>
                                                            <div><span class="order-barangay"></span></div>
                                                            <div><span class="order-location"></span></div>
                                                            <div>Email: <span class="order-email"></span></div>
                                                            <div>Phone: (+63) <span class="order-phone"></span></div>
                                                        </div>
                                                    </div> <!-- Row end  -->
                                                    
                                                    <div class="table-responsive-sm">
                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center">#</th>
                                                                    <th>Item</th>
                                                                    <th>Brand</th>
                                                                    <th class="text-end">Item Cost</th>
                                                                    <th class="text-center">Products Item</th>
                                                                    <th class="text-end">Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="data-body">
                                                            </tbody>
                                                        </table>
                                                    </div>
                    
                                                    <div class="row">
                                                        <div class="col-lg-4 col-sm-5">
                                                        
                                                        </div>
                                                        
                                                        <div class="col-lg-5 col-sm-6 ms-auto">
                                                            <table class="table table-clear">
                                                                <tbody>
                                                                    <tr>
                                                                        <td><strong>Subtotal</strong></td>
                                                                        <td class="text-end subtotal"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>Shipping Cost (+)</strong></td>
                                                                        <td class="text-end shipping"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>Discount (-)</strong></td>
                                                                        <td class="text-end discount"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>Total</strong></td>
                                                                        <td class="text-end total"><strong></strong></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div> <!-- Row end  -->
                    
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <b><h6>Terms &amp; Condition</h6></b>
                                                            
                                                            <p class="text-muted">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over</p>
                                                        </div>
                                                        <div class="col-lg-12 text-end">
                                                            <button type="button" class="btn btn-outline-secondary btn-lg my-1"  onclick="printInvoice()"><i class="fa fa-print"></i> Print</button>
                                                            <button type="button" class="btn btn-primary btn-lg my-1 send-mail"><i class="fa fa-paper-plane-o"></i> Send Invoice</button>
                                                        </div>
                                                    </div> <!-- Row end  -->
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- Row end  -->
                                </div> 
                                <!-- tab end  -->
                            </div>
                        </div>

                    </div> <!-- Row end  -->
                </div>
            </div>
@endsection

@section('dependencies')
    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Jquery Core Js -->
    <script src="/admin_files/js/libscripts.bundle.js"></script>

    <!-- Jquery Page Js -->
    <script src="/admin_files/js/template.js"></script>


    <script src="/admin_files/js/cookie.js"></script>
    <script src="/admin_files/js/checkuser.js"></script>
    <script src="/admin_files/js/orderInvoiceMake.js"></script>
    <script>
        function printInvoice() {
            var printContents = document.getElementById("invoice-body").innerHTML;
            var popupWin = window.open('', '_blank');
            popupWin.document.open();
            popupWin.document.write(`
                <html>
                <head>
                <title>Print Invoice</title>
                    
                
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <style>
                @media print {
                    body {
                        visibility: hidden;
                    }
                    #invoice-print {
                        visibility: visible;
                    }
                }
                button{
                    visibility: hidden
                }
            </style>

                </head>
                <body>
                <div id="invoice-print">
                    ${printContents}
                </div>
                </body>
                </html>
            `);
            popupWin.document.close();
            popupWin.print();
        }
    </script>
@endsection