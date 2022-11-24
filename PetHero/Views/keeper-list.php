<?php
require_once(VIEWS_PATH . "validate-session.php");
    require_once('nav.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Listado de cuidadores</h2>
               <form action="<?php echo FRONT_ROOT ?>Booking/NewBooking" method="post" enctype="multipart/form-data" class="bg-light-alpha p-5">
               <table class="table bg-light-alpha">
                    <thead>
                         <th>Price</th>
                         <th>Apellido</th>
                         <th>Nombre</th>
                    </thead>
                    <tbody>
                         <?php
                              foreach($keeperVMList as $keeperVM)
                              {
                                   ?>
                                        <tr>
                                             
                                             <td><?php echo $keeperVM->GetPrice() ?></td>
                                             <td><?php echo $keeperVM->GetLastName() ?></td>
                                             <td><?php echo $keeperVM->GetName() ?></td>
                                             <td><input type="hidden" name="idKeeper" value="<?php echo $keeperVM->GetIdKeeper() ?>">
                                             <td><input type="hidden" name="dateFrom" value="<?php echo $dateFrom ?>">
                                             <td><input type="hidden" name="dateTo" value="<?php echo $dateTo ?>">
                                             <td><button type="submit" class="btn btn-dark ml-auto d-block">Reservar</button></td>
                                        </tr>
                                   <?php
                              }
                         ?>
                         </tr>
                    </tbody>
               </table>
               </form>
          </div>
     </section>
</main>