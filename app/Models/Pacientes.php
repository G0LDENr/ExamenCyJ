<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pacientes extends Model
{
    use HasFactory;
    
    protected $table ='Pacientes';
    protected $primariKey ='id_paciente';
    protected $fillable =[
        'foto',
        'nombre',
        'Fecha_N',
        'sexo',
        'estatus',
    ];
}