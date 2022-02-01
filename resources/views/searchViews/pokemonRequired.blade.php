<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="CSS/pokemonLibrary.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    

</head>
<title> Biblioteca </title>
<body>

  <!------------------------------ Headboard ---------------------------------------------->

  <div class="title">
    <div class="spaner">
      <span onclick="openNav()">&#9776;</span>
    </div>
    <h1 >Biblioteca de Pókemon</h1>
  </div>

  <!------------------------------ Navigation Menu ---------------------------------------->

  <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href=" {{route('pokemonLibrary')}} ">Biblioteca</a>
    <a href=" {{route('abilities')}} ">Habilidades</a>
    <a href=" {{route('pokemonStats')}} ">Listado de estadísticas</a>
  </div>


  <!----------------------------------- NavBar -------------------------------------------->
  
  <section class="webdesigntuts-workshop">
    <form action="{{route('lookPokemon')}}" method="GET">        
      <input type="search" placeholder="Buscar por nombre..." id="req_pokemon" name="req_pokemon">         
      <button>Buscar</button>
    </form>

    <form action="{{route('lookForNumber')}}" method="GET" class="look_number">        
      <input type="search" placeholder="Buscar por numero..." id=" req_number" name=" req_number">         
      <button>Buscar</button>
    </form>
      <button class="add" id="btnModal"> Añadir pokémon</button>
  </section>

  <!-------------------------------- Filters menu ----------------------------------------->

  <div class="b_filter">
    <form action="{{route('pokemonFilters')}}" method="GET">
       <select name="type_filter" id="type_filter">
          <?php
            $connection =  mysqli_connect("localhost", "root", "", "pokedex_bd"); 
            $sql = mysqli_query($connection, "SELECT id, name FROM types");
            while ($row = $sql->fetch_assoc()){
            echo "<option value=\"". $row['name']. "\">" . $row['name'] . "</option>";
            }
          ?>
      </select>

      <select name="type2_filter" id="type2_filter" class="type2_filter">
        <option value=" ">Elegir tipo 2</option>
          <?php
            $connection =  mysqli_connect("localhost", "root", "", "pokedex_bd"); 
            $sql = mysqli_query($connection, "SELECT id, name FROM types");
            while ($row = $sql->fetch_assoc()){
            echo "<option value=\"". $row['name']. "\">" . $row['name'] . "</option>";
            }
          ?>
      </select>
      <button>Filtrar</button>
    </form>
  </div>

  <div class="home">
    <a href="{{route('pokemonLibrary')}}"><img src="img\wallpapers\goBackIcon.png" title="Regresar"></a>
  </div>
       
  <!--------------------------- Modal to add new pokemon ---------------------------------->

  <div id="tvesModal" class="modalContainer">
      <div class="modal-content">
        <div class="ModalTitle">
          <h2 align="center">Añadir nuevo pokémon</h2>
        </div>
        <span title="Cerrar" id="cancel" class ="close" ><div class="" onclick="cleanInputs();">X</div></span>

        <br>
        <br>
        <br>
        <br>

        <form action="{{route('storePokemon')}}" method="POST">
          @csrf
          <div class="d-flex align-items-start">
            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">

              <!----------------------- Basic data tab ------------------------------------>
              
              <button class="nav-link active" id="basicData-tab" data-bs-toggle="pill" data-bs-target="#basicData" type="button" role="tab" aria-controls="basicData" aria-selected="true">Datos base</button>

              <!------------------------- Details tab ------------------------------------->
              
              <button class="nav-link" id="details-tab" data-bs-toggle="pill" data-bs-target="#details" type="button" role="tab" aria-controls="details" aria-selected="false">Detalles</button>

              <!------------------------ Estatistics tab ---------------------------------->
              
              <button class="nav-link" id="estatistics-tab" data-bs-toggle="pill" data-bs-target="#estatistics" type="button" role="tab" aria-controls="estatistics" aria-selected="false">Estadísticas</button>

              <!------------------------- Abilities tab ----------------------------------->
              
              <button class="nav-link" id="abilities-tab" data-bs-toggle="pill" data-bs-target="#abilities" type="button" role="tab" aria-controls="abilities" aria-selected="false">Habilidades</button>

              <!------------------------ Evolutions tab ----------------------------------->
              
              <button class="nav-link" id="evolutions-tab" data-bs-toggle="pill" data-bs-target="#evolutions" type="button" role="tab" aria-controls="evolutions" aria-selected="false">Evoluciones</button>
            </div>

            <!------------------------------ Basic data content --------------------------->

            <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active basicData-content" id="basicData" role="tabpanel" aria-labelledby="basicData-tab">

              <label> Número: </label>
              <input  type="text" name="p_number" id="p_number" placeholder="Ingrese el número..." onkeyup="textcountChars(this);" maxlength="50" required align="center" autocomplete="off">

              <br>
              <br>

              <label> Nombre: </label>
              <input type="text" name="p_name" id="p_name" placeholder="Ingrese el nombre del pokémon" onkeyup="textcountChars(this);" maxlength="50" required align="center" autocomplete="off">

              <br>
              <br>

              <label> Tipo primario: </label>
              <select name="p_type" id="p_type" required="">
                <?php
                  $connection =  mysqli_connect("localhost", "root", "", "pokedex_bd"); 
                  $sql = mysqli_query($connection, "SELECT id, name FROM types");
                  while ($row = $sql->fetch_assoc()){
                  echo "<option value=\"". $row['name']. "\">" . $row['name'] . "</option>";
                  }
                ?>
              </select>

              <br>
              <br>

              <label>Tipo secundario: </label>
              <select name="s_type" id="s_type">
                <option value=" ">No tiene</option>
                <?php
                  $connection =  mysqli_connect("localhost", "root", "", "pokedex_bd"); 
                  $sql = mysqli_query($connection, "SELECT id, name FROM types");
                  while ($row = $sql->fetch_assoc()){
                  echo "<option value=\"". $row['name']. "\">" . $row['name'] . "</option>";
                  }
                ?>
              </select>

              <br>
              <br>

              <label>Descripción: </label>
              <br>
              <textarea id="p_description" name="p_description" placeholder="Ingrese la descripción de la habilidad" onkeyup="textAreaCountChars(this);" maxlength="500" required autocomplete="off"></textarea>
              <br>
              <p id="charNum" class="p_description">(500 carácteres restantes)</p>

            </div>

            <!------------------------------- Details content ----------------------------->
            
            <div class="tab-pane fade details-content" id="details" role="tabpanel" aria-labelledby="details-tab">

              <label>Título: </label>
              <input type="text" id="p_title" name="p_title" placeholder="Ej: pokémon semilla" required="">

              <br>
              <br>

              <label>Altura: </label>
              <input type="number" id="p_height" name="p_height" step="any" placeholder="Ingrese altura en metros" required="">

              <br>
              <br>

              <label>Peso: </label>
              <input type="number" id="p_weight" name="p_weight" step="any" placeholder="Ingrese peso en kilogramos" required="">

              <br>
              <br>

              <label>Género: </label>
              <input type="text" id="p_gender" name="p_gender" placeholder="Ej: 50% macho, 50% hembra" required="">

              <br>
              <br>

              <label>Ratio de captura: </label>
              <input type="text" id="p_crate" name="p_crate" placeholder="Ej: 100% con pokéball, a salud completa" required="">

              <br>
              <br>

              <label>Grupo huevo: </label>
              <input type="text" id="p_eggroup" name="p_eggroup" placeholder="Ej: Monstruo" title="Para más de un grupo, separar con comas" required="">
            </div>

            <!------------------------------ Estatistics content -------------------------->
            
            <div class="tab-pane fade estatistics-content" id="estatistics" role="tabpanel" aria-labelledby="v-pills-messages-tab">
              
              <label> Salud: </label>
              <input type="number" name="p_hp" id="p_hp" placeholder="Ingrese el valor de HP" required="">

              <br>
              <br>

              <label> Ataque: </label>
              <input type="number" name="p_attack" id="p_attack" placeholder="Ingrese el valor de ATK" required="">

              <br>
              <br>

              <label> Defensa: </label>
              <input type="number" name="p_defense" id="p_defense" placeholder="Ingrese el valor de DEF" required="">

              <br>
              <br> 

              <label> Ataque especial: </label>
              <input type="number" name="p_sattack" id="p_sattack" placeholder="Ingrese el valor de S.ATK" required="">

              <br>
              <br>

              <label> Defensa especial: </label>
              <input type="number" name="p_sdefense" id="p_sdefense" placeholder="Ingrese el valor de S.DEF" required="">

              <br>
              <br>

              <label> Velocidad: </label>
              <input type="number" name="p_speed" id="p_speed" placeholder="Ingrese el valor de VEL" required="">

              <br>
              <br>

              <label> Total: </label>
              <input type="number" name="p_total" id="p_total" placeholder="Ingrese el valor de total" required="">
            </div>

            <!------------------------------- Abilities content --------------------------->
            
            <div class="tab-pane fade abilities-content" id="abilities" role="tabpanel" aria-labelledby="v-pills-settings-tab">
              
              <label>Habilidad 1: </label>
              <select name="abDescription_1" id="abDescription_1" required="" onchange="abilitieOne()">
                <option value=" ">Elegir habilidad 1</option>
                <?php
                  $connection =  mysqli_connect("localhost", "root", "", "pokedex_bd"); 
                  $sql = mysqli_query($connection, "SELECT id, name, description FROM abilities ORDER BY abilities.name");
                  while ($row = $sql->fetch_assoc()){
                  echo "<option value=\"".$row['description']."\">".$row['name']."</option>";
                  }
                ?>
              </select>
              <input type="hidden" name="abName_1" id="abName_1" value="">

              <br>
              <br>

              <label>Habilidad 2: </label>
              <select name="abDescription_2" id="abDescription_2" onchange="abilitieTwo()">
                <option value=" ">No tiene</option>
                <?php
                  $connection =  mysqli_connect("localhost", "root", "", "pokedex_bd"); 
                  $sql = mysqli_query($connection, "SELECT id, name, description FROM abilities ORDER BY abilities.name");
                  while ($row = $sql->fetch_assoc()){
                  echo "<option value=\"".$row['description']."\">".$row['name']."</option>";
                  }
                ?>
              </select>
              <input type="hidden" name="abName_2" id="abName_2" value>

              <br>
              <br>

              <label>Habilidad oculta 1: </label>
              <select name="hiAbDescription_1" id="hiAbDescription_1" onchange="hidAbilitieOne()">
                <option value=" ">No tiene</option>
                <?php
                  $connection =  mysqli_connect("localhost", "root", "", "pokedex_bd"); 
                  $sql = mysqli_query($connection, "SELECT id, name, description FROM abilities ORDER BY abilities.name");
                  while ($row = $sql->fetch_assoc()){
                  echo "<option value=\"".$row['description']."\">".$row['name']."</option>";
                  }
                ?>
              </select>
              <input type="hidden" name="hiAbName_1" id="hiAbName_1" value>

              <br>
              <br>

              <label>Habilidad oculta 2: </label>
              <select name="hiAbDescription_2" id="hiAbDescription_2" onchange="hidAbilitieTwo()">
                <option value=" ">No tiene</option>
                <?php
                  $connection =  mysqli_connect("localhost", "root", "", "pokedex_bd"); 
                  $sql = mysqli_query($connection, "SELECT id, name, description FROM abilities ORDER BY abilities.name");
                  while ($row = $sql->fetch_assoc()){
                  echo "<option value=\"".$row['description']."\">".$row['name']."</option>";
                  }
                ?>
              </select>
              <input type="hidden" name="hiAbName_2" id="hiAbName_2" value>

              <br>
              <br>

              <label>Habilidad Mega: </label>
              <select name="megaAbDescription" id="megaAbDescription" onchange="megaAbilitie()">
                <option value=" ">No tiene</option>
                <?php
                  $connection =  mysqli_connect("localhost", "root", "", "pokedex_bd"); 
                  $sql = mysqli_query($connection, "SELECT id, name, description FROM abilities ORDER BY abilities.name");
                  while ($row = $sql->fetch_assoc()){
                echo "<option value=\"".$row['description']."\">".$row['name']."</option>
                  ";
                  }
                ?>
              </select>
              <input type="hidden" name="megaAbName" id="megaAbName" value>

            </div>

            <!------------------------------ Evolutions content --------------------------->
            
            <div class="tab-pane fade evolutions-content" id="evolutions" role="tabpanel" aria-labelledby="v-pills-settings-tab">

              <div>
                <label>Pre evolución</label>

                <br>

                <label>Nombre: </label>
                <input type="text" id="p_preevoName" name="p_preevoName" placeholder="Nombre de la pre evolución">

                <br>
              
                <label>Número: </label>
                <input type="text" id="p_preevoNumber" name="p_preevoNumber" placeholder="Número de la pre evolución">
              </div>
              
              <br>

              <div>
                <label> Evolución</label>

                <br>

                <label> Nombre: </label>
                <input type="text" id="p_evoName" name="p_evoName" placeholder="Nombre de la evolución">

                <br>

                <label> Número: </label>
                <input type="text" id="p_evoNumber" name="p_evoNumber" placeholder="Nombre de la evolución">

              </div>

              <br>

              <div>
                <label>Mega evolución</label>

                <br>

                <label>Nombre: </label>
                <input type="text" id="p_megaevoName" name="p_megaevoName" placeholder="Nombre de la mega evolución">

                <br>

                <label>Número: </label>
                <input type="text" id="p_megaevoNumber" name="p_megaevoNumber" placeholder="Nombre de la mega evolución">
              </div>          
            </div>
        </div>
    </div>
                <br>
                <br>

                <div align="center">
                        <button type="submit" id="btnNewTask" class="button" onclick="validate()">Aceptar</button>
                </div>
      </form>
    <!------------------------------------------------------------------------------------->
    </div>
  </div>

  <!--------------------------- Show library pokémon -------------------------------------->

  <div align="center" class="required_pokemon">
    @foreach ($pokemon as $item)
      <div class="" style="background-color: <?php echo $item->color; ?>; border-radius: 10px 10px 10px 10px;">
        <p>
           <h4> # {{$item->pokemon_number}} </h4>
           <h4> {{$item->pokemon_name}} </h4>
        </p>
        <div align="center">
          <a href="{{route('pokemonDetails', $item->pokemon_number)}}">
            <img src="{{asset('img/pokemon/'.$item->pokemon_number.'.png')}}">
          </a>
        </div>
        <label> {{$item->pokemon_primaryType}} {{$item->pokemon_secondaryType}} </label>
      </div>
   @endforeach
  </div>

  <!--------------------------------------------------------------------------------------->   
