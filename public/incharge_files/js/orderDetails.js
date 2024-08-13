console.log('Hello')

const table = $('#myCartTable').DataTable({
    responsive: true,
    columnDefs: [
    { targets: [-1, -3], className: 'dt-body-right' }
    ]
});
$('#myCartTable').addClass('nowrap')

const searchParams = new URLSearchParams(window.location.search);
const order_id = searchParams.get('order_id');

$(document).ready(function(){
    if(!order_id){
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: "Can't edit if no orders selected!",
        footer: '<a href="order-list">Go to order List</a>'
        }).then((result) => {
            if(result.isConfirmed){
                window.location.replace('order-list.html')
                // Reload the content of the element
            }
        });
        $('#submitBTN').prop('disabled', true)
    }else{
        $.ajax({
            url: `${link_path}api/order/order_details?id=${order_id}`,
            method: 'GET',
            dataType: 'json',
            success: (data)=>{
                console.log(data)
                let info = data.orderInfo[0];
                
                let details = data.orderDetails[0];
                // console.log(data.orderDetails)
                // ==========================
                // HEADER LAYOUT
                // ==========================
                $('#order-id').text(info.order_id)
                $('.order-id').val(info.order_id)
                $('.order-id').attr('value', info.order_id)
                $('.order-created').text(`${info.date_time.split(' ')[0]} at ${info.date_time.split(' ')[1]}`)
                $('.order-name').text(`${info.firstname} ${info.mi ? `${info.mi}`:``} ${info.lastname}`)
                $('.order-email').text(info.email)
                $('.order-contact').text(info.phonenumber)
                // ==========================
                // DELIVERY ADDRESS LAYOUT
                // ==========================
                $('.order-region').text(info.region)
                $('.order-province').text(info.province)
                $('.order-city').text(info.city)
                $('.order-barangay').text(info.barangay)
                $('.order-detailed').text(info.description)
                $('.order-method').html(`<b>${info.method}</b> (${info.pay_status})`)
                // Get the select element
                const selectElement = document.querySelector(".optionValue");
                let total = 0
                $.each(data.orderDetails, (i, key)=>{
                    total += parseInt(key.quantity)
                })
                $('.order-quantity').val(total)
                $('.order-quantity').attr('value', total)
                // Set the selected option based on the info.status value
                if (info.status === "Pending") {
                selectElement.value = "Pending";
                $('.optionValue option:first').remove();
                } else if (info.status === "To Ship") {
                selectElement.value = "To Ship";
                $('.optionValue option:first').remove();
                } else if (info.status === "To Receive") {
                selectElement.value = "To Receive";
                $('.optionValue option:first').remove();
                } else if (info.status === "To Pay") {
                selectElement.value = "To Pay";
                $('.optionValue option:first').remove();
                } else if (info.status === "Completed") {
                selectElement.value = "Completed";
                $('.optionValue option:first').remove();
                }

                let subtotal = 0, shipping = 0, discount = 0, totalOrder = 0
                // ==========================
                // ORDER SUMMARY
                $.each(data.orderDetails, (i, key)=>{
                    let component = `
                        <tr>
                            <td>
                                <img src="../img-prod/${key.filename}" class="avatar rounded lg" alt="${key.name}">
                            </td>
                            <td>
                                <h6 class="title">${key.product_name} <span class="d-block fs-6 text-primary">${key.brand}</span></h6>
                            </td>
                            <td>
                                ${key.quantity}
                            </td>
                            <td>
                                <p class="price">${key.price}</p>
                            </td>
                        </tr>
                    `
                    table.row.add($(component)).draw();
                    // ==========================
                    totalOrder = info.amount
                    let prodTotal = info.price * info.quantity
                    subtotal += prodTotal
                    shipping = info.shipping
                    discount = info.discount

                })
                console.log(shipping)
                console.log(totalOrder)
                $('.oder-total').text(totalOrder.toFixed(2))
                $('.order-subtotal').text(subtotal.toFixed(2))
                $('.order-shipping').text(shipping)
                $('.order-discount').text(discount.toFixed(2))
                
            },
            error: (xhr, status, error) => {
                console.log("AJAX error:", xhr);
                console.log("AJAX error:", error);
                console.log("AJAX error:", status);
            }
        })
    }

})

$(document).ready(function() {
    $('.updateStatus').on('submit', function(e) {
    e.preventDefault();

    // Get the selected value
    const selectedValue = $('.optionValue').val();
    console.log(selectedValue);

    let order_ids = {
        order_id: order_id,
        status: selectedValue
    };

    $.ajax({
        url: `${link_path}api/order/status`,
        method: 'PUT',
        dataType: 'json',
        data: JSON.stringify(order_ids),
        success: (data) => {
            console.log(data);
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
                    location.reload();
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
    });
    });
});