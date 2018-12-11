<div id="main">
    <div class="container">
      
        <?php
         include RUTA_APP.'/view/paginas/cuerpo/nav3.php';	
			if (isset($_POST["documento"])) {
				$registro = new Rol();
				$registro -> asignarrol();
            }
           //var_dump($datos);
		?>
        <div class="titulo">
          <div class="row">
            <div class="col-sm-6">
              Aprendiz
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
          if (isset($_POST["primer_nombre"]) ) {
            $aprendiz= new Persona;
            $_SESSION["r"]=$aprendiz->actualizaraprendiz();
            $datos2=[];
            header("location:".RUTA_URL."/persona/consultaraprendiz");
          }
          ?>
            <div class="table-responsive-md">
            <table class="table table-striped results ">
                <thead class="">
                    <tr>
                    <th scope="col">Documento</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                    <th scope="col">ficha</th>
                    <th scope="col">tipo de documento</th>
                    <th scope="col">opciones</th>
                    </tr>
                    <tr class="warning no-result">
                  <td colspan="6"><i class="fa fa-warning"></i> No se encuentran registros</td>
                </tr> 
                </thead>
                <tbody>
                <tr><?php 
                       foreach ($datos as $dato) {
                            echo'
                                <tr>
                                <td>'.$dato->documento.'</td>
                                <td>'.$this->mostrar($dato->primer_nombre).' '.$this->mostrar($dato->primer_apellido).'</td>
                                <td>'.strtolower($dato->correo).'</td>
                                <td><a href="'.RUTA_URL.'/ficha/consultarficha/'.$dato->fk_ficha.'">'.$dato->fk_ficha.'</td>
                                <td>'.$this->mostrar($dato->tipo_documento).'</td>
                                <td><a href="'.RUTA_URL.'/persona/consultaraprendiz/'.$dato->documento.'" >Modificar</a></td>
                                </tr>                            
                                ';
                       } 
                        
                       
                      ?>
                    
                </tbody>
            </table>   
            </div>             
        <br><br>         
                          
    </div>  
</div>
<br><br>



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
              <div class="tilogin">Datos Aprendiz</div>
            </div>  
          </div> 
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
           <form method="post"  >
          <input  type="hidden" name="documentoi"  value="<?php echo $datos2->documento?>">
         <div class="container">
          <div class="form-group">
          <label for="ficha" class="formu">Documento:</label>
          <div class="ic">
          <input title="Documento" class="formu" type="text" name="documentoi" autocomplete="off" value="<?php echo $datos2->documento?>" disabled>
          <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i>
          </div>

          <label for="ficha" class="formu">Primer nombre:</label>
          <div class="ic">
          <input title="primer nombre" id="name" class="formu" type="text" name="primer_nombre" required autocomplete="off" value="<?php echo $datos2->primer_nombre?>">
          <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i>
          </div>

          <label for="ficha" class="formu">Segundo nombre:</label>
          <div class="ic">
          <input title="segundo nombre" id="2name" class="formu" type="text" name="segundo_nombre" autocomplete="off" value="<?php if (is_null($datos2->segundo_nombre)) {echo'"placeholder="Segundo Nombre"';}else{echo $datos2->segundo_nombre;} ?>">
          <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i>
          </div>
                       
          <label for="ficha" class="formu">Primer apellido:</label>
          <div class="ic">
          <input title="Primer Apellido" id="last" class="formu" type="text" name="primer_apellido" required autocomplete="off" value="<?php echo $datos2->primer_apellido?>">
          <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i>
          </div>

          <label for="ficha" class="formu">segundo apellido:</label>
          <div class="ic">
          <input title="segundo Apellido" id="2last" class="formu" type="text" name="segundo_apellido" autocomplete="off" value="<?php  if (is_null($datos2->segundo_apellido)) {echo'"placeholder="Segundo Nombre"';}else{echo $datos2->segundo_apellido;} ?>">
          <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i>
          </div>

          <label for="Email" class="formu">Email:</label>
          <div class="ic">
          <input title="Email" id="mail" class="formu" type="text" name="email" autocomplete="off" required value="<?php  echo $datos2->correo ?>">
          <i class="fa fa-envelope fa-lg fa-fw" aria-hidden="true"></i>
          </div>
 
          <label for="ficha" class="formu">Ficha:</label>
          <div class="ic">
            <i class="fa fa-users fa-lg fa-fw" aria-hidden="true"></i>
            <select name="ficha" class='formu' title="Ficha">
                <?php
                  foreach ($datos3 as $t) {
                    echo'<option value='.$t->codigo_ficha.' selected>'.$t->codigo_ficha.'</option>
                        ';
                  }
                      
                ?>
            </select>
            </div>
        </div> 
        
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        <button type="submit" onclick="return validara();" class="btn btn-info cien">Realizar Cambio</button>
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
  <script src="<?php echo RUTA_URL; ?>/js/aprendiz.js"></script>
<?php endif;?>