@extends('admin.layouts.todo-list')
@section('title', 'Admin - TodoList [TechDepot]')

@section('main-section')
    <!-- Body: Body -->       
    <div class="body d-flex py-3">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0">Todo List</h3>
                    </div>
                </div>
            </div> <!-- Row end  -->
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card my-todo">
                        <div class="card-header border-bottom-0 todo-wrapper p-4">
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" id="TodoInput" placeholder="What you need to do, sir?">
                                <button type="button" class="btn btn-primary btn-todo-add">Add</button>
                            </div>
                            <span class="todo-error text-danger small ms-3" style="display: none;">Input can't be empty!</span>
                        </div>
                        <div class="card-body p-4">
                            <ul class="list-unstyled mb-0 todo-list">
                                <li>
                                    <span>Product Stock Check</span>
                                    <div class="todo-action">
                                        <span class="btn done p-1 fa fa-check"></span>
                                        <span class="btn text-danger close p-1 fa fa-trash-o"></span>
                                    </div>
                                </li>
                                <li class="active">
                                    <span>Product New Order Apply</span>
                                    <div class="todo-action">
                                        <span class="btn done p-1 fa fa-check"></span>
                                        <span class="btn text-danger close p-1 fa fa-trash-o"></span>
                                    </div>
                                </li>
                                <li>
                                    <span>Pending Invoice Generate</span>
                                    <div class="todo-action">
                                        <span class="btn done p-1 fa fa-check"></span>
                                        <span class="btn text-danger close p-1 fa fa-trash-o"></span>
                                    </div>
                                </li>
                                <li class="active">
                                    <span>Coupon Code Date Check </span>
                                    <div class="todo-action">
                                        <span class="btn done p-1 fa fa-check"></span>
                                        <span class="btn text-danger close p-1 fa fa-trash-o"></span>
                                    </div>
                                </li>
                                <li class="active">
                                    <span>Product PhotoShoot</span>
                                    <div class="todo-action">
                                        <span class="btn done p-1 fa fa-check"></span>
                                        <span class="btn text-danger close p-1 fa fa-trash-o"></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> <!-- Row end  --> 
        </div>
    </div>
    <!-- Modal Members-->
    <div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title  fw-bold" id="addUserLabel">Employee Invitation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="inviteby_email">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email address" id="exampleInputEmail1" aria-describedby="exampleInputEmail1">
                        <button class="btn btn-dark" type="button" id="button-addon2">Sent</button>
                    </div>
                </div>
                <div class="members_list">
                    <h6 class="fw-bold ">Employee </h6>
                    <ul class="list-unstyled list-group list-group-custom list-group-flush mb-0">
                        <li class="list-group-item py-3 text-center text-md-start">
                            <div class="d-flex align-items-center flex-column flex-sm-column flex-md-column flex-lg-row">
                                <div class="no-thumbnail mb-2 mb-md-0">
                                    <img class="avatar lg rounded-circle" src="images/avatar2.jpg" alt>
                                </div>
                                <div class="flex-fill ms-3 text-truncate">
                                    <h6 class="mb-0  fw-bold">Rachel Carr(you)</h6>
                                    <span class="text-muted">rachel.carr@gmail.com</span>
                                </div>
                                <div class="members-action">
                                    <span class="members-role ">Admin</span>
                                    <div class="btn-group">
                                        <button type="button" class="btn bg-transparent dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="icofont-ui-settings  fs-6"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="#"><i class="icofont-ui-password fs-6 me-2"></i>ResetPassword</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="icofont-chart-line fs-6 me-2"></i>ActivityReport</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item py-3 text-center text-md-start">
                            <div class="d-flex align-items-center flex-column flex-sm-column flex-md-column flex-lg-row">
                                <div class="no-thumbnail mb-2 mb-md-0">
                                    <img class="avatar lg rounded-circle" src="images/avatar3.jpg" alt>
                                </div>
                                <div class="flex-fill ms-3 text-truncate">
                                    <h6 class="mb-0  fw-bold">Lucas Baker<a href="#" class="link-secondary ms-2">(Resend invitation)</a></h6>
                                    <span class="text-muted">lucas.baker@gmail.com</span>
                                </div>
                                <div class="members-action">
                                    <div class="btn-group">
                                        <button type="button" class="btn bg-transparent dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            Members
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                <i class="icofont-check-circled"></i>
                                                    
                                                <span>All operations permission</span>
                                                </a>
                                                
                                            </li>
                                            <li>
                                                    <a class="dropdown-item" href="#">
                                                    <i class="fs-6 p-2 me-1"></i>
                                                        <span>Only Invite & manage team</span>
                                                    </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="btn-group">
                                        <button type="button" class="btn bg-transparent dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="icofont-ui-settings  fs-6"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="#"><i class="icofont-delete-alt fs-6 me-2"></i>Delete Member</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item py-3 text-center text-md-start">
                            <div class="d-flex align-items-center flex-column flex-sm-column flex-md-column flex-lg-row">
                                <div class="no-thumbnail mb-2 mb-md-0">
                                    <img class="avatar lg rounded-circle" src="images/avatar8.jpg" alt>
                                </div>
                                <div class="flex-fill ms-3 text-truncate">
                                    <h6 class="mb-0  fw-bold">Una Coleman</h6>
                                    <span class="text-muted">una.coleman@gmail.com</span>
                                </div>
                                <div class="members-action">
                                    <div class="btn-group">
                                        <button type="button" class="btn bg-transparent dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            Members
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                <i class="icofont-check-circled"></i>
                                                    
                                                <span>All operations permission</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <i class="fs-6 p-2 me-1"></i>
                                                        <span>Only Invite & manage team</span>
                                                    </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="btn-group">
                                        <div class="btn-group">
                                            <button type="button" class="btn bg-transparent dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="icofont-ui-settings  fs-6"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="#"><i class="icofont-ui-password fs-6 me-2"></i>ResetPassword</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="icofont-chart-line fs-6 me-2"></i>ActivityReport</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="icofont-delete-alt fs-6 me-2"></i>Suspend member</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="icofont-not-allowed fs-6 me-2"></i>Delete Member</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection

@section('dependencies')
<!-- Jquery Core Js -->
<script src="/admin_files/js/libscripts.bundle.js"></script>

<!-- Jquery Page Js -->
<script src="/admin_files/js/template.js"></script>
<script src="/admin_files/js/todo.js"></script> 

<script src="/admin_files/js/cookie.js"></script>
<script src="/admin_files/js/checkuser.js"></script>
@endsection