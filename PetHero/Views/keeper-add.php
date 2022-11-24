<?php
     require_once(VIEWS_PATH."validate-session.php");
    require_once('nav.php');
    
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Info de cuidador</h2>
               <form action="<?php echo FRONT_ROOT ?>Keeper/Add" method="post" enctype="multipart/form-data" class="bg-light-alpha p-5">
                    <div class="row">                         
                         <div class="col-lg-4">
                              <div class="form-group">
                              <label for="">Tipo de mascota</label>
                                   <select name="petType" id="petType"  class="custom-select" required>
                                        <?php foreach($petTypeList as $type){
                                             echo '<option value="'.$type->GetId().'">'.$type->GetType()."</option>";
                                        } ?>
                                   </select>
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Tamaño</label>
                                   <select name="petSize" id="petSize"  class="custom-select" required>
                                        <option value="Chico">Chico</option>
                                        <option value="Mediano">Mediano</option>
                                        <option value="Grande">Grande</option>
                                   </select>
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Precio por dia de la estadia</label>
                                   <input type="text" name="price" value="" class="form-control" placeholder="$">
                              </div>
                         </div>
                         <div class="col-lg-4 nativeDatePicker">
                              <div class="form-group">
                                   <label for="">Fecha desde</label>
                                   <input type="date" name="dateFrom" min="<?php echo date("Y m d") ?>">
                                   <span class="validity"></span>
                              </div>
                         </div>
                         <div class="col-lg-4 nativeDatePicker">
                              <div class="form-group">
                                   <label for="">Fecha hasta</label>
                                   <input type="date" name="dateTo" >
                              </div>
                         </div>
                    </div>
                    <button type="submit" class="btn btn-dark ml-auto d-block">Guardar</button>
               </form>
          </div>
     </section>
</main>