@extends('incharge.layouts.coupons-list')

@section('title', 'Admin - CouponsAdd [TechDepot]')

@section('main-section')
            <!-- Body: Body -->       
            <div class="body d-flex py-lg-3 py-md-2">
                <div class="container-xxl">
                    <div class="row align-items-center">
                        <div class="border-0 mb-4">
                            <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                <h3 class="fw-bold mb-0">Coupons Add</h3>
                            </div>
                        </div>
                    </div> <!-- Row end  -->
                    <form id="add_coupun">
                        <div class="row clearfix g-3">
                            <div class="col-lg-4">
                                <div class="card mb-3">
                                    <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                                        <h6 class="m-0 fw-bold">Coupon Status</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="couponsstatus" value="Active" checked>
                                            <label class="form-check-label">
                                                Active
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="In Active" name="couponsstatus">
                                            <label class="form-check-label">
                                                In Active
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                                        <h6 class="m-0 fw-bold">Date Schedule</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row g-3 align-items-center">
                                            <div class="col-md-12">
                                                <label class="form-label">Start Date</label>
                                                <input type="date" class="form-control w-100" required name="coup_startDate">
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label">End Date</label>
                                                <input type="date" class="form-control w-100" required name="coup_endDate">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card mb-3">
                                    <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                                        <h6 class="m-0 fw-bold">Coupon Information</h6>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <div class="row g-3 align-items-center">
                                                <div class="col-md-8">
                                                    <label class="form-label">Coupons Code</label>
                                                    <input type="text" class="form-control" required name="coup_code" id="coup_code">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Coupons Limits</label>
                                                    <input type="number" class="form-control" required name="coup_limit">
                                                </div>
                                                <div class="col-md-12">
                                                <label class="form-label">Coupons Types</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="couponstype" id="freeShippingRadio" value="Free Shipping" checked>
                                                        <label class="form-check-label" for="freeShippingRadio">
                                                            Free Shipping
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="couponstype" value="Percentage" id="percentageRadio">
                                                        <label class="form-check-label" for="percentageRadio">
                                                        Percentage
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="couponstype" value="Fixed Amount" id="fixedAmountRadio">
                                                        <label class="form-check-label" for="fixedAmountRadio">
                                                        Fixed Amount
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 discount_div">
                                                    <i><large id="caution_text"></large></i><br>
                                                    <label class="form-label discount_label">Discount value</label>
                                                    <input type="text" class="form-control" id="discountValueInput" name="coup_value">
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary mt-4 text-uppercase px-5" id="submit_cop">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div><!-- Row End -->
                    </form>
                </div>
            </div>
@endsection

@section('dependencies')
    <!-- Jquery Core Js -->
    <script src="/incharge_files/js/libscripts.bundle.js"></script>

    <!-- Jquery Page Js -->
    <script src="/incharge_files/js/template.js"></script>

    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script src="/incharge_files/js/cookie.js"></script>
    <script src="/incharge_files/js/checkuser.js"></script>

    <script>
        $(document).ready(function() {
            // Handle radio button change event
            $(".discount_div").hide();
            $("input[name='couponstype']").change(function() {
                var selectedValue = $("input[name='couponstype']:checked").val();

                // Check if Free Shipping option is selected
                if ($("#freeShippingRadio").is(":checked")) {
                    $(".discount_div").hide();
                }
                
                // Check if Percentage option is selected
                if ($("#percentageRadio").is(":checked")) {
                    $(".discount_label").text("Percent Discount");
                    $('#discountValueInput').attr('placeholder', 'Enter percentage')
                    $(".discount_div").show();
                    $('#caution_text').text("(If percentage is selected, dont put '%')")
                }
                // Check if Fixed Amount option is selected
                if ($("#fixedAmountRadio").is(":checked")) {
                    $(".discount_label").text("Enter Amount");
                    $('#discountValueInput').attr('type', 'number')
                    $('#discountValueInput').attr('placeholder', 'Enter fixed amount in PHP')
                    $(".discount_div").show();
                    $("#caution_text").text("(If fixed amount is selected, dont put 'PHP')")
                }
            });
        });

        // ADDCATEGORY && AVOID DUPLICATE ENTRIES
        $(document).ready(()=>{
            $('#submit_cop').on("click", function(e){
                e.preventDefault();
                const form = $('#add_coupun')[0];
                console.log(form)
                if ($("#percentageRadio").is(":checked")) {
                    let percent = $('#discountValueInput').val();
                    console.log(percent)
                    if(percent > 70){
                        swal.fire({
                            icon: 'info',
                            title: 'Percentage Problem',
                            text: 'Percentage too much',
                        })
                    }
                }
                if (form.checkValidity()) {
                    const nameVal = $('#coup_code').val();
                    $.ajax({
                        url: `${link_path}api/coupons/duplicate?nameValue=${nameVal}`,
                        method: "GET",
                        dataType: "json",
                        success: (data)=>{
                            if(data.message === "exist"){
                                swal.fire({
                                    icon: 'error',
                                    title: 'Duplicate Entry',
                                    text: 'Coupon already exists in the database',
                                })
                            }else{
                                const cop_data = $('#add_coupun').serialize();
                                console.log(cop_data)
                                $.ajax({
                                    url: `${link_path}api/coupons/add`,
                                    method: "POST",
                                    dataType: "json",
                                    data: cop_data,
                                    success: (res) =>{
                                        console.log(res)
                                        if(res.messageType == "success"){
                                            Swal.fire(`${res.message}`, '', 'success').then((result) => {
                                                    if(result.isConfirmed){
                                                        location.reload()
                                                        // Reload the content of the element
                                                    }
                                                });
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
@endsection