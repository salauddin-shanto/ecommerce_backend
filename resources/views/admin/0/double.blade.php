<!DOCTYPE html>
<html>
<head>
  <title>Two-Level Double Collapsible Sidebar</title>
  <link rel="stylesheet" href="{{asset('css/double.css')}}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700&display=swap" rel="stylesheet">
  
</head>
<body> 
  <div class="sidebar">

        <div class="toggle">
            <ion-icon name="menu-outline" class="open"></ion-icon>
            <ion-icon name="close-outline" class="close"></ion-icon>
        </div>

    <button id="menu1" class="collapsible">Menu 1</button>
    <div class="content">
      <ul>


  
        <li class="sidebar-link">Item 1</li>
        <li class="sidebar-link">Item 2</li>
        <li id="submenu1" class="collapsible sidebar-link">Submenu 1</li>
        <div class="nested">
          <ul>
            <li class="sidebar-link">Subitem 1</li>
            <li class="sidebar-link">Subitem 2</li>
            <li class="sidebar-link">Subitem 3</li>
          </ul>
        </div>
      </ul>
    </div>
    
    <button id="menu2" class="collapsible">Menu 2</button>
    <div class="content">
      <ul>
        <li class="sidebar-link">Item 3</li>
        <li id="submenu2" class="collapsible sidebar-link">Submenu 2</li>
        <div class="nested">
          <ul>
            <li class="sidebar-link">Subitem 4</li>
            <li class="sidebar-link">Subitem 5</li>
            <li class="sidebar-link">Subitem 6</li>
          </ul>
        </div>
        <li class="sidebar-link">Item 4</li>
      </ul>
    </div>
  </div>

  <script src="{{asset('js/double.js')}}"></script>


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
