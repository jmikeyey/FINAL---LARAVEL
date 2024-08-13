let table = $('#myDataTable')
.DataTable( {
    responsive: true,
    columnDefs: [
        { targets: [-1, -3], className: 'dt-body-right' }
    ],
    "aaSorting": []
    // order: [[0, 'desc']] 
});

const today = new Date();
const year = today.getFullYear();
const month = String(today.getMonth() + 1).padStart(2, '0');
const day = String(today.getDate()).padStart(2, '0');

const formattedDateToday = `${year}-${month}-${day}`;


// ============================

const inputDate = document.getElementById('input-date');
const weekTab = document.querySelector('.nav-link[href="#summery-week"]');
const todayTab = document.querySelector('.nav-link[href="#summery-today"]');

weekTab.addEventListener('click', function(event) {
    if (!inputDate.value) {
        event.preventDefault();
        $(this).tab('show');
    }
});
inputDate.addEventListener('change', function() {
    if (inputDate.value) {
        todayTab.click();
    }
});
inputDate.addEventListener('change', function() {
    if (inputDate.value) {
        // weekTab.classList.add('disabled');
        // weekTab.classList.add('disabled-tab');
        // query for selected date
        const selectedDate = inputDate.value;
        console.log(selectedDate)

        if(selectedDate > formattedStartDate){
            const Toast = Swal.mixin({
                toast: true,
                position: 'top',
                iconColor: 'white',
                customClass: {
                    popup: 'success-toast'
                },
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true
            })
            Toast.fire({
                icon: 'success',
                title: 'That date is ahead the current date!'
            })
            inputDate.value = '';
        }else{
            console.log('not ahead')
            $.ajax({
                url: `${link_path}api/dashboard/OrdersByDate?date=${selectedDate}`,
                method: 'GET',
                dataType: 'json',
                success: (data)=>{
                    console.log(data)
                    let info = data[0].data;
                    let total = 0;
                    $.each(info, (i, key) => {
                        total += key.price;
                    });
                    let average = total / info.length;
            
                    let total1 = 0;
                    $.each(info, (i, key) => {
                        total1 += key.quantity;
                    });
                    let average1 = total1 / info.length;
                    let roundedTotalSold = Math.ceil(average1);
            
            
                    // =============================
                    data[0].high_sold[0].product_id
                    $('.total-customers').text(data[0].customers[0].total_customer)
                    $('.top-selling').html(`<a href="../product-details.html?id=${data[0].high_sold[0].product_id}">${data[0].high_sold[0].product_id}</a> <i style='font-weight: 300'>(${data[0].high_sold[0].is_sold} )sold</i>`)
                    $('.total-products').text(data[0].prod_count[0].product_count)
                    $('.total-orders').text(data[0].ordersCount[0].total_orders)
                    $('.cat-count').text(data[0].categoryCount[0].total_category)
                    $('.total-sales').text('₱ ' + (average ? average.toFixed(2) : 0));
                    $('.total-sold').text(roundedTotalSold ? roundedTotalSold : 0);
                    $('.today-revenue').text('₱ ' + (data[0].revenue[0].total_amount ? data[0].revenue[0].total_amount.toFixed(2) : 0));

            
                },
                error: (xhr, status, error) => {
                    console.log("AJAX error:", xhr);
                    console.log("AJAX error:", error);
                    console.log("AJAX error:", status);
                }
            })
        }
    } else {
        weekTab.classList.remove('disabled');
        weekTab.classList.remove('disabled-tab');
        
    }
});

$.ajax({
    url: `${link_path}api/dashboard/OrdersByDate?date=${formattedDateToday}`,
    method: 'GET',
    dataType: 'json',
    success: (data)=>{
        console.log(data)
        let info = data[0].data;
        let total = 0;
        $.each(info, (i, key) => {
            total += key.price;
        });
        let average = info.length > 0 ? total / info.length : 0;

        let total1 = 0;
        $.each(info, (i, key) => {
            total1 += key.quantity;
        });
        
        let average1 = info.length > 0 ? total1 / info.length : 0;
        let roundedTotalSold = info.length > 0 ? Math.ceil(average1) : 0;
        

        console.log(roundedTotalSold)
        console.log(data[0].revenue[0].total_amount !== null ? data[0].revenue[0].total_amount : 0)
        console.log(data[0].totalRevenue[0].total_amount !== null ? data[0].totalRevenue[0].total_amount.toFixed(2) : 0)
        // =============================
        data[0].high_sold[0].product_id
        $('.total-customers').text(data[0].customers[0].total_customer ?? 0);
        $('.top-selling').append(`<a href="../product-details.html?id=${data[0].high_sold[0].product_id}">${data[0].high_sold[0].product_id}</a> <i style='font-weight: 300'>(${data[0].high_sold[0].is_sold} )sold</i>`);
        $('.total-products').text(data[0].prod_count[0].product_count ?? 0);
        $('.total-sales').text('₱ ' + (average ? average.toFixed(2) : 0));

        $('.total-sold').text(roundedTotalSold ?? 0);
        $('.total-orders').text(data[0].ordersCount[0].total_orders ?? 0);
        $('.cat-count').text(data[0].categoryCount[0].total_category ?? 0);
        $('.total-revenue').text('₱ ' + (data[0].totalRevenue[0].total_amount !== null ? data[0].totalRevenue[0].total_amount.toFixed(2) : 0));
        $('.today-revenue').text('₱ ' + (data[0].revenue[0].total_amount !== null ? data[0].revenue[0].total_amount.toFixed(2) : 0));
        
        

    },
    error: (xhr, status, error) => {
        console.log("AJAX error:", xhr);
        console.log("AJAX error:", error);
        console.log("AJAX error:", status);
    }
})



