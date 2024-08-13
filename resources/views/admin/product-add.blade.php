@extends('admin.layouts.product-add')

@section('title', 'Admin - ProductAdd [TechDepot]')


@section('main-section')
            <!-- Body: Body -->
            <div class="body d-flex py-3">
                <div class="container-xxl">
                    <form id="add_form" enctype="multipart/form-data">
                        <div class="row align-items-center">
                            <div class="border-0 mb-4">
                                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                    <h3 class="fw-bold mb-0">Products Add</h3>
                                    <button type="submit" id="product_save" class="btn btn-primary btn-set-task w-sm-100 py-2 px-5 text-uppercase" onclick="disableButton()">Save</button>
                                </div>
                            </div>
                        </div> <!-- Row end  -->  
                        
                        <div class="row g-3 mb-3">
                            <div class="col-xl-4 col-lg-4">
                                <div class="sticky-lg-top">
                                    <div class="card mb-3">
                                        <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                                            <h6 class="m-0 fw-bold">Pricing Info</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="row g-3 align-items-center">
                                                <div class="col-md-12">
                                                    <label class="form-label">Product Price Old</label>
                                                    <input type="number" class="form-control" name="price_old" required>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label">Product Price New</label>
                                                    <input type="number" class="form-control" name="new_price" required>
                                                </div> 
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="card mb-3">
                                        <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                                            <h6 class="m-0 fw-bold">Categories</h6>
                                        </div>
                                        <div class="card-body">
                                            <label class="form-label">Categories Select</label>
                                            <select class="form-select" id="cat_option" aria-label="size 3 select example" name="prod_category" required>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="card mb-3">
                                        <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                                            <h6 class="m-0 fw-bold">Status</h6>
                                        </div>
                                        <div class="card-body">
                                            <label class="form-label">Status Select</label>
                                            <select class="form-select" id="prod_status" aria-label="size 3 select example" name="prod_status" required>
                                                <option value="New">New</option>
                                                <option value="Hot">Hot</option>
                                                <option value="Best Seller">Best Seller</option>
                                                <option value="Limited Edition">Limited Edition</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                                            <h6 class="m-0 fw-bold">Inventory Info</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="row g-3 align-items-center">
                                                <div class="col-md-12">
                                                    <label class="form-label">SKU</label>
                                                    <input type="text" class="form-control" name="prod_sku" required>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label">Total Stock Quantity</label>
                                                    <input type="number" class="form-control" name="prod_quantity" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8 col-lg-8">
                                <div class="card mb-3">
                                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                        <h6 class="mb-0 fw-bold ">Basic information</h6>
                                    </div>
                                    <div class="card-body">
                                            <div class="row g-3 align-items-center">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="form-label">Product Code <i class="fa-solid fa-shuffle" style="color:blue"></i></label>
                                                        <input type="text" class="form-control" name="prod_code" required>
                                                    </div> 
                                                    <div class="col-md-6">
                                                        <label class="form-label">Product Brand</label>
                                                        <input type="text" class="form-control" name="prod_brand" required>
                                                    </div> 
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label">Name</label>
                                                    <input type="text" class="form-control" name="prod_name" required>
                                                </div> 
                                                <div class="col-md-12">
                                                    <label class="form-label">Product Description</label>
                                                    <textarea class="form-control" name="prod_desc" id="prod_desc" cols="30" rows="5" required></textarea>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label">Product Specifications <small class="">(e.g., weight: 100kg)</small></label>
                                                    <div id="specifications">
                                                        <div class="specification">
                                                            <div class="row specsRow">
                                                                <div class="col-md-6">
                                                                    <label for="key1">Key:</label>
                                                                    <input class="form-control" type="text" name="key1" id="key1">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="value1">Value:</label>
                                                                    <input class="form-control" type="text" name="value1" id="value1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button id="add-specification">Add Specification</button> <span id="button-message" style="color:red"></span>
                                                </div>
                                            </div>
                                    </div>
                                </div> 
                                <div class="card mb-3">
                                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                        <h6 class="mb-0 fw-bold ">Images</h6>
                                    </div>
                                    <div class="card-body">
                                            <div class="row g-3 align-items-center">
                                                <div class="col-md-12">
                                                    <label class="form-label">Product Images Upload</label>
                                                    <small class="d-block text-muted mb-2">Only portrait or square images, 2M max and 2000px max-height.</small>
                                                    <small class="d-block text-muted mb-2"><i>Up to 5 pictures max for each product</i></small>
                                                    <input type="file" id="input-file-to-destroy" class="dropify" data-max-file-size="2M" data-max-height="2000" name="prod_img1">
                                                </div> 
                                                <div class="col-md-12">
                                                    <div class="product-cart">
                                                        <div class="checkout-table table-responsive">
                                                            <div class="row justify-content-center">
                                                                <div class="col-md-6">
                                                                    <input type="file" id="input-file-to-destroy" class="dropify set1"  data-max-file-size="2M" data-max-height="2000" name="prod_img2">
                                                                    <input type="file" id="input-file-to-destroy" class="dropify set1"  data-max-file-size="2M" data-max-height="2000" name="prod_img3">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input type="file" id="input-file-to-destroy" class="dropify set1"  data-max-file-size="2M" data-max-height="2000" name="prod_img4">
                                                                    <input type="file" id="input-file-to-destroy" class="dropify set1"  data-max-file-size="2M" data-max-height="2000" name="prod_img5">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                    </div>
                                </div> 
                            </div>
                        </div><!-- Row end  -->
                    </form>
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
                            <a class="btn btn-primary" id="download" href="javascript:void(0);" download="cropped.jpg">Download</a>
                        </div>
                    </div>
                </div>
            </div>
