<?php
include RUTA_APP.'/view/paginas/cuerpo/nav3.php';
?>
<div id="main">
    <div class="container">
      <div class="titulo">Registrar novedad</div>
      <?php
            if (isset($_POST["documento"])) {
                $registro = new Novedad();
                echo $r=$registro -> reg();
                // echo $c=date('d-m-y G:i');
                

            }
            ?>
        	<div class="formulario">
        		<form  method="post" >
				<div class="row">
					<div class="col-md-6">
                    <label for="ficha" class="formu">Aprendiz:</label>
                        <input class="formu" id="documento" type="number"  name="documento" autocomplete="off" required placeholder="Digite el documento del aprendiz" >
					</div>
					<div class="col-md-6">
                    <label for="ficha" class="formu">Tipo de Novedad:</label>
	      			<select  name="novedad" class="formu" id="select">
						<option value="" disabled selected>Seleccione</option>
                          <?php
                
                          foreach ($datos["novedades"] as $t) {
                              echo'
                                <option value='.$t->id_tipo_novedad.'>'.$t->tipo_novedad.'</option>
                              ';
                          }
                            
                          ?>
              		</select>
                    </div>
				</div>

				<div class="row">
                    <div class="col-md-6 ">
                    <label for="ficha" class="formu">motivo:</label>
                    <textarea class="formu" name="motivo"></textarea>  
                    </div>
                    <div class="col-md-6 ">
                    <label for="ficha" class="formu">comentarios del responsable:</label>
                    <textarea class="formu" name="comentarios"></textarea>  
                    </div>
				</div>
                <div class="row">
                    <div class="col-md-6 ">
                    <label for="ficha" class="formu">Recomendaciones del responsable:</label>
                    <textarea class="formu" name="recomendaciones"></textarea>  
                    </div>
                     <div class="col-md-6">
                    <label for="ficha" class="formu">Evidencias:</label>
                    <textarea class="formu" name="evidencias"></textarea>  
                    </div>
                 </div>
				<div class="row">
                    <div class="col">
                        <div id="pai">
                            <div id="2">
                                <div class="col-md-6">
                                <label for="ficha" class="formu">Nueva jornada:</label>
                                <select name="nuevajornada" class="formu">
                                    <option selected="" disabled="" >Seleccione una ficha</option>
                                    <?php
                          
                                    foreach ($datos["jornada"] as $t) {
                                        echo'
                                          <option value='.$t->id_jornadas.'>'.$t->jornada.'</option>
                                        ';
                                    }
                                      
                                    ?>
                                </select>
                                </div>
                            </div>
                            <div id="4">
                                <!-- quitar col 6  -->
                                <div class="col-md-6">
                                <label for="ficha" class="formu">codigo nueva ficha:</label>
                                <select name="nuevaficha" class="formu">
                                    <option selected="" disabled="" >Seleccione una ficha</option>
                                    <?php
                          
                                    foreach ($datos["fichas"] as $t) {
                                        echo'
                                          <option value='.$t->codigo_ficha.'>'.$t->codigo_ficha.'</option>
                                        ';
                                    }
                                      
                                    ?>
                                </select>
                                </div>
                            </div>
                            <div id="5">
                            </div>
                            <div id="6">
                                <div class="col-md-6">
                                <label for="ficha" class="formu">codigo nueva ficha:</label>
                                <select name="fichatraslado" class="formu">
                                    <option selected="" disabled="" >Seleccione una ficha</option>
                                    <?php
                          
                                    foreach ($datos["fichas"] as $t) {
                                        echo'
                                          <option value='.$t->codigo_ficha.'>'.$t->codigo_ficha.'</option>
                                        ';
                                    }
                                      
                                    ?>
                                </select>
                                </div>
                            </div>
                        </div>
                        </div>
                </div>

				<center> <button type="submit" class="btn btn-outline-primary mt-3 bbtt" id="botoon" >Registrar</button>
	   			</center>
        		</form>
        	</div>                           
<br><br>
</div>
<script type="text/javascript" src="<?php echo RUTA_URL; ?>/js/javas.js"></script>
