<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Medicos;

class ControladorMedicos extends Controller
{
    //alumnos lista
    public function Medicos(){
        return view('medicos')->with(['medicos' => Medicos::all()]);
    }

    ///alumno alta
    public function medicos_alta(){
        return view("medicos_alta");
    }

    public function medicos_registrar(Request $request){

        $this->validate($request, [
            'calve' => 'required',
            'nombre' => 'required',
            'Fecha_N' => 'required',
            'sexo' => 'required',
            'e_mail' => 'required',
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
        Medicos::create([
            'foto' => $img2,
            'clave' => $request->input('clave'),
            'nombre' => $request->input('nombre'),
            'Fecha_N' => $request->input('clave'),
            'sexo' => $request->input('sexo'),
            'e_mail' => $request->input('e_mail'),
            'status' => $request->input('status')
            
        ]);

        return redirect()->route('medicos');
    }
    
    public function medicos_detalle($id){
        $query = Medicos::find($id);
        return view ('medicos_detalle')
        ->with(['medicos'=>$query]);
    }

    public function medicos_editar($id){
        $query = Medicos::find($id);
        return view ('medicos_editar')
        ->with(['medicos'=>$query]);
    }

    public function medicos_salvar (Medicos $id,Request $request){

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
        $query = Medicos::find($id->id_medico);
            $query -> foto = $img2;
            $query -> clave = $request -> clave;
            $query -> nombre = $request -> nombre;
            $query -> Fecha_N = $request -> Fecha_N;
            $query -> sexo = $request -> sexo;
            $query -> e_mail = $request -> e_mail;
            $query -> status = $request -> status;
        $query -> save();
        return redirect()->route("medicos_editar",['id'=>$id->id_medico]);
}

    public function medicos_borrar(Medicos $id){
    $id->delete();
    return redirect()->route('medicos');
    }
}