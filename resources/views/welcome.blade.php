<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
    </head>
    <body>
        <main class="container">
            <div class="row justify-content-center mt-3">
                <div class="col-lg-4">
                    {{-- Card Login --}}
                    <div class="card mb-4">
                        <div class="card-body">
                
                            <h1 class="text-center mt-3 mb-4" style="letter-spacing: 1px; font-family: 'Cookie', cursive; font-size: 60px">Messenger</h1>
                
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                
                                {{-- Inputs (email, password) --}}
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Correo electrónico">
                
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Contraseña">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                
                                {{-- Remember me --}}
                                <div class="form-group row">
                                    <div class="col-md-12 ml-1 ">
                                        <div class="form-check">
                                            <input class="form-check-input position-static" name ="remember" type="checkbox" id="blankCheckbox" value="option1" {{ old('remember') ? 'checked' : '' }}>                      
                                           
                                            <label class="form-check-label" for="remember">
                                                {{ __('Recuerdame') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                
                         
                                 {{-- Button login --}}
                                 <div class="form-group row mb-0">
                                    <div class="col-md-12 ">
                                        <button type="submit" class="btn btn-primary btn-sm btn-block">
                                            {{ __('Iniciar Sesión') }}
                                        </button>
                                    </div>
                                </div>
                
                                <hr>
                
                                {{-- Forgot your password --}}
                                <div class="form-group row mb-0">
                                    <div class="col-md-12 text-center">
                                        @if (Route::has('password.request'))
                                           <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('¿Olvidaste tu contraseña?') }}
                                            </a>
                                         @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                
                    <hr>
                
                    {{-- link Register --}}
                    <div class="card">
                        <div class="car-body">
                            <div class="form-group row ">
                                <div class="col-md-12 text-center ">
                                    {{-- @if (Route::has('register')) --}}
                                       <p class="mt-4">¿No tienes cuenta? <a href="{{ route('login') }}">Regístrate</a></p>      
                                    {{-- @endif --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>               
            </div>
        </main>
    </body>
</html>
