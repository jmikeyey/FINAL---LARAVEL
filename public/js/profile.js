const link_path = 'http://127.0.0.1:8000/';

let user = Cookies.get("name");

$('.profile-name a').attr('href', `profile?user_id=${user}`);

$('.profile_link').attr('href', `profile?user_id=${user}`);
$('.add_link').attr('href', `profile-add?user_id=${user}`);
$('.change_link').attr('href', `profile-change?user_id=${user}`)
$('.purchase_link').attr('href', `profile-purchase?user_id=${user}`)
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
        <a href="/register">Register</a>
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
    let id = Cookies.get('name')
    $.ajax({
        url: `${link_path}api/user/user_get?id=${id}`,
        method: 'GET',
        dataType: 'json',
        success: (data) => {
            let info = data.data[0];
            console.log(info)
            let comp = `
                <a href="img-user/${info.profile_img ? `${info.profile_img}`:'default.jpg'}" data-lightbox="profile-img">
                    <img class="profile-img" src="img-user/${info.profile_img ? `${info.profile_img}`:'default.jpg'}" alt="" height="80px" width="80px" loading="lazy">
                </a>
            `
            
            $('.profile-img_holder').append(comp)
            let profile_name = `
                <p>${info.firstname} ${info.lastname}</p>
                <a href="/profile?user_id=${id}">
                    <i class="lni lni-pencil"></i>
                    edit
                </a>
            `
            $('.profile-name').append(profile_name)
            $('#user-name').val(data.data[0].username)
        },
        error: (xhr, status, error) => {
            console.log("AJAX error:", xhr);
            console.log("AJAX error:", error);
            console.log("AJAX error:", status);
        }
    })
})