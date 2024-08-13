<!-- sidebar -->
<div class="sidebar px-4 py-4 py-md-4 me-0">
    <div class="d-flex flex-column h-100">
        <a href="#" class="mb-0 brand-icon">
            <span class="logo-icon">
                <i class="bi bi-bag-check-fill fs-4"></i>
            </span>
            <span class="logo-text">TechDepot</span>
        </a>
        <!-- Menu: main ul -->
        <ul class="menu-list flex-grow-1 mt-3">
            <li class="collapsed">
                <a class="m-link {{ request()->routeIs('incharge.order-list', 'incharge.order-details', 'incharge.order-invoice') ? 'collapsed' : ''}} " data-bs-toggle="collapse" data-bs-target="#menu-order" href="#">
                    <i class="icofont-notepad fs-5"></i> <span>Orders</span> <span
                        class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sub menu ul -->
                <ul class="sub-menu collapse {{ request()->routeIs('incharge.order-list', 'incharge.order-details', 'incharge.order-invoice') ? 'show' : ''}}" id="menu-order">
                    <li><a class="ms-link {{ request()->routeIs('incharge.order-list') ? 'active' : '' }} " href="{{ route('incharge.order-list') }} ">Orders List</a></li>
                    <li><a class="ms-link {{ request()->routeIs('incharge.order-details') ? 'active' : '' }} " href="{{ route('incharge.order-details') }} ">Order Details</a></li>
                    <li><a class="ms-link {{ request()->routeIs('incharge.order-invoice') ? 'active' : '' }} " href="{{ route('incharge.order-invoice') }} ">Order Invoices</a></li>
                </ul>
            </li>
            <li class="collapsed">
                <a class="m-link {{ request() -> routeIs('incharge.coupons-list','incharge.coupons-add', 'incharge.coupons-edit' )  ? 'collapse' : ''}} " data-bs-toggle="collapse" data-bs-target="#menu-sale" href="#">
                    <i class="icofont-sale-discount fs-5"></i> <span>Sales Promotion</span> <span
                        class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sub menu ul -->
                <ul class="sub-menu collapse {{ request() -> routeIs('incharge.coupons-list','incharge.coupons-add', 'incharge.coupons-edit' )  ? 'show' : ''}} " id="menu-sale">
                    <li><a class="ms-link {{ request()->routeIs('incharge.coupons-list') ? 'active' : '' }} " href=" {{ route('incharge.coupons-list') }} ">Coupons List</a></li>
                    <li><a class="ms-link {{ request()->routeIs('incharge.coupons-add') ? 'active' : '' }} " href=" {{ route('incharge.coupons-add') }} ">Coupons Add</a></li>
                    <li><a class="ms-link {{ request()->routeIs('incharge.coupons-edit') ? 'active' : '' }} " href=" {{ route('incharge.coupons-edit') }} ">Coupons Edit</a></li>
                </ul>
            </li>
            <li class="collapsed">
                <a class="m-link {{ request()->routeIs('incharge.inventory') ? 'collapse' : '' }} " data-bs-toggle="collapse" data-bs-target="#menu-inventory" href="#">
                    <i class="icofont-chart-histogram fs-5"></i> <span>Inventory</span> <span
                        class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sub menu ul -->
                <ul class="sub-menu collapse {{ request()->routeIs('incharge.inventory') ? 'show' : '' }}" id="menu-inventory">
                    <li><a class="ms-link {{ request()->routeIs('incharge.inventory') ? 'active' : '' }} " href=" {{ route('incharge.inventory') }} ">Stock List</a></li>
                    <!-- <li><a class="ms-link" href="returns.html">Returns</a></li>  -->
                </ul>
            </li>
            <li class="collapsed">
                <a class="m-link {{ request()->routeIs('incharge.invoices', 'incharge-todo') ? 'collapse' : '' }}" data-bs-toggle="collapse" data-bs-target="#menu-Componentsone"
                    href="#"><i class="icofont-ui-calculator"></i> <span>Accounts</span> <span
                        class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sub menu ul -->
                <ul class="sub-menu collapse {{ request()->routeIs('incharge.invoices', 'incharge.todo') ? 'show' : '' }}" id="menu-Componentsone">
                    <li><a class="ms-link {{ request()->routeIs('incharge.invoices') ? 'active' : '' }} " href=" {{ route('incharge.invoices') }} ">Invoices </a></li>
                    <li><a class="ms-link {{ request()->routeIs('incharge.todo') ? 'active' : '' }} " href=" {{ route('incharge.todo') }} ">Todo List</a></li>
                </ul>
            </li>
            {{-- <li><a class="m-link {{ request()->routeIs('incharge.locator') ? 'active' : '' }}" href=" {{ route('incharge.locator') }} "><i class="icofont-focus fs-5"></i> <span>Store
                        Locator</span></a></li> --}}
        </ul>
        <!-- Menu: menu collepce btn -->
        <button type="button" class="btn btn-link sidebar-mini-btn text-light">
            <span class="ms-2"><i class="icofont-bubble-right"></i></span>
        </button>
    </div>
</div>