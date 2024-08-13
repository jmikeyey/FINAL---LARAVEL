let searchparams = new URLSearchParams(window.location.search);
let id = searchparams.get('user_id')
console.log(id)
// ==========================
// UPDATING PASSWORD
// ==========================

$(document).ready(function(){
    let users = Cookies.get('name');
    $('#user-id').val(users)
    $('.form_changePass').on('submit', function(e){
        e.preventDefault();
        let value = $(this).serialize();
        console.log(value)
        $.ajax({
            url: `${link_path}api/user/user_pass`,
            data: value,
            dataType: 'json',
            method: 'POST',
            success: (data)=>{
                if(data.type === 'success'){
                    Swal.fire({
                        icon: 'success',
                        title: data.message,
                        timer: 1500
                    }).then((result) => {
                        if(result.isConfirmed){
                            location.reload();
                        }
                    });
                }else if(data.type === 'incorrect'){
                    Swal.fire({
                        icon: 'error',
                        title: data.message,
                        timer: 1500
                    }).then((result) => {
                        if(result.isConfirmed){
                            location.reload();
                        }
                    });
                }else if(data.type === 'samePassword'){
                    Swal.fire({
                        icon: 'error',
                        title: data.message,
                        timer: 1500
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
})
// ==========================
// password checker
// ==========================
$(document).ready(()=>{
    let cur = false;
    let newP = false;
    let conf = false;
    $('#current-password').on('input', function() {
        const curPass = $('#current-password').val();
        const newPass = $('#new-password').val();
        const confirmPass = $('#confirm-password').val();

        
        if (curPass.length < 6) {
            $('.curMsg').text("Password must be at least 6 characters.");
            cur = false;
        }else{
            $('.curMsg').text(" ");
            cur = true;
            
        }

        updateSubmitButton()
    });
    $('#new-password').on('input', function() {
        const newPass = $('#new-password').val();
        
        if(newPass.length < 6){
            $('.newMsg').text("Password must be at least 6 characters.");
            newP = false;
        }else{
            $('.newMsg').text(" ");
            newP = true;
        }

        updateSubmitButton()
    });
    $('#confirm-password').on('input', function() {
        const newPass = $('#new-password').val();
        const confirmPass = $('#confirm-password').val();

        if(confirmPass != newPass){
            $('.confMsg').text("Password does not match.");
            conf = false
        }else{
            $('.confMsg').text(' ')
            conf = true
        }
        updateSubmitButton()
    });
    function updateSubmitButton() {
        if (cur && newP && conf) {
            $('.submit-btn').prop('disabled', false);
        } else {
            $('.submit-btn').prop('disabled', true);
        }
    }
})