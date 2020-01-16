@extends('layouts.app')
@section('title', 'Inicio')

@section('content')
    
<div class="container">
  
  <div class="row pt-4">
    
    <!-- Content -->
    <div class="col-lg-12">
     
      <!-- Products Grid -->
      <section class="section pt-4">

        <!-- Grid row -->
        <div class="section pt-4" >
          <!--Carousel Wrapper-->
          <div id="carousel-example-1z" class="carousel slide carousel-fade carousel-sm" data-ride="carousel">
            <!--Indicators-->
            <ol class="carousel-indicators">
              <li data-target="#carousel-example-1z" data-slide-to="0" class=""></li>
              <li data-target="#carousel-example-1z" data-slide-to="1" class=""></li>
              <li data-target="#carousel-example-1z" data-slide-to="2" class="active"></li>
            </ol>
            <!--/.Indicators-->
            <!--Slides-->
            <div class="carousel-inner" role="listbox">
              <!--First slide-->
              <div class="carousel-item">
                <img class="d-block w-100" src="https://scontent-lim1-1.xx.fbcdn.net/v/t1.0-9/29790578_1652095124869213_3634760196162584576_o.jpg?_nc_cat=105&_nc_oc=AQnjH36ohFi0vNv6S4yp8pxQk8yT3VTUOTfwWIMTlO0wnTYGN_GN0umMA_XFzmW493g&_nc_ht=scontent-lim1-1.xx&oh=0fa75f2122a6abc310bb72f4cc03091f&oe=5E4A431D" alt="First slide">
              </div>
              <!--/First slide-->
              <!--Second slide-->
              <div class="carousel-item">
                <img class="d-block w-100" src="https://scontent-lim1-1.xx.fbcdn.net/v/t1.0-9/29101387_1647344482027980_6174117086654044263_n.jpg?_nc_cat=110&_nc_oc=AQktGouvw1F8rT62tcMEd3LIgD6yZeC6pFkvy3QuhLDvh3eExvFPYlPYdDB-sBUGnKc&_nc_ht=scontent-lim1-1.xx&oh=6a840b0cd12e55114bbf197e1d5c85ac&oe=5E492A7D" alt="Second slide">
              </div>
              <!--/Second slide-->
              <!--Third slide-->
              <div class="carousel-item active">
                <img class="d-block w-100" src="https://scontent-lim1-1.xx.fbcdn.net/v/t1.0-9/71337311_2445782875500430_3443607840520929280_n.jpg?_nc_cat=100&_nc_oc=AQkPJe1IU43XizJjvwe2P_fFIp5mXUM8yiqTglECbAETxRN9GlRaVueklKzZVeGVgmo&_nc_ht=scontent-lim1-1.xx&oh=41213b792838244d54f0912f7808da0c&oe=5E5A31FB" alt="Third slide">
              </div>
              <!--/Third slide-->
            </div>
            <!--/.Slides-->
            <!--Controls-->
            <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
            <!--/.Controls-->
          </div>
          <!--/.Carousel Wrapper-->
        </div>
        <!-- Grid row -->
        <br>
        <!-- Section small products -->
        <section>
            <div class="row pt-4">

                <!-- Sidebar -->
                <div class="col-lg-3">
          
                  <div class="">
          
                    <!-- Grid row -->
                    <div class="row">
                      <div class="col-md-6 col-lg-12 mb-5">
          
                        <!-- Panel -->
                        <h5 class="font-weight-bold dark-grey-text"><strong>Ordenado por</strong></h3>
                        <div class="divider"></div>  
                        <p><a class="dark-grey-text link-ordering" data-value="views">Mas populares</a></p>
                        <p><a class="dark-grey-text link-ordering" data-value="comments">Mas comentados</a></p>
                        <p><a class="dark-grey-text link-ordering" data-value="rating">Mayor puntuación</a></p>
                      </div>
          
                      <!-- Filter by category -->
                      <div class="col-md-6 col-lg-12 mb-5">
          
                        <h5 class="font-weight-bold dark-grey-text"><strong>Categorias</strong></h3>
          
                          <div class="divider"></div>
          
                          <!-- Radio group -->
                          <div class="form-group ">
                            <input class="form-check-input category_id" data-id="" name="group100" type="radio" id="radio0" checked>
                            <label for="radio0" class="form-check-label dark-grey-text category_id">Todas</label>
                          </div>
                          @foreach ($categorias as $item)
                            <div class="form-group">
                              <input class="form-check-input category_id" data-id="{{ $item->id }}" name="group100" type="radio" id="radio{{ $item->id }}">
                              <label for="radio{{ $item->id }}" class="form-check-label dark-grey-text category_id" data-id="{{ $item->id }}">{{ $item->name }}</label>
                            </div>
                          @endforeach
                          <!-- Radio group -->
                      </div>
          
                      <!-- Filter by category -->
                    </div>
                    <!-- Grid row -->
          
                  </div>
          
                </div>
                <!-- Sidebar -->
          
                <!-- Content -->
                <div class="col-lg-9">
                  <form id="form-search">
                      <div class="col-md-12">
                          <div class="md-form input-group mb-2">
                              <input type="text" class="form-control" id="input-search" placeholder="Buscar" aria-label="Buscar" aria-describedby="material-addon1">
                              <div class="input-group-prepend">
                                <span class="input-group-text md-addon" id="btn-remove-search" style="display:none"><span class="fa fa-times"></span></span>
                                <span class="input-group-text md-addon" id="material-addon1"><span class="fa fa-search"></span></span>
                              </div>
                          </div>
                      </div>
                  </form>
                  <!-- empresas Grid -->
                  <div class="mt-3" id="loader-spinner" style="display:none">
                    <div class="d-flex justify-content-center" >
                      <div class="spinner-border text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                      </div>
                    </div>
                  </div>
                  
                  <section class="section pt-4 mb-5" id="empresas_list"></section>
                  <!-- empresas Grid -->
          
                </div>
                <!-- Content -->
          
              </div>

        </section>

      </section>
      <!-- Products Grid -->

    </div>
    <!-- Content -->

  </div>

