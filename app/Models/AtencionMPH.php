<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AtencionMPH extends Model
{
    use HasFactory;
    protected $table = 'Atencion';
    protected $primarikey = 'id_atencion';
    protected $fillable =[
        'id_hospital',
        'id_medico',
        'id_paciente',
        'Detalle'
    ];
}
