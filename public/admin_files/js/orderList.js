console.log('hello')

    
    const table = $('#myDataTable').DataTable({
        responsive: true,
        columnDefs: [
            { targets: [-1, -3], className: 'dt-body-right' }
        ],
        "aaSorting": []
    });


$(document).ready(function(){
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
                if(!orderIdsSet.has(key.order_id)){
                    orderIdsSet.add(key.order_id);
                    let component = `
                        <tr>
                            <td><a href="order-details?order_id=${key.order_id}"><strong>#Order-${key.order_id}</strong></a></td>
                            <td ><img src="../img-prod/${key.filename}" class="avatar lg rounded me-2" alt="profile-image"><span>${key.name}</span></td>
                            <td>${key.firstname}</td>
                            <td>${key.method}</td>
                            <td>
                                ${key.amount}
                            </td>
                            <td>
                                ${key.status === 'Completed' ? `<span class="badge bg-success">${key.status}</span>`:`<span class="badge bg-primary">${key.status}</span>`}
                            </td>
                            <td>
                                <a href="order-details?order_id=${key.order_id}">
                                    <i class="fas fa-eye fa-2x"></i>
                                </a>
                            </td>
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
})