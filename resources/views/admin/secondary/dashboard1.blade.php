<!doctype html>
<html lang="en">

<head> 
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/dashboard1.css')}}">
</head>

<body>
<!--Navbar starts -->
    <header> 
        <nav class="navbar navbar-expand-sm bground ">
              <div class="container">
                <a class="navbar-brand navLink" href="#">Logo</a>
                <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link navLink" href="#" aria-current="page">Home <span class="visually-hidden">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link navLink" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle navLink" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class="dropdown-item navLink" href="#">Action 1</a>
                                <a class="dropdown-item navLink" href="#">Action 2</a>
                            </div>
                        </li>
                    </ul>
                    <form class="d-flex my-2 my-lg-0">
                        <input class="form-control me-sm-2" type="text" placeholder="Search">
                        <button class="btn my-2 my-sm-0 bg-success navLink" type="submit">Search</button>
                    </form>
                </div>
          </div>
        </nav>
    </header>
<!--Navbar Ends -->
 
<!--Main Section starts here (Sidebar and content-->
    <div class="main">
<!--Sidebar starts -->
        <div class="sidebar">  
            <ul>  
                <li class="list">
                    <div class="toggle">
                        <ion-icon name="menu-outline" class="open"></ion-icon>
                        <ion-icon name="close-outline" class="close"></ion-icon>
                    </div>
                </li>

                <li class="list">
                    <div class="menuItem">
                        <a href="/dashboard">
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
                        <li><a href="">Unit settings</a></li>
                        <li><a href="">Aria settings</a></li>
                        <li><a href="">Supplier settings</a></li>
                        <li><a href="">Courier Settings</a></li>
                        <li><a href="">Category</a></li>
                        <li><a href="">Product</a></li>
                    </ul>
                </li>

                {{-- 
                    Sub Category of settings
                    @php
                        $subSettings = array('Unit settings','Aria settings','Supplier settings','Courier Settings','Category','Product');
                    @endphp
                    
                    @foreach ($subSettings as $title)
                    <li class="subSettings"><a href="/subSettings">
                        <span class="title">{{$title}}</span>
                    </a></li>
                    @endforeach
                --}}

                <li class="list">
                    <div class="menuItem">
                        <a href="#">
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

        </div>

        <div class="content">
            <div class="container">

                <div class="row">
                    <div class="col bg-primary">1</div>
                    <div class="col bg-success">2</div>
                </div>
                <div class="row">
                    <div class="col-sm-4">3</div>
                    <div class="col-sm-4">4</div>
                    <div class="col-sm-4">5</div>
                </div>
            </div>
        </div>

    </div>
            <!--Javascript codes -->
            <!--Javascript code for active link-->
            <script> 
                /*
                function active(element){
                    document.querySelector(element).classList.toggle('active');
                } */

                var dropdown = document.getElementsByClassName("arrow");
                var i;

                for (i = 0; i < dropdown.length; i++) {
                    dropdown[i].addEventListener("click", function() {
                        this.classList.toggle("showSubMenu");
                        var dropdownContent = this.parentElement.nextElementSibling;
                        if (dropdownContent.style.display === "block") {
                        dropdownContent.style.display = "none";
                        } else {
                        dropdownContent.style.display = "block";
                        }
                    });
                }


                let menuToggle=document.querySelector('.toggle');
                let sidebar=document.querySelector('.sidebar');
                let content=document.querySelector('.content');

                menuToggle.onclick=function(){
                    menuToggle.classList.toggle('active');
                    sidebar.classList.toggle('active');
                    content.classList.toggle('active');
                    

                }

            </script>

<!--Sidebar Ends -->

<!--Main Content starts -->


















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