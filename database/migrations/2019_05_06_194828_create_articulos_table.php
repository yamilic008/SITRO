<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tarea_id')->nullable();
            $table->decimal('cantidad', 8, 2);
            $table->string('udm');
            $table->string('nombre');
            $table->string('observacion')->nullable();
            $table->decimal('precio', 8, 2);
            $table->decimal('subtotal', 8, 2);
            $table->decimal('iva', 8, 2);
            $table->decimal('total', 8, 2);
            $table->string('autorizado');
            $table->timestamps();

            $table->foreign('tarea_id')->references('id')->on('tareas')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulos');
    }
}
