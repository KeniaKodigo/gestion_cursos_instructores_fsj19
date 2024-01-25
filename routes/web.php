<?php

use App\Http\Controllers\AutenticarController;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\PDFController;
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
Route::get('/', [CursosController::class, 'lista_cursos_publico'])->name('template-publica');

Route::get('/Login', function () {
    return view('login');
});

Route::get('/iniciar_sesion',[AutenticarController::class, 'iniciarSesion'])->name('iniciar_sesion');

Route::get('/cerrar_sesion',[AutenticarController::class, 'cerrarSesion'])->name('cerrar_sesion');
/**
 * route('lista_cursos')
 * url('/cursos_activos)
 */

Route::get('/cursos_activos',[CursosController::class, 'index'])->name('lista_cursos'); //nombre una ruta
Route::get('/formulario_curso',[CursosController::class, 'formRegistro']);

Route::post('/guardar_curso',[CursosController::class, 'store'])->name('guardar_curso');

Route::put('/editar_curso/{id}', [CursosController::class, 'update'])->name('editar_curso');

Route::put('/desactivar_curso/{id}', [CursosController::class, 'cambiar_estado'])->name('desactivar_curso');

//rutas para probar vistas
Route::get('/prueba', [CursosController::class, 'testear']);
Route::get('/prueba2', function () {
    return view('login');
});


Route::get('/reporte_prueba',[PDFController::class, 'index']);
Route::get('/cursos_categoria',[PDFController::class, 'cursos_categoria']);
Route::get('/reporte_categoria_curso', [PDFController::class, 'reporteByCategoria'])->name('reporte_por_categoria');
/**
 * route
 * url
 */