// getting the week range
const startDate = new Date(formattedDateToday);
const startDate1 = new Date(startDate);
const endDate = new Date(startDate);
startDate1.setDate(endDate.getDate() + 1);
endDate.setDate(endDate.getDate() - 7);

const formattedStartDate = startDate1.toISOString().split('T')[0];
const formattedEndDate = endDate.toISOString().split('T')[0];

const weekRange = `${formattedStartDate} - ${formattedEndDate}`;

const [startDateValue, endDateValue] = weekRange.split(" - ");
console.log(weekRange)
$.ajax({
    url: `${link_path}api/dashboard/OrdersByDate?startDate=${startDateValue}&endDate=${endDateValue}`,
    method: 'GET',
    dataType: 'json',
    success: (data)=>{
        console.log(data)
        let info = data[0].weekData;
        let total = 0;
        $.each(info, (i, key) => {
            total += key.price;
        });
        let average = info.length > 0 ? total / info.length : 0;

        let total1 = 0;
        $.each(info, (i, key) => {
            total1 += key.quantity;
        });
        
        let average1 = info.length > 0 ? total1 / info.length : 0;
        let roundedTotalSold = info.length > 0 ? Math.ceil(average1) : 0;
        

        // ===============
        $('.week-orders').text(data[0].weekOrders[0].total_orders ?? 0);
        $('.week-averageSale').text('₱ ' + (average ?? 0).toFixed(2));
        $('.week-itemSale').text(roundedTotalSold ?? 0);
        $('.week-revenue').text('₱ ' + (data[0].weekRevenue[0].total_amount ?? 0).toFixed(2));
        
    },
    error: (xhr, status, error) => {
        console.log("AJAX error:", xhr);
        console.log("AJAX error:", error);
        console.log("AJAX error:", status);
    }
})

// ! data tables
$.ajax({
    url: `${link_path}api/order/order_get-ad`,
    method: 'GET',
    dataType: 'json',
    success: (data)=>{
        console.log(data)
        let ordersByStatus = {
            Pending: [],
            ToShip: [],
            ToReceive: [],
            Completed: [],
            Cancelled: []
        };
    
        $.each(data.data, (i, key) => {
            switch (key.status) {
                case 'Pending':
                    console.log('pending')
                    ordersByStatus.Pending.push(key);
                    break;
                case 'To Ship':
                    console.log('To Ship')
                    ordersByStatus.ToShip.push(key);
                    break;
                case 'To Receive':
                    console.log('To Receive')
                    ordersByStatus.ToReceive.push(key);
                    break;
                case 'Completed':
                    console.log('Completed')
                    ordersByStatus.Completed.push(key);
                    break;
                case 'Cancelled':
                    console.log('Cancelled')
                    ordersByStatus.Cancelled.push(key);
                    break;
            }
        });
    
        // Sort each category in descending order
        ordersByStatus.Pending.sort((a, b) => b.order_id - a.order_id);
        ordersByStatus.ToShip.sort((a, b) => b.order_id - a.order_id);
        ordersByStatus.ToReceive.sort((a, b) => b.order_id - a.order_id);
        ordersByStatus.Completed.sort((a, b) => b.order_id - a.order_id);
        ordersByStatus.Cancelled.sort((a, b) => b.order_id - a.order_id);
    
        // Concatenate the sorted arrays
        let sortedOrders = ordersByStatus.Pending.concat(ordersByStatus.ToShip, ordersByStatus.ToReceive, ordersByStatus.Completed, ordersByStatus.Cancelled);
        console.log(sortedOrders)
        let orderIdsSet = new Set();
        $.each(sortedOrders, (i, key)=>{
            console.log(key.order_id + ':' + key.status)
            if(!orderIdsSet.has(key.order_id)){
                orderIdsSet.add(key.order_id)
                let component = `
                    <tr>
                        <td style='width: 150px'><strong><a href='/admin/order-details?order_id=${key.order_id}'> #Order-${key.order_id}</strong></a></td>
                        <td style='width: 500px'><img src="../img-prod/${key.filename}" class="avatar lg rounded me-2" alt="profile-image"><span>${key.name}</span></td>
                        <td>${key.firstname}</td>
                        <td>${key.method}</td>
                        <td>
                            ₱ ${key.amount}
                        </td>
                        <td>${key.status == 'Completed' ? `<span class="badge bg-success">${key.status}</span>`:`<span class="badge bg-warning">${key.status}</span>`}</td>
                    </tr>
                `
                table.row.add($(component)).draw();
            }
            
        })
    },
    error: (xhr, status, error) => {
        console.log("AJAX error:", xhr);
        console.log("AJAX error:", error);
        console.log("AJAX error:", status);
    }
})