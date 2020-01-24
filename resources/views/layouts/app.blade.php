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
    <link href="{{ url('recursos/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{ url('recursos/css/mdb.min.css') }}" rel="stylesheet">
    <link href="{{ url('recursos/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('css/jquery.floating-social-share.min.css') }}">
    <link rel="icon" type="image/png" href="{{ url('recursos/img/icon.png') }}" />
    <style>

    </style>

    {{-- Sección auxiliar para agregar SEO a vistas del sistema como login y register --}}
    @yield('head')
    @laravelPWA
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
    <script type="text/javascript" src="{{ url('recursos/js/jquery-3.4.1.min.js') }}"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{ url('recursos/js/popper.min.js') }}"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{ url('recursos/js/bootstrap.min.js') }}"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{ url('recursos/js/mdb.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/jquery.floating-social-share.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    
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
