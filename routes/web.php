<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Personas;
use App\Models\Persona;
use Illuminate\Support\Facades\Route;


Route::get('/', [AuthController::class, 'login'])->name('auth-login');
Route::post('/logear', [AuthController::class, 'logear'])->name('logear');
Route::get('/agregarUsuario', [AuthController::class, 'agregarUsuario']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/inicio', [Personas::class, 'index'])->name('inicio');

Route::get('/modules/clientes',[Personas::class,'index']);
Route::get('/modules/clientes/create',[Personas::class,'create']);
Route::post('/modules/clientes/store',[Personas::class, 'store']);  
Route::get('/modules/clientes/edit/{id}',[Personas::class, 'edit']) ->name('edit') ;
Route::put('/modules/clientes/update/{id}',[Personas::class, 'update'])->name('update');
Route::get('/modules/clientes/show/{id}',[Personas::class, 'show'])->name('show');
Route::delete('/modules/clientes/destroy/{id}',[Personas::class, 'destroy'])->name('destroy');

