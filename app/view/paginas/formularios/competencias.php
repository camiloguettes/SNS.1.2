<div id="main">
    <div class="container">
      
        <?php
            include RUTA_APP.'/view/paginas/cuerpo/nav3.php';	
		      ?>
        <div class="titulo">
         <div class="row">
            <div class="col-sm-6">
              Competencias
                <a data-toggle="modal" data-target="#registrar"><img src="<?php echo RUTA_URL; ?>/img/icon.png" alt="logo" style="width: 40px" ></a>
            </div>
            <div class="col-sm-6">
              <div class="form-group pull-right buscador">
              <input type="text" class="formu search " placeholder="Digite el codigo de competencia">
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
          if (isset($_POST["codigo"]) ) {
            $ficha= new Competencia;
            $_SESSION["r"]=$ficha->act_Competencia();
            $datos2=[];
            header("location:".RUTA_URL."/competencia/ver/");
          }

            if (isset($_POST["trimestred"])) {
                $ficha= new Competencia;
                $_SESSION["r"]=$ficha->reg_Competencia();
                header("location:".RUTA_URL."/competencia/ver/");
            }
          ?>
            <div class="table-responsive-md">
            <table class="table table-striped results">
                <thead class="">
                    <tr>
                    <th scope="col">Código </th>
                    <th scope="col">Competencia</th>
                    <th scope="col">Trimestre jornada diurna</th>
                    <th scope="col">Trimestre jornada especial</th>
                    <th scope="col">Programa de formación</th>
                    <th scope="col">opciones</th>
                    </tr>
                    <tr class="warning no-result">
                  <td colspan="6"><i class="fa fa-warning"></i> No se encuentran registros</td>
                </tr>
                </thead>
                <tbody>
                <tr><?php 

                
                       foreach ($datos["competencias"] as $dato) {
                            echo'
                            <tr>
                                <td>'.$dato->id_competencia.'</td>
                                <td>'.$this->mostrar($dato->competencia).'</td>
                                <td>'.$this->mostrar($dato->trimestre_diurno).'</td>
                                <td>'.$this->mostrar($dato->trimestre_especial).'</td>
                                <td>'.$this->mostrar($dato->programa_formacion).'</td>
                                <td> <a href="'.RUTA_URL.'/competencia/ver/'.$dato->id_competencia.'" >Modificar</a></td>
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
          <input  type="hidden" name="codigo" id="cod" value="<?php echo $datos2->id_competencia?>">
         <div class="container">
          <div class="form-group">
          <label for="ficha" class="formu">Ficha:</label>
          <div class="ic">
          <input title="Documento" class="formu" type="text" name="codigo" autocomplete="off" value="<?php echo $datos2->id_competencia?>" disabled>
          <i class="fa fa-users fa-lg fa-fw" aria-hidden="true"></i>
          </div>

            <label for="ficha" class="formu">Competencia:</label>
            <div class="ic">
            <textarea class="formu" name="competencia"><?php echo $datos2->competencia?></textarea>
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
              <div class="tilogin">Registar competencia</div>
            </div>  
          </div> 
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        
        <div class="modal-body">
           <form method="post">
             <div class="container">
                <div class="form-group">
                    <label for="ficha" class="formu">Competencia:</label>
                    <div class="ic">
                    <textarea class="formu" name="competencia"></textarea>
                    </div>
                    
                    <label for="ficha" class="formu">trimestre diurno:</label>
                    <div class="ic">
                    <input title="Documento" class="formu" type="text" name="trimestred" autocomplete="off"  >
                    <i class="fa fa-clock fa-lg fa-fw" aria-hidden="true"></i>
                    </div>

                    <label for="ficha" class="formu">trimestre jornada especial:</label>
                    <div class="ic">
                    <input title="Documento" class="formu" type="text" name="trimestree" autocomplete="off"  >
                    <i class="fa fa-clock fa-lg fa-fw" aria-hidden="true"></i>
                    </div>

                    <label for="ficha" class="formu">Programa de formación</label>
                    <div class="ic">
                    <select name="programa" class="formu" id="">
                        <?php
                            foreach ($datos["programa_formacion"] as $d) {
                                echo'
                                    <option value="'.$d->id_programa_formacion.'">'.$d->programa_formacion.'</option>
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
        <button type="submit" class="btn btn-info cien" onclick="return validara();">Realizar Cambio</button>
    </form>      
          <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
        </div>
        
      </div>
  </div>
    
     
    
    
     </div>
     <br>
   </div>
