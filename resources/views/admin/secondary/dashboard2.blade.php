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
    <link rel="stylesheet" href="{{asset('css/dashboard2.css')}}">
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
                <li class="list"><a href="/dashboard">
                    <span class="icon"><ion-icon name="grid-outline"></ion-icon></ion-icon></span>
                    <span class="title">Dashboard</span>
                </a></li>

                <li class="list"><a href="#" onclick="showSubs('subSettings')">
                    <span class="icon"><ion-icon name="settings-outline"></ion-icon></span>
                    <span class="title">Settings </span>
                </a></li>

                {{-- Sub Category of settings --}}
                @php
                    $subSettings = array('Unit settings','Aria settings','Supplier settings','Courier Settings','Category','Product');
                @endphp
                
                @foreach ($subSettings as $title)
                <li class="subSettings"><a href="/subSettings">
                    <span class="icon"><ion-icon name="settings-sharp"></ion-icon></span>
                    <span class="title">{{$title}}</span>
                </a></li>
                @endforeach

                <li class="list"><a href="#">
                    <span class="icon"><ion-icon name="at-outline"></ion-icon></span>
                    <span class="title">Admin Manager</span>
                </a></li>

                <li class="list"><a href="#">
                    <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
                    <span class="title">Client Manager</span>
                </a></li>

                <li class="list"><a href="#">
                    <span class="icon"><ion-icon name="caret-forward-circle-outline"></ion-icon></span>
                    <span class="title">Menu Privilege</span>
                </a></li>

                <li class="list"><a href="#">
                    <span class="icon"><ion-icon name="shield-checkmark-outline"></ion-icon></span>
                    <span class="title">Report's</span>
                </a></li>

                <li class="list"><a href="#" onclick="showSubs('subOrders')">
                    <span class="icon"><ion-icon name="basket-outline"></ion-icon></span>
                    <span class="title">Order Management</span>
                </a></li>

                {{-- sub category of Orders --}}
                @php
                    $subOrders = array('Pending Orders','Order Approved','Processed Item','Received from Courier','Send to Courier item','Delivered to Customer');
                    $icons = array('time-outline','checkbox-outline','cloud-done-outline','trending-up-outline','walk-outline','thumbs-up-outline');
                @endphp

                @foreach ($subOrders as $index => $title)
                    <li class="subOrders"><a href="#">
                        <span class="icon"><ion-icon name="{{$icons[$index]}}"></ion-icon></span>
                        <span class="title">{{$title}}</span>
                    </a></li>
                @endforeach

                <li class="list"><a href="#" onclick="showSubs('subSuppliers')">
                    <span class="icon"><ion-icon name="shirt-outline"></ion-icon></span>
                    <span class="title">Supplier Menu</span>
                </a></li>

                @php
                    $subSuppliers = array('All Products','Pending Supply','Processed Item','Received from Courier');
                    $icons = array('globe-outline','time-outline','cloud-done-outline','trending-up-outline');
                @endphp

                @foreach ($subSuppliers as $index => $title)
                    <li class="subSuppliers"><a href="#" >
                        <span class="icon"><ion-icon name="{{$icons[$index]}}"></ion-icon></span>
                        <span class="title">{{$title}}</span>
                    </a></li>
                @endforeach               

                <li class="list"><a href="#" onclick="showSubs('subCouriers')">
                    <span class="icon"><ion-icon name="car-outline"></ion-icon></span>
                    <span class="title">Courier Manager</span>
                </a></li>     
                
                @php
                $subCouriers = array('Arrive to Parcel','Received item','Send to Courier ','Delivered to Customer');
                $icons = array('globe-outline','time-outline','cloud-done-outline','trending-up-outline');
                @endphp

                @foreach ($subCouriers as $index => $title)
                    <li class="subCouriers"><a href="#" >
                        <span class="icon"><ion-icon name="{{$icons[$index]}}"></ion-icon></span>
                        <span class="title">{{$title}}</span>
                    </a></li>
                @endforeach   

            </ul>

            {{-- 
            <div class="sidebar-bottom">
                <div class="companyLogo">Ras-HiTech</div>
                <div class="icon">
                    <div class="toggle">
                        <ion-icon name="menu-outline"></ion-icon>
                        <ion-icon name="close-outline"></ion-icon>
                    </div>
                </div>
            </div> 
            --}}

            <div class="toggle">
                <ion-icon name="menu-outline" class="open"></ion-icon>
                <ion-icon name="close-outline" class="close"></ion-icon>
            </div>


        </div>

