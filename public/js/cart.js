
const logged_user = Cookies.get("name");
console.log("cart: " + logged_user)
// ==========================
// Function to display login prompt and redirect to login page
// ==========================
function displayLoginPrompt() {
    Swal.fire({
        icon: 'error',
        title: "Please Login",
        toast: true,
        position: 'top',
        showConfirmButton: false,
        timer: 1000,
        timerProgressBar: true
    }).then(() => {
        location.replace("/login");
    });
}
function displayPrompt() {
    console.log('not logged in23')
}
// ==========================
// Function to add to cart
// ==========================
function addToCart(prod_id) {
    $.ajax({
        url: `${link_path}api/cart/cart_add`,
        method: "POST",
        dataType: "json",
        data: { prod_id: prod_id, user_id: logged_user },
        success: (data) => {
            console.log(data);
            // ==========================
            // Show toast success using SweetAlert2
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
                title: data.message
            })
            // ==========================     
            // new updated cart add complete function
            // ==========================
            updateCart();
        },
        error: (xhr, status, error) => {
            console.log("AJAX error:", xhr);
            console.log("AJAX error:", error);
            console.log("AJAX error:", status);
        },
    });
}

$(document).on("click", ".btn_test", function (event) {
    if (!logged_user) {
        displayLoginPrompt();
    } else {
        event.preventDefault();
        let prod_id = $(event.currentTarget).data("prod");
        console.log($(event.currentTarget).data("prod"));
        addToCart(prod_id);
    }
});

function updateCart() {
    $('.cart-items').empty();
    $.ajax({
        url: `${link_path}api/cart/cart_get?id=${logged_user}`,
        method: "GET",
        dataType: "json",
        success: (data) => {
            console.log(data);
            if (data.msg === "success") {
                let cart = data.data;
                let div = `
                    <a href="javascript:void(0)" class="main-btn">
                        <i class="lni lni-cart"></i>
                        <span class="total-items">${cart.length}</span>
                    </a>
                    <div class="shopping-item">
                        <div class="dropdown-cart-header">
                            <span>${cart.length} Items</span>
                            <a href="/cart">View Cart</a>
                        </div>
                        <ul class="shopping-list">

                        </ul>
                        <div class="bottom">

                        </div>
                    </div>
                `;
                $('.cart-items').append(div)
                // ==========================
                //  list of cart items
                // ==========================
                $.each(cart, (i, key) => {
                    let li = "<li>"
                    li += `<a href="javascript:void(0)" class="remove" data-idvalue=${key.cart_id} title="Remove this item"><i class="lni lni-close"></i></a>`
                    li += ` <div class="cart-img-head">
                                <a class="cart-img" href="product-details.html?id=${key.product_id}">
                                    <img src="img-prod/${key.filename}" alt="#" />
                                </a>
                            </div>
                            <div class="content">
                                <h4>
                                    <a href="product-details.html?id=${key.product_id}">${key.name}</a>
                                </h4>
                                <p class="quantity">
                                    ${key.quantity}x -
                                    <span class="amount">₱${key.price}</span>
                                </p>
                            </div>
                            `
                    li += "</li>"
                    $('.shopping-list').append(li)
                })
                let total = 0;
                $.each(cart, (j, key1) => {
                    total += (key1.quantity * key1.price);
                })
                console.log(total)
                let data_total = `
                    <div class="total">
                        <span>Total</span>
                        <span class="total-amount">₱${total}</span>
                    </div>
                    <!-- <div class="button">
                    <a href="checkout.html?user_id=${user}" class="btn animate">Checkout</a>
                    </div> -->
                `;
                $('.bottom').append(data_total)
            }else{
                let div = `
                    <a href="javascript:void(0)" class="main-btn">
                        <i class="lni lni-cart"></i>
                        <span class="total-items">0</span>
                    </a>
                    <div class="shopping-item">
                        <div class="dropdown-cart-header">
                            <span> 0 Items</span>
                            <a href="/cart">View Cart</a>
                        </div>
                        <ul class="shopping-list">

                        </ul>
                        <div class="bottom">

                        </div>
                    </div>
                `;
                $('.cart-items').append(div)

                let li = "<li>"
                li += `
                        <button class="cta">
                            <span class="hover-underline-animation"> Shop now </span>
                            <svg viewBox="0 0 46 16" height="10" width="30" xmlns="http://www.w3.org/2000/svg" id="arrow-horizontal">
                                <path transform="translate(30)" d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z" data-name="Path 10" id="Path_10"></path>
                            </svg>
                        </button>
                        `
                li += "</li>"
                $('.shopping-list').append(li)
            }
        },
        complete: ()=>{
            $('.remove').on("click", function() {
                let data = $(this).data("idvalue");
                console.log(data);
                $.ajax({
                    url: `${link_path}api/cart/cart_del`,
                    data: JSON.stringify({ del: data }),
                    dataType: 'json',
                    method: 'DELETE',
                    success: (res) => {
                        console.log(res);
                        updateCart();
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-right',
                            iconColor: 'red',
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
        },
        error: (xhr, status, error) => {
            console.log("AJAX error:", xhr);
            console.log("AJAX error:", error);
            console.log("AJAX error:", status);
        },
    });
}

// Check if user is logged in
if (!logged_user) {
    displayPrompt();
} else {
    updateCart();
}
