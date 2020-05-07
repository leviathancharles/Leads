<form action="/registrarEstudiante" method="POST">
    @csrf
    @if ($errors->any())
        @foreach ($errors->all() as $error )
            {{ $error }}
        @endforeach
    @endif
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre">
    <label for="apellido">Apellido</label>
    <input type="text" name="apellido" id="apellido">
    <label for="email">Email</label>
    <input type="email" name="email" id="email">
    <label for="telefono">Telefono Contacto</label>
    <input type="text" name="telefono" id="telefono">
    <label for="programa">Programa</label>
    <select name="programa" id="programa">
        <option value="">Seleccione...</option>
        @foreach ( $programas as $programa)
            <option value="{{$programa->id}}" >{{$programa->programa}}</option>
        @endforeach
    </select>
    <button type="submit">Registrase</button>
</form>
