<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atencion extends Model
{
    use HasFactory;
    
    protected $table ='Atencion';
    protected $primariKey ='id_atencion';
    protected $fillable =[
        'hospital',
        'medico',
        'paciente',
        'detalle',
    ];
}