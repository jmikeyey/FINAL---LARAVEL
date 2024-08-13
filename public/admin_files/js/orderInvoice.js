$(document).ready(function() {
    const table = $('#patient_table').DataTable({
    responsive: true,
    columnDefs: [
        { targets: [-1, -3], className: 'dt-body-right' }
    ],
    order: [[0, 'desc']] 
    });

    $.ajax({
    url: `${link_path}api/order/invoice`,
    method: 'GET',
    dataType: 'json',
    success: (data) => {
        console.log(data);
        let orderIdsSet = new Set();
        $.each(data.data, function(i, key) {
            const paymentDate = new Date(key.payment_date);
            const formattedDate = paymentDate.toLocaleDateString('en-US', {
                month: 'long',
                day: 'numeric',
                year: 'numeric'
            });
            if(!orderIdsSet.has(key.order_id)){
                orderIdsSet.add(key.order_id)
                let component = `
                <tr>
                <td><a href='invoices.html?order_id=${key.order_id}'> <strong>#Order-${key.order_id}</strong></a></td>
                <td><img src="../img-prod/${key.filename}" class="avatar lg rounded me-2" alt="${key.name}"><span>${key.name}</span></td>
                <td>${formattedDate}</td>
                <td>₱${key.amount}</td>
                <td>${key.firstname}</td>
                <td>
                <a class="btn btn-sm btn-white" href="invoices?order_id=${key.order_id}" data-bs-toggle="tooltip" data-bs-placement="top" title="Print"><i class="icofont-print fs-5"></i></a>
                <a class="btn btn-sm btn-white" href="invoices" data-bs-toggle="tooltip" data-bs-placement="top" title="Download"><i class="icofont-download fs-5"></i></a>
                <a class="btn btn-sm btn-white" href="invoices?order_id=${key.order_id}" data-bs-toggle="tooltip" data-bs-placement="top" title="Send Mail"><i class="icofont-send-mail fs-4"></i></a>
                </td>
                </tr>
            `;
            table.row.add($(component)).draw();
            }
        });
        // Enable Bootstrap tooltips
        $('[data-bs-toggle="tooltip"]').tooltip();
    },
    error: (xhr, status, error) => {
        console.log("AJAX error:", xhr);
        console.log("AJAX error:", error);
        console.log("AJAX error:", status);
    }
    });
});
