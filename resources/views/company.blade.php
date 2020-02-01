@extends('layouts.app')
@section('title', 'Detalle Negocios')
@section('sharesocial')
<div class="content" style="margin-left: 0%; margin-right:10%; line-height: 72px; position:relative;">
    
</div>
@endsection
@section('content')
<div class="container mt-5 pt-3">
  <!-- Section: Product detail -->
  <section id="productDetails" class="pb-5">

    <!-- News card -->
    <div class="card mt-5 hoverable">

      <div class="row mt-5">

        <div class="col-lg-6">

          <!-- Carousel Wrapper -->
          <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">

            <!-- Slides -->
            <div class="carousel-inner text-center text-md-left" role="listbox">     
              @if ($detail->images!= "")
                  @forelse (json_decode($detail->images) as $item)
                      @if ($loop->first)
                          <div class="carousel-item active">
                            <img src="{{ asset('storage/'.$item) }}" alt="First slide"class="img-fluid">
                          </div>
                        @else
                          <div class="carousel-item">
                            <img src="{{ asset('storage/'.$item) }}" alt="First slide"class="img-fluid">
                          </div>
                      @endif
                    @empty
                  @endforelse
              @endif 
            </div>
            <!-- Slides -->
          
            <!-- Thumbnails -->
            <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">

              <span class="carousel-control-prev-icon" aria-hidden="true"></span>

              <span class="sr-only">Previous</span>

            </a>

            <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">

              <span class="carousel-control-next-icon" aria-hidden="true"></span>

              <span class="sr-only">Next</span>

            </a>
            <!-- Thumbnails -->

          </div>
          <!-- Carousel Wrapper -->

        </div>

        <div class="col-lg-5 mr-3 text-center text-md-left">

          <h2
            class="h2-responsive text-center text-md-left product-name font-weight-bold dark-grey-text mb-1 ml-xl-0 ml-4">
            <strong>{{ $detail->name }}</strong>
          </h2>
       
          <div class="row">
            <div class="col-md-6">
                <h5><span class="badge badge-danger product mb-4 ml-xl-0 ml-4">{{ $categoria->name }}</span></h5>
            </div>
            <div class="col-md-6">
                <div class="container">
                  <span id="rateMe1"></span>
                </div>
                <p class="text-center text-muted">Califícanos</p>
            </div>
          </div>

          <!-- Accordion wrapper -->
          <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">

            <!-- Accordion card -->
            <div class="card">

              <!-- Card header -->
              <div class="card-header" role="tab" id="headingOne1">
                <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1" aria-expanded="true" aria-controls="collapseOne1">
                  <h5 class="mb-0">Descripción<i class="fas fa-angle-down rotate-icon"></i></h5>
                </a>
              </div>

              <!-- Card body -->
              <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1" data-parent="#accordionEx">
                <div class="card-body">
                  <p>{{ $detail->description }}</p>
                  <i class="fas fa-globe mr-3"></i><a href="https://{{ $detail->site }}" target="_blanck">: {{ $detail->site }}</a><br>
                  <i class="fas fa-map-marked-alt mr-3"></i>: {{ $detail->addres }}
                </div>
              </div>

            </div>
            <!-- Accordion card -->
         
            <!-- Accordion card -->
            <div class="card">

              <!-- Card header -->
              <div class="card-header" role="tab" id="headingTwo2">

                <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo2" aria-expanded="false" aria-controls="collapseTwo2">
                  <h5 class="mb-0">Redes Sociales<i class="fas fa-angle-down rotate-icon"></i></h5>
                </a>

              </div>

              <!-- Card body -->
              <div id="collapseTwo2" class="collapse" role="tabpanel" aria-labelledby="headingTwo2"data-parent="#accordionEx">
                <div class="card-body">
                    @forelse ($redes as $item)
                        <a href="{{ $item->link }}" target="_blank"> <i class="{{ $item->icon}} fa-2x"></i> &nbsp; {{ $item->link }}</a><br>
                        @empty
                    @endforelse 
                </div>

              </div>
             
            </div>
            <!-- Accordion card -->

            <!-- Accordion card -->
            <div class="card">

              <!-- Card header -->
              <div class="card-header" role="tab" id="headingThree3">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseThree3" aria-expanded="false" aria-controls="collapseThree3">
                  <h5 class="mb-0">Horarios <i class="fas fa-angle-down rotate-icon"></i></h5>
                </a>
              </div>

              <!-- Card body -->
              <div id="collapseThree3" class="collapse" role="tabpanel" aria-labelledby="headingThree3"
                data-parent="#accordionEx">

                <div class="card-body">
                    @php
                      $nombre_dias = array('', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo');
                    @endphp
                    <table cellpadding="5">
                      @forelse ($horario as $item)
                        <tr>
                          <td><p><i class="far fa-calendar-alt"></i> {{ $nombre_dias[$item->dia] }}</p> </td>
                          <td>
                            <p>
                              <i class="far fa-clock"></i> 
                              {{ date('H:i', strtotime($item->hora_inicio1)) }} a {{ date('H:i', strtotime($item->hora_final1)) }}
                              @if ($item->hora_inicio2 && $item->hora_fin2)
                                - {{ date('H:i', strtotime($item->hora_inicio2)) }} a {{ date('H:i', strtotime($item->hora_final2)) }}
                              @endif
                            </p>
                          </td>
                        </tr>
                      @empty
                        
                      @endforelse
                    </table>
                </div>
            
              </div>

            </div>
            <!-- Accordion card -->

          </div>
          <!-- Accordion wrapper -->

          <!-- Add to Cart -->
          <section class="color">

            <div class="mt-5">

              {{-- <div class="row mt-3 mb-4"> --}}
              <div  class="row">
                <div class="col-md-12 text-center">
                  <div class="form-group">
                  
                   <a href="https://wa.me/{{ $detail->phone }}" target="blanck" class="btn btn-success btn-rounded btn-md"><i class="fab fa-whatsapp"></i> Chatear</a>
                   <a href="https://{{ $detail->sharemap }}" target="_blanck" class="btn btn-warning btn-rounded btn-md"><i class="fas fa-map-pin"></i> ubicacion</a>
                   <a id="btn-like" class="btn btn-primary btn-rounded btn-md"><i class="fas fa-thumbs-up"></i> Me Gusta</a>
                    
                </div>   
              </div>
              </div>

            </div>

          </section>
          <!-- Add to Cart -->

        </div>

      </div>

    </div>

  </section>

  <!-- Section: Product detail -->
  <div class="divider-new">

    <h3 class="h3-responsive font-weight-bold blue-text mx-3">Descripcion del Negocio</h3>
  </div>

  <!-- Product Reviews -->
  <section id="reviews" class="pb-5">

   
    {!! $detail->description_long !!}
    <!-- Main wrapper -->

  </section>

  <!-- Product comments -->
  <div class="divider-new">

    <h3 class="h3-responsive font-weight-bold blue-text mx-3">Comentarios</h3>

  </div>

  <!-- Section: Products-->
  <section id="products" class="pb-5">
 <!-- Parrafo -->
    <p class="text-center w-responsive mx-auto mb-5 dark-grey-text"></p>

   
      <!-- Carousel Wrapper -->
    <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">
      @comments(['model' => $detail])
    
  </section>
   <!-- Section: comments -->

 
  <!-- Product Reviews -->
  <div class="divider-new">

    <h3 class="h3-responsive font-weight-bold blue-text mx-3">Negocios Relacionados</h3>

  </div>

  <!-- Section: Products v.5 -->
  <section id="products" class="pb-5">

    {{-- <p class="text-center w-responsive mx-auto mb-5 dark-grey-text">Lorem ipsum dolor sit amet, consectetur
      adipisicing elit. Fugit, error amet numquam iure provident voluptate esse quasi,

      veritatis totam voluptas nostrum quisquam eum porro a pariatur accusamus veniam.</p> --}}

    <!-- Carousel Wrapper -->
    <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

      <!-- Controls -->
      <div class="controls-top">

        <a class="btn-floating primary-color" href="#multi-item-example" data-slide="prev">

          <i class="fas fa-chevron-left"></i>

        </a>

        <a class="btn-floating primary-color" href="#multi-item-example" data-slide="next">

          <i class="fas fa-chevron-right"></i>

        </a>

      </div>
      <!-- Controls -->

      <!-- Indicators -->
      <ol class="carousel-indicators">

        <li class="primary-color" data-target="#multi-item-example" data-slide-to="0" class="active"></li>

        <li class="primary-color" data-target="#multi-item-example" data-slide-to="1"></li>

        <li class="primary-color" data-target="#multi-item-example" data-slide-to="2"></li>

      </ol>
      <!-- Indicators -->

      <!-- Slides -->
      <div class="carousel-inner" role="listbox">

        <!-- First slide -->
        <div class="carousel-item active">
          
          @if ($detail->busine_relation != "")
        
          @forelse(json_decode($detail->busine_relation) as $item)
         
            @php
              $relation =App\Busine::where('id', $item)->first();  
            @endphp
           
              <div class="col-md-4 clearfix d-none d-md-block mb-4">
                <!-- Card 3-->
                <div class="card card-ecommerce">

                  <!-- Card image -->
                  <div class="view overlay">
              
                    <img src="{{ asset('storage/'.$relation->image) }}" class="img-fluid"
                      alt="">
                      
                    <a>

                      <div class="mask rgba-white-slight"></div>

                    </a>

                  </div>
                  <!-- Card image -->
                 
                  <!-- Card content -->
                  <div class="card-body">

                    <!-- Category & Title -->
                    <h5 class="card-title mb-1">

                      <strong>

                        <a href="" class="dark-grey-text">{{ $relation->name }}</a>

                      </strong>

                    </h5>

                    <span class="badge badge-info mb-2">categoria</span>
                   
                    <!-- Rating -->
                    <ul class="rating">

                      <li>

                        <i class="fas fa-star blue-text"></i>

                      </li>

                      <li>

                        <i class="fas fa-star blue-text"></i>

                      </li>

                      <li>

                        <i class="fas fa-star blue-text"></i>

                      </li>

                      <li>

                        <i class="fas fa-star blue-text"></i>

                      </li>

                      <li>

                        <i class="fas fa-star blue-text"></i>

                      </li>

                    </ul>

                    <!-- Card footer -->
                    <div class="card-footer pb-0">

                      <div class="row mb-0">

                        <span class="float-left">

                          <strong>{{$relation->description}}</strong>

                        </span>

                      </div>

                    </div>

                  </div>
                  <!-- Card content -->

                </div>
                <!-- Card -->
              </div>
                @empty
              @endforelse
          @endif 
        </div>
      </div>
      <!-- Slides -->

    </div>
    <!-- Carousel Wrapper -->

  </section>
   <!-- Section: Products v.5 -->
  

@section('js')
  <script src="{{ url('recursos/js/addons/rating.js') }}"></script>
  <script>
    const Toast = Swal.mixin({
          toast: true,
          position: 'bottom-end',
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          onOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
          }
        });
    
    $(document).ready(function () {
        $('#rateMe1').mdbRate();

        @if(session('icon'))
            Toast.fire({
              icon: "{{ session('icon') }}",
              title: "{{ session('title') }}"
            });
        @endif

        $(".content").floatingSocialShare({
          buttons: [
            "facebook", "twitter", "whatsapp"
          ],
          text: {'default': 'share with: ', 'facebook': 'share with facebook'},
          text_title_case: true,
          popup: false,
          place: "content-right",
          url: window.location
        });

        // Obtener puntuación
        $('.rate-popover').click(function(){
          let rating = (parseInt($(this).data('index'))+1);
          let url = "{{ url('empresa/rating').'/'.$detail->slug }}/"+rating;

          fetch(url+'/ajax')
          .then(res => {
            if(!res.redirected){
              return res.json();
            }else{
              Swal.fire({
                title: 'Debes iniciar sesión!',
                text: "Para calificar este negocio debes iniciar sesión",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iniciar sesión',
                cancelButtonText: 'No, gracias',
              }).then((result) => {
                if (result.value) {
                  window.location = url+'/http';
                }else{
                  $.get("{{ url('admin/forget_redirect') }}", function(data){
                    // console.log(data)
                  });
                }
              })
            }
          })
          .then(data => {
            Toast.fire({
                icon: data.icon,
                title: data.title
              });
          })
        });

        // Obtener me gusta
        $('#btn-like').click(function(){
          let url = "{{ url('empresa/like').'/'.$detail->slug }}";

          fetch(url+'/ajax')
          .then(data => {
            return data;
          })
          .then(res => {
            if(!res.redirected){
              return res.json();
            }else{
              Swal.fire({
                title: 'Debes iniciar sesión!',
                text: "Para indicar que te gusta este negocio debes iniciar sesión",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iniciar sesión',
                cancelButtonText: 'No, gracias',
              }).then((result) => {
                if (result.value) {
                  window.location = url+'/http';
                }else{
                  $.get("{{ url('admin/forget_redirect') }}", function(data){
                    // console.log(data)
                  });
                }
              })
            }
          })
          .then(data => {
            Toast.fire({
                icon: data.icon,
                title: data.title
              });
          })
        });

        $.ajax({
            // type: "method",
            url: "{{ route('vista',$detail->id) }}",
            // data: "data",
            // dataType: "dataType",
            success: function (response) {
                // console.log(response)
            }
        });
    });
  </script>
@endsection

   </div>  
  @endsection

