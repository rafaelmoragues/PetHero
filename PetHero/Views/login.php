<main class="d-flex align-items-center justify-content-center height-100" >
     <div class="content">
          <header class="text-center">
               <h2>Pet Hero</h2>
          </header>

          <form action="<?php echo FRONT_ROOT."Home/Login" ?>" method="post" class="login-form bg-dark-alpha p-5 bg-light">
               <div class="form-group">
                    <label for="user_email">Nombre de usuario</label>
                    <input type="text" id="userName" name="userName" class="form-control form-control-lg" placeholder="Ingresar usuario" required>
               </div>
               <div class="form-group">
                    <label for="user_password">Contraseña</label>
                    <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Ingresar constraseña" required>
               </div>
               <button class="btn btn-primary btn-block btn-lg" type="submit">Iniciar Sesión</button>
          </form>
     </div>
</main>