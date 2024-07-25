<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'EventoController@index')->middleware('auth');

Route::auth();

//Debe estar logueado para ver los eventos de libro de acta
Route::group(['middleware' => 'auth'], function() {
    Route::resource('eventos', EventoController::class);
});

/*
                RUTAS DE EVENTOS

Verb	        URI	                Action	    Ruta
GET	        /eventos	            index	    eventos.index
GET	        /eventos/create	        create	    eventos.create
POST	    /eventos	            store	    eventos.store
GET	        /eventos/{evento}	    show	    eventos.show
GET	        /eventos/{evento}/edit	edit	    eventos.edit
PUT/PATCH	/eventos/{evento}	    update	    eventos.update
DELETE	    /eventos/{evento}	    destroy	    eventos.destroy

*/