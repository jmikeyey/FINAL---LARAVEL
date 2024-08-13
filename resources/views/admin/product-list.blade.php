@extends('admin.layouts.product-list')

@section('title', 'Admin - ProductList [TechDepot]')

@section('main-section')
            <!-- Body: Body -->
            <div class="body d-flex py-3">  
                <div class="container-xxl"> 
                    <div class="row align-items-center"> 
                        <div class="border-0 mb-4"> 
                            <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                <h3 class="fw-bold mb-0">Product List</h3>
                                <a href="product-add.html" class="btn btn-primary py-2 px-5 btn-set-task w-sm-100"><i class="icofont-plus-circle me-2 fs-6"></i> Add Products</a>
                            </div>
                        </div>
                    </div> <!-- Row end  -->
                    <div class="row g-3 mb-3"> 
                        <div class="col-md-12">
                            <div class="card"> 
                                <div class="card-body"> 
                                    <table id="myDataTable" class="table table-hover align-middle mb-0" style="width: 100%;font-size: 14px;">  
                                        <thead>
                                            <tr>
                                                <th>Product Code</th>
                                                <th>Name</th>
                                                <th>Categories</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                    <!-- SAMPLE DATA
                                            <tr>
                                                <td><strong>#8414</strong></a></td>
                                                <td><img src="../img-prod/default.jpg" class="avatar lg rounded me-2" alt="profile-image"><span> Oculus VR</span></td>
                                                <td>MollyMolly <br>MollyMolly <br>MollyMolly <br>MollyMolly</td>
                                                <td>
                                                    $420
                                                </td>
                                                <td>200</td>
                                                <td><span class="badge bg-danger">HOT</span></td>
                                            </tr>
                                            <tr>
                                                <td><a href="order-details.html"><strong>#58414</strong></a></td>
                                                <td><img src="images/product-2.jpg" class="avatar lg rounded me-2" alt="profile-image"><span>Wall Clock</span></td>
                                                <td>Brian</td>
                                                <td>
                                                    $220
                                                </td>
                                                <td>100</td>
                                                
                                                <td><span class="badge bg-primary">NEW</span></td>
                                            </tr> -->
                                            
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

    <!-- Jquery Plugin --> 
    <script src="/admin_files/js/nouislider.min.js"></script>
    <!-- Plugin Js -->
    <script src="/admin_files/js/dataTables.bundle.js"></script>  
    <!-- Jquery Page Js --> 
    <script src="/admin_files/js/template.js"></script>
    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="/admin_files/js/cookie.js"></script>
    <script src="/admin_files/js/checkuser.js"></script>
    <!-- <script>
        var stepsSlider2 = document.getElementById('slider-range2');
            var input3 = document.getElementById('minAmount2');
            var input4 = document.getElementById('maxAmount2');
            var inputs2 = [input3, input4];
            noUiSlider.create(stepsSlider2, {
                start: [149, 399],
                connect: true,
                step: 1,
                range: {
                    'min': [0],
                    'max': 2000
                },

            });

            stepsSlider2.noUiSlider.on('update', function (values, handle) {
                inputs2[handle].value = values[handle];
            });

    </script> -->
    <script>
        var table = $('#myDataTable').DataTable({
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            responsive: true,
        });

        $.ajax({
            url: `${link_path}api/product/prod_view`,
            method: "GET",
            dataType: "json",
            success: (data) => {
                console.log(data.data);
                $.each(data.data, function(i, value) {
                            let row = $("<tr></tr>");
                            row.append($(`<td><strong>#${value.product_code}<strong></td>`));
                            if(value.image_filename === null){
                                row.append($(`<td class="name_col"><span><img style="object-fit:cover"src="/img-prod/default.jpg" class="avatar lg rounded me-2"></span><span>${value.name}<span></td>`));
                            }else{
                                row.append($(`<td class="name_col"><span><img src="/img-prod/${value.image_filename}" class="avatar lg rounded me-2"></span><span>${value.name}<span></td>`));
                            }
                            row.append($(`<td>${value.category_name}</td>`));
                            row.append($(`<td>${value.price}</td>`));
                            row.append($(`<td>${value.quantity}</td>`));
                            if(value.popularity_status === "Hot"){
                                row.append($(`<td><span class="badge bg-danger">${value.popularity_status}</span></td>`));
                            }
                            if(value.popularity_status === "New"){
                                row.append($(`<td><span class="badge bg-success">${value.popularity_status}</span></td>`));
                            }
                            if(value.popularity_status === "Best seller"){
                                row.append($(`<td><span class="badge bg-warning">${value.popularity_status}</span></td>`));
                            }
                            if(value.popularity_status === "Limited Edition"){
                                row.append($(`<td><span class="badge bg-secondary">${value.popularity_status}</span></td>`));
                            }
                            if(value.popularity_status === null){
                                row.append($(`<td><span class="badge bg-warning">Good</span></td>`));
                            }
                            row.append($(`<td><div class="btn-group" role="group" aria-label="Basic outlined example"><a href="product-edit?id=${value.product_id}" class="btn btn-outline-secondary"><i class="icofont-edit text-success"></i></a><button type="button" class="btn btn-outline-secondary deleterow" onclick="delBTN(this)"><i class="icofont-ui-delete text-danger"></i></button></div></td>`))
                            table.row.add(row).draw(false);
                        });
            },
            error: (xhr, status, error) => {
                console.log("AJAX error:", error);
            }
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
                    url: `${link_path}api/product/prod_del`,
                    method: "DELETE",
                    dataType: "json",
                    data: JSON.stringify({ del: val }),
                    success: (data)=>{
                        console.log(data)
                        if(data.type === "success"){
                            let message = data.message;
                            Swal.fire(`${message}`, '', 'success').then((result) => {
                                    if(result.isConfirmed){
                                        location.reload()
                                        // Reload the content of the element
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