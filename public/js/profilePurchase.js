// ==========================
// ! VIEW ORDERS
// ==========================
$(document).ready(function(){
    $.ajax({
        url: `${link_path}api/order/order_all?user_id=${user}`,
        method: 'GET',
        dataType: 'json',
        success: (data)=>{
            let groupedOrders = {}; // Object to store grouped orders

            // Group orders by status and then by date
            data.data.forEach((order) => {
                const status = order.status.toLowerCase();
                const date = order.date_time.split(" ")[0];
                const orderNumber = order.order_id;

                if (!groupedOrders[status]) {
                    groupedOrders[status] = {};
                }

                if (!groupedOrders[status][date]) {
                    groupedOrders[status][date] = {};
                }

                if (groupedOrders[status][date][orderNumber]) {
                    groupedOrders[status][date][orderNumber].push(order);
                } else {
                    groupedOrders[status][date][orderNumber] = [order];
                }
            });

            // Generate template component for each group
            Object.keys(groupedOrders).forEach((status) => {
                const statusGroup = groupedOrders[status];
                Object.keys(statusGroup).forEach((date) => {
                    const dateGroup = statusGroup[date];
                    const formattedDate = new Date(date).toLocaleDateString('en-US', {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    });
                    let component = `
                        <div class="actions">
                            <span>${formattedDate}</span>
                            <span class="show-btn">hide</span>
                        </div>
                        `;

                    Object.keys(dateGroup).forEach((orderNumber) => {
                        const orders = dateGroup[orderNumber];
                        const orderComponents = orders.map((order) => {
                            return `
                                <div class="order-details-holder row d-flex">
                                    <div class="order-info-img col-md-2 img_">
                                        <img src="./img-prod/${order.filename}" alt="" class="border">
                                    </div>
                                    <div class="order-info col-md-9 py-1">
                                        <div class="order-names">
                                            <span style="color:black"><a href="product-details.html?id=${order.product_id}">${order.name}</a></span>
                                            <span style="color:rgb(85, 81, 81)">Quantity: x${order.quantity}</span>
                                            <span style="color:rgb(85, 81, 81)">Price: ₱ ${order.price}</span>
                                        </div>
                                        <div class="order-stats">
                                            <span><i><b>Subtotal: &nbsp</b></i><span> ₱ ${order.subtotal}</span></span>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                `;
                        });

                        const order = orders[0]; // Take the first order to retrieve order details
                        const status = order.status;
                        
                        component += `
                            <div class="row order-content py-2">
                                <div class="order-holder">
                                    <div class="order_header">
                                        <div class="order_number_holder">
                                            <span>Order Number: <span class="order_number">${orderNumber}</span></span>
                                        </div>
                                        <div class="status_holder">
                                            ${status}
                                        </div>
                                    </div>
                                    ${orderComponents.join('')}
                                    <div class="py-2 order-content total-purchase">
                                        <span class="total"><b>Total Purchase:</b> <span style="color:black">₱ ${order.amount}</span></span>
                                    </div>
                                    <div class="py-2 action-button">
                                        <button class="button cancel_" data-orderid=${order.order_id} ${status != 'Pending' ? 'disabled style="cursor: not-allowed; cursor: -webkit-not-allowed;"' : ''}>Cancel</button>
                                        <button class="button details_" data-orderid=${order.order_id}>Details</button>
                                    </div>
                                </div>
                            </div>`;

                        // Append the generated component to the corresponding content section based on the status
                        if (status.toLowerCase() === 'pending') {
                            $('.pending_products').html(component);
                            
                        } else if (status.toLowerCase() === 'to ship') {
                            $('.ship_products').html(component);
                            
                        } else if (status.toLowerCase() === 'to receive') {
                            $('.receive_products').html(component);
                            
                        } else if (status.toLowerCase() === 'completed') {
                            $('.completed_products').html(component);
                            
                        }
                    });
                    $('.order-mother-container').append(component)
                });
            });
        },
        error: (xhr, status, error) => {
            console.log("AJAX error:", xhr);
            console.log("AJAX error:", error);
            console.log("AJAX error:", status);
        }
    });
});



