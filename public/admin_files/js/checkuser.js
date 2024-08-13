const link_path = 'http://127.0.0.1:8000/';

let user = Cookies.get("admin_name");

if (!user) {
    // Cookie is empty or does not exist
    console.log("User not logged in");
    // location.replace("auth-signin.html");
    location.replace('http://127.0.0.1:8000/clear')
    Cookies.remove('admin_name')
} else {
    // Cookie is not empty
    console.log("User logged in");
    $.ajax({
        url: `${link_path}api/login/get_user?id=${user}`,
        method: 'GET',
        dataType: 'json',
        success: (data) => {
            console.log(data);
            let info = data.data[0];
            // Continue with the rest of your code
            let image = `
                <img class="avatar lg rounded-circle img-thumbnail pulse " src="../img-user/${info.profile_img}" alt="a profile picture of ${info.firstname}">
                <span class="pulse-ring"></span>
            `
            let profile_nav = `
                <div class="card-body pb-0">
                    <div class="d-flex py-1">
                        <img class="avatar rounded-circle" src="../img-user/${info.profile_img}" alt="a profile picture of ${info.firstname}">
                        <div class="flex-fill ms-3">
                            <p class="mb-0"><span class="font-weight-bold "></span></p>
                            <small class>${info.email}</small>
                        </div>
                    </div>
                    
                    <div><hr class="dropdown-divider border-dark"></div>
                </div>
                <div class="list-group m-2 ">
                    <a href="/admin/profile" class="list-group-item list-group-item-action border-0 "><i class="icofont-ui-user fs-5 me-3"></i>Profile Page</a>
                    <a href="/admin/order-invoice" class="list-group-item list-group-item-action border-0 "><i class="icofont-file-text fs-5 me-3"></i>Order Invoices</a>
                    <a href="#" onclick='logout()' class="list-group-item list-group-item-action border-0 "><i class="icofont-logout fs-5 me-3"></i>Signout</a>
                </div>
            `
            $('.profile-nav').append(profile_nav)
            // ==============================
            $('.profile-image').append(image)
            $('.admin-name').text(info.firstname)
            $('.admin-name').css('display', 'flex')
            $('.admin-name').css('justify-content', 'center')
        },
        error: (xhr, status, error) => {
            console.log("AJAX error:", xhr);
            console.log("AJAX error:", error);
            console.log("AJAX error:", status);
        }
    });
}
function logout(){
    $.ajax({
        url: 'http://127.0.0.1:8000/api/logoutAdmin',
        method: 'GET',
        success: (data)=>{
            console.log('success')
        },
        complete: ()=>{
            Cookies.remove('admin_name')
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
                title: 'Logout succesfully!'
            })
            setTimeout(() => {
                location.replace('/login')
            }, 1500);
        }
    })

    
}

//             if (data1.usertype !== 'admin') {
//                 location.replace("auth-signin.html");
//                 Cookies.remove("name");
//             }
// location.replace("auth-signin.html");