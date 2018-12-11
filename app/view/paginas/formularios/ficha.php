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
         Ficha
        </div>
        	<br>
        	<center>
        	<div class="contenedor">
        		
        	</div>  
          </center>
          <?php
          if (isset($_POST["primer_nombre"])) {
            $aprendiz= new Persona;
            $aprendiz->actualizaraprendiz();
            $datos2=[];
          }
          ?>
            <div class="table-responsive-md">
            <table class="table table-striped ">
                <thead class="">
                    <tr>
                    <th scope="col">Código ficha</th>
                    <th scope="col">Sede</th>
                    <th scope="col">Jornada</th>
                    <th scope="col">Modalidad</th>
                    <th scope="col">Programa de formación</th>
                    <th scope="col">Trimestre de formación</th>
                    <th scope="col">competencias</th>
                    </tr>
                </thead>
                <tbody>
                <tr><?php 
                       
                            echo'
                                <td>'.$datos->codigo_ficha.'</td>
                                <td>'.$this->mostrar($datos->sede).'</td>
                                <td>'.$this->mostrar($datos->jornada).'</td>
                                <td>'.$this->mostrar($datos->tipo_modalidad).'</td>
                                <td>'.$this->mostrar($datos->programa_formacion).'</td>
                                <td>'.$datos->trimestre_formacion.'</td>
                                <td> <a href="'.RUTA_URL.'/ficha/competencias/'.$datos->codigo_ficha.'" >Ver Competencias</a></td>
                            ';
                      
                        
                       
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
              <div class="tilogin">Competencias ficha</div>
            </div>  
          </div> 
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
           <?php
            foreach ($datos2['competencias'] as $c) {
                if ($datos2['ficha']->fk_jornada==1) {
                    if ($datos2['ficha']->trimestre_formacion!=$c->trimestre_diurno) {
                        echo 'la competencia '.$c->competencia.' es de jornada diurna <br>';
                    }
                }else {
                    if ($datos2['ficha']->trimestre_formacion==$c->trimestre_especial) {
                        
                        echo 'la competencia '.$c->competencia.' es de jornada especial <br>';
                    }
                }
            }
           ?>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        
        </div>
        
      </div>
  </div>
    
     
    
    
     </div>
     <br>
   </div>
  <script src="<?php echo RUTA_URL; ?>/js/modal.js"></script>
<?php endif;?>