<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="CSS/notifications.css">
  <link rel="stylesheet" type="text/css" href="abilities.js">
  <link rel="stylesheet" href="http://necolas.github.io/normalize.css/3.0.1/normalize.css">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="sweetalert2.min.js"></script>
  <link rel="stylesheet" href="sweetalert2.min.css">
  <link rel="stylesheet" href="http://i.icomoon.io/public/temp/c15cb9d95d/UntitledProject6/style.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<title> Biblioteca</title>
<body>

<div class="title" align="center">
  <h1 >Biblioteca</h1>
</div>

  <div>
        <script type="text/javascript">
            Swal.fire({
                icon: 'question',
                title: 'POKÉMON NO ENCONTRADO',
                text: 'El pokémon solicitado no existe en la base de datos',
                confirmButtonText: 'Aceptar',
                allowOutsideClick: false
                }).then(function() {
                window.location = "pokemonLibrary";
                });
        </script>
    </div>
   
</body>
<footer  style="width:90%; margin-left: 0px;"  >


<div class="copyright">
    <div class="container-fluid">
        ©  Copyright: Liker
    </div>
</div>
</html> 