@extends('template_admin')

@section('contenido-dinamico')
    <div class="card">
        <div class="mb-5">
            <h1>Reporte de cursos por categoria</h1>
            <section class="container">
                <form action="{{route('reporte_por_categoria')}}" method="post">
                    @method('GET')
                    <label for="">Selecciona una categoria</label>
                    <select name="categoria" id="" class="form-control">
                        <option value="">Seleccione...</option>
                        @foreach ($categorias as $value)
                            <option value={{$value->id}}>{{$value->categoria}}</option>
                        @endforeach
                    </select>

                    <input type="submit" class="btn btn-dark mt-3" value="Generar Reporte">
                </form>
            </section>
        </div>
    </div>
@endsection