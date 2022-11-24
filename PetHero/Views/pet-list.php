<?php
require_once(VIEWS_PATH . "validate-session.php");
    require_once('nav.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Listado de mascotas</h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th>Raza</th>
                         <th>Tamaño</th>
                         <th>Tipo</th>
                         <th>Edad</th>
                         <th>Observaciones</th>
                         <th>Foto</th>
                    </thead>
                    <tbody>
                         <?php
                              foreach($petList as $pet)
                              {
                                   ?>
                                        <tr>
                                             <td><?php echo $pet->GetRace() ?></td>
                                             <td><?php echo $pet->GetSize() ?></td>
                                             <td><?php echo $pet->GetType()->GetType() ?></td>
                                             <td><?php echo $pet->GetSize() ?></td>
                                             <td><?php echo $pet->GetObservation() ?></td>
                                             <td><img src="../<?php echo $pet->GetImg() ?>"width="50" heigth="50"></td>
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