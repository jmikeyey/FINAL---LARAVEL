let searchparams = new URLSearchParams(window.location.search);
let id = searchparams.get('user_id')
console.log(id)

$(document).ready(function(){
    $.ajax({
        url: `${link_path}api/user/user_get?id=${id}`,
        method: 'GET',
        dataType: 'json',
        success: (data) => {
            let info = data.data[0];
            console.log(data)
            let fname = $('.uFname');
            let lname = $('.uLname');
            let mi = $('.uMi');
            let email = $('.uEmail');
            let phone = $('.uNumber');
            let dob = $('.uDob');

            fname.val(info.firstname);
            lname.val(info.lastname);
            if(info.mi){
                // middle name have value
                mi.val(info.mi)
            }else{
                mi.prop('placeholder', 'N/A')
            }
            email.val(info.email)
            phone.val(info.phonenumber)
            dob.val(info.birthdate)
            if(info.gender === 'Male'){
                $('input[type="radio"][name="radio"][value="' + info.gender + '"]').prop('checked', true);
            }else if(info.gender === 'Female'){
                $('input[type="radio"][name="radio"][value="' + info.gender + '"]').prop('checked', true);
            }else if(info.gender === 'Rather not to say'){
                $('input[type="radio"][name="radio"][value="' + info.gender + '"]').prop('checked', true);
            }

        },
        error: (xhr, status, error) => {
            console.log("AJAX error:", xhr);
            console.log("AJAX error:", error);
            console.log("AJAX error:", status);
        }
    })
})

let users = Cookies.get('name');
console.log(users)
$(document).ready(function(){
    $('.user_id').val(users)
    $('#form_info').on('submit', function(e){
        e.preventDefault();
        let formData = new FormData(document.getElementById('form_info'));
        let leng1 = $('.uMi').val().length
        console.log(leng1)
        if(leng1 > 2){ //only 2 letters are acceptable ==========================
            console.log('2')
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
                title: 'Two letters max in Middle Initial'
            })
            $('.uMi').css('border', 0)
            $('.uMi').css('border', '2px solid hsl(0, 94%, 61%)')
            setTimeout(() => {
                $('.uMi').css('border', 0)
                $('.uMi').css('border', '2px solid hsl(236, 92%, 66%)')
            }, 3000);
        }else{
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
