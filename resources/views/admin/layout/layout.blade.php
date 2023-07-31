<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ras Hi-Tech</title>

    <!-- External Resources -->
    <link href="{{asset('cdns/cdnjs.cloudflare.com_ajax_libs_font-awesome_4.7.0_css_font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('cdns/fonts.googleapis.com_css2_family=Source+Sans+Pro_wght@400;600;700&display=swap.css')}}" rel="stylesheet">
    <script src="{{asset('cdns/kit.fontawesome.com_a1ca225932.js')}}" crossorigin="anonymous"></script>
    <link href="{{asset('cdns/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_css_bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="{{asset('cdns/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js')}}" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="{{asset('cdns/cdnjs.cloudflare.com_ajax_libs_axios_1.4.0_axios.min.js')}}" integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('cdns/code.jquery.com_jquery-3.7.0.min.js')}}"></script>
    <link href="{{asset('cdns/select2.css')}}" rel="stylesheet" />
    <script src="{{asset('cdns/select2.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script>


    <!--page css-->
    <link rel="stylesheet" href="{{asset('css/admin/layout/layout.css')}}">

</head>


<body>
    <div class="layout"> 
        <div class="side">
            @include('admin/layout/sidebar')
        </div>

        <div class="main">
            <div class="nav">
                @include('admin/layout/navbar')
            </div>
            
            <div class="cont">
                @yield('content')
            </div>      
        </div>

    </div>


</body>
</html>