@extends('admin.layouts.categories-add')

@section('title', 'Admin - CategoriesAdd [TechDepot]')

@section('main-section')
    <!-- Body: Body -->
    <div class="body d-flex py-3">
        <div class="container-xxl">

            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0">Categories Add</h3>
                        
                    </div>
                </div>
            </div> <!-- Row end  -->  
            <form id="addCateg">
                <div class="row g-3 mb-3 form_content_reload">
                    <div class="col-lg-4">
                        <div class="sticky-lg-top">
                            <div class="card mb-3">
                                <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                                    <h6 class="m-0 fw-bold">Publish Schedule</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3 align-items-center">
                                        <div class="col-md-12">
                                            <label class="form-label">Publish Date</label>
                                            <input type="date" class="form-control w-100" name="cat_date" required>
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
                                        <input type="text" class="form-control" name="cat_name" id="cat_name" required>
                                        <span id="validateName" style="color: red"></span>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Product Description</label>
                                        <textarea name="cat_desc" class="form-control" cols="30" rows="10" required></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" id="cat_save" class="btn btn-primary py-2 px-5 text-uppercase btn-set-task w-sm-100">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Row end  --> 
        </div>
    </div>   
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
    <script>
        $(function() {
            $('.dropify').dropify();

            var drEvent = $('#dropify-event').dropify();
            drEvent.on('dropify.beforeClear', function(event, element) {
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });

            drEvent.on('dropify.afterClear', function(event, element) {
                alert('File deleted');
            });

            $('.dropify-fr').dropify({
                messages: {
                    default: 'Glissez-dÃ©posez un fichier ici ou cliquez',
                    replace: 'Glissez-dÃ©posez un fichier ou cliquez pour remplacer',
                    remove: 'Supprimer',
                    error: 'DÃ©solÃ©, le fichier trop volumineux'
                }
            });
        });
            
    </script>

    <!-- API REQUEST -->
    <script>
        // ADDCATEGORY && AVOID DUPLICATE ENTRIES
        $(document).ready(()=>{
            $('#cat_save').on("click", function(e){
                e.preventDefault();
                const form = $('#addCateg')[0];
                if (form.checkValidity()) {
                    const nameVal = $('#cat_name').val();
                    $.ajax({
                        url: `${link_path}api/category/search?nameDup=${nameVal}`,
                        method: "GET",
                        dataType: "json",
                        success: (data)=>{
                            if(data.message === "exist"){
                                swal.fire({
                                    icon: 'error',
                                    title: 'Duplicate Entry',
                                    text: 'Category already exists in the database',
                                })
                            }else{
                                const cat_data = $('#addCateg').serialize();
                                $.ajax({
                                    url: `${link_path}api/category/add`,
                                    method: "POST",
                                    dataType: "json",
                                    data: cat_data,
                                    success: (res) =>{
                                        console.log(res)
                                        if(res.messageType == "success"){
                                            Swal.fire({
                                                icon: 'success',
                                                title: `${res.message}`,
                                                timer: 1500
                                            }).then((result)=>{
                                                if(result.isConfirmed){
                                                    location.reload();
                                                }
                                            })
                                        }else{
                                            Swal.fire({
                                                icon: 'error',
                                                title: `${res.message}`,
                                                timer: 1500
                                            })
                                        }
                                        // #form_content_reload
                                    },
                                    error: function(errorThrown){
                                        console.log(errorThrown)
                                    }
                                })
                            }
                        },
                        error: (errorThrown)=>{
                            console.log(errorThrown)
                        }
                    })

                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops... Something went wrong!',
                        text: 'Please fill up the forms',
                    })
                }
            })
        })

    </script>
    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


@endsection