<link rel="stylesheet" href="{{asset('css/frontend/layout/navbar0.css')}}">
{{-- <nav class="navbar">
    <div class="navbar-logo">
        <a href="{{ route('home') }}"><img src="{{ asset('image/logo.png') }}" alt="Logo"></a>
    </div>
    <div class="navbar-search">
        <form action="" method="GET">
            <input type="text" name="query" placeholder="Search...">
            <button type="submit">Search</button>
        </form>
    </div>
    <div class="navbar-links">
        <ul>
            <li><a href="#">Link 1</a></li>
            <li><a href="#">Link 2</a></li>
            <li><a href="#">Link 3</a></li>
            <li><a href="#">Link 4</a></li>
            <li><a href="#">Link 5</a></li>
            <li><a href="#">Link 6</a></li>
            <!-- Add more links/buttons as needed -->
        </ul>
    </div>
</nav>
 --}}
 <nav class="navbar">
    <div class="navbar-left">
        <a href="{{ route('home') }}"><img src="{{ asset('image/logo.png') }}" alt="Logo"></a>
    </div>
    <div class="navbar-right">
        <button class="navbar-toggler">
            <i class="fas fa-bars"></i>
        </button>
    </div>
    <div class="navbar-search">
        <form action="#" method="GET">
            <input type="text" name="query" placeholder="Search...">
            <button type="submit">Search</button>
        </form>
    </div>
    <div class="navbar-links">
        <ul>
            <li><a href="#">Link 1</a></li>
            <li><a href="#">Link 2</a></li>
            <li><a href="#">Link 1</a></li>
            <li><a href="#">Link 2</a></li>
            <li><a href="#">Link 1</a></li>
            <li><a href="#">Link 2</a></li>
            <li><a href="#">Link 1</a></li>
            <!-- Add more links/buttons as needed -->
        </ul>
    </div>
</nav>

<!-- Add this script to the end of your HTML file, after jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-F2KDf6T/Fo8NaTC93YhQIbuPogPHI5IYrdlzI2WkUVYP02vTkOs2YUHQ/mb2oU3BW2QJ4FkIIW65vJ44K3XpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(document).ready(function() {
        $('.navbar-toggler').click(function() {
            $('.navbar-links ul').toggleClass('show');
        });
    });
</script>

