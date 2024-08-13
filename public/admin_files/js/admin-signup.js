const link_path = 'http://localhost/itp11/FINAL%20FINAL%20FINALS/main/';

$(document).ready(function(){
    $('.reg-form').on('submit', function(e){
        e.preventDefault();
        // Disable the submit button
        const submitButton = $(this).find('button[type="submit"]');
        submitButton.prop('disabled', true);
        submitButton.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...');

        const phoneNumberInput = $('input[name="number"]');
        const genderInput = $('input[name="gender"]');

        const phoneNumber = phoneNumberInput.val();
        const gender = genderInput.val();

        // Validate phone number
        if (phoneNumber.length !== 10) {
            Swal.fire({
                icon: 'error',
                title: 'Invalid Phone Number',
                text: 'Please enter a 10-digit phone number.',
            }).then(() => {
                // Re-enable the submit button and restore its text
                submitButton.prop('disabled', false);
                submitButton.html('SIGN IN');
            });
            return;
        }

        // Validate gender
        if (gender !== 'Male' && gender !== 'Female') {
            Swal.fire({
                icon: 'error',
                title: 'Invalid Gender',
                text: 'Please enter either "Male" or "Female" for the gender field.',
            }).then(() => {
                // Re-enable the submit button and restore its text
                submitButton.prop('disabled', false);
                submitButton.html('SIGN IN');
            });
            return;
        }

        const form_data = new FormData(document.getElementById('reg-form'));
        $.ajax({
            url: `${link_path}api/user/user_add.php`,
            method: 'POST',
            dataType: 'json',
            data: form_data,
            contentType: false,
            processData: false,
            success: (res) => {
                console.log(res.message);
                console.log(res);
                if (res.type === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: `${res.message}`,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.replace('auth-signin.html');
                        }
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: `${res.message}`,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                }
            },
            error: (errorThrown) => {
                console.log(errorThrown);
            },
            complete: () => {
                // Re-enable the submit button and restore its text
                submitButton.prop('disabled', false);
                submitButton.html('SIGN IN');
            }
        });
    });
});
