<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospitales extends Model
{
    use HasFactory;
    
    protected $table ='Hospitales';
    protected $primariKey ='id_hospital';
    protected $fillable =[
        'clave',
        'nombre',
        'status',
    ];
}