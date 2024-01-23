<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Cursos;
use App\Models\Instructores;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CursosController extends Controller
{
    //metodo para enlistar los cursos activos y mandar el arreglo a una vista
    public function index(){
        /**
         * SELECT cursos.titulo, cursos.duracion, categorias.categoria, instructores.nombre FROM cursos INNER JOIN categorias ON cursos.id_categoria = categorias.id INNER JOIN instructores ON cursos.id_instructor = instructores.id WHERE cursos.id_estado = 1
         */
        $cursos_activos = Cursos::join('categorias', 'cursos.id_categoria', '=', 'categorias.id')->join('instructores', 'cursos.id_instructor', '=', 'instructores.id')->select('cursos.id','cursos.titulo', 'cursos.duracion', 'categorias.categoria', 'cursos.imagen_curso', 'instructores.nombre')->where('cursos.id_estado', '=', 1)->get(); //[]

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

    public function store(Request $request){
        //validar la imagen
        if($request->hasFile('imagen')){
            $imagen = $request->file('imagen'); //prueba.png

            //sustituir el nombre de la imagen
            //react-js.png
            $imagen_nombre = Str::slug($request->post('titulo')).".".$imagen->guessExtension();

            //guardar la imagen de manera local
            $ruta = public_path("imagenes/");

            //copiar la imagen
            //public/imagenes/react-js.png
            copy($imagen->getRealPath(),$ruta.$imagen_nombre);
        }else{
            $imagen_nombre = null;
        }

        //Guardando el curso
        //insert into..
        $curso = new Cursos();
        $curso->titulo = $request->post('titulo');
        $curso->descripcion = $request->post('descripcion');
        $curso->nivel_curso = $request->post('nivel');
        $curso->duracion = $request->post('duracion');
        $curso->precio = $request->post('precio');
        $curso->imagen_curso = $imagen_nombre;
        $curso->id_categoria = $request->post('categoria'); //vacio (?)
        $curso->id_instructor = $request->post('instructor');
        $curso->id_estado = 1;
        $curso->save();

        //return view();
        return redirect()->route('lista_cursos');
        //$curso = Cursos::created();
    }

    //metodo para actualizar un curso
    public function update(Request $request, $id){
        //select * from table where id = ? (find())
        if($request->hasFile('imagen')){
            $imagen = $request->file('imagen'); //prueba.png

            //sustituir el nombre de la imagen
            //react-js.png
            $imagen_nombre = Str::slug($request->post('titulo')).".".$imagen->guessExtension();

            //guardar la imagen de manera local
            $ruta = public_path("imagenes/");

            //copiar la imagen
            //public/imagenes/react-js.png
            copy($imagen->getRealPath(),$ruta.$imagen_nombre);
        }else{
            //capturo el nombre de la imagen que estaba anteriormente
            $imagen_nombre = $request->post('imagen_previa');
        }

        $curso = Cursos::find($id);
        $curso->titulo = $request->post('titulo');
        $curso->duracion = $request->post('duracion');
        $curso->imagen_curso = $imagen_nombre;
        //UPDATE cursos
        $curso->update();

        //back() -> actualizame la misma vista en la que estoy
        return back();
    }
}
