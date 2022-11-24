<?php
require_once(VIEWS_PATH . "validate-session.php");
    require_once('nav.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Confirme su reserva</h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th>Cuidador</th>
                         <th>Fecha desde</th>
                         <th>Fecha Hasta</th>
                         <th>Imagen</th>
                         <th>Precio</th>
                         <th>Confirmar</th>
                    </thead>
                    <tbody>
                                        <tr>
                                             <td><?php echo $user->GetName() ?></td>
                                             <td><?php echo $booking->GetStartDate() ?></td>
                                             <td><?php echo $booking->GetEndDate() ?></td>
                                             <td><img src="../<?php echo $pet->GetImg() ?>"width="50" heigth="50"></td>
                                             <td><?php echo $booking->GetAmount() ?></td>
                                             <td><a href="<?php echo FRONT_ROOT ?>Booking/ConfirmedBooking" class="btn btn-dark ml-auto d-block">Confirmar</a>
                                        </tr>
                         </tr>
                    </tbody>
               </table>
               <div>
                    <a href="<?php echo FRONT_ROOT ?>Booking/CancelBooking" class="btn btn-dark ml-auto">Cancelar</a>
               </div>
          </div>
     </section>
</main>