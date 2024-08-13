const searchParams = new URLSearchParams(window.location.search);
const order_id = searchParams.get('order_id');

$(document).ready(function(){
    if(!order_id){
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: "Can't view if no invoice selected!",
        footer: '<a href="order-invoice">Go to invoice List</a>'
        }).then((result) => {
            if(result.isConfirmed){
                window.location.replace('order-invoice')
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
                console.log(data.orderInfo)
                let date = data.orderInfo[0].payment_date.split(' ')[0]

                let details = data.orderDetails;
                console.log(details)
                let info = data.orderInfo[0];
                const paymentDate = new Date(date);
                const formattedDate = paymentDate.toLocaleDateString('en-US', {
                    month: 'long',
                    day: 'numeric',
                    year: 'numeric'
                });

                $('.order-date').text(formattedDate)
                $('.order-id').text(info.order_id)
                $('.order-name').text(`${info.firstname} ${info.mi ? `${info.mi}`:``} ${info.lastname}`)
                $('.order-barangay').text(info.barangay)
                $('.order-location').text(`${info.city}, ${info.province}`)
                $('.order-email').text(info.email)
                $('.order-phone').text(info.phonenumber)

                let total = 0
                $.each(details, (i, key)=>{
                    console.log(key.subtotal)
                    total += parseInt(key.subtotal)
                })
                console.log(total)
                $('.subtotal').text('₱ ' +total)
                $('.total').text('₱ ' +info.amount)
                $('.discount').text('₱ ' +details[0].discount)
                $('.shipping').text('₱ ' +details[0].shipping)
                
                $.each(details, function(i, key){
                    console.log(key.subtotal)
                    let component = `
                    <tr>
                        <td class="text-center">${i}</td>
                        <td>${key.product_name}</td>
                        <td>${key.brand}</td>
                        <td class="text-end">₱${key.price}</td>
                        <td class="text-center">${key.quantity}</td>
                        <td class="text-end">₱${(key.subtotal)}</td>
                    </tr>
                    `
                    $('.data-body').append(component)
                })
            },
            error: (xhr, status, error) => {
                console.log("AJAX error:", xhr);
                console.log("AJAX error:", error);
                console.log("AJAX error:", status);
            }
        })
    }

    $('.send-mail').on('click', function(e){
        e.preventDefault();
        var $button = $(this);
    
        $button.prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Sending...');
    
        var invoice = $('#invoice-body').html();
        var invoiceContent = `${invoice}`;
        let emailReceiver = $('.order-email').text();
        $.ajax({
            type: "POST",
            url: `${link_path}api/send-email`, // Use the URL defined in your routes
            data: { invoice: invoiceContent, emailReceiver: emailReceiver },
            dataType: "json",
            success: function(response) {
                console.log(response.message); // Log success message
                // Handle success (e.g., show success notification)
                if(response.success){
                    Swal.fire({
                    icon: "success",
                    title: response.message,
                    showConfirmButton: false,
                    timer: 1500
                    });
                }else{
                    Swal.fire({
                        icon: "error",
                        title: response.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            },
            complete: function() {
                $button.prop('disabled', false).html('<i class="fa fa-paper-plane-o"></i> Send Invoice');
            },
            error: function(xhr, status, error) {
                console.log("AJAX error:", xhr);
                console.log("AJAX error:", error);
                console.log("AJAX error:", status);
                // Handle error (e.g., show error notification)
            }
        });
    });
    

})