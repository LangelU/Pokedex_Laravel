<!DOCTYPE html>
<html>
<head>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="path/to/chartjs/dist/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>INDEX</h1>
<form action="{{route('test1')}}" method="POST">
    @csrf
    <select>
        <option value="valor1">texto1</option>
    </select>
    <button type="submit">validar</button>
</form>
    


</body>
<script type="text/javascript">

function test(){
    swal({ title: "AÑADIDO ÉXITOSAMENTE",
                   text: "La habilidad ha sido añadida a la base de datos",
                   icon: "success",
                   button: "Aceptar",
                   closeOnClickOutside: false,
                  },
                );
}
</script>
</html>




