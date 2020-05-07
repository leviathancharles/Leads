<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo_cabeza')</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

</head>
<body>
    <div>

        <div id="menu">
            <ul>
                @guest
                    <li><a href="/login">Login</a></li>
                @else

                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Cerrar Sesión
                        </a>
                    </li>
                    <li><a>Hola de nuevo, {{ Auth::user()->nombre }}</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest


            </ul>
        </div>

        <div id="cabezal">
            <img src="{{asset('images/kuepa.png')}}" id="imagen"  />
        </div>
    </div>


    <div class="contenedor">
        <div class="formulario">
            @yield('contenido')
        </div>
    </div>


    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    @yield('scripts')
</body>
</html>
