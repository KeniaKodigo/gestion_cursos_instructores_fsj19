<?php

use App\Http\Controllers\CursosController;
use Illuminate\Support\Facades\Route;

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

//index
Route::get('/', function () {
    return view('template_admin');
});

Route::get('/cursos_activos',[CursosController::class, 'index'])->name('lista_cursos'); //nombre una ruta
Route::get('/formulario_curso',[CursosController::class, 'formRegistro']);

Route::post('/guardar_curso',[CursosController::class, 'store'])->name('guardar_curso');

Route::put('/editar_curso/{id}', [CursosController::class, 'update'])->name('editar_curso');
