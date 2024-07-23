@extends('layouts.app')

@section('content')

    <h1>Editar evento</h1>
    
    
    <form action="{{ route('eventos.update', $evento->id) }}" method="POST">
        
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        {{ method_field('PUT') }}

        <!-- Muestra errores en caso de que existan -->
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    
        <!-- El usuario no se puede editar -->
        <div class="form-group">
            <label for="user_id">Registrado por</label>
                <input type="hidden" value="{{ auth()->user()->id }}" name="user_id" id="user_id" class="form-control" readonly>
                <input type="text" value="{{ auth()->user()->name }}" class="form-control" readonly>
        </div>

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $evento->nombre }}">
        </div>

        <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" name="apellido" id="apellido" class="form-control" value="{{ $evento->apellido }}">
        </div>
        <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <input name="descripcion" id="descripcion" class="form-control" value="{{ $evento->descripcion }}">
        </div>

        <div class="form-group">
            <label for="fecha">Fecha</label>
            <input type="date" name="fecha" id="fecha" class="form-control" value="{{ $evento->fecha }}">
        </div>

        <div class="form-group">
            <label for="hora">Hora</label>
            <input type="time" name="hora" id="hora" class="form-control" value="{{ $evento->hora }}">
        </div>

        <button type="submit" class="btn btn-primary">Editar</button>

    </form>


@endsection