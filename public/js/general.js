function logout(){
    Cookies.remove("name");
    console.log("logout");
    window.location.replace("login.html");
}
$('.newsletter-form').on('submit', function(e){
    e.preventDefault();
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-right',
        iconColor: 'white',
        customClass: {
            popup: 'success-toast'
        },
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true
    })
    Toast.fire({
        icon: 'success',
        title: 'Thank you for subscribing', 
        text: 'Use "TDGOINGUP" code to get  free shipping!'
    })
})

$('.prod-search').on('click', function(e){
    e.preventDefault();
    let search_val = $('.search_value').val();
    if (search_val === '') {
        alert('The search value is empty!');
    }else{
        // not empty
        location.replace(`product-grids?se_val=${search_val}`)
    }
});

$('#prod-search').on('click', function(e){
    e.preventDefault();
    let search_val = $('#search_value').val();
    if (search_val === '') {
        alert('The search value is empty!');
    }else{
        // not empty
        location.replace(`product-grids?se_val=${search_val}`)
    }
});
