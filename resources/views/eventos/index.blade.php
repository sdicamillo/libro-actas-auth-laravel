@extends('layouts.app')

@section('datatables-css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.1.2/b-3.1.0/b-html5-3.1.0/datatables.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <h1>Libro de actas</h1>
        <a href="{{ route('eventos.create') }}" class="btn btn-primary">Crear evento</a>
    </div>

    <!-- Tabla donde se muestran los eventos -->
    <table id="tabla-eventos" class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Fecha</th>
                <th scope="col">Hora</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Registrado por</th>
                <th scope="col">Acciones</th>
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
                        <form action="{{ route('eventos.destroy', $evento->id) }}" method="POST" style="display:inline" onclick="return confirm('¿Seguro que deseas eliminarlo?')">
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

@section('datatables-js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.1.2/b-3.1.0/b-html5-3.1.0/b-print-3.1.0/datatables.min.js"></script>


    <script>
        new DataTable('#tabla-eventos', {

            //ordenamiento de fecha por defecto 
            order: [[0, 'desc']],
            //ordenamiento de columnas
            columnDefs: [
                //ordenar por fecha y hora
            {
                targets: [0],
                orderData: [0, 1]
            },
                //ordenar por hora y fecha
            {
                targets: [1],
                orderData: [1, 0]
            },
                //ordenar por nombre y apellido
            {
                targets: [2],
                orderData: [2, 3]
            },
                //ordenar por apellido y nombre
            {
                targets: [3],
                orderData: [3, 2]
            }],

            //opciones de resultados por página
            lengthMenu: [
            [10, 25, 50, -1],
            [10, 25, 50, 'All']],

            //exportar archivo
            buttons: [
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':not(:eq(6))'
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: ':not(:eq(6))'
                }
            }],

            //cambiando los textos por defecto
            language:{
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando del _START_ al _END_ de un total de _TOTAL_ resultados",
                "sInfoEmpty":      "Mostrando del 0 al 0 de un total de 0 resutaldos",
                "sSearch":         "Buscar:",
                
            }, 

            layout: {
                bottomEnd: 'buttons',
                topEnd: 'search',
                bottom2: 'paging'
            }
        });
    </script>

@endsection