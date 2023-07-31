<link rel="stylesheet" href="{{asset('css/frontend/layout/navbar.css')}}">

<div class="container-fluid">
    <nav class="navbar container">

        <div class="collapse-btn">
            <button><i class="fa-solid fa-bars"></i></button>
        </div>

        <div class="nav-logo">
            <a href=""><img src="{{asset('image/logo.png')}}" alt=""></a>
        </div>
    
        <div class="nav-search">
            <form action="" method="post">
                <input type="text" class="form-control" placeholder="search...">
                <button type="submit" class="btn btn-primary btn-md">Search</button>
            </form>
        </div>
    
        <div class="nav-links1">
            <ul>
                <li><a href="">Home</a></li>
                {{-- <li><button class="btn btn-md product-category-toggler">Product</button></li> --}}
                <li><a href="">Contact</a></li>
                <li><a href="">About Us</a></li>
                <li><a href="">Our Services</a></li>
            </ul>
        </div>

        <div class="nav-links2">
            <ul>
                <li><a href=""><i class="fa-solid fa-cart-shopping"></i></a></li>
                <li><a href=""><i class="fa-solid fa-user"></i></a></li>
            </ul>
        </div>
    </nav>

    <div class=" nav-search2">
        <form action="" method="post">
            <input type="text" class="form-control" placeholder="search...">
            <button type="submit" class="btn btn-primary btn-md">Search</button>
        </form>
    </div>

    <div class="collapsed-links">
        <!-- Add your content for the dropdown page here -->
        <ul>
            <li><a href="">Home</a></li>
            <li><a href="">Contact</a></li>
            <li><a href="">About Us</a></li>
            <li><a href="">Our Services</a></li>
        </ul>
    </div>


</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const navbarToggler = document.querySelector(".collapse-btn");
        const collapsedLinks = document.querySelector(".collapsed-links");

        navbarToggler.addEventListener("click", function() {
            collapsedLinks.classList.toggle("show");
        });

        const productCategoryToggler=document.getElementsByClassName("product-category-toggler");
        const productCategory= document.querySelector(".product-category");
        for(const toggler of productCategoryToggler){
            toggler.addEventListener("click", function() {
            productCategory.classList.toggle("show");
        });  
        }

    });
</script>
