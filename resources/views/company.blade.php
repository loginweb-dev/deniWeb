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

              {{-- <div class="carousel-item">

                <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/18.jpg" alt="Second slide"
                  class="img-fluid">

              </div>

              <div class="carousel-item">

                <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/19.jpg" alt="Third slide"
                  class="img-fluid">

              </div> --}}
     
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
          @php
          $categoria=App\Categoria::where('id', $detail->categoria_id)->first();

           @endphp
        
          <h5><span class="badge badge-danger product mb-4 ml-xl-0 ml-4">{{ $categoria->name  }}</span></h5>

          {{-- <h3 class="h3-responsive text-center text-md-left mb-5 ml-xl-0 ml-4"> --}}

            {{-- <span class="red-text font-weight-bold">

              <strong>$49</strong>
              <p></p>
            </span> --}}

            {{-- <span class="grey-text">

              <small>

                <s>$89</s>

              </small>

            </span> --}}

          {{-- </h3> --}}

          <!-- Accordion wrapper -->
          <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">

            <!-- Accordion card -->
            <div class="card">

              <!-- Card header -->
              <div class="card-header" role="tab" id="headingOne1">

                <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1" aria-expanded="true"
                  aria-controls="collapseOne1">

                  <h5 class="mb-0">

                    Descripcion

                    <i class="fas fa-angle-down rotate-icon"></i>

                  </h5>

                </a>

              </div>

              <!-- Card body -->
              <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1"
                data-parent="#accordionEx">

                <div class="card-body">

                  <p>{{ $detail->description }}</p>
                  <i class="fas fa-globe mr-3"></i><a href="https://{{$detail->site }}" target="_blanck">: {{ $detail->site }}</a><br>
                  <i class="fas fa-map-marked-alt mr-3"></i>: {{ $detail->addres }}

                </div>

              </div>

            </div>
            <!-- Accordion card -->
         
            <!-- Accordion card -->
            <div class="card">

              <!-- Card header -->
              <div class="card-header" role="tab" id="headingTwo2">

                <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo2"
                  aria-expanded="false" aria-controls="collapseTwo2">

                  <h5 class="mb-0">

                    Redes Sociales

                    <i class="fas fa-angle-down rotate-icon"></i>
                    
                  </h5>

                </a>

              </div>

              <!-- Card body -->
              <div id="collapseTwo2" class="collapse" role="tabpanel" aria-labelledby="headingTwo2"data-parent="#accordionEx">
                <div class="card-body">
                    @forelse ($redes as $item)
                        <a href="{{ $item->link }}" target="_blank"><i class="{{ $item->icon}}"></i>{{ $item->link }}</a><br>
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

                <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseThree3"
                  aria-expanded="false" aria-controls="collapseThree3">

                  <h5 class="mb-0">

                    Horarios

                    <i class="fas fa-angle-down rotate-icon"></i>

                  </h5>

                </a>

              </div>

              <!-- Card body -->
              <div id="collapseThree3" class="collapse" role="tabpanel" aria-labelledby="headingThree3"
                data-parent="#accordionEx">

                <div class="card-body">
                  {{-- @php
                      dd($horario);
                  @endphp --}}
                @if ($horario != "")
                    @php
                      $nombre_dias = array('Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo');
                      $horarios=json_decode($horario->dias);
                    @endphp
                    <p><i class="far fa-calendar-alt"></i>
                      @for ($i = 0; $i < count($horarios); $i++)
                            {{ $nombre_dias[$i] }}
                      @endfor
                   </p> 
                    <p><i class="far fa-clock"></i> :{{ $horario->hora_inicio }}</p>
                    <p><i class="fas fa-clock"></i> :{{ $horario->hora_final }}</p>
                @endif
               
                </div>
            
              </div>

            </div>
            <!-- Accordion card -->

          </div>
          <!-- Accordion wrapper -->

          <!-- Add to Cart -->
          <section class="color">

            <div class="mt-5">

              {{-- <p class="grey-text">Choose your color</p> --}}

              {{-- <div class="row text-center text-md-left">

                <div class="col-md-4 col-12 ">

                  <!-- Radio group -->
                  <div class="form-group">

                    <input class="form-check-input" name="group100" type="radio" id="radio100" checked="checked">

                    <label for="radio100" class="form-check-label dark-grey-text">Blue</label>

                  </div>

                </div>

                <div class="col-md-4">

                  <!-- Radio group -->
                  <div class="form-group">

                    <input class="form-check-input" name="group100" type="radio" id="radio101">

                    <label for="radio101" class="form-check-label dark-grey-text">Orange</label>

                  </div>

                </div>

                <div class="col-md-4">

                  <!-- Radio group -->
                  <div class="form-group">

                    <input class="form-check-input" name="group100" type="radio" id="radio102">

                    <label for="radio102" class="form-check-label dark-grey-text">Red</label>

                  </div>

                </div>

              </div> --}}

              {{-- <div class="row mt-3 mb-4"> --}}
              <div  class="row">
                <div class="col-md-12 text-center">
                  <div class="form-group">
                  
                   <a href="https://wa.me/591{{ $detail->watsapp }}" target="blanck" class="btn btn-success btn-rounded btn-md"><i class="fab fa-whatsapp"></i> Chatear</a>
                   <a href="https://{{ $detail->sharemap }}" target="_blanck" class="btn btn-warning btn-rounded btn-md"><i class="fas fa-map-pin"></i> ubicacion</a>
                   <a href="{{ route('like', $detail->slug) }}" class="btn btn-primary btn-rounded btn-md"><i class="fas fa-thumbs-up"></i> Me Gusta</a>
                    
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

    <!-- Main wrapper -->
    {{-- <div class="comments-list text-center text-md-left">

      <!-- First row -->
      <div class="row mb-5">

        <!-- Image column -->
        <div class="col-sm-2 col-12 mb-3">

          <img src="https://mdbootstrap.com/img/Photos/Avatars/img (8).jpg" alt="sample image"
            class="avatar rounded-circle z-depth-1-half">

        </div>
        <!-- Image column -->

        <!-- Content column -->
        <div class="col-sm-10 col-12">

          <a>

            <h5 class="user-name font-weight-bold">John Doe</h5>

          </a>

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

          <div class="card-data">

            <ul class="list-unstyled mb-1">

              <li class="comment-date font-small grey-text">

                <i class="far fa-clock-o"></i> 05/10/2015</li>

            </ul>

          </div>

          <p class="dark-grey-text article">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
            aliquip ex ea commodo consequat. Duis

            aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
            Excepteur

            sint occaecat cupidatat non proident.</p>

        </div>
        <!-- Content column -->

      </div>
      <!-- First row -->

      <!-- Second row -->
      <div class="row mb-5">

        <!-- Image column -->
        <div class="col-sm-2 col-12 mb-3">

          <img src="https://mdbootstrap.com/img/Photos/Avatars/img (30).jpg" alt="sample image"
            class="avatar rounded-circle z-depth-1-half">

        </div>
        <!-- Image column -->

        <!-- Content column -->
        <div class="col-sm-10 col-12">

          <a>

            <h5 class="user-name font-weight-bold">Lily Brown</h5>

          </a>

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

          <div class="card-data">

            <ul class="list-unstyled mb-1">

              <li class="comment-date font-small grey-text">

                <i class="far fa-clock-o"></i> 05/10/2015</li>

            </ul>

          </div>

          <p class="dark-grey-text article">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
            aliquip ex ea commodo consequat. Duis

            aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
            Excepteur

            sint occaecat cupidatat non proident.</p>

        </div>
        <!-- Content column -->

      </div>
      <!-- Second row -->

      <!-- Third row -->
      <div class="row mb-5">

        <!-- Image column -->
        <div class="col-sm-2 col-12 mb-3">

          <img src="https://mdbootstrap.com/img/Photos/Avatars/img (28).jpg" alt="sample image"
            class="avatar rounded-circle z-depth-1-half">

        </div>
        <!-- Image column -->

        <!-- Content column -->
        <div class="col-sm-10 col-12">

          <a>

            <h5 class="user-name font-weight-bold">Martha Smith</h5>

          </a>

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

          <div class="card-data">

            <ul class="list-unstyled mb-1">

              <li class="comment-date font-small grey-text">

                <i class="far fa-clock-o"></i> 05/10/2015</li>

            </ul>

          </div>

          <p class="dark-grey-text article">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
            aliquip ex ea commodo consequat. Duis

            aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
            Excepteur

            sint occaecat cupidatat non proident.</p>

        </div>
        <!-- Content column -->

      </div>
      <!-- Third row -->

    </div> --}}
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

          {{-- <div class="col-md-4 mb-4">

            <!-- Card -->
            <div class="card card-ecommerce">

              <!-- Card image -->
              <div class="view overlay">

                <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/14.jpg" class="img-fluid"
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

                    <a href="" class="dark-grey-text">Sony TV-675i</a>

                  </strong>

                </h5>

                <span class="badge badge-danger mb-2">bestseller</span>

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

                    <i class="fas fa-star grey-text"></i>

                  </li>

                </ul>

                <!-- Card footer -->
                <div class="card-footer pb-0">

                  <div class="row mb-0">

                    <span class="float-left">

                      <strong>1439$</strong>

                    </span>

                    <span class="float-right">

                      <a class="" data-toggle="tooltip" data-placement="top" title="Add to Cart">

                        <i class="fas fa-shopping-cart ml-3"></i>

                      </a>

                    </span>

                  </div>

                </div>

              </div>
              <!-- Card content -->

            </div>
            <!-- Card -->

          </div>

          <div class="col-md-4 clearfix d-none d-md-block mb-4">

            <!-- Card -->
            <div class="card card-ecommerce">

              <!-- Card image -->
              <div class="view overlay">

                <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/13.jpg" class="img-fluid"
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

                    <a href="" class="dark-grey-text">Samsung 786i</a>

                  </strong>

                </h5>

                <span class="badge badge-info mb-2">new</span>

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

                    <i class="fas fa-star grey-text"></i>

                  </li>

                </ul>

                <!-- Card footer -->
                <div class="card-footer pb-0">

                  <div class="row mb-0">

                    <span class="float-left">

                      <strong>1439$</strong>

                    </span>

                    <span class="float-right">

                      <a class="" data-toggle="tooltip" data-placement="top" title="Add to Cart">

                        <i class="fas fa-shopping-cart ml-3"></i>

                      </a>

                    </span>

                  </div>

                </div>

              </div>
              <!-- Card content -->

            </div>
            <!-- Card -->

          </div>

          <div class="col-md-4 clearfix d-none d-md-block mb-4">
          
            <!-- Card -->
            <div class="card card-ecommerce">

              <!-- Card image -->
              <div class="view overlay">

                <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/9.jpg" class="img-fluid"
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

                    <a href="" class="dark-grey-text">Canon 675-D</a>

                  </strong>

                </h5>

                <span class="badge badge-danger mb-2">bestseller</span>

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

                      <strong>1439$</strong>

                    </span>

                    <span class="float-right">

                      <a class="" data-toggle="tooltip" data-placement="top" title="Add to Cart">

                        <i class="fas fa-shopping-cart ml-3"></i>

                      </a>

                    </span>

                  </div>

                </div>

              </div>
              <!-- Card content -->

            </div>
            <!-- Card -->
           
          </div> --}}
          
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

                        {{-- <span class="float-right">

                          <a class="" data-toggle="tooltip" data-placement="top" title="Add to Cart">

                            <i class="fas fa-shopping-cart ml-3"></i>

                          </a>

                        </span> --}}

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
        <!-- First slide -->

        <!-- Second slide -->
        {{-- <div class="carousel-item">

          <div class="col-md-4">

            <!-- Card -->
            <div class="card card-ecommerce">

              <!-- Card image -->
              <div class="view overlay">

                <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/8.jpg" class="img-fluid"
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

                    <a href="" class="dark-grey-text">Samsung V54</a>

                  </strong>

                </h5>

                <span class="badge grey mb-2">best rated</span>

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

                      <strong>1439$</strong>

                    </span>

                    <span class="float-right">

                      <a class="" data-toggle="tooltip" data-placement="top" title="Add to Cart">

                        <i class="fas fa-shopping-cart ml-3"></i>

                      </a>

                    </span>

                  </div>

                </div>

              </div>
              <!-- Card content -->

            </div>
            <!-- Card -->

          </div>

          <div class="col-md-4 clearfix d-none d-md-block mb-4">

            <!-- Card -->
            <div class="card card-ecommerce">

              <!-- Card image -->
              <div class="view overlay">

                <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/5.jpg" class="img-fluid"
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

                    <a href="" class="dark-grey-text">Dell V-964i</a>

                  </strong>

                </h5>

                <span class="badge badge-info mb-2">new</span>

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

                      <strong>1439$</strong>

                    </span>

                    <span class="float-right">

                      <a class="" data-toggle="tooltip" data-placement="top" title="Add to Cart">

                        <i class="fas fa-shopping-cart ml-3"></i>

                      </a>

                    </span>

                  </div>

                </div>

              </div>
              <!-- Card content -->

            </div>
            <!-- Card -->

          </div>

          <div class="col-md-4 clearfix d-none d-md-block mb-4">

            <!-- Card -->
            <div class="card card-ecommerce">

              <!-- Card image -->
              <div class="view overlay">

                <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/1.jpg" class="img-fluid"
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

                    <a href="" class="dark-grey-text">iPad PRO</a>

                  </strong>

                </h5>

                <span class="badge badge-danger mb-2">bestseller</span>

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

                    <i class="fas fa-star grey-text"></i>

                  </li>

                </ul>

                <!-- Card footer -->
                <div class="card-footer pb-0">

                  <div class="row mb-0">

                    <span class="float-left">

                      <strong>1439$</strong>

                    </span>

                    <span class="float-right">

                      <a class="" data-toggle="tooltip" data-placement="top" title="Add to Cart">

                        <i class="fas fa-shopping-cart ml-3"></i>

                      </a>

                    </span>

                  </div>

                </div>

              </div>
              <!-- Card content -->

            </div>
            <!-- Card -->

          </div>

        </div> --}}
        <!-- Second slide -->

        <!-- Third slide -->
        {{-- <div class="carousel-item"> --}}

          {{-- <div class="col-md-4 mb-4">

            <!-- Card 1-->
            <div class="card card-ecommerce">

              <!-- Card image -->
              <div class="view overlay">

                <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/12.jpg" class="img-fluid"
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

                    <a href="" class="dark-grey-text">Asus CT-567</a>

                  </strong>

                </h5>

                <span class="badge grey mb-2">best rated</span>

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

                      <strong>1439$</strong>

                    </span>

                    <span class="float-right">

                      <a class="" data-toggle="tooltip" data-placement="top" title="Add to Cart">

                        <i class="fas fa-shopping-cart ml-3"></i>

                      </a>

                    </span>

                  </div>

                </div>

              </div>
              <!-- Card content -->

            </div>
            <!-- Card -->

          </div> --}}

          {{-- <div class="col-md-4 clearfix d-none d-md-block mb-4">

            <!-- Card2 -->
            <div class="card card-ecommerce">

              <!-- Card image -->
              <div class="view overlay">

                <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/7.jpg" class="img-fluid"
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

                    <a href="" class="dark-grey-text">Dell 786i</a>

                  </strong>

                </h5>

                <span class="badge badge-info mb-2">new</span>

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

                    <i class="fas fa-star grey-text"></i>

                  </li>

                </ul>

                <!-- Card footer -->
                <div class="card-footer pb-0">

                  <div class="row mb-0">

                    <span class="float-left">

                      <strong>1439$</strong>

                    </span>

                    <span class="float-right">

                      <a class="" data-toggle="tooltip" data-placement="top" title="Add to Cart">

                        <i class="fas fa-shopping-cart ml-3"></i>

                      </a>

                    </span>

                  </div>

                </div>

              </div>
              <!-- Card content -->

            </div>
            <!-- Card -->

          </div> --}}
          
          

          {{-- </div> --}}
                  <!-- Third slide -->
                
                  {{-- @foreach(json_decode($detail->busine_relation) as $item)
                  @if ($loop->first)
                  <div class="carousel-item active">

                    <div class="col-md-4 mb-4">

                      <!-- Card 1-->
                      <div class="card card-ecommerce">

                        <!-- Card image -->
                        <div class="view overlay">

                          <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/14.jpg" class="img-fluid"
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

                              <a href="" class="dark-grey-text">{{ $item }}</a>

                            </strong>

                          </h5>

                          <span class="badge badge-danger mb-2">bestseller</span>

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

                              <i class="fas fa-star grey-text"></i>

                            </li>

                          </ul>

                          <!-- Card footer -->
                          <div class="card-footer pb-0">

                            <div class="row mb-0">

                              <span class="float-left">

                                <strong>1439$</strong>

                              </span>

                              <span class="float-right">

                                <a class="" data-toggle="tooltip" data-placement="top" title="Add to Cart">

                                  <i class="fas fa-shopping-cart ml-3"></i>

                                </a>

                              </span>

                            </div>

                          </div>

                        </div>
                        <!-- Card content -->

                      </div>
                      <!-- Card -->

                    </div>

                    <div class="col-md-4 clearfix d-none d-md-block mb-4">

                      <!-- Card 2-->
                      <div class="card card-ecommerce">

                        <!-- Card image -->
                        <div class="view overlay">

                          <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/13.jpg" class="img-fluid"
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

                              <a href="" class="dark-grey-text">Samsung 786i</a>

                            </strong>

                          </h5>

                          <span class="badge badge-info mb-2">new</span>

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

                              <i class="fas fa-star grey-text"></i>

                            </li>

                          </ul>

                          <!-- Card footer -->
                          <div class="card-footer pb-0">

                            <div class="row mb-0">

                              <span class="float-left">

                                <strong>1439$</strong>

                              </span>

                              <span class="float-right">

                                <a class="" data-toggle="tooltip" data-placement="top" title="Add to Cart">

                                  <i class="fas fa-shopping-cart ml-3"></i>

                                </a>

                              </span>

                            </div>

                          </div>

                        </div>
                        <!-- Card content -->

                      </div>
                      <!-- Card -->

                    </div>

                    <div class="col-md-4 clearfix d-none d-md-block mb-4">
                    
                      <!-- Card 3-->
                      <div class="card card-ecommerce">

                        <!-- Card image -->
                        <div class="view overlay">

                          <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/9.jpg" class="img-fluid"
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

                              <a href="" class="dark-grey-text">Canon 675-D</a>

                            </strong>

                          </h5>

                          <span class="badge badge-danger mb-2">bestseller</span>

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

                                <strong>1439$</strong>

                              </span>

                              <span class="float-right">

                                <a class="" data-toggle="tooltip" data-placement="top" title="Add to Cart">

                                  <i class="fas fa-shopping-cart ml-3"></i>

                                </a>

                              </span>

                            </div>

                          </div>

                        </div>
                        <!-- Card content -->

                      </div>
                      <!-- Card -->
                    
                    </div>
                    
                  </div>
                  @else
                  <div class="carousel-item">

                    <div class="col-md-4 mb-4">

                      <!-- Card -->
                      <div class="card card-ecommerce">

                        <!-- Card image -->
                        <div class="view overlay">

                          <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/12.jpg" class="img-fluid"
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

                              <a href="" class="dark-grey-text"></a>

                            </strong>

                          </h5>

                          <span class="badge grey mb-2">best rated</span>

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

                                <strong>1439$</strong>

                              </span>

                              <span class="float-right">

                                <a class="" data-toggle="tooltip" data-placement="top" title="Add to Cart">

                                  <i class="fas fa-shopping-cart ml-3"></i>

                                </a>

                              </span>

                            </div>

                          </div>

                        </div>
                        <!-- Card content -->

                      </div>
                      <!-- Card -->

                    </div>

                    <div class="col-md-4 clearfix d-none d-md-block mb-4">

                      <!-- Card -->
                      <div class="card card-ecommerce">

                        <!-- Card image -->
                        <div class="view overlay">

                          <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/7.jpg" class="img-fluid"
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

                              <a href="" class="dark-grey-text">Dell 786i</a>

                            </strong>

                          </h5>

                          <span class="badge badge-info mb-2">new</span>

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

                              <i class="fas fa-star grey-text"></i>

                            </li>

                          </ul>

                          <!-- Card footer -->
                          <div class="card-footer pb-0">

                            <div class="row mb-0">

                              <span class="float-left">

                                <strong>1439$</strong>

                              </span>

                              <span class="float-right">

                                <a class="" data-toggle="tooltip" data-placement="top" title="Add to Cart">

                                  <i class="fas fa-shopping-cart ml-3"></i>

                                </a>

                              </span>

                            </div>

                          </div>

                        </div>
                        <!-- Card content -->

                      </div>
                      <!-- Card -->

                    </div>

                    <div class="col-md-4 clearfix d-none d-md-block mb-4">

                      <!-- Card -->
                      <div class="card card-ecommerce">

                        <!-- Card image -->
                        <div class="view overlay">

                          <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/10.jpg" class="img-fluid"
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

                              <a href="" class="dark-grey-text">Headphones</a>

                            </strong>

                          </h5>

                          <span class="badge badge-info mb-2">new</span>

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

                                <strong>1439$</strong>

                              </span>

                              <span class="float-right">

                                <a class="" data-toggle="tooltip" data-placement="top" title="Add to Cart">

                                  <i class="fas fa-shopping-cart ml-3"></i>

                                </a>

                              </span>

                            </div>

                          </div>

                        </div>
                        <!-- Card content -->

                      </div>
                      <!-- Card -->

                    </div>

                  </div>
                  @endif
                  @endforeach --}}
                </div>
                <!-- Slides -->

              </div>
              <!-- Carousel Wrapper -->

  </section>
   <!-- Section: Products v.5 -->
  

@section('js')
<script>
    $(".content").floatingSocialShare({
      buttons: [
        "facebook", "twitter", "whatsapp"
      ],
      text: {'default': 'share with: ', 'facebook': 'share with facebook'},
      text_title_case: true,
      popup: false,
      place: "content-right",
      url: "https://github.com/ozdemirburak/jquery-floating-social-share"
    });
    $(document).ready(function () {
    $.ajax({
        // type: "method",
        url: "{{ route('vista',$detail->id) }}",
        // data: "data",
        // dataType: "dataType",
        success: function (response) {
            console.log(response)
        }
    });
});
  </script>
@endsection

   </div>  
  @endsection

