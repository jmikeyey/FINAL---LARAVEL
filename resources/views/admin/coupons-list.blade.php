@extends('admin.layouts.coupons-list')

@section('title', 'Admin - Coupons [TechDepot]')

@section('main-section')
            <!-- Body: Body -->       
            <div class="body d-flex py-lg-3 py-md-2">
                <div class="container-xxl">
                    <div class="row align-items-center">
                        <div class="border-0 mb-4">
                            <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                <h3 class="fw-bold mb-0">Coupons</h3>
                                <div class="col-auto d-flex w-sm-100">
                                    <a href="coupon-add" class="btn btn-primary btn-set-task w-sm-100"><i class="icofont-plus-circle me-2 fs-6"></i>Add Coupons</a>
                                </div>
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
                                                <th style='display:none'>ID</th>
                                                <th>Coupons Code</th>
                                                <th>Type</th> 
                                                <th>Discount</th>
                                                <th>Start Date</th>
                                                <th>End Date</th> 
                                                <th>Use Limit</th> 
                                                <th>Status</th> 
                                                <th>Actions</th>  
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- sample data -->
                                            <!-- <tr>
                                                <td><span class="fw-bold ms-1">DTZQT-8547</span></td>
                                                <td>Fixed Amount</td>
                                                <td>$12.6</td>
                                                <td>18/08/2021</td>
                                                <td>06/09/2021</td>
                                                <td>12</td>
                                                <td><span class="badge bg-success">Active</span></td>
                                                <td>
                                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                            <a href="coupon-edit.html" class="btn btn-outline-secondary"><i class="icofont-edit text-success"></i></a>
                                                            <button type="button" class="btn btn-outline-secondary deleterow"><i class="icofont-ui-delete text-danger"></i></button>
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
    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script src="/admin_files/js/cookie.js"></script>
    <script src="/admin_files/js/checkuser.js"></script>
    <script>
        // project data table
        var table = $('#myProjectTable').DataTable({
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            });
        // VIEW COUPONS
        $(document).ready(()=>{
            $.ajax({
                url: `${link_path}api/coupons/view`,
                method: "GET",
                dataType: "json",
                success: function(data){
                    console.log(data)
                    $.each(data.data, function(i, value){
                        let date = new Date(value.creation_date);
                        let options = { month: 'long', day: 'numeric', year: 'numeric' };
                        let formattedDate = date.toLocaleString('en-US', options);
                        let row = "<tr>"
                        row += `<td style='display:none'><strong>#<span>${value.id}</span></strong></td>`
                        row += `<td><strong><span>${value.name}</span></strong></td>`
                        row += `<td>${value.type}</td>`
                        if(value.item_value === 0){
                            row += `<td><i>Free</i></td>`
                        }else{
                            row += `<td>${value.item_value}</td>`
                        }
                        row += `<td>${value.date_start}</td>`
                        row += `<td>${value.date_end}</td>`
                        row += `<td>${value.use_limit}</td>`
                        if(value.status === 'Active'){
                            row += `<td><span class="badge bg-success">${value.status}</span></td>`
                        }else{
                            row += `<td><span class="badge bg-danger">${value.status}</span></td>`
                        }
                        row += `<td><div class="btn-group" role="group" aria-label="Basic outlined example"><a href="coupon-edit?id=${value.id}" class="btn btn-outline-secondary"><i class="icofont-edit text-success"></i></a><button type="button" class="btn btn-outline-secondary deleterow" onclick="delBTN(this)"><i class="icofont-ui-delete text-danger"></i></button></div></td>`
                        row += "</tr>"
                        table.row.add($(row)).draw();
                    })
                },
                error: function(errorThrown){
                    console.log(errorThrown)
                }
            })
        });
        function delBTN(btn){
            const row = btn.closest("tr");
            let id = row.cells[0].textContent;
            const name = row.cells[1].textContent;
            const val = id.split("#")[1];
            console.log(val)
            function initiateDEL(){
                console.log("initiated ------------")
                $.ajax({
                    url: `http://localhost/itp11/FINAL%20FINAL%20FINALS/main/api/coupons/cop_del.php`,
                    data: JSON.stringify({ del: val }),
                    method: `DELETE`,
                    dataType: "json",
                    success: (data)=>{
                        console.log(data)
                        if(data.type === "success"){
                            let message = data.message;
                            Swal.fire(`${message}`, '', 'success').then((result)=>{
                                if(result.isConfirmed){
                                    location.reload();                                
                                }
                            });
                        }else{
                            let message = data.message;
                            Swal.fire(`${message}`, '', 'error');
                        }
                    },
                    error: (errorThrown)=>{
                        console.log(errorThrown)
                    }
                })
            }

            Swal.fire({
                title: `Do you want to delete <br><i>${name}</i> ?`,
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    initiateDEL();
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    // User clicked "Cancel"
                    Swal.fire(
                    'Cancelled',
                    'Changes are not saved',
                    'info'
                    )
                }
            })
        }
    </script>
@endsection