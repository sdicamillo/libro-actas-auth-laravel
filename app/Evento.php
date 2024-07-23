<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $fillable = [
        'user_id',
        'nombre',
        'apellido',
        'descripcion',
        'fecha',
        'hora'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