<!--Javascript codes -->
<!--Javascript code for active link-->
        <script>

            function showSubs(subClass){
                let subClassShow='.'.concat(subClass);
                let show=document.querySelectorAll(subClassShow);
                for(let i=0;i<show.length;i++){
                    show[i].className=subClass.concat(' ','show');
                }    
            }

            function hideSubs(subClass){
                let subClassHide='.'.concat(subClass) ;
                subClassHide = subClassHide.concat('.show');
                let hide=document.querySelectorAll(subClassHide) ;
                let k=0;
                while(k<hide.length){
                    hide[k++].className=subClass;
                }
            }
 
            let list=document.querySelectorAll('.list') ;
            for(let i=0;i<list.length;i++){
                list[i].onclick=function(){
                    let j=0;
                    while(j<list.length){
                        list[j++].className='list';
                    }
                    list[i].className='list active'; 
                    
                    if(i!=1 && document.querySelector('.subSettings.show')){
                        if(document.querySelector('.subSettings.show.active')){
                        document.querySelector('.subSettings.show.active').className='subSettings show';
                        }
                        hideSubs('subSettings');  
                    }
                    
                    if(i!=6 && document.querySelector('.subOrders.show')){
                        if(document.querySelector('.subOrders.show.active')){
                            document.querySelector('.subOrders.show.active').className='subOrders show'; 
                        }  
                        hideSubs('subOrders');  
                    }

                    if(i!=7 && document.querySelector('.subSuppliers.show')){
                        if(document.querySelector('.subSuppliers.show.active')){
                            document.querySelector('.subSuppliers.show.active').className='subSuppliers show'; 
                        }  
                        hideSubs('subSuppliers');  
                    }

                    if(i!=8 && document.querySelector('.subCouriers.show')){
                        if(document.querySelector('.subCouriers.show.active')){
                            document.querySelector('.subCouriers.show.active').className='subCouriers show'; 
                        }  
                        hideSubs('subCouriers');  
                    }

                                  
                }

            }

            let subSettingsList=document.querySelectorAll('.subSettings') ;
            for(let i=0;i<subSettingsList.length;i++){
                subSettingsList[i].onclick=function(){
                    let j=0;
                    while(j<subSettingsList.length){
                        subSettingsList[j++].className='subSettings show';
                    }
            
                    subSettingsList[i].className='subSettings show active';
                    document.querySelector('.list.active').className='list';
/*                     document.querySelector('.subOrders.show.active').className='subOrders show';
                    hideSubs('subOrders'); */
                    
                }
            }

            let subOrdersList=document.querySelectorAll('.subOrders') ;
            for(let i=0;i<subOrdersList.length;i++){
                subOrdersList[i].onclick=function(){
                    let j=0;
                    while(j<subOrdersList.length){
                        subOrdersList[j++].className='subOrders show';
                    }
            
                    subOrdersList[i].className='subOrders show active';
                    document.querySelector('.list.active').className='list';
/*                     document.querySelector('.subSettings.show.active').className='subSettings show';
                    hideSubs('subSettings'); */
                    
                }
            }

            let subSuppliersList=document.querySelectorAll('.subSuppliers') ;
            for(let i=0;i<subSuppliersList.length;i++){
                subSuppliersList[i].onclick=function(){
                    let j=0;
                    while(j<subSuppliersList.length){
                        subSuppliersList[j++].className='subSuppliers show';
                    }
            
                    subSuppliersList[i].className='subSuppliers show active';
                    document.querySelector('.list.active').className='list';
/*                     document.querySelector('.subSettings.show.active').className='subSettings show';
                    hideSubs('subSettings'); */
                    
                }
            }

            let subCouriersList=document.querySelectorAll('.subCouriers') ;
            for(let i=0;i<subCouriersList.length;i++){
                subCouriersList[i].onclick=function(){
                    let j=0;
                    while(j<subCouriersList.length){
                        subCouriersList[j++].className='subCouriers show';
                    }
            
                    subCouriersList[i].className='subCouriers show active';
                    document.querySelector('.list.active').className='list';
/*                     document.querySelector('.subSettings.show.active').className='subSettings show';
                    hideSubs('subSettings'); */
                    
                }
            }


 
             

            let menuToggle=document.querySelector('.toggle');
            let sidebar=document.querySelector('.sidebar');
            menuToggle.onclick=function(){
                menuToggle.classList.toggle('active');
                sidebar.classList.toggle('active');
            }

        </script>

<!--Sidebar Ends -->

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