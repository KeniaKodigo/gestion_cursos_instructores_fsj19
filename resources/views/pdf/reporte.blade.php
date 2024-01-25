<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<style>
    h1{
        color:darkgreen;
        text-align: center;
    }
</style>
<body>
    <h1>Lista de Cursos</h1>
    <table class="table">
        <thead>
            <th>Titulo</th>
            <th>Descripcion</th>
            <th>Duracion</th>
            <th>Precio</th>
        </thead>
        <tbody>
            @foreach ($cursos as $item)
                <tr>
                    <td>{{$item->titulo}}</td>
                    <td>{{$item->descripcion}}</td>
                    <td>{{$item->duracion}}</td>
                    <td>{{$item->precio}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>