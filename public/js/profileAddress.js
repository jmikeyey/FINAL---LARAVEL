let searchparams = new URLSearchParams(window.location.search);
let id = searchparams.get('user_id')
$(document).ready(function(){
    $.ajax({
        url: `${link_path}api/user/user_get?id=${id}`,
        method: 'GET',
        dataType: 'json',
        success: (data) => {
            let info = data;
            $('#user-name').val(info.username)
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
            $.each(data.data, (i, key)=>{
                let component = `
                    <div class="user-info col-md-11 " >
                        <div class="address-container " style="color: #696969;">
                            <div class="address-content" col-md-8>
                                <div class="address-personal">
                                    <h5><span id="user-name" style="font-weight: bold">${key.firstname} ${key.lastname}</span> | ${key.phone_number}</h5>
                                    <p> <span>${key.region},</span> <span>${key.province},</span> <span>${key.city},</span> <span>${key.barangay}</span></p>
                                </div>
                                <div class="address-details">
                                    <p>${key.description}</p>
                                    <div class="btn_group">
                                        <span class="add_label">${key.label === 'Home' ? 'Home': 'Work'}</span> ${key.is_default === 'default' ? '<span class="is_default">Default</span>':''}
                                    </div>
                                </div>
                            </div>
                            <div class="address-button col-md-3">
                                <div class="actionHolder">
                                    <a href="" id="editAddress" data-toggle="modal" data-target="#editAddressModal" data-id=${key.address_id}>Edit</a>
                                    <a href="" id="deleteAddress" data-id=${key.address_id}>Delete</a>
                                </div>
                                <div class='buttonHolder'>
                                    ${key.is_default === 'default' ? "<button class='button_'  disabled>Set as Default</button>": `<button class='button_'  data-id=${key.address_id}>Set as Default</button>`}
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                `
                $('.add_info').append(component)
            })

        },
        error: (xhr, status, error) => {
            console.log("AJAX error:", xhr);
            console.log("AJAX error:", error);
            console.log("AJAX error:", status);
        }
    })
})
// ==========================
// ! EDIT ADDRESS VALUES
// ==========================
$(document).on('click', '#editAddress', function(){
    let addID = $(this).data('id');
    console.log(addID);
    $('#add_id').val(addID)
    $.ajax({
        url: `${link_path}api/address/add_solo?addID=${addID}&userID=${user}`,
        dataType: 'json',
        method: 'GET',
        success: (data)=>{
            console.log(data);
            let info = data.data[0];
            $('#num').val(info.phone_number);
            $('#region').val(info.region).trigger('change');
            $('#province').val(info.province).trigger('change');
            $('#city').val(info.city).trigger('change');
            $('#barangay').val(info.barangay); 
            $("#detailed").val(info.description)
            
            // Remove 'active' class from all labels
            $('label.btn-outline-primary').removeClass('active');
            
            // Check the appropriate radio button based on info.label
            if (info.label === 'Home') {
                $('#option12').prop('checked', true);
                $('#option12').closest('label').addClass('active');
            } else if (info.label === 'Work') {
                $('#option22').prop('checked', true);
                $('#option22').closest('label').addClass('active');
            }
            
        },
        error: (xhr, status, error) => {
            console.log("AJAX error:", xhr);
            console.log("AJAX error:", error);
            console.log("AJAX error:", status);
        }
    });
});
// ==========================
// ! ADD ADDRESS
// ==========================
$(document).ready(function(){
    $('#form_add').on('submit', function(e){
        e.preventDefault();
        $('.add_form_btn').prop('disabled', true)
        let options = $('input[name="options"]:checked').val();
        let region = $('#add_region').val();
        let province = $('#add_province').val();
        let city = $('#add_city').val();
        let barangay = $('#add_barangay').val();
        let phone = $('#add_num').val();
        let detailedLoc = $('#detailedLoc').val();
        let isChecked = $('#customCheck1').is(':checked');
        let defaultValue = isChecked ? 'default' : 'not';

        // conditions
        if (!region || !province || !city || !barangay) {
            // Show an error message or perform any required action
            alert('Please select a value for all address fields');
            return;
        }
        if (!options) {
            // Show an error message or perform any required action
            alert('Please select an option (Home/Work)');
            return;
        }
        // ==========================
        // OBJECT DATA
        // ==========================
        let addressData = { 
            options: options,
            region: region,
            province: province,
            city: city,
            barangay: barangay,
            phone: phone,
            detailedLoc: detailedLoc,
            defaultValue: defaultValue,
            user: user
        };
        // Rest of your code to handle the form submission

        // AJAX SUBMISSION
        $.ajax({
            url: `${link_path}api/address/add_post`,
            method: 'POST',
            data: addressData,
            dataType: 'json',
            success: (data)=>{
                console.log(data)
                if(data.messageType === 'success'){
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
                        location.reload()
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
    });
});
// ==========================
// ! EDIT ADDRESS
// ==========================
$(document).ready(function(){
    $('#editAddressForm').on('submit', function(e){
        e.preventDefault();

        let options = $('.editOptions input[name="options"]:checked').val();
        let region = $('#region').val();
        let province = $('#province').val();
        let city = $('#city').val();
        let barangay = $('#barangay').val();
        let phone = $('#num').val();
        let detailedLoc = $('#detailed').val();
        let add_id = $('#add_id').val();
        // ==========================
        // OBJECT DATA
        // ==========================
        let addressData = { 
            add_id: add_id,
            options: options,
            region: region,
            province: province,
            city: city,
            barangay: barangay,
            phone: phone,
            detailedLoc: detailedLoc,
            user: user
        };
        console.log(addressData)

        $.ajax({
            url: `${link_path}api/address/add_put`,
            method: 'PUT',
            data: JSON.stringify(addressData),
            dataType: 'json',
            success: (data)=>{
                console.log(data)
                if(data.messageType === 'success'){
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
})
// ==========================
// ! DELETE ADDRESS
// ==========================
$(document).on('click', '#deleteAddress', function(e){
    e.preventDefault()
    let addID = $(this).data('id');
    console.log(addID);
    let data = {
        addID: addID
    }
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
            Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
            ).then((result1)=>{
                if(result1.isConfirmed){
                    location.reload();
                }
            })
            $.ajax({
                url: `${link_path}api/address/add_del`,
                method: 'DELETE',
                data: JSON.stringify(data),
                dataType: 'json',
                success: (data)=>{
                    console.log(data)
                },
                error: (xhr, status, error) => {
                    console.log("AJAX error:", xhr);
                    console.log("AJAX error:", error);
                    console.log("AJAX error:", status);
                }
            })
        }
    })
    
})

// ==========================
// ! SET DEFAULT ADDRESS
// ==========================
$(document).on('click', '.button_', function(e){
    e.preventDefault();
    let addID = $(this).data('id');
    $.ajax({
        url: `${link_path}api/address/add_edit`,
        method: 'PUT',
        dataType: 'json',
        data: JSON.stringify({ selectedAddressId: addID, user: user }),
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
                    title: 'Default address changed'
                })
                setTimeout(() => {
                    location.reload()
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
                    title: 'No change'
                })
            }
        },
        error: (xhr, status, error) => {
            console.log("AJAX error:", xhr);
            console.log("AJAX error:", error);
            console.log("AJAX error:", status);
        }
    })
})