</div>

@endsection

@section('js')
    <script>
      // Variables para obtener lista de empresas
      const URL = '{{ url("filter") }}';
      var page = 1;
      var order = '';
      var category = '';
      var search = '';

      $(document).ready(function(){
        empresas_list();

        // Filtro de ordenamiento
        $('.link-ordering').click(function(){
          $('.link-ordering').removeClass('blue-text');
          $('.link-ordering').addClass('dark-grey-text');

          $(this).removeClass('dark-grey-text');
          $(this).addClass('blue-text');

          order = $(this).data('value');
          empresas_list();
        });

        // Filtro por categorías
        $('.category_id').click(function(){
          category = $(this).data('id');
          empresas_list();
          $("html,body").animate({scrollTop: $('#form-search').offset().top}, 500);
        });

        // Filtro por busqueda
        $('#form-search').on('submit', function(e){
          e.preventDefault();
          search = $('#input-search').val();
          empresas_list();
          $("html,body").animate({scrollTop: $('#form-search').offset().top}, 500);
        });

        $('#input-search').keyup(function(){
          search = '';
          $('#btn-remove-search').css('display', 'block');
        });

        // Reset el input de busqueda
        $('#btn-remove-search').click(function(){
          $('#input-search').val('');
          empresas_list();
          $('#btn-remove-search').css('display', 'none');
          $("html,body").animate({scrollTop: $('#form-search').offset().top}, 500);
        });

      });

      function empresas_list(){
        $('#loader-spinner').css('display', 'block');
        page = page ? page : 1;
        order = order ? order : 'all';
        category = category ? category : 'all';
        search = search ? search : 'all';

        $.get(`${URL}/${order}/${category}/${search}?page=${page}`, function(data){
          $('#empresas_list').html(data);
          $('#loader-spinner').css('display', 'none');
        });
      }
    </script>
@endsection