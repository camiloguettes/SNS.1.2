<?php
include RUTA_APP.'/view/paginas/cuerpo/nav3.php';
?>
<div id="main">
    <div class="container">
      <div class="titulo">Registrar ficha</div>
      <?php
			if (isset($_POST["codigo"])) {
				$registro = new Ficha();
                echo $r=$registro -> regFicha();
			}
			?>
        	<div class="formulario">
        		<form  method="post" onsubmit="return validara();">
				<div class="row">
					<div class="col-md-6">
                    <label for="ficha" class="formu">codigo ficha:</label>
	      			<input class="formu" id="documento" type="text"  name="codigo" autocomplete="off" required placeholder="Digite el codigo de la ficha" >
					</div>
					<div class="col-md-6">
                    <label for="ficha" class="formu">sede:</label>
	      			<select  name="sede" class="formu">
						<?php
              
			            foreach ($datos["sede"] as $t) {
			                echo'
			                  <option value='.$t->id_sede.'>'.$t->sede.'</option>
			                ';
			            }
			              
			            ?>
              		</select>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6 ">
                    <label for="ficha" class="formu">jornada:</label>
	      			<select  name="jornada" class="formu">
						<?php
              
			            foreach ($datos["jornada"] as $t) {
			                echo'
			                  <option value='.$t->id_jornadas.'>'.$t->jornada.'</option>
			                ';
			            }
			              
			            ?>
              		</select>   
                    </div>
					<div class="col-md-6">
                    <label for="ficha" class="formu">modalidad:</label>
	      			<select  name="modalidad" class="formu">
						<?php
              
			            foreach ($datos["modalidad"] as $t) {
			                echo'
			                  <option value='.$t->id_modalidades.'>'.$t->tipo_modalidad.'</option>
			                ';
			            }
			              
			            ?>
              		</select>
                    </div>
				</div>

				<div class="row">
                      <div class="col-md-12">
                      <label for="ficha" class="formu">Tipo de formación</label>
                        <select  name="tipoformacion" style="width: 95%;" class="formu" id="tipo">
                        <option value="" disabled selected>Seleccione</option>
                          <?php
                
                          foreach ($datos["tipo_de_formacion"] as $t) {
                              echo'
                                <option value='.$t->id_tipos_de_formacion.'>'.$t->tipos_de_formacion.'</option>
                              ';
                          }
                            
                          ?>
                        </select>
                      </div>
					
				</div>
                <div class="row">
                          <div class="col-md-6">
                              <label for="programa" class="formu">Programa de formacion</label>                
                          </div>
                          <div class="col-md-6">
                            <label for="trimestre" class="formu">Trimestre</label>               
                          </div>
                </div>               
                <div id="pai">
                <!-- 1 -->
            <div class="row">
                <div class="col-md-6">
                        <select disabled class="formu" name="programa" id="1">
                            <?php
                                foreach ($datos["programa_formacion"] as $t) {                             
                                    if($t->fk_id_tipos_de_formacion==1){
                                        echo'
                                        <option value='.$t->id_programa_formacion.'>'.$t->programa_formacion.'</option>
                                        ';   
                                    }
                                }                    
                            ?>
                        </select>
                </div>
                <div class="col-md-6">
                    <select disabled  name="trimestre" class="formu" id="1">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <!-- 2 -->
                <div class="col-md-6">
                    <select disabled class="formu" name="programa" id="2">
                        <?php
                            foreach ($datos["programa_formacion"] as $t) {
                                if($t->fk_id_tipos_de_formacion==2){
                                    echo'
                                    <option value='.$t->id_programa_formacion.'>'.$t->programa_formacion.'</option>
                                    ';   
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <select disabled  name="trimestre" class="formu" id="2">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                    </select>
                </div>
                <!-- 3 -->
                <div class="col-md-6">
                    <select disabled class="formu" name="programa" id="3">
                        <?php
                            foreach ($datos["programa_formacion"] as $t) {
                                if($t->fk_id_tipos_de_formacion==3){
                                    echo'
                                    <option value='.$t->id_programa_formacion.'>'.$t->programa_formacion.'</option>
                                    ';   
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <select disabled  name="trimestre" class="formu" id="3">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <!-- 4 -->
                <div class="col-md-6">
                    <select disabled class="formu" name="programa" id="4">
                        <?php
                            foreach ($datos["programa_formacion"] as $t) {
                            if($t->fk_id_tipos_de_formacion==4){
                                echo'
                                <option value='.$t->id_programa_formacion.'>'.$t->programa_formacion.'</option>
                                ';   
                            }
                            }          
                        ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <select disabled  name="trimestre" class="formu" id="4">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <!-- 5 -->
                <div class="col-md-6">
                    <select disabled class="formu" name="programa" id="5">
                        <?php
                            foreach ($datos["programa_formacion"] as $t) {
                                if($t->fk_id_tipos_de_formacion==5){
                                    echo'
                                    <option value='.$t->id_programa_formacion.'>'.$t->programa_formacion.'</option>
                                    ';   
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <select disabled  name="trimestre" class="formu" id="5">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
            </div>
    </div>

				

				<center> <button type="submit" class="btn btn-outline-primary mt-3 bbtt" id="botoon" >Registrar</button>
	   			</center>
        		</form>
        	</div>                           
<br><br>
</div>
<script type="text/javascript" src="<?php echo RUTA_URL; ?>/js/trimestres.js"></script>
