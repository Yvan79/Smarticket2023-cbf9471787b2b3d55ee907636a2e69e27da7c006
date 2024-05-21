<?php

use App\Http\Controllers\AcesoController;
use App\Http\Controllers\AcreditarController;
use App\Http\Controllers\AsignarController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\HistorialesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BoletaController;
use App\Http\Controllers\User;
use App\Http\Controllers\ZonasController;
use App\Models\Acreditar;
use App\Models\Zonas;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserController;
use RealRashid\SweetAlert\Facades\Alert;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/',function(){
    return view('auth.login');
});
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::resource('/users', UserController::class)->only(['index','edit','update'])->names('admin.users');
Route::resource('/roles', RolesController::class)->middleware('can:mantenimiento.roles')->names('admin.roles');
//Ruta personalizada para editar basada en el ID del usuario

Route::get('/zonas', [ZonasController::class, 'index'])->middleware('can:mantenimiento.zonas')->name('zonas.index');
Route::post('/guardar-zona',[ZonasController::class, 'store']);
Route::get('/zonas/{id}/edit', [ZonasController::class, 'edit'])->name('zonas.edit');
Route::put('/zonas/{id}',[ZonasController::class, 'update'])->name('zonas.update');
Route::delete('/zonas/{id}', [ZonasController::class, 'destroy'])->name('eliminar.zonas');

Route::get('/asignar',[AsignarController::class,'index'])->middleware('can:mantenimiento.AsignEvent')->name('asignar-evento.index');
/*Route::post('/guardar-usuario-asignado',[AsignarController::class, 'store']);*/
Route::delete('/asignar/{id}', [AsignarController::class, 'destroy'])->name('eliminar.asignar');
Route::post('/guardar-datos', [AsignarController::class, 'guardarDatos'])->name('guardar.datos');

Route::get('/evento',[EventoController::class, 'index'])->middleware('can:mantenimiento.eventos')->name('eventos.registrar-evento');
Route::post('/guardar-evento',[EventoController::class, 'store']);
Route::get('/evento/{id}/edit', [EventoController::class, 'edit'])->name('evento.edit');
Route::put('/evento/{id}',[EventoController::class, 'update'])->name('evento.update');
Route::delete('/evento/{id}', [EventoController::class, 'destroy'])->name('eliminar.event');

Route::get('/empresa',[EmpresaController::class, 'index'])->middleware('can:mantenimiento.empresa')->name('empresa.registrar-empresa');
Route::post('/guardar-empresa',[EmpresaController::class, 'store']);
Route::put('/empresa/{id}',[EmpresaController::class, 'update'])->name('empresa.update');
Route::get('/empresa/{id}/edit', [EmpresaController::class, 'edit'])->name('empresa.edit');
Route::delete('/empresa/{id}', [EmpresaController::class, 'destroy'])->name('empresa.registro');

Route::get('/imprimir-brazalete/{id}',[AcreditarController::class, 'imprimir'])->name('acreditacion.brazalete');
Route::get('/imprimir-brazalete',[AcreditarController::class, 'imprimirAcdt'])->name('acreditacion.brazaleteAcrt');
Route::get('/acreditar',[AcreditarController::class, 'acreditar'])->middleware('can:brazaletes.acreditar')->name('acreditacion.acreditar-personal');
Route::post('/guardar-acreditado', [AcreditarController::class, 'store']);
Route::post('/procesar', [AcreditarController::class, 'procesar']);
Route::get('/export-excel', [AcreditarController::class, 'exportExcel']);
//
Route::get('/validar', [AcreditarController::class, 'ValidateSearch'])->middleware('can:brazaletes.consultar')->name('acreditacion.consultaracreditado');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

/*Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');*/
