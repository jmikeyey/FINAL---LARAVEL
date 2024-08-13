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

//  ========================== 
// getting all the data from 1 product selected
//  ========================== 
$(document).ready(()=>{
    const searchparams = new URLSearchParams(window.location.search);
    const id = searchparams.get('id');
    console.log(id)
    $.ajax({
        url: `${link_path}api/product/prod_get?id=${id}`,
        method: "GET",
        dataType: "json",
        success: (data) => {
			console.log(data)
            const dataSets = data.data;
            $('.product_name').text(dataSets.info[0].name)
            $('.prod_category').text(dataSets.info[0].cat_name)
			$('.btn_test').attr('data-prod', dataSets.info[0].product_id);
			$('.price_info').append(`<h3 class="price">₱${dataSets.info[0].price}<span style="text-decoration: line-through;">₱${dataSets.info[0].old_price}</span></h3>`);
			$('.info_details').append(`<h4 style="font-size: 1.5rem;">Details</h4>`).append(`<p>${dataSets.info[0].description}</p>`)
            $.each(dataSets.specs_data, (i, key)=>{
				let li = "<li>";
					li += `<span style="font-weight: bold;">${key.specs_name}: </span> ${key.specs_value}`;
					li += "</li>";
					$('.normal-list').append(li)
			})

			let count = 0; // Initialize the count variable
			$.each(dataSets.img_data, (i, key) => {
			const images = `<img src="img-prod/${key.filename}" class="img" alt="#" style="object-fit:cover;width:109px;height:109px;"/>`;
			
			if (count === 0) {
				const main_img = `<img src="img-prod/${key.filename}" id="current" alt="#" style="object-fit:contain;width:605px;height:407px;"/>`;
				$('.main-img').append(main_img);
				$('.images').append(images);
				count++;
				console.log("if: " + count);
			} else {
				$('.images').append(images);
				console.log("else: " + count);
			}
			});
       
		},
		complete: ()=>{
			const current = document.getElementById("current");
			const opacity = 0.6;
			const imgs = document.querySelectorAll(".img");
			imgs.forEach((img) => {
				img.addEventListener("click", (e) => {
					imgs.forEach((img) => {
						img.style.opacity = 1;
					});
					current.src = e.target.src;
					e.target.style.opacity = opacity;
				});
			});
		},
        error: (xhr, status, error) => {
			console.log("AJAX error:", xhr);
			console.log("AJAX error:", error);
			console.log("AJAX error:", status);
        },
    });

})

// ========================== USER PROFILE
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
// ADD TO CART ON A SINGLE PRODUCT
// ==========================
$('.buyNow').on("click", function(e){
	const searchparams = new URLSearchParams(window.location.search);
    const id = searchparams.get('id');
	e.preventDefault();
	let price = parseFloat($('.price').text().split('₱')[1]);


	console.log(price)
	let quantity = parseInt($('.quantity').find('select.form-control').val());
    console.log(quantity)
	let subtotal = parseFloat(price * quantity)
	console.log(subtotal)
	const checkedProducts = [];
	checkedProducts.push({
		productId: id,
		quantity: quantity,
		subtotal: subtotal.toFixed(2),
		price: price
	})

	$.ajax({
		url: `${link_path}api/order/order_add`,
		method: 'POST',
		dataType: 'json',
		data: {  subtotal: subtotal, user: user, checkedProducts},
		success: (data) => {
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
				location.replace(`checkout?order_id=${data.order_id}`)
			}, 1500);
		},
        error: (xhr, status, error) => {
            console.log("AJAX error:", xhr);
            console.log("AJAX error:", error);
            console.log("AJAX error:", status);
        }
	})
})