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
                        <td>
                            <img src="{{url('/')}}/imagenes/{{$curso->imagen_curso}}" alt="" style="width: 100px">
                        </td>
                        <td>{{$curso->titulo}}</td>
                        <td>{{$curso->duracion}}</td>
                        <td>{{$curso->categoria}}</td>
                        <td>{{$curso->nombre}}</td>
                        <td>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalCurso{{$curso->id}}">Editar</button>
                            <button>Cambiar Estado</button>
                        </td>
                    </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="ModalCurso{{$curso->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Curso</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{route('editar_curso', $curso->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                            <div class="modal-body">
                                
                                    @csrf
                                    <label for="">Titulo</label>
                                    <input type="text" class="form-control" name="titulo" value="{{$curso->titulo}}">
                                        
                                    <label for="">Duracion del curso</label>
                                    <input type="text" class="form-control" name="duracion" value="{{$curso->duracion}}">
                
                                    <label for="">Cambiar imagen</label>
                                    <input type="file" class="form-control" name="imagen">


                                    <label for="">Imagen Previa</label>
                                    <br>
                                    <input type="hidden" name="imagen_previa" value="{{$curso->imagen_curso}}">
                                    <img src="{{url('/')}}/imagenes/{{$curso->imagen_curso}}" alt="" class="w-25 mb-3">                                
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Actualizar Curso</button>
                            </div>
                        </form>
                        </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

