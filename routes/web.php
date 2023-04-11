<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrabajadoresController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

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
    return view('usuarios.login');
});



Route::get('/login',function(){
    return view('usuarios.login');
})->name('login')->middleware('guest');

Route::get('/home',function(){
    return view('plantillas.home');
})->middleware('auth')->name('home');


Route::get('/trabajadores/index', [TrabajadoresController::class,'index'])->middleware(['auth'])->name('trabajadores.index');
Route::get('/trabajadores/edit/{id}', [TrabajadoresController::class,'edit'])->middleware(['auth'])->name('trabajadores.edit');
Route::post('/trabajadores/update', [TrabajadoresController::class,'update'])->middleware(['auth'])->name('trabajadores.update');
Route::post('/trabajadores/store', [TrabajadoresController::class,'store'])->middleware(['auth'])->name('trabajadores.store');
Route::get('/trabajadores/create', [TrabajadoresController::class,'create'])->middleware(['auth'])->name('trabajadores.create');
Route::get('/trabajadores/show', [TrabajadoresController::class,'show'])->middleware(['auth'])->name('trabajadores.show');

Route::get('/usuarios/index', [UserController::class,'index'])->middleware(['auth'])->name('usuarios.index');
Route::get('/usuarios/edit/{id}', [UserController::class,'edit'])->middleware(['auth'])->name('usuarios.edit');
Route::post('/usuarios/update', [UserController::class,'update'])->middleware(['auth'])->name('usuarios.update');
Route::get('/usuarios/create', [UserController::class,'create'])->middleware(['auth'])->name('usuarios.create');
Route::post('/usuarios/store', [UserController::class,'store'])->middleware(['auth'])->name('usuarios.store');

Route::get("/verificanombre/{name}",[UserController::class,'verificanombre'])->middleware(['auth'])->name('verificanombre');
Route::get("/verificaemail/{email}",[UserController::class,'verificaemail'])->middleware(['auth'])->name('verificaemail');
Route::post("/ActualizaContrasena",[UserController::class, "ActualizaContrasena"])->middleware(['auth'])->name('Actualiza.Contrasena');


Route::post("/login",[LoginController::class, 'login']);
Route::put('/login', [LoginController::class, 'logout']);