</body>
<footer  style="width:90%; margin-left: 0px;"  >
  <div class="copyright">
    <div class="container-fluid">
      ©  Copyright: Liker
    </div>
  </div>
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


  function abilitieCreated(){
  swal("Se ha guardado éxitosamente",
       "Habilidad añadida a la base de datos",
       "success", {
       button: "ACEPTAR!",
      });
}

  /* Para obtener el texto */
  function abilitieOne() {
    var select = document.getElementById("abDescription_1"), //El <select>
    text = select.options[select.selectedIndex].innerText; //El texto de la opción 
    //alert(text);
    document.getElementById("abName_1").value = text;
  }

    function abilitieTwo() {
    var select = document.getElementById("abDescription_2"), //El <select>
    text = select.options[select.selectedIndex].innerText; //El texto de la opción 
    //alert(text);
    document.getElementById("abName_2").value = text;
  }

    function hidAbilitieOne() {
    var select = document.getElementById("hiAbDescription_1"), //El <select>
    text = select.options[select.selectedIndex].innerText; //El texto de la opción 
    //alert(text);
    document.getElementById("hiAbName_1").value = text;
  }

    function hidAbilitieTwo() {
    var select = document.getElementById("hiAbDescription_2"), //El <select>
    text = select.options[select.selectedIndex].innerText; //El texto de la opción 
    //alert(text);
    document.getElementById("hiAbName_2").value = text;
  }
    function megaAbilitie() {
    var select = document.getElementById("megaAbDescription"), //El <select>
    text = select.options[select.selectedIndex].innerText; //El texto de la opción 
    //alert(text);
    document.getElementById("megaAbName").value = text;
  }
</script>