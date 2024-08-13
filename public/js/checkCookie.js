console.log('Checking cookiee . . . .')
setInterval(() => {
    checkCookies()
}, 1000);
function logoutUser(){

    $.ajax({
        url: 'http://127.0.0.1:8000/api/logout',
        method: 'GET',
        success: (data)=>{
            console.log('success')
        },
        complete: ()=>{
            Cookies.remove('name');
            Cookies.remove('username');
            Cookies.remove('password');
            Swal.fire({
                icon: 'error',
                title: 'Logged Out',
                toast: true,
                position: 'top',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true
            }).then(()=>{
                location.replace('/login')
            })
        }
    })

}

function checkCookies() {
    const loginRoutes = ['/login']; // Add additional login-related routes as needed

    const currentPath = window.location.pathname; // Get the current URL path

    // Check if the current path is a login-related route
    if (loginRoutes.includes(currentPath)) {
        console.log('you are in /login')
        return; // Do nothing if the user is on a login-related route
    }
    let name = Cookies.get('name');
    let username = Cookies.get('username');
    if(!name && !username){
        // location.replace('/login')
        console.log('not exist!')
    }else{
        console.log('it exist!')
    }
}
