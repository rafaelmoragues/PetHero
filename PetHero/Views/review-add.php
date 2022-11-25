<?php
     require_once(VIEWS_PATH."validate-session.php");
    require_once('nav.php');
    
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Calificar cuidador</h2>
               <form action="<?php echo FRONT_ROOT ?>Review/Add" method="post" class="bg-light-alpha p-5">
                    <div class="row">
                              <div class="form-group">
                                   <input type="hidden" name="idBooking" value="<?php echo $idBooking ?>" class="form-control" >
                                   <input type="hidden" name="idKeeper" value="<?php echo $idKeeper ?>" class="form-control" >
                              </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Comentario</label>
                                   <input type="text" name="description" value="" class="form-control" placeholder="Ingrese comentario">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Calificación</label>
                                   <input type="text" name="reputation" value="" class="form-control" placeholder="1-5">
                              </div>
                         </div>
                    </div>
                    <button type="submit" class="btn btn-dark ml-auto d-block">Guardar</button>
               </form>
          </div>
     </section>
</main>