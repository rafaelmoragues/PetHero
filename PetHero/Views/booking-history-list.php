<?php
    require_once(VIEWS_PATH . "validate-session.php");
    require_once('nav.php');

?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Historial de reservas</h2>
               <a href="<?php echo FRONT_ROOT ?>Booking/BookingToConfirm" class="btn btn-dark ml-auto">Reservas sin confirmar</a>

               <table class="table bg-light-alpha">
                    <thead>
                         <th>Nombre de cliente</th>
                         <th>Precio</th>
                         <th>Fecha Desde</th>
                         <th>Fecha Hasta</th>
                         <th>Foto Mascota</th>
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