const link_path = 'http://127.0.0.1:8000/';

let user = Cookies.get("name");
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
            var listItem = $("<li>").append($("<a>").attr("href", `product-grids?cat_id=${key.id}`).text(categoryName));
            $(".sub-category").append(listItem);
        })
    },
    error: (xhr, status, error) => {
        console.log("AJAX error:", error);
    }
})

if (!user || user.trim() === "") {
    console.log("not logged in again")
    let component1 = `
    <li>
        <a href="/login">Sign In</a>
    </li>
    <li>
        <a href="/register" style="border-bottom: 2px solid #0167f3;">Register</a>
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
$(document).ready(function(){
    $('#reg-form').on('submit', function(e){
        e.preventDefault();
        // Disable the submit button
        const submitButton = $(this).find('button[type="submit"]');
        submitButton.prop('disabled', true);
        submitButton.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...');

        // Get form input values
        const password = $('#reg-pass').val();
        const confirmPassword = $('#reg-pass-confirm').val();
        const gender = $('#reg-gender').val().toLowerCase();
        const phoneNumber = $('#reg-phone').val();

        // Check if password and confirm password match
        if (password !== confirmPassword) {
            Swal.fire({
                icon: 'error',
                title: 'Password Confirmation Failed',
                text: 'The password and confirm password do not match.',
            });

            // Re-enable the submit button and restore its text
            submitButton.prop('disabled', false);
            submitButton.html('SIGN IN');
            return;
        }

        // Check phone number length
        if (phoneNumber.length < 10 || phoneNumber.length > 11) {
            Swal.fire({
                icon: 'error',
                title: 'Invalid Phone Number',
                text: 'Please enter a valid phone number (10 to 11 digits).',
            });

            // Re-enable the submit button and restore its text
            submitButton.prop('disabled', false);
            submitButton.html('SIGN IN');
            return;
        }

        const form_data = new FormData(document.getElementById('reg-form'));
        $.ajax({
            url: `${link_path}api/user/user_addCust`,
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
                            location.replace('/login');
                        }
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: `${res.message}`,
                    })
                }
            },
            error: (errorThrown) => {
                console.log(errorThrown);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An error occurred while processing your request.',
                });
            },
            complete: () => {
                // Re-enable the submit button and restore its text
                submitButton.prop('disabled', false);
                submitButton.html('SIGN IN');
            }
        });
    });
});
