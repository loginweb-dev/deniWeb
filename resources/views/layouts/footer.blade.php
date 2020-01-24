<footer class="page-footer text-center text-md-left stylish-color-dark pt-0">

    <div style="background-color: #4285f4;">

      <div class="container">

        <!-- Grid row -->
        <div class="row py-4 d-flex align-items-center">

          <!-- Grid column -->
          <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">

            <h6 class="mb-0 white-text">¡Conéctate con nosotros en las redes sociales!</h6>

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-6 col-lg-7 text-center text-md-right">

            <!-- Facebook -->
            <a href="{{ setting('social.link_facebook') ?? '#' }}" class="fb-ic ml-0 px-2"><i class="fab fa-facebook-f white-text"> </i></a>

            <!-- Twitter -->
            <a href="{{ setting('social.link_twitter') ?? '#' }}" class="tw-ic px-2"><i class="fab fa-twitter white-text"> </i></a>

            <!-- Google + -->
            <a href="{{ setting('social.link_github') ?? '#' }}" class="gh-ic px-2"><i class="fab fa-github white-text"> </i></a>

            <!-- Linkedin -->
            <a href="{{ setting('social.link_linkedin') ?? '#' }}" class="li-ic px-2"><i class="fab fa-linkedin-in white-text"> </i></a>

            <!-- Instagram -->
            <a href="{{ setting('social.link_instagram') ?? '#' }}" class="ins-ic px-2"><i class="fab fa-instagram white-text"> </i></a>

          </div>
          <!-- Grid column -->

        </div>
        <!-- Grid row -->

      </div>

    </div>

    <!-- Footer Links -->
    <div class="container mt-5 mb-4 text-center text-md-left">

      <div class="row mt-3">

        <!-- First column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mb-4">

          <h6 class="text-uppercase font-weight-bold"><strong>{{ setting('aboutus.name') }}</strong></h6>

          <hr class="blue mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">

          <p>{{ setting('aboutus.description') }}</p>

        </div>
        <!-- First column -->

        <!-- Second column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <h6 class="text-uppercase font-weight-bold"><strong>Productos</strong></h6>
          <hr class="blue mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p><a href="#!">Aplicacaiones Web</a></p>
          <p><a href="#!">Aplicaciones móviles Android y IOS</a></p>
          <p><a href="#!">Venta de productos y servicios</a></p>

        </div>
        <!-- Second column -->

        <!-- Third column -->
        {{-- <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

          <h6 class="text-uppercase font-weight-bold"><strong>Useful links</strong></h6>

          <hr class="blue mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">

          <p><a href="#!">Your Account</a></p>

          <p><a href="#!">Become an Affiliate</a></p>

          <p><a href="#!">Shipping Rates</a></p>

          <p><a href="#!">Help</a></p>

        </div> --}}
        <!-- Third column -->

        <!-- Fourth column -->
        <div class="col-md-6 col-lg-4 col-xl-4">
          <h6 class="text-uppercase font-weight-bold"><strong>Contacto</strong></h6>
          <hr class="blue mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p><i class="fas fa-home mr-3"></i> {{ setting('aboutus.direccion') }}</p>
          <p><i class="fas fa-envelope mr-3"></i> i{{ setting('aboutus.email') }}</p>
          <p><i class="fas fa-phone mr-3"></i>{{ setting('aboutus.telefono') }}</p>

        </div>
        <!-- Fourth column -->

      </div>

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright py-3 text-center">

      <div class="container-fluid">

        © 2019 Copyright: <a href="" target="_blank"> LoginWeb.net</a>

      </div>

    </div>
    <!-- Copyright -->

  </footer>