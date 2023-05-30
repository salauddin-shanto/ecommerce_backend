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
    <link rel="stylesheet" href="{{asset('css/master.css')}}">
</head>

<body> 

    
<!--Main Section starts here (Sidebar and content-->
    <div class="main">
        <div class="sidebar">  
            @include('admin/sidebar')
        </div>

        <div class="content">
            @include('admin/navbar')
            @yield('content')
        </div>

    </div>
    
    <!--Javascript codes -->
    <!--Javascript code for active link-->
    <script> 
        var dropdown = document.getElementsByClassName("arrow");
        var i;
        for (i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function() {
                this.classList.toggle("showSubMenu");
                var dropdownContent = this.parentElement.nextElementSibling;
                if(dropdownContent.style.display === "block"){
                    dropdownContent.style.display = "none";
                } 
                else{
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