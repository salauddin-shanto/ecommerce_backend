<link rel="stylesheet" href="{{asset('css/admin/layout/sidebar.css')}}">

<div class="sidebar">

  {{-- toggle --}}
  <div class="toggle">
      <i class="fa-solid fa-bars"></i>
  </div>

  {{-- dashboard --}}
  <div class="top-link">
    <a href="#" class="sidebar-link">
      <span class="icon"><i class="fa-solid fa-gauge"></i></span>
      <span class="title">Dashboard</span>
    </a>
  </div>
  
  {{-- Settings --}}
  @can(['unit add','aria add','category add','product add'])
      
  <button id="menu1" class="collapsible">
    <div>
      <a>
          <span class="icon"><i class="fa-solid fa-gear"></i></span>
          <span class="title">Settings</span>
      </a>
      <i class="fa-solid fa-chevron-down"></i>
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
  @endcan
 

  @can('role add')
    <button id="menu4" class="collapsible">
      <div>
        <a>
          <span class="icon"><i class="fa-solid fa-lock"></i></span>
          <span class="title">Menu Privilege</span>
        </a>
        <i class="fa-solid fa-chevron-down"></i>
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
          <span class="icon"><i class="fa-solid fa-user-tie"></i></span>
          <span class="title">Admin Manager</span>
        </a>
        <i class="fa-solid fa-chevron-down"></i>
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
          <span class="icon"><i class="fa-solid fa-user"></i></span>
          <span class="title">Customer Manager</span>
        </a>
        <i class="fa-solid fa-chevron-down"></i>
      </div>
    </button>
    <div class="contents">
      <ul>
        <li class="sidebar-link"><a href="{{url('/all-clients')}}">View Customer</a></li>
        <li class="sidebar-link"><a href="{{url('/suspended-clients')}}">Suspended Customer</a></li>
      </ul>
    </div>

  @endcan


 {{--  @role('Super Admin') --}}
    <button id="menu6" class="collapsible">
      <div>
        <a>
          <span class="icon"><i class="fa-solid fa-bag-shopping"></i></span>
          <span class="title">Order Management</span>
        </a>
        <i class="fa-solid fa-chevron-down"></i>
      </div>
    </button>
    <div class="contents">
      <ul>
        <li class="sidebar-link"><a href="{{route('orders',['status'=>'pending'])}}">Pending Orders</a></li>
        <li class="sidebar-link"><a href="{{route('orders',['status'=>'approved'])}}">Approved Orders</a></li>
        <li class="sidebar-link"><a href="{{route('orders',['status'=>'processed'])}}">Processed Items</a></li>
        <li class="sidebar-link"><a href="{{route('orders',['status'=>'received by courier manager'])}}">Received by Operator</a></li>
{{--         <li class="sidebar-link"><a href="{{url('/received-from-supplier')}}">Received from Supplier</a></li>
 --}}        
        <li class="sidebar-link"><a href="{{route('orders',['status'=>'sent to courier'])}}">Sent to Courier</a></li>
        <li class="sidebar-link"><a href="{{route('orders',['status'=>'delivered to customer'])}}">Delivered to Customer</a></li>
        <li class="sidebar-link"><a href="{{route('orders',['status'=>'cancelled'])}}">Cancelled Orders</a></li>
        <li class="sidebar-link"><a href="{{route('orders',['status'=>'returned by customer'])}}">Returned Orders</a></li>
      </ul>
    </div>


    <button id="menu7" class="collapsible">
      <div>
        <a>
          <span class="icon"><i class="fa-solid fa-universal-access"></i></span>
          <span class="title">Supplier Menu</span>
        </a>
        <i class="fa-solid fa-chevron-down"></i>
      </div>
    </button>
    <div class="contents">
      <ul>
        <li class="sidebar-link"><a href="{{route('supply',['status'=>'approved'])}}">Products For Supply</a></li>
        <li class="sidebar-link"><a href="{{route('supply',['status'=>'processed'])}}">Processed Orders</a></li>
        <li class="sidebar-link"><a href="{{route('supply',['status'=>'received by courier manager'])}}">To Courier Manager</a></li>
        <li class="sidebar-link"><a href="{{route('supply',['status'=>'returned by customer'])}}">Returned by Customer</a></li>
      </ul>
    </div>


    <button id="menu8" class="collapsible">
      <div>
        <a>
          <span class="icon"><i class="fa-solid fa-car"></i></span>
          <span class="title">Courier Manager</span>
        </a>
        <i class="fa-solid fa-chevron-down"></i>
      </div>
    </button>
    <div class="contents">
      <ul>
        <li class="sidebar-link"><a href="{{route('parcel',['processed'])}}">Processed Parcel </a></li>
        <li class="sidebar-link"><a href="{{route('parcel',['received'])}}">Received Parcel</a></li>
        <li class="sidebar-link"><a href="{{route('parcel',['sent to courier'])}}">Sent to Courier </a></li>
        <li class="sidebar-link"><a href="{{route('parcel',['delivered to customer'])}}">Delivered to Customer</a></li>
        <li class="sidebar-link"><a href="{{route('parcel',['returned by customer'])}}">Returned by Customer</a></li>
      </ul>
    </div>

    <button id="menu9" class="collapsible">
      <div>
        <a>
          <span class="icon"><i class="fa-solid fa-money-check-dollar"></i></span>
          <span class="title">Transactions</span>
        </a>
        <i class="fa-solid fa-chevron-down"></i>
      </div>
    </button>
    <div class="contents">
      <ul>
        <li class="sidebar-link"><a href="{{route('operator-deposits')}}">Operator Deposits</a></li>
      </ul>
    </div>

    <div class="top-link">
      <a href="#" class="sidebar-link">
        <span class="icon"><i class="fa-solid fa-circle-info"></i></span>
        <span class="title">Reports</span>
      </a>
    </div>
{{--   @endrole --}}



</div>

  <script src="{{asset('js/admin/layout/sidebar.js')}}"></script>