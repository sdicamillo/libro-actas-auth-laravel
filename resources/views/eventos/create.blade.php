@extends('layouts.app')

@section('content')

    <h1 class="my-3">Crear evento</h1>

    <form action="{{ route('eventos.store') }}" method="POST">
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

        

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <!-- El usuario que está loggeado se carga por defecto -->
            <div class="form-group">
                <label for="user_id">Registrado por</label>
                    <input type="hidden" value="{{ auth()->user()->id }}" name="user_id" id="user_id" class="form-control">
                    <input type="text" value="{{ auth()->user()->name }}" class="form-control" readonly>
            </div>

            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control">
            </div>

            <div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" name="apellido" id="apellido" class="form-control">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="fecha">Fecha</label>
                <input type="date" name="fecha" id="fecha" class="form-control" value="{{ date('Y-m-d') }}">
            </div>

            <div class="form-group">
                <label for="hora">Hora</label>
                <input type="time" name="hora" id="hora" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary mt-3 float-end">Crear</button>
    </form>

@endsection