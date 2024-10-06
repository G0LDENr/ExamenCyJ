<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Pacientes;

class ControladorPacientes extends Controller
{
    //alumnos lista
    public function Pacientes(){
        return view('pacientes')->with(['pacientes' => Pacientes::all()]);
    }

    ///alumno alta
    public function pacientes_alta(){
        return view("pacientes_alta");
    }

    public function pacientes_registrar(Request $request){

        $this->validate($request, [
            'nombre' => 'required',
            'Fecha_N' => 'required',
            'sexo' => 'required',
            'status' => 'required'
        ]);

        if ($request->file('foto') != '') {
            //obtener el campo de fila definido en el formulario
            $file = $request->file('foto');
            //obtener el nombre del archivo (file)
            $img = $file->getClientOriginalName();
            //obtener fecha y hora
            $ldate = date("Ymd_His_");
            $img2 = $ldate . $img;
            //indicamos el nombre y la ruta donde se almacena el archivo
            \Storage::disk('local')->put($img2, \File::get($file));
        } else {
            $img2 = "persona.jpg";
        }

        // Crear un nuevo registro de alumno
        Pacientes::create([
            'foto' => $img2,
            'nombre' => $request->input('nombre'),
            'Fecha_N' => $request->input('clave'),
            'sexo' => $request->input('sexo'),
            'status' => $request->input('status')
            
        ]);

        return redirect()->route('pacientes');
    }
    
    public function pacientes_detalle($id){
        $query = Pacientes::find($id);
        return view ('pacientes_detalle')
        ->with(['pacientes'=>$query]);
    }

    public function pacientes_editar($id){
        $query = Pacientes::find($id);
        return view ('pacientes_editar')
        ->with(['pacientes'=>$query]);
    }

    public function pacientes_salvar (Pacientes $id,Request $request){

        if($request->file('foto1
        
        
        ') !=''){
            $file = $request->file('foto1');
            $img=$file->getClientOriginalName();
            $ldate=date('Ymd_His_');
            $img2=$ldate . $img;
            \Storage::disk ('local')->put($img,\File::get($file));
    }
        else{
            $img2 = $request->foto2;
        }
        $query = Pacientes::find($id->id_paciente);
            $query -> foto = $img2;
            $query -> nombre = $request -> nombre;
            $query -> Fecha_N = $request -> Fecha_N;
            $query -> sexo = $request -> sexo;
            $query -> status = $request -> status;
        $query -> save();
        return redirect()->route("pacientes_editar",['id'=>$id->id_paciente]);
}

    public function pacientes_borrar(Pacientes $id){
    $id->delete();
    return redirect()->route('pacientes');
    }
}