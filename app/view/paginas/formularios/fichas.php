<div id="main">
    <div class="container">
      
        <?php
            include RUTA_APP.'/view/paginas/cuerpo/nav3.php';	
		      ?>
        <div class="titulo">
         <div class="row">
            <div class="col-sm-6">
              Fichas
            </div>
            <div class="col-sm-6">
              <div class="form-group pull-right buscador">
              <input type="text" class="formu search " placeholder="Digite el codigo de ficha">
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
          if (isset($_POST["codigoi"]) ) {
            $ficha= new Ficha;
            $_SESSION["r"]=$ficha->act_ficha();
            $datos2=[];
            header("location:".RUTA_URL."/ficha/ver/");
          }
          ?>
            <div class="table-responsive-md">
            <table class="table table-striped results">
                <thead class="">
                    <tr>
                    <th scope="col">Código ficha</th>
                    <th scope="col">Sede</th>
                    <th scope="col">Jornada</th>
                    <th scope="col">Modalidad</th>
                    <th scope="col">Programa de formación</th>
                    <th scope="col">Trimestre de formación</th>
                    <th scope="col">Tipo de formación</th>
                    <th scope="col">competencias</th>
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
                                <td>'.$dato->codigo_ficha.'</td>
                                <td>'.$this->mostrar($dato->sede).'</td>
                                <td>'.$this->mostrar($dato->jornada).'</td>
                                <td>'.$this->mostrar($dato->tipo_modalidad).'</td>
                                <td>'.$this->mostrar($dato->programa_formacion).'</td>
                                <td>'.$dato->trimestre_formacion.'</td>
                                <td>'.$this->mostrar($dato->tipos_de_formacion).'</td>
                                <td> <a href="'.RUTA_URL.'/ficha/competencias/'.$dato->codigo_ficha.'" >Ver Competencias</a></td>
                                <td> <a href="'.RUTA_URL.'/ficha/ver/'.$dato->codigo_ficha.'" >Modificar</a></td>
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
              <div class="tilogin">Datos Ficha</div>
            </div>  
          </div> 
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        
        <div class="modal-body">
           <form method="post">
          <input  type="hidden" name="codigoi" id="cod" value="<?php echo $datos2->codigo_ficha?>">
         <div class="container">
          <div class="form-group">
          <label for="ficha" class="formu">Ficha:</label>
          <div class="ic">
          <input title="Documento" class="formu" type="text" name="codigoi" autocomplete="off" value="<?php echo $datos2->codigo_ficha?>" disabled>
          <i class="fa fa-users fa-lg fa-fw" aria-hidden="true"></i>
          </div>
 
          <label for="ficha" class="formu">Sede:</label>
          <div class="ic">
            <i class="fa fa-university fa-lg fa-fw" aria-hidden="true"></i>
            <select name="sede" id="sede" class='formu' title="Ficha">
                <?php
                  foreach ($datos3["sede"] as $t) {
                    if ($t->id_sede==$datos2->fk_sede) {
                      echo'<option value='.$t->id_sede.' selected>'.$t->sede.'</option>
                      ';  
                    }else{
                      echo'<option value='.$t->id_sede.' >'.$t->sede.'</option>
                      ';                                    
                    }
                  }    
                ?>
            </select>
            <label for="ficha" class="formu">Jornada:</label>
          <div class="ic">
            <i class="fa fa-clock fa-lg fa-fw" aria-hidden="true"></i>
            <select name="jornada" id="jornada" class='formu' title="Ficha">
            <?php
                  foreach ($datos3["jornada"] as $t) {
                    if ($t->id_jornadas==$datos2->fk_jornada) {
                      echo'<option value='.$t->id_jornadas.' selected>'.$t->jornada.'</option>
                      ';  
                    }else{
                      echo'<option value='.$t->id_jornadas.' >'.$t->jornada.'</option>
                      ';                                    
                    }
                  }    
                ?>
            </select>
            <label for="ficha" class="formu">Trimestre:</label>
          <div class="ic">
            <i class="fa fa-calendar fa-lg fa-fw" aria-hidden="true"></i>
            <select name="trimestre" id="trimestre" class='formu' title="Ficha">
            <?php
                  switch ($datos2->fk_id_tipos_de_formacion) {
                    case 1:
                      for ($i=1; $i <=4 ; $i++) { 
                        if ($i==$datos2->trimestre_formacion) {
                          echo'<option value='.$i.' selected>'.$i.'</option>
                          '; 
                        }else{
                          echo'<option value='.$i.'>'.$i.'</option>
                          '; 
                        }
                      }
                    break;
                    case 2:
                      for ($i=1; $i <=8 ; $i++) { 
                        echo'<option value='.$i.' >'.$i.'</option>
                      '; 
                      }
                    break;
                    case 3:
                      for ($i=1; $i <=4 ; $i++) { 
                        echo'<option value='.$i.' >'.$i.'</option>
                      '; 
                      }
                    break;
                    case 4:
                      for ($i=1; $i <=4 ; $i++) { 
                        echo'<option value='.$i.' >'.$i.'</option>
                      '; 
                      }
                    break;
                    case 5:
                      for ($i=1; $i <=4 ; $i++) { 
                        echo'<option value='.$i.' >'.$i.'</option>
                      '; 
                      }
                    break;
                    default:
                      
                      break;
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