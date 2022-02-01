<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="CSS/abilities.css">
  <link rel="stylesheet" type="text/css" href="abilities.js">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link rel="stylesheet" href="http://necolas.github.io/normalize.css/3.0.1/normalize.css">
  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <link rel="stylesheet" href="http://i.icomoon.io/public/temp/c15cb9d95d/UntitledProject6/style.css">
</head>
<title> Habilidades</title>
<body>

  <!--------------------------------- Headboard ------------------------------------------->
  
  <div class="title">
    <div class="spaner">
      <span onclick="openNav()">&#9776;</span>
    </div>
    <h1 >Habilidades</h1>
  </div>

  <!--------------------------------- Navigation bar -------------------------------------->

  <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href=" {{route('pokemonLibrary')}} ">Biblioteca</a>
    <a href=" {{route('abilities')}} ">Habilidades</a>
    <a href=" {{route('pokemonStats')}} ">Listado de estadísticas</a>
  </div>

  <!----------------------------------- NavBar -------------------------------------------->

  <section class="webdesigntuts-workshop">
    <form action="{{route('lookForSkill')}}" method="GET">        
      <input type="search" placeholder="Buscar habilidad..." id=" req_abilitie" name=" req_abilitie" required="">         
      <button>Buscar</button>
    </form>
       <button class="add" id="btnModal"> Añadir habilidad</button>
  </section>
   <div class="home">
          <a href="{{route('abilities')}}"><img src="img\wallpapers\goBackIcon.png" title="Regresar"></a>
       </div>
  <br>

  <!--------------------------- Show requested abilitie ----------------------------------->

    <div class="abilities">
      <div align="center">
        <table align="center" style="font-size:12px" style="table-layout: fixed">
          <thead class="table table-primary">
            <th scope="col" style="width:150px; height: 75px;">Nombre</th>
            <th scope="col" align="center">Descripción</th>

          </thead>
          <tbody>
            @foreach ($found_skill as $item)
            <tr>
              <td align="center">{{$item->name}}</td>
              <td align="center">{{$item->description}}</td>
            @endforeach
            </tr>
          </tbody>
        </table>
      </div>
    </div>

  <!--------------------------- Modal to add new skills ----------------------------------->
  
  <div id="tvesModal" class="modalContainer">
    <div class="modal-content">
      <div class="ModalTitle">
        <span title="Cerrar" id="cancel" class ="close" ><div class="btn btn-danger" onclick="cleanInputs();">X</div></span>
        <br> 
        <h2 align="center">Añadir nueva habilidad</h2>
      </div>
      <br>
      <br>
      <br>
      <br>
      <form class="newAbilitieForm" method="POST" action="{{route('storeAbilitie')}}">  
        @csrf
        <div class="abilitie_input">
           <p>
          <label> Nombre: </label>
          <input style="width : 300px; heigth : 1px" type="text" name="name" id="name" placeholder="Ingrese el nombre de la habilidad" onkeyup="textcountChars(this);" maxlength="50" required align="center" autocomplete="off">
             <p class="p_name" id="charNumName">(50 carácteres restantes)</p>
        </p>
        </div>
        <br>
        <div class="abilitie_textarea">
          <label>Descripción: </label>
        <br>
        <textarea id="description" name="description" placeholder="Ingrese la descripción de la habilidad" onkeyup="textAreaCountChars(this);" maxlength="500" required autocomplete="off"></textarea>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <p id="charNum" class="p_description">     (500 carácteres restantes)</p>
        </div>
        <br>
        <div align="center">
          <button type="submit" id="btnNewTask" class="button" onclick="messaggeNewTask()">Aceptar</button>
        </div>
      </form> 
    </div>
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
    
      function messaggeNewTask(){
        swal("Se ha guardado éxitosamente", "Habilidad añadida a la base de datos", "success", {
    button: "ACEPTAR!",
  });
    }
   

    //Clean inputs on cancel
    function cleanInputs(){
      document.getElementById("name").value = "";
      document.getElementById("description").value = "";
      
    }

    
  </script>