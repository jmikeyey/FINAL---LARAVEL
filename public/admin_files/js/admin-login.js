
$(document).ready(function() {
    $('.login-form').on('submit', (e) => {
        e.preventDefault();
        let users = $('#reg-email').val();
        let pass = $('#reg-pass').val();
        $.ajax({
            url: `${link_path}api/login/check_users?pass=${pass}&user=${users}`,
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                // console.log(data);
                // console.log(data.msg)
                // console.log(data.data.usertype)
                if (data.msg === "success") {
                    if(data.data.usertype !== 'admin'){
                        $.ajax({
                            url: 'http://127.0.0.1:8000/api/logoutAdmin',
                            method: 'GET',
                            success: (data)=>{
                                console.log('success')
                            },
                            complete: ()=>{
                                Cookies.remove('admin_name')
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Not an Admin',
                                    toast: true,
                                    position: 'top',
                                    showConfirmButton: false,
                                    timer: 2000,
                                    timerProgressBar: true
                                })
                                setTimeout(() => {
                                    location.reload();
                                }, 2000); 
                            }
                        })
                        return;
                    }
                    let acc_id = data.data.user_id;
                    console.log(acc_id);
                    Cookies.set('admin_name', acc_id, { expires: 8 / 24 }); // Set expiry to 4 hours (4/24 of a day)
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
                        window.location.replace("/admin")
                    }, 2000);      
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

    let user = Cookies.get("admin_name");

    if (user) {
        // Cookie is not empty
        console.log("User logged in");
        location.replace('/admin/')
    }
}) 



