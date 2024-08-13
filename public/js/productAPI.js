console.log("hello world");
// ==========================
// DECLARATION
// ==========================
const link_path = 'http://127.0.0.1:8000/';
const searchparams = new URLSearchParams(window.location.search);
const id = searchparams.get('cat_id');
const searchingProd = searchparams.get('se_val');
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
            var listItem = $("<li>").append($("<a>").attr("href", `/product-grids?cat_id=${key.id}`).text(categoryName));
            $(".sub-category").append(listItem);
        })
    },
    error: (xhr, status, error) => {
        console.log("AJAX error:", error);
    }
})
// ==========================
// search category
// ==========================
$.ajax({
	url: `${link_path}api/category/cat_view`,
	method: "GET",
	dataType: "json",
	success: (data) => {
		$.each(data.data, (i, key) => {
			var categoryName = key.name;
			var listItem = $("<li>")
				.append(
					$("<a>")
						.attr(
							"href",
							`product-grids?cat_id=${key.id}`
						)
						.text(categoryName).append($("<span>").text(`(${key.product_count})`))
				)
			$(".list_categories").append(listItem);
		});
	},
	error: (xhr, status, error) => {
		console.log("AJAX error:", xhr);
		console.log("AJAX error:", error);
		console.log("AJAX error:", status);
	},
});



