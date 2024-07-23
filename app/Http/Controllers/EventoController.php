<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest; // Importar la clase de solicitud
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Evento;

class EventoController extends Controller
{
    //muestra todos los eventos registrados
    public function index()
    {
        $eventos = Evento::all();
        return view('eventos.index', compact('eventos'));
    }

    //muestra la vista para registrar un nuevo evento 
    public function create()
    {
        return view('eventos.create');
    }

    //guarda en la base de datos un nuevo evento
    public function store(StoreEventRequest $request)
    {
        // Guardo la información ya validada
        $data = $request->all();

        // Crear el evento en la base de datos
        Evento::create($data);

        // Redirigir con un mensaje de éxito
        return redirect()->route('eventos.index');
    }

    //permite visualizar un evento por separado
    public function show($id)
    {
        $evento = Evento::find($id);
        return view('eventos.show', compact('evento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
