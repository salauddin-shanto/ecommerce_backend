<link rel="stylesheet" href="{{asset('css/admin/layout/navbar.css')}}">
<nav class="navbar nivagation">
    <div class="right-align">
        @auth
            <div class="element">
                <a class="nav-link login-link btn btn-md " href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a>
            </div>

            <div class="element">
{{--                 <a class="nav-link login-link btn btn-md " href="{{ route('admin-profile') }}">Profile</a> --}}
                <a class="nav-link login-link btn btn-md " href="{{ route('admin-profile') }}"><i class="fa fa-user-circle" aria-hidden="true"></i></a>
            </div>

            <div class="element">
{{--                 <a class="nav-link login-link btn btn-md " href="{{ route('admin-logout') }}">Logout</a>
 --}}                <a class="nav-link login-link btn btn-md " href="{{ route('admin-logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
            </div>
        @else
            <div class="element">
                <a class="nav-link login-link btn btn-md logout-link" href="{{ route('admin-login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i></a>
            </div>
        @endauth
    </div>  
</nav>



{{-- 
<link rel="stylesheet" href="{{asset('css/admin/layout/navbar.css')}}">
<nav class="navbar navbar-expand-lg bg-secondary">
    <div class="container d-flex justify-content-end">
        <!-- Navbar content -->
        
        <a class="nav-link ml-auto" href="{{ route('admin-login') }}">Login</a>
    </div>
</nav> --}}
