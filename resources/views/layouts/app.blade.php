<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  {!! SEO::generate() !!}
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="../recursos/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="../recursos/css/mdb.min.css" rel="stylesheet">
  <link href="../recursos/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/jquery.floating-social-share.min.css">
  
  <style>

  </style>

</head>


<body class="homepage-v3 hidden-sn white-skin animated">
 
    <!-- Navigation -->
  @include('layouts.header')
    <!-- Navigation -->
  
    <!-- Mega menu -->
    {{-- @include('layouts.megamenu') --}}
    <!-- Mega menu -->
  
    <!-- Main Container -->
   @yield('content')
       
   @yield('sharesocial')
    <!-- Main Container -->
    <!-- Footer -->
   @include('layouts.footer')
    <!-- Footer -->
  
    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="../recursos/js/jquery-3.4.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="../recursos/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="../recursos/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="../recursos/js/mdb.min.js"></script>
    <script type="text/javascript" src="../js/jquery.floating-social-share.min.js"></script>
    
    <script type="text/javascript">
      /* WOW.js init */
      new WOW().init();
  
      // Tooltips Initialization
      $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      })
  
      // Material Select Initialization
      $(document).ready(function () {
        $('.mdb-select').materialSelect();
      });
  
      // SideNav Initialization
      $(".button-collapse").sideNav();
 
    </script>
   @yield('js')
  </body>
</html>
