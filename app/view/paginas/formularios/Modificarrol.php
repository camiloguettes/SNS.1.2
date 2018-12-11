<div id="main">
    <div class="container">
      
      <?php
      include RUTA_APP.'/view/paginas/cuerpo/nav3.php';	
			if (isset($_POST["documento"])) {
				$registro = new Rol();
				$registro -> asignarrol();
			}
			?>
        <div class="titulo">
         <div class="row">
            <div class="col-sm-6">
              Modificar roles
            </div>
            <div class="col-sm-6">
              <div class="form-group pull-right buscador">
              <input type="text" class="formu search " placeholder="Digite el documento">
            </div>
            </div>    
          </div>
        </div>
        	<br>
        	<center>
        	<div class="contenedor">
        		
          </center>
          <?php
          if (isset($_SESSION["r"])&&$_SESSION["r"]!=null) {
            echo $_SESSION["r"];
            $_SESSION["r"]=null;
          }
          if (isset($_POST["documentoi"]) ) {
            $newrol= new Rol;
            $_SESSION["r"]=$newrol->actualizar();
            $datos2=[];
            header("location:".RUTA_URL."/rol/modificar");
          }
          ?>
            <div class="table-responsive-md">
            <table class="table table-striped results">
                <thead class="">
                    <tr>
                    <th scope="col">Documento</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Rol actual</th>
                    <th scope="col">Opciones</th>
                    </tr>
                    <tr class="warning no-result">
                  <td colspan="6"><i class="fa fa-warning"></i> No se encuentran registros</td>
                </tr>
                </thead>
                <tbody>
                <tr><?php 
                        foreach ($datos as $dato) {
                          if ($dato->documento!=$_SESSION["documento"]) {
                              echo'
                            <th scope="row">'.$dato->documento.'</th>
                            <td>'.$this->mostrar($dato->primer_nombre).' '.$this->mostrar($dato->primer_apellido).'</td>
                            <td>'.strtolower($dato->correo).'</td>
                            <td>'.$this->mostrar($dato->tipo_rol).'</td>
                            <td><a href="'.RUTA_URL.'/rol/modificar/'.$dato->documento.'" >Modificar</a>
                            </tr>
                            ';
                          } 
                        }
                    ?>
                    
                </tbody>
            </table>   
            </div>             
        <br><br>         
                          
    </div>  
</div>
<br><br>

  
  <!-- //////////////////////////////////////////////// -->
<?php  if($datos2): ?>
<?php  if($datos2->documento!=$_SESSION["documento"]): ?>
  <div class="modal fade" id="modificar">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header justify-content-center">
         <div class="row">
            <div class="col-ml-2">
              <img src="<?php echo RUTA_URL; ?>/img/imagen1.png" alt="logo" style="width: 40px" >
            </div>  
            <div class="col-ml-8 ">
              <div class="tilogin">Modificar rol</div>
            </div>  
          </div> 
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
           <form method="POST" name="ingresar">
         <div class="container">
          <div class="form-group">
          <input  type="hidden" name="documentoi"  value="<?php echo $datos2->documento?>">

          <label for="ficha" class="formu">Documento:</label>
          <div class="ic">
          <input title="Documento" class="formu" type="text" name="documentoi" autocomplete="off" value="<?php echo $datos2->documento?>" disabled>
          <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i>
          </div>
          <div class="ic">
            <!-- <input class="formu" type="password" placeholder="Contraseña" name="contrasenai"autocomplete="off" > -->
            <i class="fa fa-briefcase fa-lg fa-fw" aria-hidden="true"></i>
            <select name="rol" class='formu'>
                <?php

                  foreach ($datos3 as $t) {
                    if ($t->tipo_rol!='0') {
                        if($t->id_tipo_rol!=$datos2->fk_tipo_rol){
                          echo'
                          <option value='.$t->id_tipo_rol.'>'.$this->mostrar($t->tipo_rol).'</option>
                          ';
                        }else{
                          echo'
                          <option value='.$datos2->fk_tipo_rol.' selected disabled>'.$this->mostrar($datos2->tipo_rol).'</option>
                          ';
                        }    
                    }
                  }
                      
                ?>
            </select>
            </div>
        </div> 
        
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        <button type="submit" class="btn btn-info cien">Realizar Cambio</button>
    </form>      
          <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
        </div>
        
      </div>
  </div>
    
     
    
    
     </div>
     <br>
   </div>
  <?php endif;?>
  <script src="<?php echo RUTA_URL; ?>/js/modal.js"></script>
<?php endif;?>