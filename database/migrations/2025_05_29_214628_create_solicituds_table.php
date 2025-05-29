<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
public function up()
{
    Schema::create('solicituds', function (Blueprint $table) {
        $table->id();
        $table->string('tema');
        $table->text('descripcion');
        $table->enum('area', ['IT', 'Contabilidad', 'Administrativo', 'Operativo']);
        $table->date('fecha_registro');
        $table->date('fecha_cierre')->nullable();
        $table->enum('estado', ['Solicitado', 'Aprobado', 'Rechazado'])->default('Solicitado');
        $table->text('observacion')->nullable();
        $table->boolean('usuarioExt')->default(false);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicituds');
    }
}