// ==========================
// PAGINATION
// ==========================	
$(document).ready(function () {
	var productsPerPage = 12; // Number of products to display per page
	var currentPage = 1; // Current page

	// Function to display products based on the current page
	function 	displayProducts(page) {
		var startIndex = (page - 1) * productsPerPage;
		var endIndex = startIndex + productsPerPage;

		// Get the product grid container
		var productGrid = $(".product_row");
		// ==========================
		// Clear the product grid
		// ==========================	
		productGrid.empty();

		// Retrieve the products for the current page
		var productsForPage = products.slice(startIndex, endIndex);
		// ==========================
		// Generate the product cards for the current page
		// ==========================
		$.each(productsForPage, function (i, key) {
			var productCard = `
            <div class="col-lg-3 col-md-6 col-12 productGrid">
                <div class="single-product product-card">
                    <div class="product-image">
                        <img src="img-prod/${key.image_filename}" alt="#" width="288" height="288" style="object-fit:contain" loading="lazy"/>
                        ${key.popularity_status === "New"? `<span class="new-tag">${key.popularity_status}</span>`
								: `<span class="new-tag" style="background-color:red">${key.popularity_status}</span>`
						}
                        <div class="button">
                            <a href="#" data-prod="${key.product_id}" class="btn  btn_test"><i class="lni lni-cart"></i> Add to
                                Cart</a>
                        </div>
                    </div>
                    <div class="product-info">
                        <span class="category">${key.category_name}</span>
                        <h4 class="title">
                            <a href="product-details?id=${
								key.product_id
							}">${key.name}</a>
                        </h4>
                        <div class="price" style="display:flex;justify-content: space-between;">
                            <div class="price_info">
                                <span>₱ ${key.price}</span>
                                <span class="discount-price">₱ ${
									key.old_price
								}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;
			productGrid.append(productCard);
		});
		// ==========================
		// Update the pagination links
		// ==========================
		updatePagination();
	}
	// ==========================
	// Function to update the pagination links
	// ==========================
	function updatePagination() {
		var totalPages = Math.ceil(products.length / productsPerPage);
		var paginationList = $(".pagination-list");
		paginationList.empty();
		// ==========================
		// Add pagination items
		// ==========================
		for (var i = 1; i <= totalPages; i++) {
			var listItem = $("<li></li>");
			var link = $("<a></a>").attr("href", "javascript:void(0)").text(i);

			if (i === currentPage) {
				listItem.addClass("active");
			}
			// ==========================
			// Bind the click event to navigate to the corresponding page
			// ==========================
			link.on("click", function () {
				currentPage = parseInt($(this).text());
				displayProducts(currentPage);
			});

			listItem.append(link);
			paginationList.append(listItem);
		}
	}
	// ==========================
	// search by category (products)
	// ==========================
	$(document).ready(()=>{
		if(id){
			$.ajax({
				url: `${link_path}api/product/prod_search?cat_id=${id}`,
				method: "GET",
				dataType: "json",
				success: (data)=>{
					console.log(data)
					products = data.data;  
					console.log(products.length)
					$('.show-product').text(`1 - ${products.length} items`)
					displayProducts(currentPage);
				},
				complete: ()=>{
					// ==========================
					// Range input event handler
					// ==========================
					$("#range_sort").on("input", function () {
						let selectedValue = parseInt($(this).val());
						console.log(selectedValue);
						$.ajax({
							url: `${link_path}api/product/prod_sort_cat?value=${selectedValue}&cat_id=${id}`,
							method: "GET",
							dataType: "json",
							success: function (data) {
								products = data.data;
								console.log(products.length)
								if(products.length > 0){
									$('.show-product').text(`1 - ${products.length} items`)
									displayProducts(currentPage);
								}else{
									console.log("no more products")
									displayProducts(currentPage);
									const no_prod = `
										<span class="no_product">No more available products. <a href='product-grids.html'>Browse more</a> </span>
									`
									$('.product_row').append(no_prod)
								}

							},
							complete:()=>{
								$('.no_product').css("text-align", "center")
								.css("font-size", "1rem")
								.css("font-weigth", "bold")
								.css("margin-top", "50px")
							},
							error: function (xhr, status, error) {
								console.log("AJAX error:", error);
							},
						});
					});
				},
				error: (xhr, status, error) => {
					console.log("AJAX error:", xhr);
					console.log("AJAX error:", error);
					console.log("AJAX error:", status);
				},
			})
		}else if(searchingProd){
			$.ajax({
				url: `${link_path}api/product/prod_search?prod_search=${searchingProd}`,
				method: "GET",
				dataType: "json",
				success: (data)=>{
					console.log(data)
					products = data.data;  
					console.log(products.length)
					$('.show-product').text(`1 - ${products.length} items`)
					displayProducts(currentPage);
				},
				complete: ()=>{
					// ==========================
					// Range input event handler
					// ==========================
					$("#range_sort").on("input", function () {
						let selectedValue = parseInt($(this).val());
						console.log(selectedValue);
						$.ajax({
							url: `${link_path}api/product/prod_sort_cat?value=${selectedValue}&cat_id=${id}`,
							method: "GET",
							dataType: "json",
							success: function (data) {
								products = data.data;
								console.log(products.length)
								if(products.length > 0){
									$('.show-product').text(`1 - ${products.length} items`)
									displayProducts(currentPage);
								}else{
									console.log("no more products")
									displayProducts(currentPage);
									const no_prod = `
										<span class="no_product">No more available products. <a href='product-grids.html'>Browse more</a> </span>
									`
									$('.product_row').append(no_prod)
								}

							},
							complete:()=>{
								$('.no_product').css("text-align", "center")
								.css("font-size", "1rem")
								.css("font-weigth", "bold")
								.css("margin-top", "50px")
							},
							error: function (xhr, status, error) {
								console.log("AJAX error:", error);
							},
						});
					});
				},
				error: (xhr, status, error) => {
					console.log("AJAX error:", xhr);
					console.log("AJAX error:", error);
					console.log("AJAX error:", status);
				},
			})
		}else{
			$.ajax({
				url: `${link_path}api/product/prod_sort?value=100`,
				method: "GET",
				dataType: "json",
				success: function (data) {
					console.log(data)
					products = data.data;  
					console.log(products.length)
					$('.show-product').text(`1 - ${products.length} items`)
					displayProducts(currentPage);
				},
				complete: ()=>{
					// ==========================
					// Range input event handler
					// ==========================
					$("#range_sort").on("input", function () {
						let selectedValue = parseInt($(this).val());
						console.log(selectedValue);
						$.ajax({
							url: `${link_path}api/product/prod_sort?value=${selectedValue}`,
							method: "GET",
							dataType: "json",
							success: function (data) {
								products = data.data;
								console.log(products.length)
								$('.show-product').text(`1 - ${products.length} items`)
								displayProducts(currentPage);
							},
							error: function (xhr, status, error) {
								console.log("AJAX error:", xhr);
								console.log("AJAX error:", error);
								console.log("AJAX error:", status);
							},
						});
					});
					// ==========================
					// Input Search Field
					// ==========================
					$('.search_form').on("input", function(e) {
						e.preventDefault();
						var searchTerm = $(this).val().toLowerCase();
						$('.title a').each(function() {
						var productName = $(this).text().toLowerCase();
						var productElement = $(this).closest('.productGrid');
					
						if (productName.includes(searchTerm)) {
							productElement.show();
						} else {
							productElement.hide();
						}
						});
					});
				},
				error: function (xhr, status, error) {
					console.log("AJAX error:", xhr);
					console.log("AJAX error:", error);
					console.log("AJAX error:", status);
				},
			});
		}
	})

	// ==========================
    // Input Search Field
	// ==========================
	$('.searh_form').on("input", function(e){
		e.preventDefault();
		console.log($(this).val())

	})

});
// // product grid cards
// $.ajax({
// 	url: `${link_path}api/product/prod_view.php`,
// 	method: "GET",
// 	dataType: "json",
// 	success: (data) => {
// 		var products = data.data;
// 		console.log(products.length);
// 		$.each(products, (i, key) => {
// 			let product_card = `
//                 <div class="col-lg-3 col-md-6 col-12 productGrid">
//                     <div class="single-product product-card">
//                         <div class="product-image">
//                             <img src="img-prod/${
// 								key.image_filename
// 							}" alt="#" width="288" height="288" style="object-fit:contain"/>
//                             ${
// 								key.popularity_status === "New"
// 									? `<span class="new-tag">${key.popularity_status}</span>`
// 									: `<span class="new-tag" style="background-color:red">${key.popularity_status}</span>`
// 							}
//                             <div class="button">
//                                 <a href="product-details.html?id=${
// 									key.product_id
// 								}" class="btn"><i class="lni lni-cart"></i> Add to
//                                     Cart</a>
//                             </div>
//                         </div>
//                         <div class="product-info">
//                             <span class="category">${key.category_name}</span>
//                             <h4 class="title">
//                                 <a href="product-details.html?id=${
// 									key.product_id
// 								}">${key.name}</a>
//                             </h4>
//                             <div class="price" style="display:flex;justify-content: space-between;">
//                                 <div class="price_info">
//                                     <span>₱ ${key.price}</span>
//                                     <span class="discount-price">${
// 										key.old_price
// 									}</span>
//                                 </div>
//                                 <div class="wish_list">
//                                     <i class="fa-regular fa-heart fa-xl heart_class"></i>
//                                 </div>
//                             </div>
//                         </div>
//                     </div>
//                 </div>
//             `;
// 			$(".product_row").append(product_card);
// 		});
// 		$(".show-product").text(`1 - ${products.length} items`);
// 	},
// 	error: (xhr, status, error) => {
// 		console.log("AJAX error:", error);
// 	},
// });

$(document).on("mouseenter", ".wish_list i", function () {
	// ==========================
	// Remove the fa-regular class
	// Add the fa-solid class
	// You can define the styles for the fa-solid class here
	// ==========================
	$(this).removeClass("fa-regular").addClass("fa-solid");
	console.log("hovered");
});

$(document).on("mouseleave", ".wish_list i", function () {
	// ==========================
	// Revert back to the original class on mouseout, if needed
	// ==========================
	$(this).removeClass("fa-solid").addClass("fa-regular");
	console.log("not hovered");
});


// ==========================
// ! user profile
// ==========================
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

