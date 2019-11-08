<?php

use Illuminate\Database\Seeder;
use App\Empresa;

class EmpresaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $dato = new Empresa;
        $dato->Nombre = "Sin Asignar";
        $dato->Direccion = "Sin Asignar";
        $dato->Telefono = "Sin Asignar";
        $dato->Rfc = "Sin Asignar";
        $dato->save();
    }
}
