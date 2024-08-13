$(document).ready(function(){
    // const logged_ser = $.cookie("name") ? "true" : 'window.location.replace("login.html"); console.log("failed");'
    const logged_ser = Cookies.get("name");
    console.log(logged_ser);

    if (!logged_ser) {
        console.log("not logged in")
    }
});