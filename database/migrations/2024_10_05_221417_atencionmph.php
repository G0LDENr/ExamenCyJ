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
        Schema::create('AtencionMPH', function (Blueprint $table){
            $table->bigIncrements('id_atencion_mph');
            $table->string('id_hospital');
            $table->string('id_medico');
            $table->string('id_paciente');
            $table->string('Detalle');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(AtencionMPH);
    }
};