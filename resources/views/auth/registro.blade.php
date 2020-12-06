<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

         <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    </head>
    <body class="fondo">
        <main class="container">         
             <div class="row justify-content-center mt-3">
                <div class="col-lg-4 register">
                    {{-- Card register --}}
                    <div class="card mb-4">
                        <div class="card-body" style="padding-bottom: 5px">
                
                            <div class="text-center mb-3">
                                <img style="width: 50%" src="{{ asset('images/chat.png') }}" alt="">
                            </div>

                            <p class="text-center" style=" font-size:18px; color: #777">Regístrate para chatear con tus amigos.</p>
 
                        </div>
                    </div>
                
                     {{-- Card Login --}}
                     <div class="card ">
                        <div class="car-body">
                            <div class="form-group row ">
                                <div class="col-md-12 text-center">
                                    @if (Route::has('login'))
                                       <p class="mt-3">¿Tienes una cuenta? <a href="{{ route('login') }}">{{ __('Inicia Sesión') }}</a></p>      
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>              
             </div>
        </main>
    </body>
</html>