@endsection

@section('dependencies')
    <!-- Jquery Core Js -->      
    <script src="/admin_files/js/libscripts.bundle.js"></script>
    <!-- Jquery Plugin -->  
    <script src="/admin_files/js/ckeditor.js"></script>
    <script src="/admin_files/js/jquery.multi-select.js"></script>
    <script src="/admin_files/js/bootstrap-tagsinput.js"></script>  
    <script src="/admin_files/js/cropper.min.js"></script>
    <script src="/admin_files/js/cropper-init.js"></script>
    <script src="/admin_files/js/dropify.bundle.js"></script>
    <script src="/admin_files/js/dataTables.bundle.js"></script>
    <!-- Jquery Page Js -->   
    <script src="/admin_files/js/template.js"></script>
        <!-- sweet alert -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="/admin_files/js/cookie.js"></script>
        <script src="/admin_files/js/checkuser.js"></script>
    <script>
        // randomizer for product code
        function generateRandomString() {
            const alphanumeric = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            let randomString = '';
            for (let i = 0; i < 10; i++) {
                randomString += alphanumeric.charAt(Math.floor(Math.random() * alphanumeric.length));
            }
            document.getElementsByName('prod_code')[0].value = randomString;
        }

        document.querySelector('.fa-shuffle').addEventListener('click', generateRandomString);

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
    <script>

        const specificationsDiv = document.getElementById('specifications');
        const addButton = document.getElementById('add-specification');
        let specificationCount = 1;

        addButton.addEventListener('click', () => {
        specificationCount++;
        const newSpecification = document.createElement('div');
        newSpecification.classList.add('specification');
        newSpecification.innerHTML = `
            <div class="row">
            <div class="col-md-6">
                <label for="key${specificationCount}">Key:</label>
                <input class="form-control" type="text" name="key${specificationCount}" id="key${specificationCount}" required>
            </div>
            <div class="col-md-6">
                <label for="value${specificationCount}">Value:</label>
                <input class="form-control" type="text" name="value${specificationCount}" id="value${specificationCount}">
            </div>
            </div>
        `;
        specificationsDiv.appendChild(newSpecification);
        if (specificationCount > 6) {
            addButton.disabled = true;
            Swal.fire({
                icon: 'info',
                title: 'Oops...',
                text: 'Limited only to 7 specifications!',
            })
        }
        });

    </script>
    <!-- FONT-AWESOME -->
    <script src="https://kit.fontawesome.com/6d1cd4a3d1.js" crossorigin="anonymous"></script> 

    <!-- API REQUEST -->
    <script>
        // const link_path = 'http://127.0.0.1:8000/';
        // GETTING THE CATEGORIES
        $(document).ready(()=>{
            $.ajax({
                url: `${link_path}api/categories`,
                method: "GET",
                dataType: "json",
                success: (data)=>{
                    $.each(data.data, function(i, value){
                        let option = "<option ";
                            option += `value="${value.id}">${value.name}</option>`
                            $('#cat_option').append(option)
                    })
                },
                error: (errorThrown)=>{
                    console.log(errorThrown)
                }
            })
        })


        function disableButton() {
            let button = document.getElementById("product_save");
            button.disabled = true;
            button.innerHTML = '<span id="animated">Processing...</span>';
            setTimeout(function() {
                button.disabled = false;
                button.innerHTML = 'Save'; // Replace with the original button text
            }, 3000); // 3 seconds
        }
        
        $(document).ready(() => {
            $('#product_save').on("click", function(e) {
                e.preventDefault();
                const form = document.getElementById('add_form');

                    if (!form.checkValidity()) {
                        form.reportValidity();
                    return;
                    }
                const form_data = new FormData(document.getElementById('add_form'));
                console.log(form_data)
                    $.ajax({
                        url: `${link_path}api/product/prod_add`,
                        method: "POST",
                        dataType: "json",
                        data: form_data,
                        contentType: false,
                        processData: false,
                        success: (res)=>{
                            console.log(res.message)
                            console.log(res)
                            if(res.type === "success"){
                                Swal.fire({
                                    icon: 'success',
                                    title: `${res.message}`,
                                }).then((result) => {
                                    if(result.isConfirmed){
                                        location.reload();
                                    }
                                });
                            }
                            else{
                                Swal.fire({
                                    icon: 'error',
                                    title: `${res.message}`,
                                }).then((result) => {
                                    if(result.isConfirmed){
                                        location.reload();
                                    }
                                });
                            }
                        },
                        error: (errorThrown)=>{
                            console.log(errorThrown)
                        }
                    })
            });
        });

    </script>

@endsection