<link rel="stylesheet" href="{{asset('css/sidebar.css')}}">
<ul>  
    <li class="list">
        <div class="toggle">
            <ion-icon name="menu-outline" class="open"></ion-icon>
            <ion-icon name="close-outline" class="close"></ion-icon>
        </div>
    </li>

    <li class="list {{ request()->is('/') ? 'bg-success':'' }}">
        <div class="menuItem">
            <a href="/">
                <span class="icon"><ion-icon name="grid-outline"></ion-icon></ion-icon></span>
                <span class="title">Dashboard</span>
            </a>

        </div>
    </li>

    <li class="list">
        <div class="menuItem">
            <a >
                <span class="icon"><ion-icon name="settings-outline"></ion-icon></span>
                <span class="title">Settings</span>
            </a>
            <ion-icon name="chevron-down-outline" class="arrow"></ion-icon>
        </div>

        <ul class="subMenu">
            <li class=" {{ request()->is('unit-settings') ? 'bg-success':'' }}"><a href="{{url('/unit-settings')}}">Unit settings</a></li>
            <li class=" {{ request()->is('aria-settings') ? 'bg-success':'' }}"><a href="{{url('/aria-settings')}}">Aria settings</a></li>
            <li class=" {{ request()->is('supplier-settings') ? 'bg-success':'' }}"><a href="{{url('/supplier-settings')}}">Supplier settings</a></li>
            <li class=" {{ request()->is('courier-settings') ? 'bg-success':'' }}"><a href="{{url('/courier-settings')}}">Courier Settings</a></li>
            <li class=" {{ request()->is('category-settings') ? 'bg-success':'' }}"><a href="{{url('/category-settings')}}">Category</a></li>
            <li class=" {{ request()->is('product-settings') ? 'bg-success':'' }}"><a href="{{url('/product-settings')}}">Product</a></li>
        </ul>
    </li>


    <li class="list {{ request()->is('admin-manager') ? 'bg-success':'' }}">
        <div class="menuItem">
            <a href="{{url('/admin-manager')}}">
                <span class="icon"><ion-icon name="at-outline"></ion-icon></span>
                <span class="title">Admin Manager</span>
            </a>
        </div>
    </li>

    <li class="list">
        <div class="menuItem">
            <a href="#">
                <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
                <span class="title">Client Manager</span>
            </a>
        </div>
    </li>

    <li class="list">
        <div class="menuItem">
            <a href="#">
                <span class="icon"><ion-icon name="caret-forward-circle-outline"></ion-icon></span>
                <span class="title">Menu Privilege</span>
            </a>
        </div>
    </li>

    <li class="list">
        <div class="menuItem">
            <a href="#">
                <span class="icon"><ion-icon name="shield-checkmark-outline"></ion-icon></span>
                <span class="title">Report's</span>
            </a>
        </div>
    </li> 

    <li class="list">
        <div class="menuItem">
            <a>
                <span class="icon"><ion-icon name="basket-outline"></ion-icon></span>
                <span class="title">Order Management</span>
            </a>
            <ion-icon name="chevron-down-outline" class="arrow"></ion-icon>
        </div>

        <ul class="subMenu">
            <li><a href="">Pending Orders</a></li>
            <li><a href="">Order Approved</a></li>
            <li><a href="">Processed Item</a></li>
            <li><a href="">Received from Courier</a></li>
            <li><a href="">Send to Courier item</a></li>
            <li><a href="">Delivered to Customer</a></li>
        </ul>
    </li>

    <li class="list">
        <div class="menuItem">
            <a>
                <span class="icon"><ion-icon name="shirt-outline"></ion-icon></span>
                <span class="title">Supplier Menu</span>
            </a>
            <ion-icon name="chevron-down-outline" class="arrow"></ion-icon>
        </div>

        <ul class="subMenu">
            <li><a href="">All Products</a></li>
            <li><a href="">Pending Supply</a></li>
            <li><a href="">Processed Item</a></li>
            <li><a href="">Received from Courier</a></li>
        </ul>
    </li>

    <li class="list">
        <div class="menuItem">
            <a>
                <span class="icon"><ion-icon name="car-outline"></ion-icon></span>
                <span class="title">Courier Manager</span>
            </a>
            <ion-icon name="chevron-down-outline" class="arrow"></ion-icon>
        </div>

        <ul class="subMenu">
            <li><a href="">Arrive to Parcel</a></li>
            <li><a href="">Received item</a></li>
            <li><a href="">Send to Courier</a></li>
            <li><a href="">Delivered to Customer</a></li>
        </ul>
    </li>
</ul>

