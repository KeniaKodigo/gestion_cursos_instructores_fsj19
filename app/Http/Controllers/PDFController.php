<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Cursos;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    //lista cursos
    public function index(){
        $cursos = Cursos::all();

        //loadView = hace referencia a la vista que va cargar el pdf
        $pdf = Pdf::loadView('pdf.reporte', compact('cursos'));
        //le asignamos al usuario que lo visualice y como opcion lo puede descargar
        return $pdf->stream();
    }

    //retornar una vista, que me va mandar las categorias que hay en la bd
    public function cursos_categoria(){
        $categorias = Categorias::all();

        return view('pages.cursos_categoria', compact('categorias'));
    }

    //metodo para generar el reporte de cursos por categoria
    public function reporteByCategoria(Request $request){
        $categoria = $request->post('categoria'); //un numero

        /**
         * select cursos.*, instructores.nombre from cursos inner join instructores on cursos.id_instructor = instructores.id where cursos.id_categoria = $categoria
         */

        $lista = Cursos::join('instructores', 'cursos.id_instructor', '=',  'instructores.id')->join('categorias', 'cursos.id_categoria', '=',  'categorias.id')->select('cursos.*', 'instructores.nombre','categorias.categoria')->where('cursos.id_categoria', '=', $categoria)->get();

        $pdf = Pdf::loadView('pdf.reporte_categoria', compact('lista'));
        //le asignamos al usuario que lo visualice y como opcion lo puede descargar
        return $pdf->stream();
    }
}
