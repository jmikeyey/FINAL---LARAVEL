const link_path = 'http://127.0.0.1:8000/';
$(document).ready(() => {
	// SUBTOTAL SOLVE
	let amount = $("#unit-amount").text();
	let quantity = $("#unit-quantity").text();
	let subtotal = "";
	subtotal = amount * quantity;
	$("#subtotal").text(subtotal);
	// CHECKOUT SOLVE
	$(".subtotal-price").text(subtotal);
});
// // CHECKING OUT
// $(document).ready(() => {
// 	// Get the form element
// 	const form = $("#checkout-form");

// 	// Listen for the form submit event
// 	form.on("submit", function (e) {
// 		e.preventDefault(); // prevent the default form submission

// 		// Get the values from the form fields
// 		const subTotalPrice = $(".subtotal-price").text();
// 		const shippingCost = $(".shipping").text();
// 		const discount = $(".discount").text();
// 		const totalPrice = $(".total_price").text();

// 		// Do something with the values, e.g. send them to a server using Ajax
// 		$.ajax({
// 			method: "POST",
// 			url: "/checkout",
// 			data: {
// 				subTotalPrice: subTotalPrice,
// 				shippingCost: shippingCost,
// 				discount: discount,
// 				totalPrice: totalPrice,
// 			},
// 			success: function (response) {
// 				console.log("hello");
// 			},
// 			error: function (jqXHR, textStatus, errorThrown) {
// 				// Handle the error
// 			},
// 		});
// 	});
// });

let user = Cookies.get("name");
if (!user || user.trim() === "") {
    console.log("not logged in again")
    let component1 = `
    <li>
        <a href="/login">Sign In</a>
    </li>
    <li>
        <a href="/register" style="border-bottom: 2px solid #0167f3;">Register</a>
    </li>
    `
    $('.user_').append(component1)
} else {
    // ==========================
    // Cookie is not empty
    // Continue with your code
    // ==========================
    $.ajax({
        url: `${link_path}api/login/get_user?id=${user}`,
        method: 'GET',
        dataType: 'json',
        success: (data) => {
            console.log(data);
            console.log(data.data[0].firstname);
            let data1 = data.data[0];
            let component1 = `
            <li>
                <a href="profile?user_id=${user}" class="user_profile">
                    <i class="lni lni-user"></i>
                    <span class="user_name">${data1.firstname.split(" ")[0]}</span>
                </a>
            </li>
            <li>
                <a href="#" id="logout" onclick="logoutUser()">Logout</a>
            </li>
            `
            $('.user_').append(component1)
            if (data1.usertype !== 'customer') {
                location.replace("/login");
                Cookies.remove('name');
                Cookies.remove('username');
                Cookies.remove('password');
            }
        },
        error: (xhr, status, error) => {
            console.log("AJAX error:", xhr);
            console.log("AJAX error:", error);
            console.log("AJAX error:", status);
        }
    });
}

// ==========================
// all category
// ==========================
$.ajax({
    url: `${link_path}api/category/cat_view`,
    method: "GET",
    dataType: "json",
    success: (data) => {
        $.each(data.data, (i, key)=>{
            var categoryName = key.name;
            var listItem = $("<li>").append($("<a>").attr("href", `product-grids?cat_id=${key.id}`).text(categoryName));
            $(".sub-category").append(listItem);
        })
    },
    error: (xhr, status, error) => {
        console.log("AJAX error:", error);
    }
})

