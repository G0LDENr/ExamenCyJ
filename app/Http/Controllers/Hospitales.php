<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Hospitales;

class ControladorHospitales extends Controller
{
    //alumnos lista
    public function Hospitales(){
        return view('hospitales')->with(['hospitales' => Hospitales::all()]);
    }

    ///alumno alta
    public function hospitales_alta(){
        return view("hospitales_alta");
    }

    public function hospitales_registrar(Request $request){

        $this->validate($request, [
            'clave' => 'required',
            'nombre' => 'required',
            'status' => 'required'
        ]);

        Hospitales::create([
            'clave' => $request->input('clave'),
            'nombre' => $request->input('nombre'),
            'status' => $request->input('status')
            
        ]);

        return redirect()->route('hospitales');
    }
    
    public function hospitales_detalle($id){
        $query = Hospitales::find($id);
        return view ('hospitales_detalle')
        ->with(['hospital'=>$query]);
    }

    public function hospitales_editar($id){
        $query = Hospitales::find($id);
        return view ('hospitales_editar')
        ->with(['hospitales'=>$query]);
    }

    public function hospitales_salvar (Hospitales $id,Request $request){

        $query = Hospital::find($id->id_hospital);
            $query -> clave = $request -> clave;
            $query -> nombre = $request -> nombre;
            $query -> status = $request -> status;
        $query -> save();
        return redirect()->route("hospitales_editar",['id'=>$id->id_hospital]);
}

    public function hospitales_borrar(Hospitales $id){
    $id->delete();
    return redirect()->route('hospitales');
    }
}