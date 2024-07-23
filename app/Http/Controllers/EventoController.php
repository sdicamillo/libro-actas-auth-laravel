<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest; // Importar la clase de solicitud
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Evento;

class EventoController extends Controller
{
    // Muestra todos los eventos registrados
    public function index()
    {
        $eventos = Evento::all();
        return view('eventos.index', compact('eventos'));
    }

    // Muestra la vista para registrar un nuevo evento 
    public function create()
    {
        return view('eventos.create');
    }

    // Guarda en la base de datos un nuevo evento
    public function store(StoreEventRequest $request)
    {
        // Guardo la información ya validada
        $data = $request->all();

        // Crear el evento en la base de datos
        Evento::create($data);

        // Redirigir con un mensaje de éxito
        return redirect()->route('eventos.index');
    }

    // Permite visualizar un evento por separado
    public function show($id)
    {
        $evento = Evento::find($id);
        return view('eventos.show', compact('evento'));
    }

    // Muestra la vista con los campos recuperados de la base de datos para edita un evento 
    public function edit($id)
    {
        $evento = Evento::find($id);
        return view('eventos.edit', compact('evento'));
    }

    // Actualiza en la base de datos un evento
    public function update(StoreEventRequest $request, $id)
    {
        // Busco el elemento editado para luego actualizarlo con los nuevos datos
        $evento = Evento::find($id);

        // Guardo la información ya validada
        $data = $request->all();

        $evento->nombre = $data['nombre'];
        $evento->apellido = $data['apellido'];
        $evento->descripcion = $data['descripcion'];
        $evento->fecha = $data['fecha'];
        $evento->hora = $data['hora'];

        // Actualizo el evento en la base de datos
        $evento->update();

        return redirect()->route('eventos.index');
    }

    // Elimina un evento de la base de datos
    public function destroy($id)
    {
        $evento = Evento::find($id);
        $evento->delete();

        return redirect()->route('eventos.index');
    }
}
