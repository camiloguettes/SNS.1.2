<div id="main">
    <div class="container">
      
        <?php
            include RUTA_APP.'/view/paginas/cuerpo/nav3.php';	
		      ?>
        <div class="titulo">
         <div class="row">
            <div class="col-sm-6">
              Programa de formación
                <a data-toggle="modal" data-target="#registrar"><img src="<?php echo RUTA_URL; ?>/img/icon.png" alt="logo" style="width: 40px" ></a>
            </div>
            <div class="col-sm-6">
              <div class="form-group pull-right buscador">
              <input type="text" class="formu search " placeholder="Digite el programa de formación">
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
          if (isset($_POST["programa1"]) ) {
            $ficha= new Programa;
            $_SESSION["r"]=$ficha->act_Programa();
            $datos2=[];
            header("location:".RUTA_URL."/programa/ver/");
          }

            if (isset($_POST["programa_f"])) {
                $ficha= new Programa;
                $_SESSION["r"]=$ficha->reg_Programa();
                header("location:".RUTA_URL."/programa/ver/");
            }
          ?>
            <div class="table-responsive-md">
            <table class="table table-striped results">
                <thead class="">
                    <tr>
                    <th scope="col">Programa de formación</th>
                    <th scope="col">Tipo de formación</th>
                    <th scope="col">opciones</th>
                    </tr>
                    <tr class="warning no-result">
                  <td colspan="6"><i class="fa fa-warning"></i> No se encuentran registros</td>
                </tr>
                </thead>
                <tbody>
                <tr><?php 
                       foreach ($datos["programa"] as $dato) {
                            echo'
                            <tr>
                                <td>'.$dato->programa_formacion.'</td>
                                <td>'.$this->mostrar($dato->tipos_de_formacion).'</td>
                                <td> <a href="'.RUTA_URL.'/programa/ver/'.$dato->id_programa_formacion.'" >Modificar</a></td>
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
              <div class="tilogin">Datos programa de formación</div>
            </div>  
          </div> 
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        
        <div class="modal-body">
           <form method="post">
          <input  type="hidden" name="programa0" id="cod" value="<?php echo $datos2->id_programa_formacion?>">
         <div class="container">
          <div class="form-group">
          <label for="ficha" class="formu">Programa de formación:</label>
          <div class="ic">
          <input  type="text" class="formu" name="programa1" id="cod" value="<?php echo $datos2->programa_formacion?>">
          <i class="fa fa-users fa-lg fa-fw" aria-hidden="true"></i>
          </div>

            <label for="ficha" class="formu">Tipo de formación:</label>
            <div class="ic">
            <select name="tipo1" class="formu" id="">
                        <?php
                            foreach ($datos["tipo"] as $d) {
                                echo'
                                    <option value="'.$d->id_tipos_de_formacion.'">'.$d->tipos_de_formacion.'</option>
                                ';
                            }    
                        ?>
                    </select>
            </div>   
          
        </div> 
        </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        <button type="submit" class="btn btn-info cien" onclick="return validara();">Realizar Cambio</button>
    </form>      
          <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
        </div>
        
      </div>
  </div>
    
     
    
    
     </div>
     <br>
   </div>
  <script src="<?php echo RUTA_URL; ?>/js/modal.js"></script>
  <script src="<?php echo RUTA_URL; ?>/js/act_ficha.js"></script>
<?php endif;?>

<!--Modal para regitro-->
<!-- Modal -->
<div class="modal fade" id="registrar">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header justify-content-center">
         <div class="row">
            <div class="col-ml-2">
              <img src="<?php echo RUTA_URL; ?>/img/imagen1.png" alt="logo" style="width: 40px" >
            </div>  
            <div class="col-ml-8 ">
              <div class="tilogin">Registar programa de formación</div>
            </div>  
          </div> 
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        
        <div class="modal-body">
           <form method="post">
             <div class="container">
                <div class="form-group">
                    <label for="ficha" class="formu">Programa de formación:</label>
                    <div class="ic">
                    <input class="formu" name="programa_f">
                    </div>

                    <label for="ficha" class="formu">Tipo de formación</label>
                    <div class="ic">
                    <select name="tipo_f" class="formu" id="">
                        <?php
                            foreach ($datos["tipo"] as $d) {
                                echo'
                                    <option value="'.$d->id_tipos_de_formacion.'">'.$d->tipos_de_formacion.'</option>
                                ';
                            }    
                        ?>
                    </select>
                    <i class="fab fa-product-hunt fa-lg fa-fw" aria-hidden="true"></i>
                    </div>
          
        </div> 
        </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        <button type="submit" class="btn btn-info cien" onclick="return validara();">Registrar programa</button>
    </form>      
          <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
        </div>
        
      </div>
  </div>
    
     
    
    
     </div>
     <br>
   </div>