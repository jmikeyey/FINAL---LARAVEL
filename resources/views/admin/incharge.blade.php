@extends('admin.layouts.incharge')

@section('title', 'Admin - Incharge [TechDepot]')

@section('main-section')
            <!-- Body: Body -->       
            <div class="body d-flex py-lg-3 py-md-2">
                <div class="container-xxl">
                    <div class="row align-items-center">
                        <div class="border-0 mb-4">
                            <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                <h3 class="fw-bold mb-0">Incharge Information</h3>
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
                                                <th>Name</th>
                                                <th>Mail</th>
                                                <th>Phone</th> 
                                                <th>Actions</th>  
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
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
    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    <script src="/admin_files/js/inchargeDetails.js"></script>
    <script>
        function delBTN(btn){
            const row = btn.closest("tr");
            let id = row.cells[0].textContent;
            console.log(id)


            const name = row.cells[1].textContent;
            const filteredName = name.replace(/\s/g, '');
            function initiateDEL(){
                $.ajax({
                    url: `${link_path}api/incharge/delete?dels=${id}`,
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
                title: `Do you want to remove <br><i>${filteredName}</i> ?`,
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, remove it!'
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