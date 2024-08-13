@extends('layouts.profile-add')

@section('title', 'TechDepot - ProfileAddress')
@section('pre-loader')
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
@endsection

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Profile</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li>
                            <a href="{{ route('main.index') }}"><i class="lni lni-home"></i> Home</a>
                        </li>
                        <li><a href="{{ route('main.profile') }}"><i class="lni lni-user"></i> Profile</a></li>
                        <li>Address</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('main-section')
    <section id="contact-us" class="contact-us section">
        <div class="container">
            <div class="contact-head">
                <!-- <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h2>Contact Us</h2>
                            <p>
                                There are many variations of passages of
                                Lorem Ipsum available, but the majority have
                                suffered alteration in some form.
                            </p>
                        </div>
                    </div>
                </div> -->
                <div class="contact-info">
                    <div class="row">
                        <div class="col-lg-4 col-md-12 col-12">
                            <div class="single-info-head">
                                <div class="profile">
                                    <div class="profile-img_holder">
                                        <!-- ========================== -->
                                        <!-- IMG -->
                                        <!-- ========================== -->
                                    </div>
                                    <div class="profile-name">

                                    </div>
                                </div>
                                <hr>
                                <div class="profile-tabs">
                                    <a href="#" data-toggle="collapse" data-target="#collpase-nav"
                                        aria-expanded="false">
                                        <i class="lni lni-user" style="color:#0167f3;font-size:14px"></i>
                                        My Account
                                    </a>
                                    <div class="collapse show" id="collpase-nav">
                                        <a class="profile_link" href="">Profile</a><br>
                                        <a class="add_link" href=""
                                            style="border-bottom: 1px solid #0167f3">Address</a><br>
                                        <a class="change_link" href="">Change Password</a>
                                    </div>
                                    <a class="purchase_link" href="">
                                        <i class="lni lni-agenda" style="color:#0167f3;font-size:14px"></i>
                                        My Purchase
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12 col-12">
                            <div class="contact-form-head">
                                <div class="form-main" id="form-main">
                                    <div class="headers d-flex">
                                        <div class="add_">
                                            <h5>My Address</h5>
                                            <p>Default address will be the main delivery address on your profile</p>
                                        </div>
                                        <button type="button" class="btn btn-primary align-self-center buttton_"
                                            data-toggle="modal" data-target="#addAddressModal"> <i
                                                class="lni lni-plus"
                                                style="font-size:12px;font-weight:bold"></i>&nbspAdd Address</button>
                                    </div>
                                    <hr>
                                    <div class="row add_info">
                                        <!-- ========================== -->
                                        <!-- ! ADDRESS INFO -->
                                        <!-- ========================== -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('modal')
    <!-- ========================== -->
    <!--! MODAL EDIT-->
    <!-- ========================== -->
    <div class="modal fade" id="editAddressModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Address</h5>
                </div>
                <form id="editAddressForm">
                    <div class="modal-body">
                        <!-- Your form fields here -->
                        <div class="form-group">
                            <input type="hidden" name='add_id' id="add_id">
                            <label for="num">Phone Number (+63) </label>
                            <input type="number" class="form-control" id="num" name="num" required>
                        </div>
                        <div class="form-group">
                            <label for="region">Region</label>
                            <select class="form-control" id="region">
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="province">Province</label>
                            <select class="form-control" id="province">
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="city">City / Municipality</label>
                            <select class="form-control" id="city">
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="brgy">Barangay</label>
                            <select class="form-control" id="barangay">
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="detailed">Detailed Location</label>
                            <textarea class="form-control" name="detailed" id="detailed" cols="10" rows="3"></textarea>
                        </div>
                        <div class="form-group btn-group-toggle editOptions" data-toggle="buttons"
                            style="margin-top: 5px;">
                            <label class="btn btn-outline-primary">
                                <input type="radio" name="options" id="option12" autocomplete="off"
                                    value="Home"> Home
                            </label>
                            <label class="btn btn-outline-primary">
                                <input type="radio" name="options" id="option22" autocomplete="off"
                                    value="Work"> Work
                            </label>
                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- ========================== -->
    <!--! MODAL ADD-->
    <!-- ========================== -->
    <div class="modal fade" id="addAddressModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Address</h5>
                </div>
                <form id="form_add">
                    <div class="modal-body">
                        <!-- Your form fields here -->
                        <div class="form-group">
                            <label for="num">Phone Number</label>
                            <input type="number" class="form-control" id="add_num" name="add_num" required>
                        </div>
                        <div class="form-group">
                            <label for="region">Region</label>
                            <select class="form-control" id="add_region" required>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="province">Province</label>
                            <select class="form-control" id="add_province" required>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="city">City/Municipality</label>
                            <select class="form-control" id="add_city" required>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="brgy">Barangay</label>
                            <select class="form-control" id="add_barangay" required>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="detailed">Detailed Location</label>
                            <textarea class="form-control" name="detailed" id="detailedLoc" cols="10" rows="3" required></textarea>
                        </div>
                        <div class="form-group btn-group-toggle" data-toggle="buttons" style="margin-top: 5px;">
                            <label class="btn btn-outline-primary radio-no-outline">
                                <input type="radio" name="options" id="option1" autocomplete="off"
                                    value="Home" required> Home
                            </label>
                            <label class="btn btn-outline-primary">
                                <input type="radio" name="options" id="option2" autocomplete="off"
                                    value="Work" required> Work
                            </label>
                        </div>
                        <div class="form-group custom-control custom-checkbox" style="margin-top: 5px;">
                            <input type="checkbox" class="custom-control-input" id="customCheck1" name="is_default">
                            <label class="custom-control-label" for="customCheck1">Set as Default Address</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary add_form_btn">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('dependencies')
    <a href="#" class="scroll-top">
        <i class="fas fa-chevron-up"></i>
    </a>
    <script data-cfasync="false" src="js/email-decode.min.js"></script>
    <script src="js/bootstrap.min.js.pagespeed.jm.R6pdwTt0pj.js"></script>
    <script src="js/tiny-slider.js%2Bglightbox.min.js%2Bmain.js.pagespeed.jc.MCgBCVbLAV.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/checkuser.js"></script>
    <script>
        eval(mod_pagespeed_Zp_OOsHKoc);
    </script>
    <script>
        eval(mod_pagespeed_5TvwT_lz9K);
    </script>
    <script>
        eval(mod_pagespeed_uoja0BW_wo);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/profile.js"></script>
    <script src="js/cart.js"></script>
    <script src="js/profileAddress.js"></script>
    <script src="js/general.js"></script>
    <script src="js/checkCookie.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.cta', function() {
                window.location.href = '/product-grids'; // Redirect to /product-grids
            });
        });
    </script>
