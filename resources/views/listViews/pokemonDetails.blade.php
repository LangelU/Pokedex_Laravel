<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{!! asset('CSS/pokemonDetails.css') !!}">
  <link rel="stylesheet" type="text/css" href="{!! asset('CSS/pokemonLibrary.css') !!}">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="sweetalert2.min.js"></script>
  <link rel="stylesheet" href="sweetalert2.min.css">
  <link rel="stylesheet" href="http://i.icomoon.io/public/temp/c15cb9d95d/UntitledProject6/style.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="path/to/chartjs/dist/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

@foreach ($pokemon_details as $details)
@foreach ($pokemon_types as $types)
@foreach ($pokemon_abilities as $abilities)
@foreach ($pokemon_evolutions as $evolutions)
<title> {{$details->name}} </title>

<body>

  <!------------------------------ Headboard -------------------------------------------->  
    
    <div class="title">
      <div class="spaner">
        <span onclick="openNav()">&#9776;</span>
      </div>
      <h1> {{$details->name}} </h1>
    </div>

      <div align="center" class="home">
        <a href="{{route('pokemonLibrary')}}"><img src="{!! asset('img/wallpapers/goBackIcon.png') !!}"></a>
    </div>

  <!-------------------------------- Navbar ---------------------------------------------> 
    
    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a href=" {{route('pokemonLibrary')}} ">Biblioteca</a>
      <a href=" {{route('abilities')}} ">Habilidades</a>
      <a href=" {{route('pokemonStats')}} ">Listado de estadísticas</a>
    </div>
  
  <!-------------------------- Basic info Content ---------------------------------------->
  <br>

  <div class="row">
    <div class="box col">
      <div class="basicInfo-Content" style="border: 5px solid <?php echo $types->color; ?>;">
         <img src="{{asset('img/wallpapers/pokedex.png')}}">
        <h4>INFORMACIÓN BÁSICA</h4>


        <label> #{{$details->number}}   {{$details->name}} </label>
        <br>
        <label> {{$details->title}} </label>
        <br>
        <label>Tipo: </label>
        <label> {{$types->pokemon_primaryType}} {{$types->pokemon_secondaryType}} </label>
        <br>
        <label>Descripción: </label>
        <label>{{$details->description}} </label>

      </div>
    </div>

  <!---------------------------- Image Content ------------------------------------------->
    
    <div class="box col">
      <div class="image-Content" style="border: 5px solid <?php echo $types->color; ?>;">
        <div align="center">
          <img src="{{asset('img/pokemon/'.$details->number.'.png')}}">
        </div>
      </div>
    </div>

    <!--------------------------- Estatistics Content ------------------------------------->
    
    <div class="box col">
      <div class="estatistics-Content" style="border: 5px solid <?php echo $types->color; ?>;">
      <img class="sup" src="{{asset('img/wallpapers/pokeball_1.png')}}">
      <h4>ESTADÍSTICAS</h4>
      <br>
       <canvas id="estatGraphic" width="200" height="200"></canvas>
       <br>
       <canvas class="totalBar" id="totalGraphic" width="180" height="200"></canvas>
      </div>
    </div>
  </div>
  <br>

  <!----------------------------- DetailedInfo Content ------------------------------------->
  
  <div class="row">

    <div class="box col">
      <div class="detailedInfo-Content" style="border: 5px solid <?php echo $types->color; ?>;">
        <img src="{{asset('img/wallpapers/initials_1gen.png')}}">
        <h4>INFORMACIÓN</h4>
        <label>Altura: </label>  
        <label>{{$details->height}} Metros</label>
        <br>
        <label>Peso: </label>
        <label>{{$details->weight}} Kilogramos</label>
        <br>
        <label>Género: </label>
        <label>{{$details->gender}}.</label>
        <br>
        <label>Ratio de captura: </label>
        <label>{{$details->catch_rate}}</label>
        <br>
        <label>Grupo huevo: </label>
        <label>{{$details->egg_group}} </label>
      </div>
    </div>

    <!----------------------------- Abilities content ------------------------------>

    <div class="box col">
      <div class="abilities-Content" style="border: 5px solid <?php echo $types->color; ?>;">
        <img class="sup" src="{{asset('img/wallpapers/pokeball_2.png')}}">
        <img class="inf" src="{{asset('img/wallpapers/pokeball_2.png')}}">
          <h4>HABILIDADES</h4>

          <div class="normalAbilities-Content">
            <h5>Habilidades</h5>
            <br>
            <a onclick="abilitieOne()">{{$abilities->abName_1}}</a>
            <a onclick="abilitieTwo()">{{$abilities->abName_2}}</a>
          </div>

          <div class="hiddenAbilities-Content">
            <h5>Habilidades ocultas</h5>
            <br>
           <a onclick="hiddenAbilitieOne()">{{$abilities->habName_1}}</a>
            <a onclick="hiddenAbilitieTwo()">{{$abilities->habName_2}}</a>
          </div>

          <div class="megaAbilitie-Content">
            <h5>Habilidad mega</h5>
            <a onclick="megaAbilitie()" style="cursor: pointer">{{$abilities->abMegaName}}</a>
          </div>      
      </div>
    </div>

    <!--------------------------- Evolutions Content ------------------------------------->

    <div class="box col" >
      <div class="evolutions-Content" style="border: 5px solid <?php echo $types->color; ?>;">
      <h4>EVOLUCIONES</h4>

        <div class="preEvo-Content">
          <h5>Pre evolución</h5>
           <a href="{{route('pokemonDetails', $evolutions->preEvo_number)}}" id="id"><img src="{{asset('img/pokemon/'.$evolutions->preEvo_number.'.png')}}"></a>
          <div align="center">
            <label class="name">{{$evolutions->preEvo_name}}</label>
          </div>
        </div>

        <div class="evo-Content">
          <h5>Evolución</h5>
          <a href="{{route('pokemonDetails', $evolutions->evo_number)}}" id="id"><img src="{{asset('img/pokemon/'.$evolutions->evo_number.'.png')}}"></a> 
          <div align="center">
             <label>{{$evolutions->evo_name}}</label>
          </div>
        </div>

        <div class="megaEvo-Content">
          <h5>Mega evolución</h5>
          <a href="{{route('pokemonDetails', $evolutions->megaEvo_number, )}}" id="id"><img src="{{asset('img/pokemon/'.$evolutions->megaEvo_number.'.png')}}"></a>
          <div align="center">
            <label>{{$evolutions->megaEvo_name}}</label>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

    @endforeach
    @endforeach 
    @endforeach
    @endforeach

  <!--------------------------------------------------------------------------------------->

