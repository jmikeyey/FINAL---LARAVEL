$(document).ready(function(){
    let admin_id =Cookies.get('admin_name');
    console.log(admin_id)
    $('.user_id').val(admin_id)
    $.ajax({
        url: `${link_path}api/admin/get?user_id=${admin_id}`,
        method: 'GET',
        dataType: 'json',
        success: (data)=>{
            console.log(data)
            let info = data.data;

            let fname = $('.uFname');
            let lname = $('.uLname');
            let email = $('.uEmail');
            let phone = $('.uNumber');
            let dob = $('.uDob');

            fname.val(info.firstname);
            lname.val(info.lastname);
            email.val(info.email)
            phone.val(info.phonenumber)
            dob.val(info.birthdate)

            const birthdate = info.birthdate; 
            const dateObj = new Date(birthdate);
            const formattedDate = dateObj.toLocaleDateString('en-US', {
            month: 'long',
            day: 'numeric',
            year: 'numeric'
            });

            const today = new Date();
            const birthdateObj = new Date(birthdate);

            const ageInMilliseconds = today - birthdateObj;
            const ageInYears = Math.floor(ageInMilliseconds / (365.25 * 24 * 60 * 60 * 1000));
            let image = `
            <img src="../img-user/${info.profile_img ? `${info.profile_img}`:`default.jpg`}" alt class="avatar xl rounded img-thumbnail shadow-sm">
            `
            const password = info.password; // Assuming info.password is a string

            const maskedPassword = password.slice(0, 2) + '*'.repeat(password.length - 2);
            
            // ===================
            $('.admin_id').text(info.user_id);
            $('.admin_name').text(`${info.firstname} ${info.mi ? `${info.mi}`:``} ${info.lastname}`)
            $('.admin_age').text(ageInYears)
            $('.admin_phone').text(info.phonenumber)
            $('.admin_email').text(info.email);
            $('.admin_birthday').text(formattedDate)
            $('.admin_image').append(image)
            $('.admin_user').text(info.username)
            $('.admin_pass').text(maskedPassword);
            $('#user_name').val(info.username)
            $('#user_id').val(info.user_id)
        },
        error: (xhr, status, error) => {
            console.log("AJAX error:", xhr);
            console.log("AJAX error:", error);
            console.log("AJAX error:", status);
        }
    })

    $('.updatePass').on('submit', function(e){
        e.preventDefault();
        let data = $(this).serialize();
        console.log(data)
        $.ajax({
            url: `${link_path}api/user/user_pass`,
            method: 'POST',
            data: data,
            dataType: 'json',
            success: (data) => {
                console.log(data)
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
                }else if(data.type === 'incorrect'){
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
                }else{
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top',
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
                        title: data.message
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

    $('#form_info').on('submit', function(e){
        e.preventDefault();
        let formData = new FormData(document.getElementById('form_info'));
        console.log(formData)

        $.ajax({
            url: `${link_path}api/user/user_edit`,
            method: 'POST',
            dataType: 'json',
            data: formData,
            contentType: false,
            processData: false,
            success: (data)=>{
                console.log(data)
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
            },
            error: (xhr, status, error) => {
                console.log("AJAX error:", xhr);
                console.log("AJAX error:", error);
                console.log("AJAX error:", status);
            }
        })
        

    })
})