@endsection

@section('js-scripts')
    <script>
        function previewImage() {
            var fileInput = document.getElementById('file');
            var profileImg = document.getElementById('profile-img');

            if (fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    profileImg.src = e.target.result;
                }

                reader.readAsDataURL(fileInput.files[0]);
            }
        }
    </script>
    <!-- ========================== -->
    <!-- EDIT MODAL -->
    <!-- ========================== -->
    <script>
        const $regionSelect = $('#region');
        const $provinceSelect = $('#province');
        const $citySelect = $('#city');
        const $barangaySelect = $('#barangay');
        $.getJSON('./ph_loc_2019.json', function(data) {
            const sortedData = Object.entries(data).sort((a, b) => a[0] - b[0]);

            for (const [key, value] of sortedData) {
                const $option = $('<option/>', {
                    value: value.region_name.replace(/(region)/i, match => match.charAt(0).toUpperCase() +
                        match.slice(1).toLowerCase()),
                    text: value.region_name.replace(/(region)/i, match => match.charAt(0).toUpperCase() +
                        match.slice(1).toLowerCase())
                });
                $regionSelect.append($option);
            }
            $regionSelect.change(() => {
                $provinceSelect.empty();
                $citySelect.empty();
                $barangaySelect.empty();
                if ($regionSelect.val() != '') {
                    $citySelect.prop('disabled', true);
                    const option2 = '<option value="">Select City</option>';
                    $citySelect.append(option2);
                    $barangaySelect.prop('disabled', true);
                    const option3 = '<option value="">Select Barangay</option>';
                    $barangaySelect.append(option3);
                    $provinceSelect.prop('disabled', false);
                    const selectedRegion = $regionSelect.val().toUpperCase();

                    for (const [key, value] of sortedData) {
                        if (selectedRegion === value.region_name) {
                            $.each(value.province_list, function(provinceName) {
                                const $option = $('<option/>', {
                                    value: toTitleCase(provinceName),
                                    text: toTitleCase(provinceName)
                                });
                                $provinceSelect.append($option);
                            });
                        }
                    }
                } else {
                    $provinceSelect.prop('disabled', true);
                    const option1 = '<option value="">Select Province</option>';
                    $provinceSelect.append(option1);
                    $citySelect.prop('disabled', true);
                    const option2 = '<option value="">Select City</option>';
                    $citySelect.append(option2);
                    $barangaySelect.prop('disabled', true);
                    const option3 = '<option value="">Select Barangay</option>';
                    $barangaySelect.append(option3);
                }

            });
            $provinceSelect.change(() => {
                $barangaySelect.empty();
                $barangaySelect.prop('disabled', true);
                const option2 = '<option value="">Select Barangay</option>';
                $barangaySelect.append(option2);
                if ($regionSelect.val() != '' || $provinceSelect.val() != '') {
                    $citySelect.prop('disabled', false);
                    $citySelect.empty();
                    const selectedProvince = $provinceSelect.val().toUpperCase();
                    for (const [key, value] of sortedData) {
                        if (value.province_list[selectedProvince]) {
                            $.each(value.province_list[selectedProvince].municipality_list, function(
                                municipalList) {
                                const $option = $('<option/>', {
                                    value: toTitleCase(municipalList),
                                    text: toTitleCase(municipalList)
                                });
                                $citySelect.append($option);
                            })
                        }
                    }
                } else {
                    $citySelect.prop('disabled', true);
                    const option1 = '<option value="">Select City</option>';
                    $citySelect.append(option1);

                }

            });
            $citySelect.change(() => {
                if ($regionSelect.val() != '' || $provinceSelect.val() != '' || $citySelect.val() != '') {
                    $barangaySelect.prop('disabled', false);
                    $barangaySelect.empty();
                    const selectedProvince = $provinceSelect.val().toUpperCase();
                    const selectedCity = $citySelect.val().toUpperCase();
                    for (const [key, value] of sortedData) {
                        if (value.province_list[selectedProvince]) {
                            $.each(value.province_list[selectedProvince].municipality_list, function(
                                municipalList, data) {
                                if (municipalList === selectedCity) {
                                    $.each(data.barangay_list, function(data, barangay) {
                                        const $option = $('<option/>', {
                                            value: toTitleCase(barangay),
                                            text: toTitleCase(barangay)
                                        });
                                        $barangaySelect.append($option);
                                    })
                                }
                            })
                        }
                    }
                }
            })
            $regionSelect.change(() => {
                console.log('$regionSelect:', $regionSelect.val());

            });

            $provinceSelect.change(() => {
                console.log('$provinceSelect:', $provinceSelect.val());

            });

            $citySelect.change(() => {
                console.log('$citySelect:', $citySelect.val());

            });

        });

        function toTitleCase(str) {
            return str.toLowerCase().split(' ').map(function(word) {
                return word.replace(word[0], word[0].toUpperCase());
            }).join(' ');
        }
    </script>
    <!-- ========================== -->
    <!-- ADD MODAL -->
    <!-- ========================== -->
    <script>
        const $region = $('#add_region');
        const $province = $('#add_province');
        const $city = $('#add_city');
        const $barangay = $('#add_barangay');
        $.getJSON('./ph_loc_2019.json', function(data) {
            const sortedData = Object.entries(data).sort((a, b) => a[0] - b[0]);

            for (const [key, value] of sortedData) {
                const $option = $('<option/>', {
                    value: value.region_name.replace(/(region)/i, match => match.charAt(0).toUpperCase() +
                        match.slice(1).toLowerCase()),
                    text: value.region_name.replace(/(region)/i, match => match.charAt(0).toUpperCase() +
                        match.slice(1).toLowerCase())
                });
                $region.append($option);
            }
            $region.change(() => {
                $province.empty();
                $city.empty();
                $barangay.empty();
                if ($region.val() != '') {
                    $city.prop('disabled', true);
                    const option2 = '<option value="">Select City</option>';
                    $city.append(option2);
                    $barangay.prop('disabled', true);
                    const option3 = '<option value="">Select Barangay</option>';
                    $barangay.append(option3);
                    $province.prop('disabled', false);
                    const selectedRegion = $region.val().toUpperCase();

                    for (const [key, value] of sortedData) {
                        if (selectedRegion === value.region_name) {
                            $.each(value.province_list, function(provinceName) {
                                const $option = $('<option/>', {
                                    value: toTitleCase(provinceName),
                                    text: toTitleCase(provinceName),
                                });
                                $province.append($option);
                            });
                        }
                    }
                } else {
                    $province.prop('disabled', true);
                    const option1 = '<option value="">Select Province</option>';
                    $province.append(option1);
                    $city.prop('disabled', true);
                    const option2 = '<option value="">Select City</option>';
                    $city.append(option2);
                    $barangay.prop('disabled', true);
                    const option3 = '<option value="">Select Barangay</option>';
                    $barangay.append(option3);
                }

            });
            $province.change(() => {
                $barangay.empty();
                $barangay.prop('disabled', true);
                const option2 = '<option value="">Select Barangay</option>';
                $barangay.append(option2);
                if ($region.val() != '' || $province.val() != '') {
                    $city.prop('disabled', false);
                    $city.empty();
                    const selectedProvince = $province.val().toUpperCase();
                    for (const [key, value] of sortedData) {
                        if (value.province_list[selectedProvince]) {
                            $.each(value.province_list[selectedProvince].municipality_list, function(
                                municipalList) {
                                const $option = $('<option/>', {
                                    value: toTitleCase(municipalList),
                                    text: toTitleCase(municipalList)
                                });
                                $city.append($option);
                            })
                        }
                    }
                } else {
                    $city.prop('disabled', true);
                    const option1 = '<option value="">Select City</option>';
                    $city.append(option1);

                }

            });
            $city.change(() => {
                if ($region.val() != '' || $province.val() != '' || $city.val() != '') {
                    $barangay.prop('disabled', false);
                    $barangay.empty();
                    const selectedProvince = $province.val().toUpperCase();
                    const selectedCity = $city.val().toUpperCase();
                    for (const [key, value] of sortedData) {
                        if (value.province_list[selectedProvince]) {
                            $.each(value.province_list[selectedProvince].municipality_list, function(
                                municipalList, data) {
                                if (municipalList === selectedCity) {
                                    $.each(data.barangay_list, function(data, barangay) {
                                        const $option = $('<option/>', {
                                            value: toTitleCase(barangay),
                                            text: toTitleCase(barangay)
                                        });
                                        $barangay.append($option);

                                    })
                                }
                            })
                        }
                    }

                }
            })
        });

        function toTitleCase(str) {
            return str.toLowerCase().split(' ').map(function(word) {
                return word.replace(word[0], word[0].toUpperCase());
            }).join(' ');
        }
    </script>
@endsection