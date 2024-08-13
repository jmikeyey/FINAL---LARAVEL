console.log('Hello WOrld!')
const link_path = 'http://127.0.0.1:8000/';
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
// product cards & add to cart
// ==========================
$.ajax({
    url: `${link_path}api/product/prod_view`,
    method: "GET",
    dataType: "json",
    success: (data) => {
        var products = data.data.slice(0, 8);
        console.log(products);
        console.log('hello number 123')
        $.each(products, (i, key)=>{
            let product_card = `
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-product">
                        <div class="product-image">
                            <img src="img-prod/${key.image_filename}" alt="#" width="288" height="288" style="object-fit:contain"/>
                            ${key.popularity_status === 'New' ? `<span class="new-tag">${key.popularity_status}</span>` : `<span class="new-tag" style="background-color:red">${key.popularity_status}</span>`}
                            <div class="button">
                                <a href="#" class="btn btn_test" data-prod="${key.product_id}" ><i class="lni lni-cart"></i> Add to Cart</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="category">${key.category_name}</span>
                            <h4 class="title">
                                <a href="product-details?id=${key.product_id}">${key.name}</a>
                            </h4>
                            <div class="price" style="display:flex;justify-content: space-between;">
                                <div class="price_info">
                                    <span>₱ ${key.price}</span>
                                    <span class="discount-price">${key.old_price}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            $('.product_row').append(product_card)
        })
    },
    error: (xhr, status, error) => {
        console.log("AJAX error:", xhr);
        console.log("AJAX error:", error);
        console.log("AJAX error:", status);
    }
})

// ==========================
// trending 
// ==========================
$.ajax({
    url: `${link_path}api/product/prod_view`,
    method: "GET",
    dataType: "json",
    success: (data) => {
        let best_seller = data.data.slice(9, 12);
        $.each(best_seller, (i, key)=>{
            let single_list = `
            <div class="single-list">
                <div class="list-image"> <img src="img-prod/${key.image_filename}" alt="${key.name}" /></a>
                </div>
                <div class="list-info">
                    <h3>
                        <a href="product-details?id=${key.product_id}">${key.name}</a>
                    </h3>
                    <span>${key.price}</span>
                </div>
            </div>
            `;
            $('.best_seller').append(single_list)
        })
        let new_arrival = data.data.slice(12, 15);
        $.each(new_arrival, (i, key)=>{
            let single_list = `
            <div class="single-list">
                <div class="list-image"> <img src="img-prod/${key.image_filename}" alt="${key.name}" /></a>
                </div>
                <div class="list-info">
                    <h3>
                        <a href="product-details?id=${key.product_id}">${key.name}</a>
                    </h3>
                    <span>${key.price}</span>
                </div>
            </div>
            `;
            $('.new_arrival').append(single_list)
        })
        let top_rated = data.data.slice(15, 18);
        $.each(top_rated, (i, key)=>{
            let single_list = `
            <div class="single-list">
                <div class="list-image"> <img src="img-prod/${key.image_filename}" alt="${key.name}" /></a>
                </div>
                <div class="list-info">
                    <h3>
                        <a href="product-details?id=${key.product_id}">${key.name}</a>
                    </h3>
                    <span>${key.price}</span>
                </div>
            </div>
            `;
            $('.top_rated').append(single_list)
        })
    },
    error: (xhr, status, error) => {
        console.log("AJAX error:", error);
    }
})


$(document).on('mouseenter', '.wish_list i', function() {
    // ==========================   
    // Remove the fa-regular class
    // Add the fa-solid class
    // You can define the styles for the fa-solid class here
    // ==========================
    $(this).removeClass('fa-regular').addClass('fa-solid');
    console.log('hovered');
});

$(document).on('mouseleave', '.wish_list i', function() {
    // ==========================
    // Revert back to the original class on mouseout, if needed
    // ==========================    
    $(this).removeClass('fa-solid').addClass('fa-regular');
    console.log('not hovered');
});
// ==========================
// cookies functios
// ==========================
$(document).ready(function(){
    // const logged_ser = $.cookie("name") ? "true" : 'window.location.replace("login.html"); console.log("failed");'
    const logged_ser = Cookies.get("name");
    console.log(logged_ser);

    if (!logged_ser) {
        console.log("not logged in")
    }
});

let user = Cookies.get("name");
if (!user || user.trim() === "") {
    console.log("not logged in again")
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
                <a href="/profile?user_id=${user}" class="user_profile">
                    <i class="lni lni-user"></i>
                    <span class="user_name">${data1.firstname.split(" ")[0]}</span>
                </a>
            </li>
            <li>
                <a href="#" onclick="logoutUser()">Logout</a>
            </li>
            `
            $('.user_').append(component1)
            if (data1.usertype !== 'customer') {
                location.replace("/login");
                Cookies.remove('name');
                Cookies.remove('username');
                Cookies.remove('password');
                Cookies.remove('user_type');
            }
        },
        error: (xhr, status, error) => {
            console.log("AJAX error:", xhr);
            console.log("AJAX error:", error);
            console.log("AJAX error:", status);
        }
    });

}


