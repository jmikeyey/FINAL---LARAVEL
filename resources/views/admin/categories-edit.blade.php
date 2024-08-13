@extends('admin.layouts.categories-edit')

@section('title', 'Admin - CategoriesList [TechDepot]')

@section('main-section')
    <!-- Body: Body -->
    <div class="body d-flex py-3">
        <div class="container-xxl">

            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0">Categories Edit</h3>
                    </div>
                </div>
            </div> <!-- Row end  -->  
            
            <div class="row g-3 mb-3">
                <div class="col-lg-4">
                    <div class="sticky-lg-top">
                        <div class="card mb-3">
                            <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                                <h6 class="m-0 fw-bold">Publish Schedule</h6>
                            </div>
                        <form id="cat_edit">
                            <div class="card-body">
                                <div class="row g-3 align-items-center">
                                    <div class="col-md-12">
                                        <label class="form-label">Publish Date</label>
                                        <input type="date" class="form-control w-100" name="cat_date" id="cat_date">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                                <h6 class="m-0 fw-bold">Categories</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-3">
                        <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                            <h6 class="mb-0 fw-bold ">Basic information</h6>
                        </div>
                        <div class="card-body">
                                <div class="row g-3 align-items-center">
                                    <div class="col-md-12">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" name="cat_name" id="cat_name">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Product Description</label>
                                        <textarea textarea name="cat_desc" id="cat_desc" class="form-control" cols="30" rows="5" required></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="hidden" name="cat_id" id="cat_id">
                                        <button type="submit" id="submitBTN" class="btn btn-primary py-2 px-5 text-uppercase btn-set-task w-sm-100">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- Row end  --> 

        </div>
    </div>  
    <!-- Modal Cropper-->
    <div class="modal docs-cropped" id="getCroppedCanvasModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cropped</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white border lift" data-bs-dismiss="modal">Close</button>
                    <a class="btn btn-primary" id="download" href="javascript:void(0);" download="cropped.jpg">Download</a> </div>
                </div>
        </div>
    </div>
@endsection

@section('dependencies')
        <!-- Jquery Core Js -->      
        <script src="/admin_files/js/libscripts.bundle.js"></script>

        <!-- Jquery Plugin -->  
        <script src="/admin_files/js/ckeditor.js"></script>
        <script src="/admin_files/js/cropper.min.js"></script>
        <script src="/admin_files/js/cropper-init.js"></script>
        <script src="/admin_files/js/dropify.bundle.js"></script>
    
        <!-- Jquery Page Js -->   
        <script src="/admin_files/js/template.js"></script>
        <script src="/admin_files/js/cookie.js"></script>
        <script src="/admin_files/js/checkuser.js"></script>
        <!-- API REQUEST -->
        <script>
            // submit edit
            $(document).ready(()=>{
                const searchparams = new URLSearchParams(window.location.search);
                const ids = searchparams.get('id');
                $('#submitBTN').on("click", function(e){
                    e.preventDefault();
                    const formData = $('#cat_edit').serialize();
                    console.log(formData)
                    $.ajax({
                        url: `${link_path}api/category/edit`,
                        method: `PUT`,
                        data: formData,
                        dataType: "json",
                        success: (data)=>{
                            console.log(data)
                            if(data.messageType === "success"){
                                Swal.fire({
                                    icon: 'success',
                                    title: `${data.message}`,
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                                setTimeout(() => {
                                    location.reload();
                                }, 1500);
                            }else{
                                Swal.fire({
                                    icon: 'error',
                                    title: `${data.message}`,
                                    timer: 1500
                                })
                                setTimeout(() => {
                                    location.reload();
                                }, 1500);
                            }
    
                        },
                        error: function(xhr, textStatus, errorThrown) {
                            console.log(xhr);
                            console.log(textStatus);
                            console.log(errorThrown);
                            // Do something on error
                        }
                    })
                })
            })
            // get selected edit
            $(document).ready(()=>{
                const searchparams = new URLSearchParams(window.location.search);
                const id = searchparams.get('id');
                if(!id){
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "Can't edit if no category selected!",
                    footer: '<a href="categories-list">Go to Category List</a>'
                    }).then(()=>{
                        location.replace('categories-list')
                    })
                    $('#submitBTN').prop('disabled', true)
                }else{
                    $.ajax({
                        url: `${link_path}api/category/search?name=${id}`,
                        method: "GET",
                        dataType: "json",
                        success: (data) =>{
                            $('#cat_id').val(data.data[0].id)
                            $('#cat_date').val(data.data[0].creation_date)
                            $('#cat_name').val(data.data[0].name)
                            $('#cat_desc').text(data.data[0].description)
                        },
                        error: (xhr, ajaxOptions, thrownError)=>{
                            console.log(errorThrown)
                            console.log(xhr)
                            console.log(ajaxOptions)
                        }
                    })
                }
            })
        </script>
        <!-- sweet alert -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    

@endsection