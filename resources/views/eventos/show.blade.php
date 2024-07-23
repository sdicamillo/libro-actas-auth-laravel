@extends('layouts.app')

@section('content')

    <h1>Ver evento</h1>

    <!-- El usuario que está loggeado se carga por defecto -->
    <div class="form-group">
        <label for="user_id">Registrado por</label>
            <input type="hidden" value="{{ auth()->user()->id }}" name="user_id" id="user_id" class="form-control" readonly>
            <input type="text" value="{{ auth()->user()->name }}" class="form-control" readonly>
    </div>

    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $evento->nombre }}" readonly>
    </div>

    <div class="form-group">
        <label for="apellido">Apellido</label>
        <input type="text" name="apellido" id="apellido" class="form-control" value="{{ $evento->apellido }}" readonly>
    </div>
    <div class="form-group">
        <label for="descripcion">Descripcion</label>
        <input name="descripcion" id="descripcion" class="form-control" value="{{ $evento->descripcion }}" readonly>
    </div>

    <div class="form-group">
        <label for="fecha">Fecha</label>
        <input type="date" name="fecha" id="fecha" class="form-control" value="{{ $evento->fecha }}" readonly>
    </div>

    <div class="form-group">
        <label for="hora">Hora</label>
        <input type="time" name="hora" id="hora" class="form-control" value="{{ $evento->hora }}" readonly>
    </div>

    <a href="{{ route('eventos.edit', $evento->id) }}" class="btn btn-warning">Editar</a>
    <form action="{{ route('eventos.destroy', $evento->id) }}" method="POST" style="display:inline" onclick="return confirm('¿Seguro que deseas eliminarlo?')">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        {{ method_field('DELETE') }}
        <button type="submit" class="btn btn-danger">Borrar</button>
    </form>

@endsection