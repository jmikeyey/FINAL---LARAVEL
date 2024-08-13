
@extends('admin.layouts.categories-list')

@section('title', 'Admin - CategoriesList [TechDepot]')


@section('main-section')
<!-- Body: Body -->
<div class="body d-flex py-3">
    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Category List</h3>
                    <a href="categories-add" class="btn btn-primary py-2 px-5 btn-set-task w-sm-100"><i class="icofont-plus-circle me-2 fs-6"></i> Add Categories</a>
                </div>
            </div>
        </div> <!-- Row end  -->
        <div class="row g-3 mb-3 data_table_refresh">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table id="myDataTable" class="table table-hover align-middle mb-0" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Categories</th>
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>                                            
                                <!-- 
                                    sample layout
                                    <tr>
                                    <td><strong>#0001</strong></td>
                                    <td>Watch</td>
                                    <td>March 13, 2021</td>
                                    <td><span class="badge bg-success">Published</span></td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                            <a href="categories-edit.html" class="btn btn-outline-secondary"><i class="icofont-edit text-success"></i></a>
                                            <button type="button" class="btn btn-outline-secondary deleterow"><i class="icofont-ui-delete text-danger"></i></button>
                                        </div>
                                    </td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
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
    <!-- API REQUEST -->
    
    <script src="/admin_files/js/cookie.js"></script>
    <script src="/admin_files/js/checkuser.js"></script>
    <script>

        var table = $('#myDataTable').DataTable({
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                responsive: true,
            })
            
            
        // VIEW CATEGORY
        $(document).ready(()=>{
            $.ajax({
                url: `${link_path}api/category/cat_view`,
                method: "GET",
                dataType: "json",
                success: function(data){
                    console.log(data)
                    $.each(data.data, function(i, value){
                        let date = new Date(value.creation_date);
                        let options = { month: 'long', day: 'numeric', year: 'numeric' };
                        let formattedDate = date.toLocaleString('en-US', options);
                        let row = "<tr>"
                        row += `<td><strong>#<span>${value.id}</span></strong></td>`
                        row += `<td>${value.name}</td>`
                        row += `<td>${formattedDate}</td>`
                        row += `<td>${value.description}</td>`
                        row += `<td><div class="btn-group" role="group" aria-label="Basic outlined example"><a href="categories-edit?id=${value.id}" class="btn btn-outline-secondary"><i class="icofont-edit text-success"></i></a><button type="button" class="btn btn-outline-secondary deleterow" onclick="delBTN(this)"><i class="icofont-ui-delete text-danger"></i></button></div></td>`
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
                    url: `${link_path}api/category/delete?dels=${val}`,
                    method: `DELETE`,
                    dataType: "json",
                    success: (data)=>{
                        console.log(data)
                        if(data.messageType === "success"){
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