// ==========================
// ! GETTING ORDERS FROM THE USER
// ==========================
$(document).ready(function(){
    let searchparams = new URLSearchParams(window.location.search);
    let id = searchparams.get('order_id');
    console.log(id)
    $.ajax({
        url: `${link_path}api/order/order_get?id=${id}`,
        method: 'GET',
        dataType: 'json',
        success: (data)=>{
            console.log(data)
            if(data.msg === 'success'){
                let subtotal = 0;
                let shipping = 0;
                let discount = 0;
                let total_price = 0;
                let total;
                $.each(data.data, (i,key)=>{
                    if(key.user_id == Cookies.get("name")){
                        let prod_comp = `
                        <div class="row data_ mt-2 border-bottom-light-gray">
                            <div class="col-md-6 d-flex">
                            <div class="prod_img" style="margin-right: 10px;">
                                <img src='img-prod/${key.filename}' alt="" width="50" height="50" class="img_style">
                            </div>
                            <div class="prod_dets">
                                <span class="prod_area" data-prodarea=${key.product_id} data-prodamount=${key.quantity}>${key.name}</span>
                            </div>
                            </div>
                            <div class="col-md-2">₱${key.price}</div>
                            <div class="col-md-2">${key.quantity}</div>
                            <div class="col-md-2">₱${key.subtotal}</div>
                        </div>
                        `
                        $('.products_').append(prod_comp)
                        
                        subtotal = subtotal + key.subtotal;
                        if(key.discount == null){
                            console.log('true')
                            discount = discount + 0
                        }else{
                            discount = discount + key.discount
                        }
                    }else{
                        console.log('Order Restriction')
                    }
                })
                $('.subtotal-price').text(subtotal)
                console.log(discount)
                $('.discount_').text(discount)
            }else{
                let prod_comp = `
                <div class="row data_ mt-2 border-bottom-light-gray">
                    <center>
                        <h3>Bad Request</h3>
                    </center>
                    
                </div>
                `
                $('.products_').append(prod_comp)
            }
        },
        complete: ()=>{
            total_all()
        },
        error: (xhr, status, error) => {
            console.log("AJAX error:", xhr);
            console.log("AJAX error:", error);
            console.log("AJAX error:", status);
        }
    })
})

