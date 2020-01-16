<header>

    <!-- Sidebar navigation -->
    <ul id="slide-out" class="side-nav custom-scrollbar">

      <!-- Logo -->
      <li>

        <div class="logo-wrapper waves-light">

          <a href="{{ url('/') }}"><img src="{{ url('recursos/img/logo.png') }}" class="img-fluid flex-center"></a>

        </div>

      </li>
      <!-- Logo -->

      <!-- Social -->
      <li>

        <ul class="social">

          <li><a class="fb-ic"><i class="fab fa-facebook-f"> </i></a></li>

          <li><a class="pin-ic"><i class="fab fa-pinterest"> </i></a></li>

          <li><a class="gplus-ic"><i class="fab fa-google-plus-g"> </i></a></li>

          <li><a class="tw-ic"><i class="fab fa-twitter"> </i></a></li>

        </ul>

      </li>
      <!-- Social -->

      <!-- Search Form -->
      {{-- <li>

        <form class="search-form" role="search">

          <div class="form-group md-form mt-0 pt-1 waves-light">

            <input type="text" class="form-control" placeholder="Search">

          </div>

        </form>

      </li> --}}
      <!-- Search Form -->

      <!-- Side navigation links -->
      <li>

        <ul class="collapsible collapsible-accordion">
          <li><a href="{{ route('contact') }}" class="collapsible-header waves-effect"><i class="fas fa-envelope"></i>Contacto</a></li>
        </ul>

      </li>

      <!-- Side navigation links -->
      <div class="sidenav-bg mask-strong"></div>

    </ul>
    <!-- Sidebar navigation -->

    <!-- Navbar -->
     <nav class="navbar fixed-top navbar-expand-lg  navbar-light scrolling-navbar white">

      <div class="container">

        <!-- SideNav slide-out button -->
        <div class="float-left mr-2">

          <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-bars"></i></a>

        </div>

        <a class="navbar-brand font-weight-bold" href="{{ url('/') }}"><strong>{{ setting('site.title') }}</strong></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
          aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">

          <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent-4">

            <ul class="navbar-nav ml-auto">
                @guest
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link waves-effect waves-light dark-grey-text font-weight-bold" href="{{ route('register') }}">
                                <i class="fas fa-edit blue-text"></i> Registrarse
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link waves-effect waves-light dark-grey-text font-weight-bold" href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt blue-text"></i> Login
                        </a>
                    </li>
                @else
                    {{-- <li class="nav-item">
                        <a class="nav-link waves-effect waves-light dark-grey-text font-weight-bold" href="{{route('pedidos_index', ['id'=>'last'])}}" title="Pedidos pendientes" id="label-pedidos">
                            <i class="fas fa-clipboard-list blue-text"></i> Mis pedidos
                        </a>
                    </li> --}}
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle waves-effect waves-light dark-grey-text font-weight-bold" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="far fa-address-card blue-text"></i> Cuenta <span class="caret"></span>
                        </a>
    
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @if(Auth::user()->role_id != 2)
                            <a class="dropdown-item link-page" target="_blank" href="{{ url('admin') }}">Administración</a>
                            @endif
                            <a class="dropdown-item link-page" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Salir
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
    
              </ul>
        </div>
         </div>
      </div>
    </nav> 

    <!-- Navbar -->
    <
  </header>