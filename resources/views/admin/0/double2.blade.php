<!DOCTYPE html>
<html>
<head>
  <title>Two-Level Double Collapsible Sidebar</title>
  <link rel="stylesheet" href="{{asset('css/double2.css')}}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700&display=swap" rel="stylesheet">
  
</head> 
<body> 
  <div class="sidebar">

    {{-- toggle --}}
    <div class="toggle">
        <ion-icon name="menu-outline" class="open"></ion-icon>
        <ion-icon name="close-outline" class="close"></ion-icon>
    </div>

    {{-- dashboard --}}
    <div class="top-link">
      <a href="{{url('/aria-settings')}}" class="sidebar-link">
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
    <div class="content">
      <ul>  
        <li class="sidebar-link"><a href="{{url('/unit-settings')}}">Unit</a></li>
        
        <li id="submenu1" class="collapsible ">Aria</li>
        <div class="nested">
          <ul>
            <li class="sidebar-link"><a href="{{url('/aria-settings')}}">Create Area</a></li>
            <li class="sidebar-link"><a href="{{url('/show-area')}}">Show Areas</a></li>
          </ul>
        </div>

        <li id="submenu2" class="collapsible ">Suppliers</li>
        <div class="nested">
          <ul>
            <li class="sidebar-link"><a href="{{url('/supplier-settings')}}">Create Supplier</a></li>
            <li class="sidebar-link"><a href="{{url('/show-supplier')}}">Show Suppliers</a></li>
          </ul>
        </div>

        <li id="submenu3" class="collapsible ">Courier</li>
        <div class="nested">
          <ul>
            <li class="sidebar-link"><a href="{{url('#')}}">Add Operator</a></li>
            <li class="sidebar-link"><a href="{{url('#')}}">Show Operators</a></li>
          </ul>
        </div>
        
        <li id="submenu4" class="collapsible" >Category</li>
        <div class="nested">
          <ul>
            <li class="sidebar-link"><a href="{{url('#')}}">Add Category</a></li>
            <li class="sidebar-link"><a href="{{url('#')}}">All Category</a></li>
          </ul>
        </div>

        <li id="submenu5" class="collapsible ">Product</li>
        <div class="nested">
          <ul>
            <li class="sidebar-link"><a href="{{url('#')}}">Add Product</a></li>
            <li class="sidebar-link"><a href="{{url('#')}}">All Product</a></li>
          </ul>
        </div>

      </ul>
    </div>
    
    <button id="menu2" class="collapsible">
      <div>
        <a>
          <span class="icon"><ion-icon name="at-outline"></ion-icon></span>
          <span class="title">Admin Manager</span>
        </a>
        <ion-icon name="chevron-down-outline" class="arrow"></ion-icon>
      </div>
    </button>
    <div class="content">
      <ul>
        <li class="sidebar-link"><a href="{{url('#')}}">Add Admin</a></li>
        <li class="sidebar-link"><a href="{{url('#')}}">All Admins</a></li>
      </ul>
    </div>

    <button id="menu3" class="collapsible">
      <div>
        <a>
          <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
          <span class="title">Customer Manager</span>
        </a>
        <ion-icon name="chevron-down-outline" class="arrow"></ion-icon>
      </div>
    </button>
    <div class="content">
      <ul>
        <li class="sidebar-link"><a href="{{url('#')}}">Add Client</a></li>
        <li class="sidebar-link"><a href="{{url('#')}}">View Clients</a></li>
      </ul>
    </div>

    <button id="menu4" class="collapsible">
      <div>
        <a>
          <span class="icon"><ion-icon name="caret-forward-circle-outline"></ion-icon></span>
          <span class="title">Menu Privilege</span>
        </a>
        <ion-icon name="chevron-down-outline" class="arrow"></ion-icon>
      </div>
    </button>
    <div class="content">
      <ul>
        <li class="sidebar-link"><a href="{{url('#')}}">Add Menu</a></li>
        <li class="sidebar-link"><a href="{{url('#')}}">View Menu</a></li>
      </ul>
    </div>

    <div class="top-link">
      <a href="#" class="sidebar-link">
        <span class="icon"><ion-icon name="shield-checkmark-outline"></ion-icon></ion-icon></span>
        <span class="title">Reports</span>
      </a>
    </div>



    <button id="menu6" class="collapsible">
      <div>
        <a>
          <span class="icon"><ion-icon name="basket-outline"></ion-icon></span>
          <span class="title">Order Management</span>
        </a>
        <ion-icon name="chevron-down-outline" class="arrow"></ion-icon>
      </div>
    </button>
    <div class="content">
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
    <div class="content">
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
    <div class="content">
      <ul>
        <li class="sidebar-link"><a href="#">Pending Orders</a></li>
        <li class="sidebar-link"><a href="#">Order Approved</a></li>
        <li class="sidebar-link"><a href="#">Processed Item</a></li>
        <li class="sidebar-link"><a href="#">Received from Courier</a></li>
        <li class="sidebar-link"><a href="#">Send to Courier </a></li>
        <li class="sidebar-link"><a href="#">Delivered to Customer</a></li>
      </ul>
    </div>
  </div>

  <script src="{{asset('js/double2.js')}}"></script>


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
                                                                                            

</body>
</html>
