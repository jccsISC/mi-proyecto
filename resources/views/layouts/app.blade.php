<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>mi-proyecto - @yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    
    <nav class="navbar navbar-dark bg-primary">
        <a  href="trainers" class="navbar-brand">
            <img src="/docs/4.0/assets/brand/bootstrap-solid.svg" width="30" height="30" alt="">
            L O G O
        </a>
    </nav>

    <div class="container">
        @yield('content')
    </div>
    

</body>
</html>