<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Clientes;
use Illuminate\Http\Request;

class AutenticarController extends Controller
{
    public function iniciarSesion(Request $request){
        $correo = $request->post('correo');
        $password = $request->post('password');

        //select * from admin where correo = $correo and password = $password
        $usuario_admin = Admin::where('correo', '=', $correo)->where('password', '=', $password)->get(); //[j...] //vacio

        $usuario_cliente = Clientes::where('correo', '=', $correo)->where('password', '=', $password)->get(); //[]

        //iteramos el arreglo de los usuarios
        foreach($usuario_admin as $admin){
            //crear sesiones (para mantener su informacion mientras este activo )
            session(['id_admin' => $admin->id]); 
            session(['admin' => $admin->nombre]); 
            //mandar para la vista template_admin
            return view('template_admin');
        }

        foreach($usuario_cliente as $cliente){
            //crear sesiones (para mantener su informacion mientras este activo )
            session(['cliente' => $cliente->nombre]); //vacia
            //mandar para la vista template_publica
            return redirect()->route('template-publica');
        }

        return "Credenciales invalidas";

        /*if(count($usuario_admin) > 0){
            //mandar para la vista template_admin
        }else if(count($usuario_cliente) > 0){
            //mandar para la vista template_publica
        }else{
            echo "Credenciales Invalidas";
        }*/
    }

    public function cerrarSesion(){
        //olvidar todas las sessiones para que no tengamos informacion en cache
        session()->forget(['id_admin','admin','cliente']);
        return redirect()->route('template-publica');
    }
}
