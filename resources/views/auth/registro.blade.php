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
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                
                                {{--Inputs for registration  --}}
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="{{ _('Nombre(s)') }}">
                
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('Correo electrónico') }}">
                
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="{{ __('Contraseña') }}">
                
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input id="password-confirm" type="password" class="form-control " name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('Confirmar contraseña') }}">
                                    </div>
                                </div>
                
                                <div class="form-group row mb-0">
                                    <div class="col-md-12 mb-4 mt-2">
                                        <button type="submit" class="btn btn-primary btn-sm btn-block">
                                            {{ __('Registrarme') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                
                </div>              
             </div>
        </main>
    </body>
</html>
