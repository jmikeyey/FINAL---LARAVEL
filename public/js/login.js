console.log('hello');
const link_path = 'http://127.0.0.1:8000/';

$(document).ready(function() {
    $('.login-form').on('submit', (e) => {
        e.preventDefault();
        let user = $('#reg-email').val();
        let pass = $('#reg-pass').val();
        $.ajax({
            url: `${link_path}api/login/check_users?pass=${pass}&user=${user}`,
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                console.log(data);
                
                if (data.msg === "success") {
                    let acc_id = data.data.user_id;
                    if(data.data.usertype === 'admin'){
                        Cookies.set('admin_name', acc_id, { expires: 4 / 24 }); // Set expiry to 4 hours (4/24 of a day)
                        Cookies.set('username', user);
                        Swal.fire({
                            icon: 'success',
                            title: data.prompt,
                            toast: true,
                            position: 'top',
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true
                        })
                        setTimeout(() => {
                            window.location.replace("/admin")
                        }, 2000);  
                    }else if(data.data.usertype === 'staff'){
                        Cookies.set('admin_name', acc_id, { expires: 4 / 24 }); // Set expiry to 4 hours (4/24 of a day)
                        Cookies.set('username', user);
                        Cookies.set('user_type', data.usertype)
                        Swal.fire({
                            icon: 'success',
                            title: data.prompt,
                            toast: true,
                            position: 'top',
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true
                        })
                        setTimeout(() => {
                            window.location.replace("/incharge/order-list")
                        }, 2000);  
                    }else{
                        console.log(acc_id);
                        Cookies.set('name', acc_id, { expires: 4 / 24 }); // Set expiry to 4 hours (4/24 of a day)
                        Cookies.set('username', user);
                        Cookies.set('password', pass)
                        console.log("logging in")
                        // ==========================
                        // Show toast success using SweetAlert23
                        // ==========================
                        Swal.fire({
                            icon: 'success',
                            title: data.prompt,
                            toast: true,
                            position: 'top',
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true
                        })
                        setTimeout(() => {
                            window.location.replace("/")
                        }, 2000);   
                    }
                } else {    
                    Swal.fire({
                        icon: 'error',
                        title: `${data.prompt}`,
                        timer: 1500
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
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
// ==========================
// user profile
// ==========================
let user = Cookies.get("name");
if (!user || user.trim() === "") {
    console.log("not logged in again")
    let component1 = `
    <li>
        <a href="/login" style="border-bottom: 2px solid #0167f3;">Sign In</a>
    </li>
    <li>
        <a href="/register" >Register</a>
    </li>
    `
    $('.user_').append(component1)
}
$('.google_login').on('click', (e)=>{
  e.preventDefault();
  console.log('google')
})

function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
  console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
  console.log('Name: ' + profile.getName());
  console.log('Image URL: ' + profile.getImageUrl());
  console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
}