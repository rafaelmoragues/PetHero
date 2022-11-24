<?php
require_once(VIEWS_PATH."validate-session.php");
    require_once('nav.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Seleccione filtros</h2>
               <form action="<?php echo FRONT_ROOT ?>Keeper/ShowFilteredList" method="post" class="bg-light-alpha p-5">
                    <div class="row">                         
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Tipo de mascota</label>
                                   <select name="type" id="type"  class="custom-select" required>
                                        <?php foreach($petTypeList as $type){
                                             echo '<option value="'.$type->GetId().'">'.$type->GetType()."</option>";
                                        } ?>
                                   </select>
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
                         <!-- hacer busqueda por Fecha -->
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Fecha desde</label>
                                   <input type="date" name="dateFrom" value="<?php echo date("Y m d") ?>">
                                   <span class="validity"></span>
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Fecha hasta</label>
                                   <input type="date" name="dateTo" >
                              </div>
                         </div>
                    </div>
                    <button type="submit" class="btn btn-dark ml-auto d-block">Buscar</button>
               </form>
          </div>
     </section>
</main>