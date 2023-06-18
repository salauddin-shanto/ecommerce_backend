<link rel="stylesheet" href="{{asset('css/admin/layout/sidebar.css')}}">

<div class="sidebar">

  {{-- toggle --}}
  <div class="toggle">
      <ion-icon name="menu-outline" class="open"></ion-icon>
      <ion-icon name="close-outline" class="close"></ion-icon>
  </div>

  {{-- dashboard --}}
  <div class="top-link">
    <a href="#" class="sidebar-link">
      <span class="icon"><ion-icon name="grid-outline"></ion-icon></ion-icon></span>
      <span class="title">Dashboard</span>
    </a>
  </div>
  
  {{-- Settings --}}
  <button id="menu1" class="collapsible">
    <div>
      <a>
          <span class="icon"><ion-icon name="settings-outline"></ion-icon></span>
          <span class="title">Settings</span>
      </a>
      <ion-icon name="chevron-down-outline" class="arrow"></ion-icon>
    </div>
  </button>
  <div class="contents"> 
    <ul>  

      @can('unit add')
        <li class="sidebar-link"><a href="{{url('/unit-settings')}}">Unit</a></li>
      @endcan

      @can('aria add')
        <li id="submenu1" class="collapsible ">Aria</li>
        <div class="nested">
          <ul>
            <li class="sidebar-link"><a href="{{url('/add-area')}}">Add Area</a></li>
            <li class="sidebar-link"><a href="{{url('/show-areas')}}">Show Areas</a></li>
          </ul>
        </div>
      @endcan

{{--       
      @can('supplier add')
        <li id="submenu2" class="collapsible ">Suppliers</li>
        <div class="nested">
          <ul>
            <li class="sidebar-link"><a href="{{url('/add-supplier')}}">Add Supplier</a></li>
            <li class="sidebar-link"><a href="{{url('/show-suppliers')}}">Show Suppliers</a></li>
          </ul>
        </div> 
      @endcan

      @can('courier add')
        <li id="submenu3" class="collapsible ">Courier</li>
        <div class="nested">
          <ul>
            <li class="sidebar-link"><a href="{{url('/add-operator')}}">Add Operator</a></li>
            <li class="sidebar-link"><a href="{{url('/show-operators')}}">Show Operators</a></li>
          </ul>
        </div>
      @endcan
 --}}
 
      @can('category add')
        <li id="submenu4" class="collapsible" >Category</li>
        <div class="nested">
          <ul>
            <li class="sidebar-link"><a href="{{url('/add-category')}}">Add Category</a></li>
            <li class="sidebar-link"><a href="{{url('/show-categories')}}">All Categories</a></li>
          </ul>
        </div>
      @endcan

      @can('product add')
        <li id="submenu5" class="collapsible ">Product</li>
        <div class="nested">
          <ul>
            <li class="sidebar-link"><a href="{{url('/add-product')}}">Add Product</a></li>
            <li class="sidebar-link"><a href="{{url('/show-products')}}">All Product</a></li>
          </ul>
        </div>      
      @endcan

    </ul>
  </div>
  

  @can('role add')
    <button id="menu4" class="collapsible">
      <div>
        <a>
          <span class="icon"><ion-icon name="caret-forward-circle-outline"></ion-icon></span>
          <span class="title">Menu Privilege</span>
        </a>
        <ion-icon name="chevron-down-outline" class="arrow"></ion-icon>
      </div>
    </button>
    <div class="contents">
      <ul>
        <li class="sidebar-link"><a href="{{url('/add-role')}}">Add Role</a></li>
        <li class="sidebar-link"><a href="{{url('/show-roles')}}">View Roles</a></li>
      </ul>
    </div>
  @endcan

  

  @can('admin add')
    <button id="menu2" class="collapsible">
      <div>
        <a>
          <span class="icon"><ion-icon name="at-outline"></ion-icon></span>
          <span class="title">Admin Manager</span>
        </a>
        <ion-icon name="chevron-down-outline" class="arrow"></ion-icon>
      </div>
    </button>
    <div class="contents">
      <ul>
        <li class="sidebar-link"><a href="{{url('/add-admin')}}">Add Admin</a></li>
        <li class="sidebar-link"><a href="{{url('/show-admins')}}">All Admins</a></li>
      </ul>
    </div>   
  @endcan


  @can('customer add')
    <button id="menu3" class="collapsible">
      <div>
        <a>
          <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
          <span class="title">Customer Manager</span>
        </a>
        <ion-icon name="chevron-down-outline" class="arrow"></ion-icon>
      </div>
    </button>
    <div class="contents">
      <ul>
        <li class="sidebar-link"><a href="{{url('/show-customers')}}">View Customer</a></li>
      </ul>
    </div>

  @endcan


  @role('Super Admin')
    <button id="menu6" class="collapsible">
      <div>
        <a>
          <span class="icon"><ion-icon name="basket-outline"></ion-icon></span>
          <span class="title">Order Management</span>
        </a>
        <ion-icon name="chevron-down-outline" class="arrow"></ion-icon>
      </div>
    </button>
    <div class="contents">
      <ul>
        <li class="sidebar-link"><a href="#">Pending Orders</a></li>
        <li class="sidebar-link"><a href="#">Order Approved</a></li>
        <li class="sidebar-link"><a href="#">Processed Item</a></li>
        <li class="sidebar-link"><a href="#">Received from Courier</a></li>
        <li class="sidebar-link"><a href="#">Send to Courier</a></li>
        <li class="sidebar-link"><a href="#">Delivered to Customer</a></li>
      </ul>
    </div>


    <button id="menu7" class="collapsible">
      <div>
        <a>
          <span class="icon"><ion-icon name="shirt-outline"></ion-icon></span>
          <span class="title">Supplier Menu</span>
        </a>
        <ion-icon name="chevron-down-outline" class="arrow"></ion-icon>
      </div>
    </button>
    <div class="contents">
      <ul>
        <li class="sidebar-link"><a href="#">Pending Orders</a></li>
        <li class="sidebar-link"><a href="#">Order Approved</a></li>
        <li class="sidebar-link"><a href="#">Processed Item</a></li>
        <li class="sidebar-link"><a href="#">Received from Courier</a></li>
        <li class="sidebar-link"><a href="#">Send to Courier</a></li>
        <li class="sidebar-link"><a href="#">Delivered to Customer</a></li>
      </ul>
    </div>


    <button id="menu8" class="collapsible">
      <div>
        <a>
          <span class="icon"><ion-icon name="car-outline"></ion-icon></span>
          <span class="title">Courier Manager</span>
        </a>
        <ion-icon name="chevron-down-outline" class="arrow"></ion-icon>
      </div>
    </button>
    <div class="contents">
      <ul>
        <li class="sidebar-link"><a href="#">Pending Orders</a></li>
        <li class="sidebar-link"><a href="#">Order Approved</a></li>
        <li class="sidebar-link"><a href="#">Processed Item</a></li>
        <li class="sidebar-link"><a href="#">Received from Courier</a></li>
        <li class="sidebar-link"><a href="#">Send to Courier </a></li>
        <li class="sidebar-link"><a href="#">Delivered to Customer</a></li>
      </ul>
    </div>

    <div class="top-link">
      <a href="#" class="sidebar-link">
        <span class="icon"><ion-icon name="shield-checkmark-outline"></ion-icon></ion-icon></span>
        <span class="title">Reports</span>
      </a>
    </div>
  @endrole



</div>

  <script src="{{asset('js/admin/layout/sidebar.js')}}"></script>