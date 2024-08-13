


$(document).ready(function(){
    const table = $('#myProjectTable').DataTable( {
        responsive: true,
        columnDefs: [
            { targets: [-1, -3], className: 'dt-body-right' }
        ]
    });
    const searchParams = new URLSearchParams(window.location.search);
    let user_id = searchParams.get('id');
    console.log(user_id)
    if(!user_id){
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: "Can't proceed if no customers selected!",
        footer: '<a href="customers">Go to customers List</a>'
        }).then((result) => {
            if(result.isConfirmed){
                window.location.replace('customers')
                // Reload the content of the element
            }
        });
        $('#submitBTN').prop('disabled', true)
    }else{
        $.ajax({
            url: `${link_path}api/customer/solo?user_id=${user_id}`,
            method: 'GET',
            dataType: 'json',
            success: (data)=>{
                let details = data[0].data;
                let info = data[0].info[0]
                console.log(details)
                console.log(info)
                // //========================
                const birthdate = new Date(info.birthdate);
                const today = new Date();
                const ageInMillis = today - birthdate;
                const ageInYears = Math.floor(ageInMillis / (365.25 * 24 * 60 * 60 * 1000));

                const birthdates = info.birthdate; // Assuming info.birthdate is a valid date string

                const dateObj = new Date(birthdates);
                const formattedDate = dateObj.toLocaleDateString('en-US', {
                month: 'long',
                day: 'numeric',
                year: 'numeric'
                });
                //========================
                $('.user-id').text(info.user_id)
                $('.user-name').text(`${info.firstname} ${info.lastname}`)
                $('.user-small-info').text(ageInYears + ' years old')
                $('.user-phone').text('(+63) '+info.phonenumber)
                $('.user-email').text(info.email)
                $('.user-bday').text(formattedDate)
                $('.user-location').text(`${info.barangay}, ${info.city}, ${info.province}`)
                
                $('.order-barangay').text(info.barangay)
                $('.order-city').text(info.city)
                $('.order-province').text(info.province)
                $('.order-phone').text(info.phone_number)
                $('.profile_img').append(`<img src="../img-user/${info.profile_img}" alt class="avatar xl rounded img-thumbnail shadow-sm">`)
                let total_purchase_amount = 0, total_items  = 0
                let previousOrderId = null;
                $.each(details, (i, key) => {
                    const paymentDate = new Date(key.payment_date);
                    const formattedDate = paymentDate.toLocaleDateString('en-US', {
                        month: 'long',
                        day: 'numeric',
                        year: 'numeric'
                    });

                    let component = `
                    <tr>
                        <td><a href="order-details?order_id=${key.order_id}"><strong>#Order-${key.order_id}</strong></a></td>
                        <td style='width: 300px'><img src="../img-prod/${key.filename}" class="avatar lg rounded me-2" alt="profile-image"><span>${key.name} </span></td>
                        <td>${key.method}</td>
                        <td>${formattedDate}</td>
                        <td>
                            ₱ ${key.amount}
                        </td>
                    </tr>
                    `
                    table.row.add($(component)).draw();
                    total_purchase_amount += key.amount
                    total_items += key.quantity;
                })
                let average = total_purchase_amount / total_items;
                $('.total-purchase').text('₱ ' + total_purchase_amount)
                $('.total-ave').text('₱ '+average)

                console.log(total_purchase_amount)
            },
            error: (xhr, status, error) => {
                console.log("AJAX error:", xhr);
                console.log("AJAX error:", error);
                console.log("AJAX error:", status);
            }
        })
    }

})