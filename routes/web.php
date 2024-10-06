<?php

use App\Http\Controllers\ControladorMedicos;
use App\Http\Controllers\ControladorHospitales;
use App\Http\Controllers\ControladorPacientes;
use App\Http\Controllers\ControladorAtencionMPA;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//*-------------------------Rutas Medicos-----------------------------------
Route::name('medicos')->get('/medicos',[ControladorMedicos::class, 'medicos']);
Route::name('medicos_alta')->get('/medicos_alta',[ControladorMedicos::class, 'medicos_alta']);
Route::name('medicos_registrar')->post('/medicos_registrar',[ControladorMedicos::class, 'medicos_registrar']);

Route::name('medicos_detalle')->get('/medicos_detalle/{id}',[ControladorMedicos::class, 'medicos_detalle']);
Route::name('medicos_editar')->get('/medicos_editar/{id}',[ControladorMedicos::class, 'medicos_editar']);
Route::name('medicos_salvar')->put('/medicos_salvar/{id}',[ControladorMedicos::class, 'medicos_salvar']);
Route::name('medicos_borrar')->get('/medicos_borrar/{id}',[ControladorMedicos::class, 'medicos_borrar']);


//*-------------------------Rutas Hospitales-----------------------------------
Route::name('hospitales')->get('/hospitales',[ControladorHospitales::class, 'hospitales']);
Route::name('hospitales_alta')->get('/hospitales_alta',[ControladorHospitales::class, 'hospitales_alta']);
Route::name('hospitales_registrar')->post('/hospitales_registrar',[ControladorHospitales::class, 'hospitales_registrar']);

Route::name('hospitales_detalle')->get('/hospitales_detalle/{id}',[ControladorHospitales::class, 'hospitales_detalle']);
Route::name('hospitales_editar')->get('/hospitales_editar/{id}',[ControladorHospitales::class, 'hospitales_editar']);
Route::name('hospitales_salvar')->put('/hospitales_salvar/{id}',[ControladorHospitales::class, 'hospitales_salvar']);
Route::name('hospitales_borrar')->get('/hospitales_borrar/{id}',[ControladorHospitales::class, 'hospitales_borrar']);


//*-------------------------Rutas Pacientes-----------------------------------
Route::name('pacientes')->get('/pacientes',[ControladorPacientes::class, 'pacientes']);
Route::name('pacientes_alta')->get('/pacientes_alta',[ControladorPacientes::class, 'pacientes_alta']);
Route::name('pacientes_registrar')->post('/pacientes_registrar',[ControladorPacientes::class, 'pacientes_registrar']);

Route::name('pacientes_detalle')->get('/pacientes_detalle/{id}',[ControladorPacientes::class, 'pacientes_detalle']);
Route::name('pacientes_editar')->get('/pacientes_editar/{id}',[ControladorPacientes::class, 'pacientes_editar']);
Route::name('pacientes_salvar')->put('/pacientes_salvar/{id}',[ControladorPacientes::class, 'pacientes_salvar']);
Route::name('pacientes_borrar')->get('/pacientes_borrar/{id}',[ControladorPacientes::class, 'pacientes_borrar']);


//*-------------------------Rutas Hospitales,Pacientes y Medicos-----------------------------------
Route::name('atencion')->get('/atencion',[ControladorAtencionMPA::class, 'atencion']);
Route::name('atencion_registrar')->post('/atencion_registrar',[ControladorAtencionMPA::class, 'atencion_registrar']);
Route::name('atencion_borar')->get('/atencion_borar/{id}',[ControladorAtencionMPA::class, 'atencion_borrar']);