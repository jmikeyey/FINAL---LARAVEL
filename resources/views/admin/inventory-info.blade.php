@extends('admin.layouts.inventory-info')

@section('title', 'Admin - Inventory [TechDepot]')

@section('main-section')
            <!-- Body: Body -->
            <div class="body d-flex py-3">
                <div class="container-xxl">
                    <div class="row align-items-center">
                        <div class="border-0 mb-4">
                            <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                <h3 class="fw-bold mb-0">Stock Inventory List</h3>
                            </div>
                        </div>
                    </div> <!-- Row end  -->
                    <div class="row g-3 mb-3">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <table id="myDataTable" class="table table-hover align-middle mb-0" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Products</th>
                                                <th>Category</th>
                                                <th>Date Added</th>
                                                <th>Stock</th>
                                                <th>In Stock</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- sample data -->
                                            <!-- <tr>
                                                <td><strong>#SKUN111</strong></td>
                                                <td><img src="images/product-1.jpg" class="avatar lg rounded me-2" alt="profile-image"><span> Oculus VR </span></td>
                                                <td>Game accessories</td>
                                                <td>June 13, 2021</td>
                                                <td>1455</td>
                                                <td>
                                                    451
                                                </td>
                                                <td><span class="badge bg-warning">Offer process</span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>#SKUN113</strong></td>
                                                <td><img src="images/product-3.jpg" class="avatar lg rounded me-2" alt="profile-image"><span>Flower Port</span></td>
                                                <td>accessories</td>
                                                <td>June 16, 2021</td>
                                                <td>555</td>
                                                <td>
                                                    11
                                                </td>
                                                <td><span class="badge bg-success">Sell</span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>#SKUN115</strong></td>
                                                <td><img src="images/product-5.jpg" class="avatar lg rounded me-2" alt="profile-image"><span>School Bag</span></td>
                                                <td>Bags</td>
                                                <td>June 18, 2021</td>
                                                <td>1581</td>
                                                <td>
                                                    1581
                                                </td>
                                                <td><span class="badge bg-danger">Out of Stock</span></td>
                                            </tr> -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
@section('dependencies')
    <!-- Jquery Core Js -->
    <script src="/admin_files/js/libscripts.bundle.js"></script>

    <!-- Plugin Js -->
    <script src="/admin_files/js/dataTables.bundle.js"></script>  

    <!-- Jquery Page Js -->
    <script src="/admin_files/js/template.js"></script>

    <script src="/admin_files/js/cookie.js"></script>
    <script src="/admin_files/js/checkuser.js"></script>
    <script>

        var table = $('#myDataTable').DataTable({
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                responsive: true,
                columnDefs: [
                { targets: [-1, -3], className: 'dt-body-right' }
            ]
            })

        // VIEW INVENTORY
        $(document).ready(()=>{
            $.ajax({
                url: `${link_path}api/inventory/view`,
                method: "GET",
                dataType: "json",
                success: function(data){
                    console.log(data.data)
                    $.each(data.data, (i, value)=>{
                        let date = new Date(value.date_added);
                        let options = { month: 'long', day: 'numeric', year: 'numeric' };
                        let date_added = date.toLocaleString('en-US', options);
                        let row = "<tr>"
                        row += `<td><strong>#<span>${value.SKU}</span></strong></td>`
                        row += `<td><span> ${value.name}</span></td>`
                        row += `<td>${value.category_name}</td>`
                        row += `<td>${date_added}</td>`
                        row += `<td>${value.Stock}</td>`
                        row += `<td>${value.In_Stock}</td>`
                        if(value.In_Stock === 0){
                            row += `<td><span class="badge bg-danger">Out of Stock</span></td>`
                        }else{
                            if(value.status === 'Selling'){
                                row += `<td><span class="badge bg-success">${value.status}</span></td>`
                            }else{
                                row += `<td><span class="badge bg-warning">${value.status}</span></td>`
                            }
                        }

                        row += "</tr>"
                        table.row.add($(row)).draw();
                    })
                },
                error: function(errorThrown){
                    console.log(errorThrown)
                }
            })
        });
    </script>
@endsection