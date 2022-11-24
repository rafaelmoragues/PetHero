<?php
     require_once(VIEWS_PATH."validate-session.php");
    require_once('nav.php');
    
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Agregar Mascota</h2>
               <form action="<?php echo FRONT_ROOT ?>Pet/Add" method="post" enctype="multipart/form-data" class="bg-light-alpha p-5">
                    <div class="row">                         
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Raza</label>
                                   <input type="text" name="race" value="" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Tamaño</label>
                                   <select name="size" id="size"  class="custom-select" required>
                                        <option value="Chico">Chico</option>
                                        <option value="Mediano">Mediano</option>
                                        <option value="Grande">Grande</option>
                                   </select>
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Fecha de nacimiento (aprox.)</label>
                                   <input type="date" name="birth" value="" class="form-control">
                              </div>
                         </div>
                         <!-- hacer un select -->
                         <div class="form-group">
                              <label for="">Tipo de mascota</label>
                                   <select name="type" id="type"  class="custom-select" required>
                                        <?php foreach($petTypeList as $type){
                                             echo '<option value="'.$type->GetId().'">'.$type->GetType()."</option>";
                                        } ?>
                                   </select>
                              </div> 
                         <!-- hacer un textarea -->
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Observaciones</label>
                                   <textarea name="obs" rows="5" ></textarea>
                              </div>
                         </div>
                         <!-- hacer subida de imagen, tipo file -->
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Imagen</label>
                                   <input type="file" name="img" value="" class="form-control">
                              </div>
                         </div>
                         <!-- hacer subida de imagen, tipo file -->
                         <!-- <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Plan de vacunacion</label>
                                   <input type="file" name="imgPlan" value="" class="form-control">
                              </div>
                         </div> -->
                    </div>
                    <button type="submit" class="btn btn-dark ml-auto d-block">Agregar</button>
               </form>
          </div>
     </section>
</main>