@extends('layouts.app')
@section('title', 'Contacto')

@section('content')
    
<div class="content">

    <main style="margin-top:100px">

    <div class="container-fluid mb-5">

        <!-- Grid row -->
        <div class="row" style="margin-top: -140px;">

        <!-- Grid column -->
        <div class="col-md-12">

            <div class="card pb-5">

            <div class="card-body">

                <div class="container">

                <!-- Section: Contact v.3 -->
                <section class="contact-section my-5">

                    <!-- Form with header -->
                    <div class="card">

                    <!-- Grid row -->
                    <div class="row">

                        <!-- Grid column -->
                        <div class="col-lg-8">

                        <div class="card-body form">

                            <!-- Header -->
                            <h3 class="mt-4"><i class="fas fa-envelope pr-2"></i>Escríbenos:</h3>

                            <!-- Grid row -->
                            <div class="row">

                            <!-- Grid column -->
                            <div class="col-md-6">

                                <div class="md-form mb-0">

                                <input type="text" id="form-contact-name" class="form-control">

                                <label for="form-contact-name" class="">Tu nombre</label>

                                </div>

                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-6">

                                <div class="md-form mb-0">

                                <input type="text" id="form-contact-email" class="form-control">

                                <label for="form-contact-email" class="">Tu E-mail</label>

                                </div>

                            </div>
                            <!-- Grid column -->

                            </div>
                            <!-- Grid row -->

                            <!-- Grid row -->
                            <div class="row">

                            <!-- Grid column -->
                            <div class="col-md-6">

                                <div class="md-form mb-0">

                                <input type="text" id="form-contact-phone" class="form-control">

                                <label for="form-contact-phone" class="">Tu Telefono/Celular</label>

                                </div>

                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-6">

                                <div class="md-form mb-0">

                                <input type="text" id="form-contact-company" class="form-control">

                                <label for="form-contact-company" class="">Tu empresa o negocio</label>

                                </div>

                            </div>
                            <!-- Grid column -->

                            </div>
                            <!-- Grid row -->

                            <!-- Grid row -->
                            <div class="row">

                            <!-- Grid column -->
                            <div class="col-md-12">

                                <div class="md-form mb-0">

                                <textarea type="text" id="form-contact-message" class="form-control md-textarea"
                                    rows="3"></textarea>

                                <label for="form-contact-message">Tu mensaje</label>

                                <a class="btn-floating btn-lg blue">

                                    <i class="far fa-paper-plane"></i>

                                </a>

                                </div>

                            </div>
                            <!-- Grid column -->

                            </div>
                            <!-- Grid row -->

                        </div>

                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-lg-4">

                            <div class="card-body contact text-center h-100 white-text">
                                <h3 class="my-4 pb-2">Información de contacto</h3>
                                <ul class="text-lg-left list-unstyled ml-4">
                                <li>
                                    <p><i class="fas fa-map-marker-alt pr-2 mb-4"></i>{{ setting('aboutus.direccion') }}</p>
                                </li>
                                <li>
                                    <p><i class="fas fa-phone pr-2 mb-4"></i>{{ setting('aboutus.telefono') }}</p>
                                </li>
                                <li>
                                    <p><i class="fas fa-envelope pr-2"></i>{{ setting('aboutus.email') }}</p>
                                </li>

                                </ul>

                                <hr class="hr-light my-4">

                                <ul class="list-inline text-center list-unstyled">
                                    <li class="list-inline-item">
                                        <a class="p-2 fa-lg fb-ic"><i class="fab fa-facebook"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="p-2 fa-lg tw-ic"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="p-2 fa-lg li-ic"><i class="fab fa-linkedin-in"> </i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="p-2 fa-lg ins-ic"><i class="fab fa-instagram"> </i></a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                        <!-- Grid column -->

                    </div>
                    <!-- Grid row -->

                    </div>
                    <!-- Form with header -->

                </section>
                <!-- Section: Contact v.3 -->

                </div>

            </div>

            </div>

        </div>
        <!-- Grid column -->

        </div>
        <!-- Grid row -->

    </div>

    </main>

</div>

@endsection

@section('css')
    
@endsection

@section('js')
    <script>
      
    </script>
@endsection