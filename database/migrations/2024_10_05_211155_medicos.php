<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Medicos', function (Blueprint $table){
            $table->bigIncrements('id_medico');
            $table->text('foto');
            $table->string('clave');
            $table->string('nombre', 100);
            $table->date('Fecha_N');
            $table->string('sexo');
            $table->text('e_mail');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Medicos);
    }
};
