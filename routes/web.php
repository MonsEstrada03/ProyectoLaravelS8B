<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FotosController;
use App\Http\Controllers\AbonosController;
use App\Http\Controllers\EventosController;
use App\Http\Controllers\GerenteController;
use App\Http\Controllers\PaqueteController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\RealcionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\RelacionPaqueteServicioController;

Route::get('/', function () {
   return view('home');
})->middleware('auth');


Route::get('/register', [RegisterController::class, 'create'])
->middleware('guest')
->name('register.index');

Route::post('/register', [RegisterController::class, 'store'])
    ->name('register.store');

Route::get('/login', [SessionsController::class, 'create'])
    
    ->name('login.index');
    
Route::post('/login', [SessionsController::class, 'store'])->name('login.store');

Route::get('/logout', [SessionsController::class, 'destroy'])
->middleware('auth')
->name('login.destroy');

Route::get('/gerente', [GerenteController::class, 'index'])
->middleware('auth.gerente')
->name('gerente.index');
 
Route::get('/empleado', [EmpleadoController::class, 'index'])
->middleware('auth.empleado')
->name('empleado.index');

/*Route::get('/cliente', [ClientesController::class, 'index'])
->middleware('auth.cliente')
->name('cliente.index');*/

Route::get('/catalogo', [CatalogoController::class, 'index'])
->name('catalogo.index');
    
Route::resource('/eventos',EventosController::class);

Route::resource('/usuarios',UsuariosController::class);
Route::resource('/cliente',EventosController::class);
Route::resource('/abonos',AbonosController::class);
Route::resource('/empleados',EventosController::class);
Route::get('/fotos/{id}',[FotosController::class,'create'])->name('fotos.create');
Route::get('/fotos',[FotosController::class,'index'])->name('fotos.index');
Route::delete('/fotos/{foto}',[FotosController::class,'destroy'])->name('fotos.destroy');
Route::post('/fotos/{id}',[FotosController::class,'store'])->name('fotos.store');

Route::resource('/paquetes',PaqueteController::class);
Route::get('/paquete/{paquete}/eventos/create',[EventosController::class,'create'])->name('paquetes_eventos.create');
Route::post('/paquete/{paquete}/eventos/store',[EventosController::class,'store'])->name('paquetes_eventos.store');

Route::resource('/servicios',ServiciosController::class);


Route::get('/prueba', [RelacionPaqueteServicioController::class, 'index'])
->name('prueba.index');


 