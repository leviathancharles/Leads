@extends('layouts.layout')

@section('contenido')
<div class="container">
    <div >
        <div >
            <div  class="formulario-login">

                <div >
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div>
                            <label for="email">Correo Electronico</label>

                            <div>
                                <input id="email" type="email" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="password">Contraseña</label>

                            <div>
                                <input id="password" type="password"  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div >
                            <div >
                                <button type="submit">
                                    {{ __('Login') }}
                                </button>


                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
