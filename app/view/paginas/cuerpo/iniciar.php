<div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header justify-content-center">
         <div class="row">
            <div class="col-md-6">
              <img src="<?php echo RUTA_URL; ?>/img/imagen1.png" alt="logo" style="width: 40px" >
            </div>  
            <div class="col-md-6">
              <div class="tilogin"> SNS</div>
            </div>  
          </div> 
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
           <form method="POST" name="ingresar">
         <div class="container">
          <div class="form-group">
                  <select name="fk_tipo_documentoi" class="formu"><?php
                    foreach ($datos as $t) {
                      echo'
                        <option value='.$t->id_tipo_documento.'>'.$t->tipo_documento.'</option>
                      ';
                    }
                    ?></select>
          <div class="ic">
            <input class="formu" type="text" name="documentoi" autocomplete="off" required placeholder="Número de Documento">
          <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i>
          </div>
          <div class="ic">
            <input class="formu" type="password" placeholder="Contraseña" name="contrasenai"autocomplete="off" >
            <i class="fa fa-key fa-lg fa-fw" aria-hidden="true"></i>
          </div>
        </div> 
        
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        <button type="submit" class="btn btn-info cien">Iniciar Sesión</button>
    </form>      
          <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
        </div>
        
      </div>
  </div>
    
     
    
    
     </div>
     <br>
   </div>