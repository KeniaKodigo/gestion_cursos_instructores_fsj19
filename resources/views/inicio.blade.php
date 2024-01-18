<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('/')}}/css/style.css">
    <title>Document</title>
</head>
<body>
    <nav class="text-center">
        <ul>
            <li>Home</li>
            <li>Home</li>
            <li>Home</li>
        </ul>
    </nav>
    <?php 
        $suma = 2 + 2;
        echo $suma;
    ?>

    @php
        $suma = 2 + 2;
        echo $suma;
        print_r();

    @endphp

    @foreach ($arreglo as $item)
        <tr>
            <td>{{$item->nombre}}</td>
        </tr>
    @endforeach

    @if ()
        
    @endif

    <main>
        <h1>Bienvenido a esta casa</h1>
    </main>
</body>
<script src="{{url('/')}}/js/index.js"></script>
</html>