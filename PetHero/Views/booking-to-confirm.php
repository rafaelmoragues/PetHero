<?php
    require_once(VIEWS_PATH . "validate-session.php");
    require_once('nav.php');

?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Reservas a Confirmar</h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th>Nombre de cliente</th>
                         <th>Precio</th>
                         <th>Fecha Desde</th>
                         <th>Fecha Hasta</th>
                         <th>Foto Mascota</th>
                         <th>Seleccionar</th>
                    </thead>
                    <tbody>
                         <?php
                              foreach($bookingViewModelList as $booking)
                              {
                                   ?>
                                        <tr>
                                             <td><?php echo $booking->GetOwnerName() ?></td>
                                             <td><?php echo $booking->GetAmount() ?></td>
                                             <td><?php echo $booking->GetStartDate() ?></td>
                                             <td><?php echo $booking->GetEndDate() ?></td>
                                             <td><img src="../<?php echo $booking->GetPetImg() ?>"width="50" heigth="50"></td>
                                             <td><a class="btn btn-dark ml-auto" href="<?php echo FRONT_ROOT ?>Booking/ConfirmedKeeperBooking?id=<?php echo $booking->GetIdBooking() ?>">Confirmar</a>
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