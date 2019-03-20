<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="user-register-engine.php" method="POST">
          <div class="form-group">
            <label for="name">Nombre completo</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Antonio Sastre Vázquez">
          </div>
          <div class="form-group">
           <label for="username">Email</label>
           <input type="text" class="form-control" id="email" name="email" aria-describedby="emailhelp" placeholder="ejemplo@dominio.com">
           <small id="emailhelp" class="form-text text-muted">Se usará para iniciar sesión</small>
         </div>
         <div class="form-group">
           <label for="exampleInputPassword1">Contraseña</label>
           <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Contraseña">
         </div>
         <div class="form-group">
          <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Repetir contraseña">
        </div>
        <div class="form-group form-check">
         <input type="checkbox" class="form-check-input" id="exampleCheck1">
         <label class="form-check-label" for="exampleCheck1">Acepto los términos y condiciones del servicio.</label>
       </div>
     </div>
     <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      <button type="submit" class="btn btn-primary">Registrarse</button>
    </form>
  </div>
</div>
</div>
</div>