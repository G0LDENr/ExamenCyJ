<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;
use App\Models\AtencionMPH;
use App\Models\Hospitales;
use App\Models\Medicos;
use App\Models\Pacientes;
class ControladorAtencionMPA extends Controller
{
    //-------Alumno a Grupo: Lista
    public function atencion() {
        return view('atencion')
        ->with(['hospitales'=>Hospitales::all()])
        ->with(['medicos'=>Medicos::all()])
        ->with(['pacientes'=>Pacientes::all()])
        ->with(['atencion'=>AtencionMPH::all()]);
    }
    //----------Alumno a  Grupo: Alta
    public function atencion_registrar(Request $request)
    {
        AtencionMPH::create(array(
            'id_hospital'=> $request->input('id_hospital'),
            'id_medico'=>$request->input('id_medico'),
            'id_paciente'=>$request->input('id_paciente'),
            'Detalle'=>$request->input('Detalle '),
        ));

        return redirect()->route('atencion');
    }

    //---------------Alumno Grupo borrar
    public function atencion_borrar(AtencionMPH $id)
    {
    $id->delete();
        return redirect()->route('atencion');
    }
}