</body>
<script type="text/javascript">
  //Function to open and close the navigation menu
  function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
  }

  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
  }
//Estatistics graphic
Chart.defaults.font.size = 18;

@foreach ($pokemon_details as $item)
const ctx = document.getElementById('estatGraphic');
ctx.height = 210;
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Salud', 'Ataque', 'Defensa', 'Atq. Especial', 'Def. Especial', 'Velocidad'],
        datasets: [{
            data: [{{$item->hp}}, {{$item->attack}}, {{$item->defense}}, {{$item->special_attack}}, {{$item->special_defense}}, {{$item->speed}}],
            backgroundColor: [
                'rgba(33, 202, 19, 0.7)',
                'rgba(225, 0, 0, 0.7)',
                'rgba(243, 255, 0, 0.7)',
                'rgba(0, 27, 255, 0.7)',
                'rgba(124, 0, 255, 0.7)',
                'rgba(0, 216, 255, 0.7)'
            ],
            borderColor: [
                'rgba(29, 157, 19, 1)',
                'rgba(133, 0, 0, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(0, 13, 127, 1)',
                'rgba(63, 0, 129, 1)',
                'rgba(0, 159, 187, 1)'
            ],
            borderWidth: 1.5
        }]
    },
options: {
          plugins: {
            legend: {
                display: false,
                labels: {
                    color: 'rgb(255, 99, 132)'
                }
            }
        },
  indexAxis: 'y',
    scales: {

        x: {
          display: false,
          grid: {
          display: false
        }
        },
        y: {
          display: true,
        grid: {
          display: false,
          borderColor: 'rgba(255, 255, 255, 0.1)'
        }
        }
    }

}
});

const ct = document.getElementById('totalGraphic');
ct.height = 215;
const myChar = new Chart(ct, {
    type: 'bar',
    data: {
        labels: ['Total', ' ', ' ', ' ', ' ', ' '],
        datasets: [{
            data: [{{$item->total}},10,10,10,10,10],
            backgroundColor: [
                'rgba(146, 140, 140, 0.7)',
                'rgba(225, 0, 0, 0.0)',
                'rgba(243, 255, 0, 0.0)',
                'rgba(0, 27, 255, 0.0)',
                'rgba(124, 0, 255, 0.0)',
                'rgba(0, 216, 255, 0.0)'
            ],
            borderColor: [
                'rgba(161, 161, 161, 1)',
                'rgba(133, 0, 0, 0)',
                'rgba(255, 206, 86, 0)',
                'rgba(0, 13, 127, 0)',
                'rgba(63, 0, 129, 0)',
                'rgba(0, 159, 187, 0)'
            ],
            borderWidth: 1.5
        }]
    },
options: {
          plugins: {
            legend: {
                display: false,
                labels: {
                    color: 'rgb(255, 99, 132)'
                }
            }
        },
  indexAxis: 'y',
    scales: {

        x: {
          display: false,
          grid: {
          display: false
        }
        },
        y: {
          display: true,
        grid: {
          display: false,
          borderColor: 'rgba(255, 255, 255, 0.1)'
        }
        }
    }

}
});

@endforeach

@foreach ($pokemon_abilities as $abilitie)
function abilitieOne(){
  Swal.fire({
    icon: 'info',
    title: '{{$abilities->abName_1}}',
    text: '{{$abilities->abDescription_1}}',
    confirmButtonText: 'Aceptar',
    allowOutsideClick: false
  })
}

function abilitieTwo(){
  Swal.fire({
    icon: 'info',
    title: '{{$abilities->abName_2}}',
    text: '{{$abilities->abDescription_2}}',
    confirmButtonText: 'Aceptar',
    allowOutsideClick: false
  })
}

function hiddenAbilitieOne(){
  Swal.fire({
    icon: 'info',
    title: '{{$abilities->habName_1}}',
    text: '{{$abilities->habDescription_1}}',
    confirmButtonText: 'Aceptar',
    allowOutsideClick: false
  })
}

function hiddenAbilitieTwo(){
  Swal.fire({
    icon: 'info',
    title: '{{$abilities->habName_2}}',
    text: '{{$abilities->habDescription_2}}',
    confirmButtonText: 'Aceptar',
    allowOutsideClick: false
  })
}

function megaAbilitie(){
Swal.fire({
  icon: 'info',
  title: '{{$abilities->abMegaName}}',
  text: '{{$abilities->abMegaDescription}}',
  confirmButtonText: 'Aceptar',
  allowOutsideClick: false
})
}
@endforeach

</script>


</html> 

<script>
//Estatistics graphic
   const myChart = new Chart(ctx, {...});
</script>