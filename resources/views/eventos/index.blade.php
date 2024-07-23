@extends('layouts.app')

@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <h1>Libro de actas</h1>
        <a href="{{ route('eventos.create') }}" class="btn btn-primary">Crear evento</a>
    </div>

    <!-- Tabla donde se muestran los eventos -->
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Fecha</th>
                <th scope="col">Hora</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Registrado por</th>
            </tr>
        </thead>
        <tbody>
            @foreach($eventos as $evento)
                <tr>
                    <td>{{ $evento->fecha }}</td>
                    <td>{{ $evento->hora }}</td>
                    <td>{{ $evento->nombre }}</td>
                    <td>{{ $evento->apellido }}</td>
                    <td>{{ $evento->descripcion }}</td>
                    <td>{{ $evento->user->name }}</td>
                    <td>
                        <a href="{{ route('eventos.show', $evento->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('eventos.edit', $evento->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('eventos.destroy', $evento->id) }}" method="POST" style="display:inline">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">Borrar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    

@endsection