// ==========================
// ! GETTING ADDRESS
// ==========================
$(document).ready(function(){
    $.ajax({
        url: `${link_path}api/address/add_get?id=${user}`,
        method: 'GET',
        dataType: 'json',
        success: (data)=>{
            console.log(data)
            if(data.msg ===  'success'){
                // ==========================
                // ADDRESS ON DEFAULT
                // ==========================
                $.each(data.data, (i, key)=>{
                    if(key.is_default === 'default'){
                        let add_comp = `
                            <div class="row mt-2">
                                <div class="col-md-3">
                                    <div class="user_info">
                                        <span class="user_name">${key.firstname} ${key.lastname} (63)</span> <br>
                                        <span class="user_number">${key.phone_number}</span><br>
                                        <div class="default_" data-address=${key.address_id}>Default</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="address_info">
                                        <span class="address_dets">
                                            <span style="font-weight: 700"><b> ${key.region} | ${key.province} | ${key.city} | ${key.barangay} </b></span> <br>
                                            ${key.description}
                                            <span class='d-none region_add'>${key.region} </span>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="default_1">
                                        <span class="default_text"></span>
                                    </div>
                                </div>
                                <div class="col-md-1 d-flex justify-content-end">
                                    <div class="change_button">
                                        <button class="change_add">Change</button>
                                    </div>
                                </div>
                            </div>
                        `;
                        $('.top_level').append(add_comp);
                    }
                });
                // ==========================
                // ! ADDRESS ON SELECTION (CHANGE)
                // ==========================
                $.each(data.data, (j, key1)=>{
                    let comp = `
                    <div class="single_address">
                        <div class="radio_">
                            ${key1.is_default === 'default' ? `<input type="radio" name="address" class="address_radio" data-address=${key1.address_id} checked>` : `<input type="radio" name="address" data-address=${key1.address_id} class="address_radio">`}
                        </div>
                        <div class="info_add">
                            <span class="name"><b> ${key1.firstname} ${key1.lastname} | (+63) ${key1.phone_number}</b></span>
                            
                            <div class="address_desc">
                                <span class="info_">${key1.region} | ${key1.province} | ${key1.city} | ${key1.barangay}</span><br>

                                <span class="desc">
                                ${key1.description}
                                </span>
                                ${key1.is_default === 'default' ? '<div class="default_">Default</div>' : ''}
                                <hr>
                            </div>
                        </div>
                    </div>
                `
                $('.address_content').append(comp)
                })
            }else{
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top',
                    iconColor: 'white',
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true
                })
                Toast.fire({
                    icon: 'error',
                    title: 'No address found!'
                }).then(()=>{
                    location.replace(`profile-add?user_id=${user}`)
                })
            }

            
        },
        complete: ()=>{
            // Add click event listener to dynamically added button
            $('.change_add').on('click', function() {
                openModal();
                console.log('clicled')
            });

            // Add click event listener to close button
            $('.modal-close').on('click', function() {
                closeModal();
            });
            // ==========================
            // ! ADDRESS ON SELECTION (CHANGE) UPDATING DEFAULT
            // ==========================
            $(document).ready(function(){
                $('.edit_btn').on("click", (e)=>{
                    e.preventDefault();
                    if ($('.address_radio').is(':checked')) {
                        var selectedAddressId = $('input[name="address"]:checked').data('address');
                        console.log(selectedAddressId);
                        $.ajax({
                            url: `${link_path}api/address/add_edit`,
                            method: 'PUT',
                            dataType: 'json',
                            data: JSON.stringify({ selectedAddressId: selectedAddressId, user: user }),
                            success: (data)=>{
                                console.log(data)
                                // ! THIS BLOCK OF CODE CAN BE REPLACE WITH LOCATION.RELOAD()
                                // ==========================
                                // ADDRESS ON DEFAULT
                                // ==========================
                                $.each(data.data, (i, key)=>{
                                    if(key.is_default === 'default'){
                                        let add_comp = `
                                            <i class="fa-solid fa-location-dot"></i> <span>Delivery Address</span>
                                            <div class="row mt-2">
                                                <div class="col-md-3">
                                                    <div class="user_info">
                                                        <span class="user_name">${key.firstname} ${key.lastname} (63)</span> <br>
                                                        <span class="user_number">${key.phone_number}</span><br>
                                                        <div class="default_" data-address=${key.address_id} >Default</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="address_info">
                                                        <span class="address_dets">
                                                            <span style="font-weight: 700"><b> ${key.region} | ${key.province} | ${key.city} | ${key.barangay} </b></span> <br>
                                                            ${key.description}
                                                            <span class='d-none region_add'>${key.region} </span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="default_1">
                                                        <span class="default_text"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 d-flex justify-content-end">
                                                    <div class="change_button">
                                                        <button class="change_add">Change</button>
                                                    </div>
                                                </div>
                                            </div>
                                        `;
                                        $('.top_level').empty()
                                        $('.top_level').append(add_comp);
                                    }
                                });

                                // ==========================
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-right',
                                    iconColor: 'white',
                                    showConfirmButton: false,
                                    timer: 1500,
                                    timerProgressBar: true
                                })
                                Toast.fire({
                                    icon: 'success',
                                    title: 'Address Updated!'
                                })
                                // ==========================

                                // ==========================
                                // ! ADDRESS ON SELECTION (CHANGE)
                                // ==========================
                                $('.address_content').empty()
                                $.each(data.data, (j, key1)=>{
                                    let comp = `
                                    <div class="single_address">
                                        <div class="radio_">
                                            ${key1.is_default === 'default' ? `<input type="radio" name="address" class="address_radio" data-address=${key1.address_id} checked>` : `<input type="radio" name="address" data-address=${key1.address_id} class="address_radio">`}
                                        </div>
                                        <div class="info_add">
                                            <span class="name"><b> ${key1.firstname} ${key1.lastname} | (+63) ${key1.phone_number}</b></span>
                                            
                                            <div class="address_desc">
                                                <span class="info_">${key1.region} | ${key1.province} | ${key1.city} | ${key1.barangay}</span><br>

                                                <span class="desc">
                                                ${key1.description}
                                                </span>
                                                ${key1.is_default === 'default' ? '<div class="default_">Default</div>' : ''}
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                    `
                                $('.address_content').append(comp)
                                })
                            },
                            complete: ()=>{
                                closeModal()
                                // Add click event listener to dynamically added button
                                $('.change_add').on('click', function() {
                                    openModal();
                                    console.log('clicled')
                                });

                                // Add click event listener to close button
                                $('.modal-close').on('click', function() {
                                    closeModal();
                                });
                            },
                            error: (xhr, status, error) => {
                                console.log("AJAX error:", xhr);
                                console.log("AJAX error:", error);
                                console.log("AJAX error:", status);
                            }
                        })
                    }else{
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-right',
                            iconColor: 'white',
                            customClass: {
                                popup: 'error-toast'
                            },
                            showConfirmButton: false,
                            timer: 1500,
                            timerProgressBar: true
                        })
                        Toast.fire({
                            icon: 'error',
                            title: 'No Address Selected'
                        })
                    }
                })
            })
        },
        error: (xhr, status, error) => {
            console.log("AJAX error:", xhr);
            console.log("AJAX error:", error);
            console.log("AJAX error:", status);
        }
    });

});


    let luzon = ['Region I ', 'Region II ', 'Region III ', 'Region IV-A ', 'Region IV-B  ', 'Region V ', 'CAR ', 'NCR ']
    let visayas = ['Region VI ','Region VII ','Region VIII ']
    let mindanao = ['Region IX ','Region X ','Region XI','Region XII ','Region XIII ','BARMM ']

    // ==========================
    // ! PAYMENT METHOD SELECTION
    // ==========================
    $('.gcash-number').fadeOut();
    $(document).on('click', 'input[name="paymentMethod"]', function() {
        var selectedPaymentMethod = $('input[name="paymentMethod"]:checked').val();
        if (selectedPaymentMethod === 'COD') {
            console.log('true');
            let region = $(this).closest('.container').find('.region_add').text();
            // Replace '.container' with the actual parent element that contains the dynamically added HTML
            console.log(region);
            let total = 0;
        
            if (luzon.includes(region)) {
                console.log('Located in Luzon');
                total = 600;
                let ship = parseFloat($('.shipping_').text());
                if (!$('.shipping_').hasClass('added')) {
                    total += ship;
                    $('.shipping_').addClass('added');
                }
                $('.shipping_').text(total);
                total_all();
            } else if (visayas.includes(region)) {
                console.log('Located in Visayas');
                total = 400;
                let ship = parseFloat($('.shipping_').text());
                if (!$('.shipping_').hasClass('added')) {
                    total += ship;
                    $('.shipping_').addClass('added');
                }
                total_all();
            } else if (mindanao.includes(region)) {
                console.log('Located in Mindanao');
                total = 200;
                let ship = parseFloat($('.shipping_').text());
                if (!$('.shipping_').hasClass('added')) {
                    total += ship;
                    $('.shipping_').addClass('added');
                }
                $('.shipping_').text(total);
                total_all();
            } else {
                console.log('Unknown region');
            }
            $('.gcash-number').fadeOut();
            console.log(total);
        } else {
            // Other payment method selected, subtract the shipping cost if it has been added
            if ($('.shipping_').hasClass('added')) {
                $('.shipping_').empty()
                $('.shipping_').text('0')
                total_all()
                $('.shipping_').removeClass('added');
            }
            console.log('Other payment method selected');
            $('.gcash-number').fadeIn();
        }
        // Do something with the selected value
        console.log(selectedPaymentMethod);
    });

    // ==========================
    // !COUPONS SELECTION
    // ==========================
    $(document).ready(function(){
        $('.coupon_').on("click", function(){
            console.log("true")
            let value = $('#coup_').val();
            var selectedPaymentMethod = $('input[name="paymentMethod"]:checked').val();

            if(value && selectedPaymentMethod){
                console.log(value)
                $.ajax({
                    url: `${link_path}api/coupons/cop_use?coupon_code=${value}`,
                    method: `GET`,
                    dataType: 'json',
                    success: (data)=>{
                        console.log(data)
                        if(data.message === 'success'){
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-right',
                                iconColor: 'white',
                                showConfirmButton: false,
                                timer: 1500,
                                timerProgressBar: true
                            })
                            Toast.fire({
                                icon: 'success',
                                title: data.msg
                            })
                            if(data.type === 'Free Shipping'){
                                console.log('free shipping')
                                $('.shipping_').text("Free Shipping")
                                let sub = parseFloat($('.subtotal-price').text());
                                let disc = parseFloat($('.discount_').text());
                                let total = parseFloat(sub + disc);

                                $('.error_cop').text('~ Free Shipping')
                                $('.error_cop').css('color', 'green')
                                $('.error_cop').removeClass('d-none')
                                console.log(total)
                                $('.total_price').text(total)
                            }else if(data.type === 'Percentage'){
                                // discount by percentage
                                let percent = data.data[0].item_value; // % percent
                                let subtotal = parseFloat($('.subtotal-price').text());
                                let total = (percent / 100) * subtotal;
                                console.log(total.toFixed(2));
                                $('.discount_').text(total.toFixed(2))
                                total_all();
                            }

                            $('#coup_').css('border', '1px solid green')
                        }else if(data.message === 'failed'){
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-right',
                                iconColor: 'white',
                                showConfirmButton: false,
                                timer: 1500,
                                timerProgressBar: true
                            })
                            Toast.fire({
                                icon: 'error',
                                title: data.msg
                            })
                        }
                    },
                    error: (xhr, status, error) => {
                        console.log("AJAX error:", xhr);
                        console.log("AJAX error:", error);
                        console.log("AJAX error:", status);
                    }
                })
            }else{
                // style it with
                $('.error_cop').text("No entry / Please select payment method")
                $('#coup_').css('border', '1px solid red')
                $('.error_cop').removeClass('d-none')
                setTimeout(() => {
                    $('.error_cop').addClass('d-none')
                }, 3000);
                console.log("no value")
            }
        })
    })

    // ==========================
    // ! CHECKING OUT
    // ==========================
    $(document).ready(function(){
        $('.checkout_').click(function() {
            let subtotal = $('.subtotal-price').text();
            let shipping = $('.shipping_').text();
            let discount = $('.discount_').text()
            let total_price = $('.total_price').text(); //can be use for payment[amount]
            let selectedPaymentMethod = $('input[name="paymentMethod"]:checked').val();
            // ==========================
            let searchparams = new URLSearchParams(window.location.search);
            let id = searchparams.get('order_id');
            // orders update
            let add_id = $('.default_').data('address')

            let products = $('.prod_area');
            // product table to update list[]
            let productList = []
            $.each(products, function(index, element) {
                let prodArea = $(element).attr('data-prodarea');
                let prodAmount = $(element).attr('data-prodamount')

                let product = {
                    product_id: prodArea, // ! THIS IS PRODUCT ID
                    quantity: prodAmount,
                    user: user
                }
                productList.push(product)
                

            });
            console.log(productList)

            // coupon
            let coupon = $('#coup_').val()
            if(coupon){
                console.log(coupon)
            }else{
                console.log("not using cooupon")
            }

            if(selectedPaymentMethod !== undefined){
                // ==========================
                // ! PAYMENT TABLE CHECKOUT
                // ==========================
                $.ajax({
                    url: `${link_path}api/payment/pay_add`,
                    method: 'POST',
                    data: {amount: total_price, method: selectedPaymentMethod, user: user},
                    dataType: 'json',
                    success: (data)=>{
                        console.log(data)
                        const paymentID = data.paymentID;
                        console.log(paymentID)
                        // ==========================
                        // ! UPDATE ORDERS 
                        // ==========================
                        // TODO: WHAT IF I USA TANANG VALUES ARON KAS'A RA ANG AJAX REQUEST
                        $.ajax({
                            url: `${link_path}api/order/order_edit`,
                            method: 'PUT',
                            data: JSON.stringify({
                                paymentID: paymentID,
                                add_id: add_id, 
                                order_id: id, 
                                user: user, 
                                productList, 
                                coupon: coupon,
                                discount: discount,
                                total_price: total_price,
                                shipping: shipping
                            }),
                            dataType: 'json',
                            success: (data)=>{
                                console.log(data)
                                if(data.type === 'success'){
                                    const Toast = Swal.mixin({
                                        toast: true,
                                        position: 'top-right',
                                        iconColor: 'white',
                                        showConfirmButton: false,
                                        timer: 1500,
                                        timerProgressBar: true
                                    })
                                    Toast.fire({
                                        icon: 'success',
                                        title: data.message
                                    })
                                    setTimeout(() => {
                                        location.replace(`/profile-purchase?user_id=${user}`)
                                    }, 1500);
                                }else{
                                    const Toast = Swal.mixin({
                                        toast: true,
                                        position: 'top-right',
                                        iconColor: 'white',
                                        showConfirmButton: false,
                                        timer: 1500,
                                        timerProgressBar: true
                                    })
                                    Toast.fire({
                                        icon: 'error',
                                        title: data.message
                                    })
                                }
                            },
                            error: (xhr, status, error) => {
                                console.log("AJAX error:", xhr);
                                console.log("AJAX error:", error);
                                console.log("AJAX error:", status);
                            }
                        })

                    },
                    error: (xhr, status, error) => {
                        console.log("AJAX error:", xhr);
                        console.log("AJAX error:", error);
                        console.log("AJAX error:", status);
                    }
                })
                
            }else{
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-right',
                    iconColor: 'white',
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true
                })
                Toast.fire({
                    icon: 'error',
                    title: 'Please select payment method'
                })
                $('.payment_method').removeClass('d-none')
                $('.radio-button').css('border', '2px solid red')
                setTimeout(() => {
                    $('.payment_method').addClass('d-none')
                    $('.radio-button').css('border', '2px solid #ccc')
                }, 3000);
            }
            
        })
    })
    // all goods
    function test(){
        console.log('test')
    }
    // input keys
    $(document).keydown(function(event) {
        // Check if the Escape key was pressed and modal is open
        if (event.keyCode === 27 && $('.modal-overlay').css('display') === 'flex') {
            closeModal();
        }
    });
    // ==========================
    // Function to open the modal
    // ==========================
    function openModal() {
        $('.modal-overlay').css('display', 'flex');
    }
    // ==========================
    // Function to close the modal
    // ==========================
    function closeModal() {
        $('.modal-overlay').css('display', 'none');
    }

    // ==========================
    // !Function total pricing table
    // ==========================
    function total_all(){
        let sub = parseFloat($('.subtotal-price').text()); 
        let ship = parseFloat($('.shipping_').text());
        let disc = parseFloat($('.discount_').text());
        let total = parseFloat(sub + ship - disc);
        $('.total_price').text(total.toFixed(2))
    }

// Get the copy icon element
const copyIcon = document.querySelector('.copy-icon');
// Get the Gcash number element
const gcashNumber = document.querySelector('.gcash_');

// Add click event listener to the copy icon
copyIcon.addEventListener('click', () => {
// Create a textarea element
const textarea = document.createElement('textarea');
// Set the value of the textarea to the Gcash number text
textarea.value = gcashNumber.textContent;

// Append the textarea to the document body
document.body.appendChild(textarea);

// Select the text in the textarea
textarea.select();
// Copy the selected text to the clipboard
document.execCommand('copy');

// Remove the textarea from the document body
document.body.removeChild(textarea);

// Alert the user that the Gcash number has been copied
alert('Gcash number copied!');
});
