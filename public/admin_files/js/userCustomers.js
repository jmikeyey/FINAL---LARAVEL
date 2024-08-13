console.log('hello')

    
    const table = $('#myProjectTable').DataTable({
        responsive: true,
        columnDefs: [
        { targets: [-1, -3], className: 'dt-body-right' }
        ]
    });


$(document).ready(function(){
    $.ajax({
        url: `${link_path}api/customer/get`,
        method: 'GET',
        dataType: 'json',
        success: (data)=>{
            console.log(data)
            $.each(data.data, (i, key)=>{
                let component = `
                <tr>
                    <td><strong>${key.user_id}</strong></td>
                    <td>
                        <a href="customer-detail?id=${key.user_id}">
                            <img class="avatar rounded" src="../img-user/${key.profile_img ? `${key.profile_img}`:`default.jpg`}" alt='a picture of ${key.firstname}' style='object-fit: cover'>
                            <span class="fw-bold ms-1">${key.firstname} ${key.lastname}</span>
                        </a>
                    </td>
                    <td>
                        ${key.date_registered.split(' ')[0]}
                    </td>
                    <td>${key.email}</td>
                    <td>(+63) ${key.phonenumber}</td>
                    <td>${key.total_orders}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                        <!-- <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#expedit"><i class="icofont-edit text-success"></i></button> -->
                        <a href="customer-detail?id=${key.user_id}" data-bs-toggle="tooltip" data-bs-placement="top" title="View Profile"><i class="icofont-eye text-black"></i></a>
                        </div>
                    </td>
                </tr>
                `
                table.row.add($(component)).draw();
            })
             // Enable Bootstrap tooltips
            $('[data-bs-toggle="tooltip"]').tooltip();
        },
        error: (xhr, status, error) => {
            console.log("AJAX error:", xhr);
            console.log("AJAX error:", error);
            console.log("AJAX error:", status);
        }
    })
})