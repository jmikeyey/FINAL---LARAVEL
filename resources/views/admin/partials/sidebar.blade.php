<!-- sidebar -->
<div class="sidebar px-4 py-4 py-md-4 me-0">
    <div class="d-flex flex-column h-100">
        <a href="{{ route('admin.home') }}" class="mb-0 brand-icon">
            <span class="logo-icon">
                <i class="bi bi-bag-check-fill fs-4"></i>
            </span>
            <span class="logo-text">TechDepot</span>
        </a>
        <!-- Menu: main ul -->
        <ul class="menu-list flex-grow-1 mt-3">
            <li><a class="m-link {{ request()->routeIs('admin.home') ? 'active' : '' }} " href="{{ route('admin.home') }}"><i class="icofont-home fs-5"></i>
                    <span>Dashboard</span></a></li>
            <li class="collapsed">
                <a class="m-link {{request()->routeIs('admin.product-list', 'admin.product-edit', 'admin.product-add') ? 'collapsed' : '' }}" data-bs-toggle="collapse" data-bs-target="#menu-product" href="#">
                    <i class="icofont-truck-loaded fs-5"></i> <span>Products</span> <span
                        class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sub menu ul -->
                <ul class="sub-menu collapse {{request()->routeIs('admin.product-list', 'admin.product-edit', 'admin.product-add') ? 'show' : '' }} " id="menu-product">
                    <li><a class="ms-link {{ request()->routeIs('admin.product-list') ? 'active' : '' }} " href="{{ route('admin.product-list') }} ">Product List</a></li>
                    <li><a class="ms-link {{ request()->routeIs('admin.product-edit') ? 'active' : '' }} " href="{{ route('admin.product-edit') }} ">Product Edit</a></li>
                    <li><a class="ms-link {{ request()->routeIs('admin.product-add') ? 'active' : '' }} " href="{{ route('admin.product-add') }} ">Product Add</a></li>
                </ul>
            </li>
            <li class="collapsed">
                <a class="m-link {{ request()->routeIs('admin.categories-list', 'admin.categories-edit', 'admin.categories-add') ? 'collapsed' : ''}} " data-bs-toggle="collapse" data-bs-target="#categories" href="#">
                    <i class="icofont-chart-flow fs-5"></i> <span>Categories</span> <span
                        class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sub menu ul -->
                <ul class="sub-menu collapse {{ request()->routeIs('admin.categories-list', 'admin.categories-edit', 'admin.categories-add') ? 'show' : ''}} " id="categories">
                    <li><a class="ms-link {{ request()->routeIs('admin.categories-list') ? 'active' : ''}} " href=" {{ route('admin.categories-list') }} ">Categories List</a></li>
                    <li><a class="ms-link {{ request()->routeIs('admin.categories-edit') ? 'active' : ''}} " href=" {{ route('admin.categories-edit') }} ">Categories Edit</a></li>
                    <li><a class="ms-link {{ request()->routeIs('admin.categories-add') ? 'active' : ''}} " href=" {{ route('admin.categories-add') }} ">Categories Add</a></li>
                </ul> 
            </li>
            <li class="collapsed">
                <a class="m-link {{ request()->routeIs('admin.order-list', 'admin.order-details', 'admin.order-invoice') ? 'collapsed' : ''}} " data-bs-toggle="collapse" data-bs-target="#menu-order" href="#">
                    <i class="icofont-notepad fs-5"></i> <span>Orders</span> <span
                        class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sub menu ul -->
                <ul class="sub-menu collapse {{ request()->routeIs('admin.order-list', 'admin.order-details', 'admin.order-invoice') ? 'show' : ''}}" id="menu-order">
                    <li><a class="ms-link {{ request()->routeIs('admin.order-list') ? 'active' : '' }} " href="{{ route('admin.order-list') }} ">Orders List</a></li>
                    <li><a class="ms-link {{ request()->routeIs('admin.order-details') ? 'active' : '' }} " href="{{ route('admin.order-details') }} ">Order Details</a></li>
                    <li><a class="ms-link {{ request()->routeIs('admin.order-invoice') ? 'active' : '' }} " href="{{ route('admin.order-invoice') }} ">Order Invoices</a></li>
                </ul>
            </li>
            <li class="collapsed">
                <a class="m-link {{ request() -> routeIs('admin.customers', 'admin.customers-details') ? 'collapsed' : ''  }} " data-bs-toggle="collapse" data-bs-target="#customers-info" href="#">
                    <i class="icofont-funky-man fs-5"></i> <span>Customers</span> <span
                        class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sub menu ul -->
                <ul class="sub-menu collapse {{ request() -> routeIs('admin.customers', 'admin.customers-details') ? 'show' : ''  }} " id="customers-info">
                    <li><a class="ms-link {{ request()->routeIs('admin.customers') ? 'active' : '' }} " href="{{ route('admin.customers') }}">Customers List</a></li>
                    <li><a class="ms-link {{ request()->routeIs('admin.customers-details') ? 'active' : '' }} " href="{{ route('admin.customers-details')}}">Customers Details</a></li>
                </ul>
            </li>
            <li class="collapsed">
                <a class="m-link {{ request() -> routeIs('admin.customers', 'admin.customers-details') ? 'collapsed' : ''  }} " data-bs-toggle="collapse" data-bs-target="#incharge-info" href="#">
                    <i class="icofont-users-alt-2 fs-5"></i> <span>Incharge</span> <span
                        class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sub menu ul -->
                <ul class="sub-menu collapse {{ request() -> routeIs('admin.inchargeList', 'admin.inchargeAdd', 'admin.inchargeDetails') ? 'show' : ''  }} " id="incharge-info">
                    <li><a class="ms-link {{ request()->routeIs('admin.inchargeList') ? 'active' : '' }} " href="{{ route('admin.inchargeList') }}">Incharge List</a></li>
                    <li><a class="ms-link {{ request()->routeIs('admin.inchargeAdd') ? 'active' : '' }} " href="{{ route('admin.inchargeAdd')}}">Incharge Add</a></li>
                    <li><a class="ms-link {{ request()->routeIs('admin.inchargeDetails') ? 'active' : '' }} " href="{{ route('admin.inchargeDetails')}}">Incharge Details</a></li>
                </ul>
            </li>
            <li class="collapsed">
                <a class="m-link {{ request() -> routeIs('admin.coupons-list','admin.coupons-add', 'admin.coupons-edit' )  ? 'collapse' : ''}} " data-bs-toggle="collapse" data-bs-target="#menu-sale" href="#">
                    <i class="icofont-sale-discount fs-5"></i> <span>Sales Promotion</span> <span
                        class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sub menu ul -->
                <ul class="sub-menu collapse {{ request() -> routeIs('admin.coupons-list','admin.coupons-add', 'admin.coupons-edit' )  ? 'show' : ''}} " id="menu-sale">
                    <li><a class="ms-link {{ request()->routeIs('admin.coupons-list') ? 'active' : '' }} " href=" {{ route('admin.coupons-list') }} ">Coupons List</a></li>
                    <li><a class="ms-link {{ request()->routeIs('admin.coupons-add') ? 'active' : '' }} " href=" {{ route('admin.coupons-add') }} ">Coupons Add</a></li>
                    <li><a class="ms-link {{ request()->routeIs('admin.coupons-edit') ? 'active' : '' }} " href=" {{ route('admin.coupons-edit') }} ">Coupons Edit</a></li>
                </ul>
            </li>
            <li class="collapsed">
                <a class="m-link {{ request()->routeIs('admin.inventory') ? 'collapse' : '' }} " data-bs-toggle="collapse" data-bs-target="#menu-inventory" href="#">
                    <i class="icofont-chart-histogram fs-5"></i> <span>Inventory</span> <span
                        class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sub menu ul -->
                <ul class="sub-menu collapse {{ request()->routeIs('admin.inventory') ? 'show' : '' }}" id="menu-inventory">
                    <li><a class="ms-link {{ request()->routeIs('admin.inventory') ? 'active' : '' }} " href=" {{ route('admin.inventory') }} ">Stock List</a></li>
                    <!-- <li><a class="ms-link" href="returns.html">Returns</a></li>  -->
                </ul>
            </li>
            <li class="collapsed">
                <a class="m-link {{ request()->routeIs('admin.invoices', 'admin-todo') ? 'collapse' : '' }}" data-bs-toggle="collapse" data-bs-target="#menu-Componentsone"
                    href="#"><i class="icofont-ui-calculator"></i> <span>Accounts</span> <span
                        class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sub menu ul -->
                <ul class="sub-menu collapse {{ request()->routeIs('admin.invoices', 'admin.todo') ? 'show' : '' }}" id="menu-Componentsone">
                    <li><a class="ms-link {{ request()->routeIs('admin.invoices') ? 'active' : '' }} " href=" {{ route('admin.invoices') }} ">Invoices </a></li>
                    <li><a class="ms-link {{ request()->routeIs('admin.todo') ? 'active' : '' }} " href=" {{ route('admin.todo') }} ">Todo List</a></li>
                </ul>
            </li>
            {{-- <li><a class="m-link {{ request()->routeIs('admin.locator') ? 'active' : '' }}" href=" {{ route('admin.locator') }} "><i class="icofont-focus fs-5"></i> <span>Store
                        Locator</span></a></li> --}}
        </ul>
        <a href="{{ route('admin.home') }}" class="mb-0 brand-icon">
            <span class="logo-icon">
                <i class="bi bi-bag-check-fill fs-4"></i>
            </span>
            <span class="logo-text">TechDepot</span>
        </a>
        <!-- Menu: menu collepce btn -->
        <button type="button" class="btn btn-link sidebar-mini-btn text-light">
            <span class="ms-2"><i class="icofont-bubble-right"></i></span>
        </button>
    </div>
</div>