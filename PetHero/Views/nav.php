<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
     <span class="navbar-text">
          <strong>Framework</strong>
     </span>
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
     <ul class="navbar-nav ml-auto">
          <?php if(isset($_SESSION["loggedUser"]) & !isset($_SESSION["idOwner"])){ echo '
          <li class="nav-item">
               <a class="nav-link" href="'. FRONT_ROOT .'Owner/AddEmpty">Ser Cliente</a>
          </li>';}?>
          <?php if(isset($_SESSION["loggedUser"]) & isset($_SESSION["idKeeper"])){ echo '
          <li class="nav-item">
               <a class="nav-link" href="'. FRONT_ROOT .'Booking/HistoryKeeper">Reservas</a>
          </li>';}?>
          <?php if(isset($_SESSION["loggedUser"]) & !isset($_SESSION["idKeeper"])){ echo '
          <li class="nav-item">
               <a class="nav-link" href="'. FRONT_ROOT .'Keeper/ShowAddView">Ser cuidador</a>
          </li> ';}?>
          <?php if(!isset($_SESSION["loggedUser"])){ echo '
          <li class="nav-item">
               <a class="nav-link" href="'.FRONT_ROOT .'Home/LoginView">Ingresar</a>
          </li>
          <li class="nav-item">
               <a class="nav-link" href="'.FRONT_ROOT .'User/ShowAddView">Registrarse</a>
          </li>';}?>    
          <li class="nav-item">
               <label class="nav-link"><?php if(isset($_SESSION["loggedUser"])){ echo $_SESSION["loggedUser"]; }?></label>
          </li> 
          <li class="nav-item">
          <?php if(isset($_SESSION["loggedUser"])){echo '<a class="nav-link" href="'.FRONT_ROOT .'Home/Logout">Cerrar Sesion</a>';}?>
          </li>
     </ul>
     </div>
</nav>

<?php if(isset($_SESSION["idOwner"])){ echo '
<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
     <ul class="navbar-nav ml-auto">
          <li class="nav-item">
               <a class="nav-link" href="'. FRONT_ROOT .'Pet/ShowAddView" >Agregar Mascota</a>
          </li>
          <li class="nav-item">
               <a class="nav-link" href="'.FRONT_ROOT . 'Pet/ShowListView">Listar Mascotas</a>
          </li>
          <li class="nav-item">
               <a class="nav-link" href="' .FRONT_ROOT .'Booking/GetNotReviewed">Calificar cuidador</a>
          </li>
          <li class="nav-item">
               <a class="nav-link" href="' .FRONT_ROOT .'Keeper/ShowFilterList">Buscar cuidadores</a>
          </li>
     </ul>
</nav>';
}
?>