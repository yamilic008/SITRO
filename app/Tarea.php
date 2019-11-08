<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
     public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
    public function cliente()
    {
        return $this->belongsTo(User::class);
    }
    public function articulo()
    {
        return $this->hasMany(Articulo::class);
    }
}
