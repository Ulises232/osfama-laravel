<?php

use App\Http\Controllers\ConsultasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\OrdenAlarmaController;
use App\Http\Controllers\OrdenCamaraController;
use App\Http\Controllers\OrdenCercaController;
use App\Http\Controllers\OrdenTrabajoController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//Vistas Trabajador

//Rutas: Formulario 
Route::post('tecnico/trabajos/hacer/camara', [OrdenCamaraController::class, 'guardarOrdenCamara'])->middleware(['auth','can:guardarOrdenCamara'])->name('guardarOrdenCamara');

Route::post('tecnico/trabajos/hacer/cerca', [OrdenCercaController::class, 'guardarOrdenCerca'])->middleware(['auth','can:trabajoHacer'])->name('guardarOrdenCerca');

Route::post('tecnico/trabajos/hacer/Alarma', [OrdenAlarmaController::class, 'guardarOrdenAlarma'])->middleware(['auth','can:trabajoHacer'])->name('guardarOrdenAlarma');


//Rutas: Consultas 
Route::get('tecnico/trabajos/hacer', [ConsultasController::class, 'trabajoHacer'])->middleware(['auth','can:trabajoHacer'])->name('trabajoHacer');
Route::get('tecnico/trabajos/hecho', [ConsultasController::class, 'trabajoHecho'])->middleware(['auth','can:trabajoHacer'])->name('trabajoHecho');
Route::get('tecnico/registros/hecho', [ConsultasController::class, 'registroHecho'])->middleware(['auth','can:trabajoHacer'])->name('registroHecho');


//Vista Admin

//Rutas: Formulario 
Route::get('admin/asignar/orden', [OrdenTrabajoController::class, 'indexAsignarOrden'])->middleware(['auth',])->name('asignarOrden');
Route::post('admin/asignar/orden', [OrdenTrabajoController::class, 'guardarAsignarOrden'])->middleware(['auth','can:trabajosHacer'])->name('guardarAsignarOrden');

//Rutas: Consultas 
Route::get('admin/trabajos/hacer', [ConsultasController::class, 'trabajosHacer'])->middleware(['auth','can:trabajosHacer'])->name('trabajosHacer');
Route::get('admin/trabajos/hecho', [ConsultasController::class, 'trabajosHecho'])->middleware(['auth','can:trabajosHacer'])->name('trabajosHecho');




require __DIR__.'/auth.php';
