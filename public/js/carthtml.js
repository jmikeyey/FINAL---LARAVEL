const link_path = 'http://127.0.0.1:8000/';
let user = Cookies.get("name");
if (!user || user.trim() === "") {
    let component1 = `
    <li>
        <a href="/login">Sign In</a>
    </li>
    <li>
        <a href="/register">Register</a>
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
// CART VIEW
// ==========================
function updateCarts() {
    $('.cart_details').empty()
    $.ajax({
        url: `${link_path}api/cart/cart_get?id=${user}`,
        method: "GET",
        dataType: "json",
        success: (data) => {
            console.log(data);
            if (data.msg === "success") {
                let component3 = `
                    <div class="cart-list-title">
                        <div class="row cart_row">
                            <div class="col-lg-1 col-md-1 col-12 d-flex align-items-center justify-content-center gap-2">
                                <input type="checkbox" id="selectAllCheckbox"form-check-input">
                                <p>Select All</p>
                            </div>
                            <div class="col-lg-1 col-md-1 col-12">
                            </div>
                            <div class="col-lg-4 col-md-3 col-12">
                                <p>Product Name</p>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12">
                                <p>Quantity</p>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12">
                                <p>Subtotal</p>
                            </div>
                            <div class="col-lg-1 col-md-2 col-12">
                                <p>Discount</p>
                            </div>
                            <div class="col-lg-1 col-md-2 col-12">
                                <p>Remove</p>
                            </div>
                        </div>
                    </div>
                `
                $('.cart_details').append(component3)
                $.each(data.data, (i, key)=>{
                    let component2 = `
					<div class="cart-single-list">
						<div class="row align-items-center">
							<div class="col-lg-1 col-md-1 col-12">
								<center>
									<input type="checkbox" data-checkcart=${key.cart_id} class="form-check-input big_check" id="exampleCheck1">
								</center>
							</div>
							<div class="col-lg-1 col-md-1 col-12">
								<a href="product-details.html"
									><img
										src="img-prod/${key.filename}"
										alt="#"
								/></a>
                                <input type="hidden" value="${key.product_id}" class="prod_id_">
							</div>
							<div class="col-lg-4 col-md-3 col-12">
								<h5 class="product-name">
									<a href="product-details.html">
										${key.name}</a
									>
								</h5>
								<p class="product-des">
									<span><em>Category:</em> ${key.category_name}</span>
									<span><em>Brand:</em> ${key.brand}</span>
								</p>
							</div>
							<div class="col-lg-2 col-md-2 col-12">
								<div class="count-input">
                                    <div class="counter">
                                        <span class="down quan_event" data-prodquan=${key.cart_id} data-hiddenprice=${key.price} onClick='decreaseCount(event, this)'>-</span>
                                        <input type="text" value='${key.quantity}' class="quan_val">
                                        <span class="up quan_event" data-prodquan=${key.cart_id}  data-hiddenprice=${key.price} onClick='increaseCount(event, this)'>+</span>
                                    </div>
								</div>
							</div>
							<div class="col-lg-2 col-md-2 col-12 calc_total">
								<p class="total_price">₱ ${key.price * key.quantity}</p>
                                <p class="price_ d-none">${key.price}</p>
							</div>
							<div class="col-lg-1 col-md-2 col-12">
								<p>—</p>
							</div>
							<div class="col-lg-1 col-md-2 col-12">
								<a class="remove-item removes" href="#" data-idvalue=${key.cart_id}
									><i class="lni lni-close"></i
								></a>
							</div>
						</div>
					</div>
                    `
                    
                    $('.cart_details').append(component2)
                })
            }
            
        },
        complete: ()=>{
            // ==========================
            // ! REMOVING CART 
            // ==========================
            $('.removes').on("click", function() {
                let data = $(this).data("idvalue");
                console.log(data);
                $.ajax({
                    url: `${link_path}api/cart/cart_del`,
                    data: JSON.stringify({ del: data }),
                    dataType: 'json',
                    method: 'DELETE',
                    success: (res) => {
                        console.log(res);
                        updateCarts();
                        updateCart();
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-right',
                            iconColor: 'white',
                            customClass: {
                                popup: 'success-toast'
                            },
                            showConfirmButton: false,
                            timer: 1500,
                            timerProgressBar: true
                        })
                        Toast.fire({
                            icon: 'success',
                            title: res.message
                        })
                    },
                    error: (xhr, status, error) => {
                        console.log("AJAX error:", xhr);
                        console.log("AJAX error:", error);
                        console.log("AJAX error:", status);
                    },
                    });
                });
            // ==========================
            // ! CHECKOUT EVENT ON SELECTED PRODEUCT
            // ==========================
            $('.checkout_btn').on("click", function(){
                const checkedProducts = [];
                $('.big_check:checked').each(function() {
                    let productId = $(this).closest(".cart-single-list").find('.prod_id_').val();
                    let quantity = parseInt($(this).closest(".cart-single-list").find('.quan_val').val());
                    let subtotal = parseFloat($(this).closest(".cart-single-list").find('.total_price').text().split("₱")[1]);
                    let price = parseFloat($(this).closest(".cart-single-list").find('.price_').text());
                    console.log("quantity: " + quantity + ", subtotal: " + subtotal + ", price: "+price)

                    checkedProducts.push({
                        productId: productId,
                        quantity: quantity,
                        subtotal: subtotal,
                        price: price
                    });
                
                    console.log($(this).closest(".cart-single-list").find('.prod_id_').val());
                });
                if(checkedProducts.length === 0){
                    console.log("No products selected")
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'middle',
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
                        title: 'No Product(s) Selected'
                    })
                }else{
                    // ==========================
                    // ! submit the data in checkout
                    // ==========================
                    console.log(checkedProducts)
                    $.ajax({
                        url: `${link_path}api/order/order_add`,
                        method: 'POST',
                        data: {checkedProducts, user: user},
                        dataType: 'json',
                        success: (data)=>{
                            console.log(data)
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
                                location.replace(`/checkout?order_id=${data.order_id}`)
                            }, 1500);
                        },
                        error: (xhr, status, error) => {
                            console.log("AJAX error:", xhr);
                            console.log("AJAX error:", error);
                            console.log("AJAX error:", status);
                        }
                    })
                }
                console.log(checkedProducts);
            });
            

        },
        error: (xhr, status, error) => {
            console.log("AJAX error:", xhr);
            console.log("AJAX error:", error);
            console.log("AJAX error:", status);
        },
    })
}



function increaseCount(a, b) {
    let input = b.previousElementSibling;
    let value = parseInt(input.value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    input.value = value;
}
function decreaseCount(a, b) {
    let input = b.nextElementSibling;
    let value = parseInt(input.value, 10);
    if (value > 1) {
        value = isNaN(value) ? 0 : value;
        value--;
        input.value = value;
    }
}
// ==========================
// ! SUBMITING DATA ON UPDATED QUANTITY
// ==========================
$(document).on("click", ".quan_event", function() {
    let quantity = $(this).siblings('.quan_val').val();
    let prodId = $(this).data('prodquan');
    let requestData = { quantity: quantity, prodId: prodId };
    console.log(quantity, prodId);

    let price = $(this).data('hiddenprice')
    console.log("price: " + price)
    let quan = $(this).siblings('.quan_val').val()
    console.log("quantity: " + quan)
    let total = price * quan
    console.log(total)
    let totalPriceElement  = $(this).closest('.cart-single-list').find('.total_price')
    totalPriceElement.text(`₱ ${total}`)

    $.ajax({
        url: `${link_path}api/cart/cart_quantity`,
        method: 'PUT',
        dataType: 'json',
        data: JSON.stringify(requestData),
        success: (data)=>{
            updateCart()
            console.log(data)
        },
        error: (xhr, status, error) => {
            console.log("AJAX error:", xhr);
            console.log("AJAX error:", error);
            console.log("AJAX error:", status);
        }
    })
});

// ==========================
// ! SUBTOTAL, SHIPPING, SAVE AND PAY FOR CART
// ==========================
// $(document).on("click", ".big_check", function(){
//     if ($(this).is(":checked")) {
//         console.log($(this).data('checkcart'))
//         let subtotal = parseFloat($(this).closest(".cart-single-list").find('.total_price').text().split("₱")[1]);
//         let total = parseFloat($('.subtotal_').text());
//         let shipping = parseFloat($('.shipping_').text());
//         let save = parseFloat($('.youSave_').text());
//         let pay = parseFloat($('.youPay_').text());

//         let calc1 = total + subtotal;
//         let calc2 = pay + subtotal;

//         $('.subtotal_').text(calc1.toFixed(2));
//         $('.youPay_').text(calc2.toFixed(2));
        
//         console.log(subtotal + ", " + total + ", " + shipping + ", " + save + ", " + pay);
//     } else {
//         console.log($(this).data('checkcart'))
//         let subtotal = parseFloat($(this).closest(".cart-single-list").find('.total_price').text().split("₱")[1]);
//         let total = parseFloat($('.subtotal_').text());
//         let shipping = parseFloat($('.shipping_').text());
//         let save = parseFloat($('.youSave_').text());
//         let pay = parseFloat($('.youPay_').text());

//         let calc1 = total - subtotal;
//         let calc2 = pay - subtotal;

//         $('.subtotal_').text(calc1.toFixed(2));
//         $('.youPay_').text(calc2.toFixed(2));
        
//         console.log(subtotal + ", " + total + ", " + shipping + ", " + save + ", " + pay);
//     }
// });

// // Select All checkbox change event
// $(document).on("change", "#selectAllCheckbox", function () {
//     $('.big_check').prop('checked', $(this).prop('checked'));
//     $('.big_check').each(function(){
//         if ($(this).is(":checked")) {
//             console.log($(this).data('checkcart'))
//             let subtotal = parseFloat($(this).closest(".cart-single-list").find('.total_price').text().split("₱")[1]);
//             let total = parseFloat($('.subtotal_').text());
//             let shipping = parseFloat($('.shipping_').text());
//             let save = parseFloat($('.youSave_').text());
//             let pay = parseFloat($('.youPay_').text());
    
//             let calc1 = total + subtotal;
//             let calc2 = pay + subtotal;
    
//             $('.subtotal_').text(calc1.toFixed(2));
//             $('.youPay_').text(calc2.toFixed(2));
            
//             console.log(subtotal + ", " + total + ", " + shipping + ", " + save + ", " + pay);
//         } else {
//             console.log($(this).data('checkcart'))
//             let subtotal = parseFloat($(this).closest(".cart-single-list").find('.total_price').text().split("₱")[1]);
//             let total = parseFloat($('.subtotal_').text());
//             let shipping = parseFloat($('.shipping_').text());
//             let save = parseFloat($('.youSave_').text());
//             let pay = parseFloat($('.youPay_').text());
    
//             let calc1 = total - subtotal;
//             let calc2 = pay - subtotal;
    
//             $('.subtotal_').text(calc1.toFixed(2));
//             $('.youPay_').text(calc2.toFixed(2));
            
//             console.log(subtotal + ", " + total + ", " + shipping + ", " + save + ", " + pay);
//         }
//     })
// });



function updatePricesForCheckbox(checkbox) {
    let subtotal = parseFloat(checkbox.closest(".cart-single-list").find('.total_price').text().split("₱")[1]);
    let shipping = parseFloat($('.shipping_').text());
    let save = parseFloat($('.youSave_').text());
    let pay = parseFloat($('.youPay_').text());
    let total = parseFloat($('.subtotal_').text());
    if (checkbox.is(":checked")) {
        total += subtotal;
        pay += subtotal;
    } else {
        total -= subtotal;
        pay -= subtotal;
    }

    $('.subtotal_').text(total.toFixed(2));
    $('.youPay_').text(pay.toFixed(2));
    // Check if any checkbox is unchecked and uncheck "Select All" if needed
    if ($('.big_check:not(:checked)').length > 0) {
        $('#selectAllCheckbox').prop('checked', false);
    } else {
        $('#selectAllCheckbox').prop('checked', true);
    }
    console.log(subtotal + ", " + total + ", " + shipping + ", " + save + ", " + pay);
}

// Individual checkbox click event
$(document).on("click", ".big_check", function () {
    updatePricesForCheckbox($(this));
});

// Select All checkbox change event
$(document).on("change", "#selectAllCheckbox", function () {
    let checkboxes = $('.big_check');
    checkboxes.prop('checked', $(this).prop('checked'));
    $('.youPay_').text("0.00");
    $('.subtotal_').text("0.00");
    checkboxes.each(function () {
        updatePricesForCheckbox($(this));
    });
});


$(document).ready(function() {
    updateCarts();
});