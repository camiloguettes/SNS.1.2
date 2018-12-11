<?php
include RUTA_APP.'/view/paginas/cuerpo/nav3.php';
?>
<?php  if(isset($_POST["documentoi"])): ?>
<?php
    if(isset($_POST["documentoi"])){
        $desercion = new Novedad();
        $r=$desercion -> form_desercion();
        
    }
?>

<div id="main">
    <div class="container">
      <div class="titulo">Registrar desercion</div>
      <?php
			if (isset($_POST["telefono"])) {
                $registro = new Novedad();
                echo $rd=$registro -> regDesercion();
			}
			?>
        	<div class="formulario">
        		<form  method="post" onsubmit="return validara();">
				<div class="row">
                    <div class="col-md-6">
                    <label for="ficha" class="formu">Documento:</label>
                    <input class="formu" id="documento" type="hidden"  name="documentoi" value="<?php echo $r["aprendiz"]->documento?>" autocomplete="off" required placeholder="Digite su documento" >
                    <input class="formu" id="documento" type="text"  name="documento" value="<?php echo $r["aprendiz"]->documento?>" autocomplete="off" disabled>
                    </div>

					<div class="col-md-6">
                    <label for="ficha" class="formu">Competencia:</label>
	      			<select  name="competencia" class="formu">
						<?php
                            foreach ($r['competencias'] as $c) {
                                if ($r['ficha']->fk_jornada==1) {
                                    if ($r['ficha']->trimestre_formacion==$c->trimestre_diurno) {
                                        echo '<option value="'.$c->id_competencia.'">'.$c->competencia.'</option>';
                                    }
                                }else {
                                    if ($r['ficha']->trimestre_formacion==$c->trimestre_especial) {
                                        
                                        echo '<option value="'.$c->id_competencia.'">'.$c->competencia.'</option>';
                                    }
                                }
                            }
                        ?>
              		</select>
				</div>

				</div>

				<div class="row">
					<div class="col-md-6 ">
                    <label for="ficha" class="formu">Causa:</label>
                        <select class="formu" name="causa" id="">
                            <option value="1">1.Falta de interés en el curso</option>
                            <option value="2">2.Dedicación a otros estudios</option>
                            <option value="3">3.Problemas de salud.</option>
                            <option value="4">4.Maternidad.</option>
                            <option value="5">5.Problemas familiares o personales.</option>
                            <option value="6">6.Problemas laborales</option>
                            <option value="7">7.Problemas económicos.</option>
                            <option value="8">8.Problema de servicio militar</option>
                            <option value="9">9.Problemas relacionados con el desarrollo del curso.</option>
                            <option value="10">10.Bajo rendimiento académico y/o práctico.</option>
                            <option value="11">11.Indisciplina y mala conducta.</option>
                            <option value="12">12.Falta de puntualidad y mala conducta.</option>
                            <option value="13">13.Otras causas.</option>
                        </select>
					</div>
					<div class="col-md-6">
                    <label for="ficha" class="formu">fecha desercion:</label>
	      			<input class="formu" id="2name" type="date"  name="fecha_desercion" autocomplete="off"  placeholder="Digite su segundo nombre">
					</div>
				</div>

				<div class="row">
					<div class="col-md-6 ">
                    <label for="ficha" class="formu">telefono:</label>
	      			<input class="formu" id="last" type="text"  name="telefono" autocomplete="off" required placeholder="Digite el número de telefono del aprendiz" >
					</div>
					<div class="col-md-6">
                    <label for="ficha" class="formu">direccion:</label>
	      			<input class="formu" id="2last" type="text"  name="direccion" autocomplete="off"  placeholder="Digite la direccion del aprendiz">
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
                    <label for="ficha" class="formu">observaciones:</label>
                    <textarea class="formu" name="comentarios" style=" width: 95% !important;"></textarea>  
                    </div>
				</div>

				<center> <button type="submit" class="btn btn-outline-primary mt-3 bbtt" id="botoon" >Registrar</button>
	   			</center>
        		</form>
        	</div>                           
<br><br>
</div>

<?php endif;?>


<?php  if(!isset($_POST["documentoi"]) && !isset($rd)): ?>
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
           <form method="post" >
         <div class="container">
          <div class="form-group">
            <label for="ficha" class="formu">Documento:</label>
            <div class="ic">
            <input title="Documento" class="formu" type="text" name="documentoi" autocomplete="off">
            <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i>
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
  <script src="<?php echo RUTA_URL; ?>/js/modal.js"></script>
<?php endif;?>