// ==========================
// ! CANCEL ORDERS
// ==========================

$(document).on('click', '.cancel_', function(e){
    e.preventDefault();
    let order_id = $(this).data('orderid')
    order_id = {
        order_id: order_id,
        user_id: user
    }
    console.log(order_id)
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
            $.ajax({
                url: `${link_path}api/order/order_cancel`,
                method: 'PUT',
                data: JSON.stringify(order_id),
                dataType: 'json',
                success: (data)=>{
                    
                    if(data.type === 'success'){
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top',
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
                            location.reload()
                        }, 1500);
                    }else if(data.type === 'failed'){
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
                            title: data.message
                        })
                        setTimeout(() => {
                            location.reload()
                        }, 1500);
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
                            icon: 'info',
                            title: data.message
                        })
                        setTimeout(() => {
                            location.reload()
                        }, 1500);
                    }
                },
                error: (xhr, status, error) => {
                    console.log("AJAX error:", xhr);
                    console.log("AJAX error:", error);
                    console.log("AJAX error:", status);
                }
            })
            // Swal.fire(
            //     'Deleted!',
            //     'Your order has been cancelled.',
            //     'success'
            // ).then((result1)=>{
            //     if(result1.isConfirmed){
            //         location.reload()
            //     }
            // })
            }
        })
})
// ==========================
// ! DETAILED ORDERS
// ==========================
$(document).on('click', '.details_', function(e){
    e.preventDefault();
    // Get the offset top position of the target div
    let targetOffset = $('.contact-form-head').offset().top;

    // Scroll the window to the target div
    $('html, body').animate({
        scrollTop: targetOffset
    }, 300); // Adjust the animation duration as needed

    let order_id = $(this).data('orderid')
    $('.sample_id').text(order_id)
    $('.details-main').removeClass('d-none'); // Show the details-main element
    $('.purchase-main').hide(); // Hide the form-main element

    $.ajax({
        url: `${link_path}api/order/order_details?id=${order_id}`,
        method: 'GET',
        dataType: 'json',
        success: (data)=>{
            console.log(data)

            let info = data.orderInfo[0]
            let status = data.orderDetails[0].status
            if (!info || Object.keys(info).length === 0) {
                let order_id1 = {
                    order_id: order_id,
                    user_id: user
                };
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
                    title: 'Order nulled, order will be cancelled'
                }).then(()=>{
                    $.ajax({
                        url: `${link_path}api/order/order_cancel`,
                        method: 'PUT',
                        data: JSON.stringify(order_id1),
                        dataType: 'json',
                        success: (data)=>{
                            if(data.type === 'success'){
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top',
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
                                    location.reload()
                                }, 1500);
                            }else if(data.type === 'failed'){
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
                                    title: data.message
                                })
                                setTimeout(() => {
                                    location.reload()
                                }, 1500);
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
                                    icon: 'info',
                                    title: data.message
                                })
                                setTimeout(() => {
                                    location.reload()
                                }, 1500);
                            }
                        },
                        error: (xhr, status, error) => {
                            console.log("AJAX error:", xhr);
                            console.log("AJAX error:", error);
                            console.log("AJAX error:", status);
                        }
                    })
                })

            }
            
            orderDetailsArray = data.orderDetails
            
            // Initialize an empty string to store the product cards HTML
            let productCardsHTML = '';
            let subtotal = 0;
            data.orderInfo.forEach(summary => {
                subtotal += summary.subtotal
            })
            // Loop through the order details array and generate the HTML for each order
            orderDetailsArray.forEach(order => {
                let orderDetails = `
                    <div class="row order-content">
                        <div class="order-holder">
                            <div class="order-details-holder row d-flex">
                                <div class="product_img col-md-2">
                                    <img src="img-prod/${order.filename}">
                                </div>
                                <div class="product_info col-md-9 py-1">
                                    <div class="product_names">
                                        <span style="color:black"><a href="product-details.html?id=">${order.product_name}</a></span>
                                        <span style="color:rgb(85, 81, 81)">${order.cat_name}</span>
                                        <span style="color:rgb(85, 81, 81);">Price: ₱ ${order.price}</span>
                                    </div>
                                    <div class="order_stats">
                                        <span>Quantity: x${order.quantity}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;

                // Append the current order details to the product cards HTML
                productCardsHTML += orderDetails;
            });
            let component = `
            <div class="container px-1 px-md-4 py-5 mx-auto">
                <div class="card">
                    <div class="row d-flex justify-content-between px-3 top">
                        <div class="d-flex">
                            <h5>ORDER <span
                                    class="text-primary font-weight-bold">#${info.order_id}</span>
                            </h5>
                        </div>
                    </div> <!-- Add class 'active' to progress -->
                    <div class="row d-flex justify-content-center">
                        <div class="col-12">
                            <ul id="progressbar" class="text-center">
                                <li class="${status === 'Pending' || status === 'To Ship' || status === 'To Receive' || status === 'Completed' ? 'active step0' : 'step0'}"></li>
                                <li class="${status === 'To Ship'|| status === 'To Receive' || status === 'Completed' ? 'active step0' : 'step0'}"></li>
                                <li class="${status === 'To Receive' || status === 'Completed' ? 'active step0' : 'step0'}"></li>
                                <li class="${status === 'Completed' ? 'active step0' : 'step0'}"></li>
                            </ul>
                        </div>
                    </div>
                    <div class="order-icon-text order-icon">
                        <div class="icon-content d-flex"> 
                            <i class="fas fa-file-alt"></i>
                            <p class="font-weight-bold">Order<br>Processed</p>
                        </div>
                        <div class="icon-content d-flex"> 
                            <i class="fas fa-box"></i>
                            <p class="font-weight-bold">Order<br>Shipped</p>
                        </div>
                        <div class=" d-flex icon-content"> 
                            <i class="fas fa-truck"></i>
                            <p class="font-weight-bold">Order<br>En Route</p>
                        </div>
                        <div class="d-flex icon-content"> 
                            <i class="fas fa-home"></i>
                            <p class="font-weight-bold">Order<br>Arrived</p>
                        </div>
                    </div>
                </div>
                <div class="card-address">
                    <div class="top_level">
                        <i class="fa-solid fa-location-dot"></i> <span>Delivery Address</span>
                        <hr>
                        <!-- ========================== -->
                        <!-- USER ADDRESS -->
                        <!-- ========================== -->
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <div class="user_info">
                                    <span class="user_name" style="font-weight: 700; font-size: 1.3rem; border-bottom:  1px solid rgba(0, 0, 0, 0.125)">${info.firstname} ${info.mi ? `${info.mi}.`:''} ${info.lastname} | (63) ${info.phonenumber}</span> <br> 
                                    <span class="address_dets" style="font-weight: 700;">
                                        <span> ${info.region} | ${info.province} | ${info.city} | ${info.barangay} </span> <br>
                                    </span><br>
                                    <span>${info.description}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-card">
                    <!-- ========================== -->
                    <!-- ORDER DETAILS -->
                    <!-- ========================== -->
                    ${productCardsHTML}
                </div>
                <div class="order-summary">
                    <div class="summary_holder">
                        <div class="name_holder">
                            <span class="subtotal">Subtotal </span>
                            <span class="shipping">Shipping</span>
                            <span class="coupons">Discount</span>
                        </div>
                        <div class="value_holder">
                            <span class="subtotal">₱  ${subtotal} </span>
                            <span class="shipping">₱ ${info.shipping ? `+ ${info.shipping}`:'0'}</span>
                            <span class="coupons"> ₱ ${info.discount ? `- ${info.discount}`:'0'}</span>
                        </div> 
                    </div>
                    <hr>
                    <div class="total_holder">
                        <span class="total">Total</span>
                        <span class="total">₱  ${info.amount}</span>
                    </div>
                </div>
            </div>
            `


            $('.root').html(component)
        },
        error: (xhr, status, error) => {
            console.log("AJAX error:", xhr);
            console.log("AJAX error:", error);
            console.log("AJAX error:", status);
        }
    })
})

$(document).on('click', '.goBack_', function(e){
    e.preventDefault();

    $('.details-main').addClass('d-none'); // Hide the details-main element
    $('.purchase-main').show(); // Show the purchase-main element
});

