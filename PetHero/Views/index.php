<?php
    require_once('nav.php');
    if(isset($_SESSION["message"])){
     echo '<script language="javascript">alert("'.$_SESSION["message"].'");</script>';
     unset($_SESSION["message"]);
    }
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h1>Bienvenido a PetHero. </h1><a href="<?php echo FRONT_ROOT. "Home/LoginView"?>">Inicia sesion</a> o <a href="<?php echo FRONT_ROOT. "Home/ShowAddView"?>">Registrate </a><h1>para acceder a nuestros servicios</h1>
          </div>
     </section>
</main>