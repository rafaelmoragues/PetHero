<?php
require_once(VIEWS_PATH . "validate-session.php");
    require_once('nav.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Ingrese la mascota a cuidar</h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th>Raza</th>
                         <th>Imagen</th>
                         <th>Tamaño</th>
                    </thead>
                    <tbody>
                         <?php
                              foreach($petList as $pet)
                              {
                                   ?>
                                        <tr>
                                             <td><?php echo $pet->GetRace() ?></td>
                                             <td><img src="../<?php echo $pet->GetImg() ?>"width="50" heigth="50"></td>
                                             <td><?php echo $pet->Getsize() ?></td>
                                             <td><input type="hidden" name="idPet" value="<?php echo $pet->GetId() ?>">
                                             <td><a href="<?php echo FRONT_ROOT ?>Booking/BookingPreliminar?idpet=<?php echo $pet->GetId() ?>">Seleccionar</a>
                                        </tr>
                                   <?php
                              }
                         ?>
                         </tr>
                    </tbody>
               </table>
          </div>
     </section>
</main>