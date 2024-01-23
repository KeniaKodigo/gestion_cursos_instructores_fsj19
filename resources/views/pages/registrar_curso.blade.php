@extends('template_admin')

@section('contenido-dinamico')
    <div class="card mt-4">
        <h5 class="card-header">Registro Curso</h5>

        <div class="container">
            <form action="{{route('guardar_curso')}}" method="post" enctype="multipart/form-data">
                @csrf
                <label for="">Titulo</label>
                <input type="text" class="form-control" name="titulo">

                <label for="">Descripcion</label>
                <textarea class="form-control" name="descripcion" id="" cols="30" rows="3"></textarea>

                <label for="">Nivel Curso</label>
                <select name="nivel" id="" class="form-control">
                    <option value="principiante">Principiante</option>
                    <option value="intermedio">Intermedio</option>
                    <option value="avanzado">Avanzado</option>
                </select>

                <label for="">Duracion del curso</label>
                <input type="text" class="form-control" name="duracion">

                <label for="">Precio</label>
                <input type="text" class="form-control" name="precio">

                <label for="">Imagen</label>
                <input type="file" class="form-control" name="imagen">

                <label for="">Seleccion una categoria</label>
                <select name="categoria" id="" class="form-control">
                    @foreach ($categorias as $item)
                        <option value={{$item->id}}>{{$item->categoria}}</option>
                    @endforeach
                </select>

                <label for="">Seleccion un instructor</label>
                <select name="instructor" id="" class="form-control">
                    @foreach ($instructores as $value)
                        <option value={{$value->id}}>{{$value->nombre}}</option>
                    @endforeach
                </select>

                <input type="submit" class="my-4 btn btn-primary" value="Guardar Datos">
            </form>
        </div>
    </div>
@endsection