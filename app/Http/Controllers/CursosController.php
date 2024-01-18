<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Cursos;
use App\Models\Instructores;
use Illuminate\Http\Request;

class CursosController extends Controller
{
    //metodo para enlistar los cursos activos y mandar el arreglo a una vista
    public function index(){
        /**
         * SELECT cursos.titulo, cursos.duracion, categorias.categoria, instructores.nombre FROM cursos INNER JOIN categorias ON cursos.id_categoria = categorias.id INNER JOIN instructores ON cursos.id_instructor = instructores.id WHERE cursos.id_estado = 1
         */
        $cursos_activos = Cursos::join('categorias', 'cursos.id_categoria', '=', 'categorias.id')->join('instructores', 'cursos.id_instructor', '=', 'instructores.id')->select('cursos.titulo', 'cursos.duracion', 'categorias.categoria', 'instructores.nombre')->where('cursos.id_estado', '=', 1)->get(); //[]

        //mando la informacion a una vista

        //compact() => extraer recursos que se alojen a una vista
        return view('pages.cursos_activos', compact('cursos_activos'));

        //select * from cursos => all()
        //$cursos = Cursos::all();
    }

    //metodo para retornar la vista de registrar un curso con la informacion de los instructores y categorias que hay en la bd
    public function formRegistro(){
        $instructores = Instructores::all(); //select * from instructores
        $categorias = Categorias::all(); //select * from categorias

        return view('pages.registrar_curso', compact('instructores','categorias'));
    }
}
