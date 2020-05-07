@extends('layouts/layout')

@section('titulo_cabeza', 'Formulario de Estudiantes')

@section('contenido')

<div class="formulario-registro">
    <h2>Registro de Estudiantes</h2>
    <p class="informacion">El equipo académico de Kuepa ofrece una variedad de programas virtuales y
        presenciales para sus estudiantes, por eso queremos que te inscribas y nos pondremos en contacto contigo
        para contarte los detalles de esta gran convocatoria.
    </p>
    <form action="/registrar-estudiante" method="POST">
        @csrf

        @if ($errors->any())
         <div class="alertas">
            @foreach ($errors->all() as $error )
                <ul>
                    <li>{{ $error }}</li>
                </ul>
            @endforeach
         </div>
        @endif

            @if(session('mensaje'))
                <div class="mensaje">
                    {{ session('mensaje') }}
                </div>
            @endif

        <div>
            <label for="nombre">Nombre:</label><br />
            <input type="text" name="nombre" id="nombre">
        </div>
        <div>
            <label for="apellido">Apellido:</label><br />
            <input type="text" name="apellido" id="apellido">
        </div>
        <div>
            <label for="email">Email:</label><br />
            <input type="email" name="email" id="email">
        </div>
        <div>
            <label for="telefono">Telefono Contacto:</label><br />
            <input type="text" name="telefono" id="telefono">
        </div>
        <div>
            <label for="programa">Programa:</label><br />
            <select name="programa" id="programa">
                <option value="">Seleccione...</option>
                @foreach ( $programas as $programa)
                    <option value="{{$programa->id}}" >{{$programa->programa}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <br />
            <button type="submit">Registrase</button>
        </div>
    </form>
</div>


<div class="lateral">

</div>

@endsection


