<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="CSS/pokemonStats.css">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <link rel="stylesheet" href="http://i.icomoon.io/public/temp/c15cb9d95d/UntitledProject6/style.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<title> Habilidades</title>
<body>

  <!---------------------------- Headboard ------------------------------------------------>

  <div class="title">
    <div class="spaner">
      <span onclick="openNav()">&#9776;</span>
    </div>
    <h1 >Estadísticas</h1>
  </div>

  <!---------------------------- Navigation Menu------------------------------------------->
  
  <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href=" {{route('pokemonLibrary')}} ">Biblioteca</a>
    <a href=" {{route('abilities')}} ">Habilidades</a>
  </div>

  <!---------------------------- NavBar --------------------------------------------------->

  <section class="webdesigntuts-workshop">
     <button onclick="filtros()">Reordenar lista</button>
    
  
  </section>

  <br>
  <br>  

  <!--------------------------- Show estatistics -------------------------------------------->
  
    <div class="pokemonStats-Content">
      <div align="center">
        <table>
          <thead class="">
            <th scope="col" align="center" style="width: 150px;">Sprite</th>
            <th scope="col" align="center" style="width: 50px;">#</th>
            <th scope="col" align="center" style="width: 140px;">Nombre</th>
            <th scope="col" align="center" style="width: 140px;">Tipo</th>
            <th scope="col" align="center" style="width: 150px;">HP</th>
            <th scope="col" align="center" style="width: 150px;">ATK</th>
            <th scope="col" align="center" style="width: 150px;">DEF</th>
            <th scope="col" align="center" style="width: 150px;">A. ESP</th>
            <th scope="col" align="center" style="width: 150px;">D. ESP</th>
            <th scope="col" align="center" style="width: 150px;">VEL</th>
            <th scope="col" align="center" style="width: 150px;">Total</th>

          </thead>
          <tbody>
            @foreach ($pokemon_stats as $stat)
            <tr>
              <td align="center" style="background-color: <?php echo $stat->color; ?>;"><a href="{{route('pokemonDetails', $stat->number)}}" id="id"><img src="{{asset('img/sprites/'.$stat->number.'.png')}}"></a></td>
              <td align="center" style="background-color: <?php echo $stat->color; ?>;">{{$stat->number}}</td>
              <td align="center" style="background-color: <?php echo $stat->color; ?>;">{{$stat->name}}</td>
              <td align="center" style="background-color: <?php echo $stat->color; ?>;">{{$stat->p_type}} {{$stat->s_type}}</td>
              <td align="center" style="background-color: <?php echo $stat->color; ?>;">{{$stat->hp}}</td>
              <td align="center" style="background-color: <?php echo $stat->color; ?>;">{{$stat->atk}}</td>
              <td align="center" style="background-color: <?php echo $stat->color; ?>;">{{$stat->def}}</td>
              <td align="center" style="background-color: <?php echo $stat->color; ?>;">{{$stat->s_attack}}</td>
              <td align="center" style="background-color: <?php echo $stat->color; ?>;">{{$stat->s_defense}}</td>
              <td align="center" style="background-color: <?php echo $stat->color; ?>;">{{$stat->speed}}</td>
              <td align="center" style="background-color: <?php echo $stat->color; ?>;">{{$stat->total}}</td>
            @endforeach
            </tr>
          </tbody>
        </table>
      </div>
    </div>

  

  <!--------------------------------------------------------------------------------------->   
</body>

</html>

<script>


  //Function to open and close the navigation menu
  function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
  }

  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
  }

  //Function to new abilitie Modal window
  if(document.getElementById("btnModal")){
      var modal = document.getElementById("tvesModal");
      var btn = document.getElementById("btnModal");
      var span = document.getElementsByClassName("close")[0];
      var body = document.getElementsByTagName("body")[0];

      btn.onclick = function() {
        modal.style.display = "block";
        
        body.style.position = "static";
        body.style.height = "100%";
        body.style.overflow = "hidden";
      }
      span.onclick = function() {
        modal.style.display = "none";

        body.style.position = "inherit";
        body.style.height = "auto";
        body.style.overflow = "visible";
      }
      window.onclick = function(event) {
        if (event.target == modal) {
          modal.style.display = "none";

          body.style.position = "inherit";
          body.style.height = "auto";
          body.style.overflow = "visible";
        }
      }
    }
   
   //Name input count characters
  function textcountChars(obj){
    var maxLength = 50;
    var strLength = obj.value.length;
    var charRemain = (maxLength - strLength);
    
    if(charRemain < 0){
        document.getElementById("name").innerHTML = '<span style="color: red;">You have exceeded the limit of '+maxLength+' characters</span>';
      }else{
          document.getElementById("charNumName").innerHTML = charRemain+' carácteres restantes';
      }
  }

  //TextArea count characters
  function textAreaCountChars(obj){
    var maxLength = 500;
    var strLength = obj.value.length;
    var charRemain = (maxLength - strLength);
    
    if(charRemain < 0){
        document.getElementById("description").innerHTML = '<span style="color: red;">You have exceeded the limit of '+maxLength+' characters</span>';
      }else{
          document.getElementById("charNum").innerHTML = charRemain+' carácteres restantes';
      }
  }
  
 

  //Clean inputs on cancel
  function cleanInputs(){
    document.getElementById("name").value = "";
    document.getElementById("description").value = "";
    
  }
  
</script>