@extends('incharge.layouts.coupons-list')

@section('title', 'Admin - CouponsEdit [TechDepot]')

@section('main-section')
            <!-- Body: Body -->       
            <div class="body d-flex py-lg-3 py-md-2">
                <div class="container-xxl">
                    <div class="row align-items-center">
                        <div class="border-0 mb-4">
                            <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                <h3 class="fw-bold mb-0">Coupons Edit</h3>
                                {{-- <button type="submit" class="btn btn-primary btn-set-task w-sm-100 text-uppercase px-5">Save</button> --}}
                            </div>
                        </div>
                    </div> <!-- Row end  -->
                    
                    <form id="edit_coupon">
                        <div class="row clearfix g-3">
                            <div class="col-lg-4">
                                <div class="card mb-3">
                                    <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                                        <h6 class="m-0 fw-bold">Coupon Status</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="couponsstatus" value="Active" id="active_radio">
                                            <label class="form-check-label">
                                                Active
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="In Active" name="couponsstatus" id="inactive_radio">
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
                                                <input type="date" class="form-control w-100" required name="coup_startDate" id="coup_startDate">
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label">End Date</label>
                                                <input type="date" class="form-control w-100" required name="coup_endDate" id="coup_endDate">
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
                                            <div class="row g-3 align-items-center">
                                                <div class="col-md-8">
                                                    <label class="form-label">Coupons Code</label>
                                                    <input type="text" class="form-control" required name="coup_code" id="coup_code">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Coupons Limits</label>
                                                    <input type="number" class="form-control" required name="coup_limit" id="coup_limit">
                                                </div>
                                                <div class="col-md-12">
                                                <label class="form-label">Coupons Types</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="couponstype" id="freeShippingRadio" value="Free Shipping" >
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
                                    </div>
                                </div>
                                <input type="hidden" name="id" id="id">
                                <button type="submit" class="btn btn-primary mt-4 text-uppercase px-5" id="submit_cop">Submit</button>
                            </div>
                            
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
        // submit edit
        $(document).ready(()=>{
            const searchparams = new URLSearchParams(window.location.search);
            const ids = searchparams.get('id');
            $('#submit_cop').on("click", function(e){
                e.preventDefault();
                const formData = $('#edit_coupon').serialize();
                console.log(formData)
                if ($("#percentageRadio").is(":checked")) {
                    let percent = $('#discountValueInput').val();
                    console.log(percent)
                    if(percent > 70){
                        swal.fire({
                            icon: 'info',
                            title: 'Percentage Problem',
                            text: 'Percentage too much',
                        })
                        return;
                    }
                }
                $.ajax({
                    url: `${link_path}api/coupons/update`,
                    method: `PUT`,
                    data: formData,
                    dataType: "json",
                    success: (data)=>{
                        console.log(data)
                        if(data.type === "success"){
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
                                title: `${data.data.message}`,
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
                text: "Can't edit if no coupons selected!",
                footer: '<a href="coupons-list">Go to coupons List</a>'
                }).then((result) => {
                    if(result.isConfirmed){
                        window.location.replace('coupons-list')
                        // Reload the content of the element
                    }
                });
                $('#submitBTN').prop('disabled', true)
            }else{
                $.ajax({
                    url: `${link_path}api/coupons?coupon_code=${id}`,
                    method: "GET",
                    dataType: "json",
                    success: (data) =>{
                        let data1 = data.data[0];
                        console.log(data1)
                        if(data1.status === 'Active'){
                            $('#active_radio').prop('checked', true)
                        }else{
                            $('#inactive_radio').prop('checked', true)
                        }
                        $('#id').val(data1.id)
                        $('#coup_startDate').val(data1.date_start)
                        $('#coup_endDate').val(data1.date_end)
                        $('#coup_code').val(data1.name)
                        $('#coup_limit').val(data1.use_limit)
                        if(data1.type === 'Free Shipping'){
                            $('#freeShippingRadio').prop('checked', true)
                            $(".discount_div").hide();
                        }else if(data1.type === 'Percentage'){
                            $(".discount_label").text("Percent Discount");
                            $('#caution_text').text("(If percentage is selected, dont put '%')")
                            $('#percentageRadio').prop('checked', true)
                        }else{
                            // fixed amount
                            $('#fixedAmountRadio').prop('checked', true)
                            $("#caution_text").text("(If fixed amount is selected, dont put 'PHP')")
                        }
                        if(data1.item_value < 0){
                            $('.discount_div').hide();
                        }else{
                            $('#discountValueInput').val(data1.item_value)

                        }
                    },
                    error: (xhr, ajaxOptions, thrownError)=>{
                        console.log(errorThrown)
                        console.log(xhr)
                        console.log(ajaxOptions)
                    }
                })
            }
        })
        $(document).ready(function() {
            // Handle radio button change event
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
    </script>
@endsection