<div id="main">
    <div class="container">
      
        <?php
            include RUTA_APP.'/view/paginas/cuerpo/nav3.php';	
		      ?>
        <div class="titulo">
         <div class="row">
            <div class="col-sm-6">
              Sedes
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
          if (isset($_POST["sede1"]) ) {
            $ficha= new Sede;
            $_SESSION["r"]=$ficha->act_Sede();
            $datos2=[];
            header("location:".RUTA_URL."/sede/ver/");
          }

            if (isset($_POST["sede_f"])) {
                $ficha= new Sede;
                $_SESSION["r"]=$ficha->reg_Sede();
                header("location:".RUTA_URL."/sede/ver/");
            }
          ?>
            <div class="table-responsive-md">
            <table class="table table-striped results">
                <thead class="">
                    <tr>
                    <th scope="col">Sede</th>
                    <th scope="col">Ciudad</th>
                    <th scope="col">opciones</th>
                    </tr>
                    <tr class="warning no-result">
                  <td colspan="6"><i class="fa fa-warning"></i> No se encuentran registros</td>
                </tr>
                </thead>
                <tbody>
                <tr><?php 
                       foreach ($datos["sede"] as $dato) {
                            echo'
                            <tr>
                                <td>'.$dato->sede.'</td>
                                <td>'.$this->mostrar($dato->ciudad).'</td>
                                <td> <a href="'.RUTA_URL.'/sede/ver/'.$dato->id_sede.'" >Modificar</a></td>
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
              <div class="tilogin">Datos sede</div>
            </div>  
          </div> 
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        
        <div class="modal-body">
           <form method="post">
          <input  type="hidden" name="sede0" id="cod" value="<?php echo $datos2->id_sede?>">
         <div class="container">
          <div class="form-group">
          <label for="ficha" class="formu">Sede:</label>
          <div class="ic">
          <input  type="text" class="formu" name="sede1" id="cod" value="<?php echo $datos2->sede?>">
          <i class="fa fa-users fa-lg fa-fw" aria-hidden="true"></i>
          </div>

            <label for="ficha" class="formu">Ciudad:</label>
            <div class="ic">
            <select name="ciudad1" class="formu" id="">
                        <?php
                            foreach ($datos["ciudad"] as $d) {
                                echo'
                                    <option value="'.$d->id_ciudad.'">'.$d->ciudad.'</option>
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
              <div class="tilogin">Registar sede</div>
            </div>  
          </div> 
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        
        <div class="modal-body">
           <form method="post">
             <div class="container">
                <div class="form-group">
                    <label for="ficha" class="formu">Sede:</label>
                    <div class="ic">
                    <input class="formu" name="sede_f">
                    </div>

                    <label for="ficha" class="formu">Ciudad</label>
                    <div class="ic">
                    <select name="ciudad_f" class="formu" id="">
                        <?php
                            foreach ($datos["ciudad"] as $d) {
                                echo'
                                    <option value="'.$d->id_ciudad.'">'.$d->ciudad.'</option>
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
        <button type="submit" class="btn btn-info cien" onclick="return validara();">Registrar sede</button>
    </form>      
          <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
        </div>
        
      </div>
  </div>
    
     
    
    
     </div>
     <br>
   </div>