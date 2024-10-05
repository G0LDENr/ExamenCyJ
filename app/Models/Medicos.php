<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicos extends Model
{
    use HasFactory;
    
    protected $table ='Medicos';
    protected $primariKey ='id_medico';
    protected $fillable =[
        'foto',
        'clave',
        'nombre',
        'Fecha_N',
        'sexo',
        'e_mail',
        'status',
    ];
}