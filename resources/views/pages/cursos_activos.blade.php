{{-- Heredando el diseño del template_admin.blade.php --}}
@extends('template_admin')

{{-- Haciendo el apartado dinamico de la vista --}}
@section('contenido-dinamico')
    <div class="card mt-4">
        <div class="d-flex justify-content-between">
            <h5 class="card-header">Cursos Activos</h5>
            <div class="pt-3 px-4">
                <a href="{{url('/formulario_curso')}}"><i class='bx bxs-book-add'></i> Agregar</a>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Titulo</th>
                    <th>Duracion</th>
                    <th>Categoria</th>
                    <th>Instructor</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cursos_activos as $curso)
                    <tr>
                        <td>h</td>
                        <td>{{$curso->titulo}}</td>
                        <td>{{$curso->duracion}}</td>
                        <td>{{$curso->categoria}}</td>
                        <td>{{$curso->nombre}}</td>
                        <td>
                            <button>Editar</button>
                            <button>Cambiar Estado</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

