@extends('layouts.app')
@section('title', 'Suscribirse')

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
                            <form id="form-register" action="{{ route('signup_store') }}" method="post">
                                @csrf
                                <!-- Grid row -->
                                <div class="row">

                                    <!-- Grid column -->
                                    <div class="col-lg-8">

                                        <div class="card-body form" id="div-form">

                                            <!-- Header -->
                                            <h3 class="mt-4"><i class="far fa-clipboard"></i> Suscribirse:</h3>

                                            <div class="mt-3" id="loader-spinner" style="display:none">
                                                <div class="d-flex justify-content-center" >
                                                    <div class="spinner-border text-primary" role="status">
                                                        <span class="sr-only">Loading...</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="alert alert-danger" id="div-error" style="display:none">
                                                <h4 class="alert-heading">Error!</h4>
                                                <p id="label-error"></p>
                                            </div>

                                            <!-- Grid row -->
                                            <div class="row">
                                                <!-- Grid column -->
                                                <div class="col-md-12">
                                                    <div class="md-form mb-0">
                                                        <input type="text" name="name" id="form-contact-name" class="form-control" required>
                                                        <label for="form-contact-name" class="">Nombre Completo</label>
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
                                                        <input type="text" name="email" id="form-contact-phone" class="form-control">
                                                        <label for="form-contact-phone" class="">E-mail</label>
                                                    </div>
                                                </div>
                                                <!-- Grid column -->

                                                <!-- Grid column -->
                                                <div class="col-md-6">
                                                    <div class="md-form mb-0">
                                                        <input type="text" name="phone" id="form-contact-company" class="form-control" maxlength="8" minlength="8" pattern="[0-9]+" title="Ingresa un número de celular válido" required>
                                                        <label for="form-contact-company" class="">N&deg; de Celular</label>
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
                                                        <textarea type="text" name="address" id="form-contact-message" class="form-control md-textarea" rows="2"></textarea>
                                                        <label for="form-contact-message">Dirección</label>
                                                        <button type="submit" class="btn-floating btn-lg blue"><i class="fas fa-check"></i></button>
                                                    </div>
                                                </div>
                                                <!-- Grid column -->
                                            </div>
                                            <!-- Grid row -->

                                        </div>
                                        <div class="card-body" id="div-welcome" style="display:none">
                                            <h3 class="text-center">Gracias por Suscribirte a DENI <br> <small class="text-muted" style="font-size:16px">Directorio para Empresas y Negocios en Internet</small></h3>
                                            <br>
                                            <h4 id="label-welcome"></h4><br>
                                            <table class="table" style="margin-top:50px">
                                                <thead>
                                                    <tr>
                                                        <th colspan="2" class="text-center">Tus Credenciales</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><b>Email</b></td>
                                                        <td id="label-email"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Contrase&ntilde;a</b></td>
                                                        <td id="label-password"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="alert alert-warning">
                                                <h4 class="alert-heading">Importante!</h4>
                                                <p>Memorice sus credenciales de acceso y no se los proporcione a nadie, puede cambiar sus datos cuando desee ingresando a la opción de <b>Perfil</b> en el sistema.</p>
                                            </div>
                                            <div style="margin-top:50px" class="h-50">{!! setting('welcome.welcome') !!}</div>
                                            <div class="text-center">
                                                <a href="{{ url('/admin') }}" target="_blank" class="btn btn-primary">Ir al Panel de Administración</a>
                                            </div>
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
                            </form>
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
        $(document).ready(function(){
            $('#form-register').on('submit', function(e){
                e.preventDefault();
                $('#loader-spinner').css('display', 'block');
                $('#div-error').css('display', 'none');
                $.post('{{ route("signup_store") }}', $('#form-register').serialize(), function(data){
                    if(!data.error){
                        $('#div-form').css('display', 'none');
                        $('#div-welcome').css('display', 'block');
                        $('#label-welcome').text(`Bienvenido, ${data.name}!`);
                        $('#label-email').text(data.email);
                        $('#label-password').text(data.password);
                    }else{
                        $('#div-error').css('display', 'block');
                        $('#label-error').text(data.error);
                    }
                    $('#loader-spinner').css('display', 'none');
                });
            });
        });
    </script>
@endsection