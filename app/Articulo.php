<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    public function tarea()
    {
        return $this->belongsTo(Tarea::class);
    }
}
