<?php
include RUTA_APP.'/view/paginas/cuerpo/nav3.php';
?>
<div id="main">
    <div class="container">
      <div class="titulo">Registrar Aprendiz</div>
      <?php
			if (isset($_POST["documento"])) {
				$registro = new Persona();
                echo $r=$registro -> regAprendiz();
                // var_dump($r);
                if (isset($datos3)) {
                    echo $datos3;
                }
			}
			?>
        	<div class="formulario">
        		<form  method="post" onsubmit="return validara();">
				<div class="row">
					<div class="col-md-6">
                    <label for="ficha" class="formu">Documento:</label>
	      			<input class="formu" id="documento" type="text"  name="documento" autocomplete="off" required placeholder="Digite su documento" >
					</div>
					<div class="col-md-6">
                    <label for="ficha" class="formu">Tipo documentos:</label>
	      			<select  name="tipo_documento" class="formu">
						<?php
              
			            foreach ($datos as $t) {
			                echo'
			                  <option value='.$t->id_tipo_documento.'>'.$t->tipo_documento.'</option>
			                ';
			            }
			              
			            ?>
              		</select>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6 ">
                    <label for="ficha" class="formu">primer_nombre:</label>
	      			<input class="formu" id="name" type="text"  name="primer_nombre" autocomplete="off" required placeholder="Digite su primer nombre" >
					</div>
					<div class="col-md-6">
                    <label for="ficha" class="formu">segundo_nombre:</label>
	      			<input class="formu" id="2name" type="text"  name="segundo_nombre" autocomplete="off"  placeholder="Digite su segundo nombre">
					</div>
				</div>

				<div class="row">
					<div class="col-md-6 ">
                    <label for="ficha" class="formu">primer_apellido:</label>
	      			<input class="formu" id="last" type="text"  name="primer_apellido" autocomplete="off" required placeholder="Digite su primer apellido" >
					</div>
					<div class="col-md-6">
                    <label for="ficha" class="formu">segundo_apellido:</label>
	      			<input class="formu" id="2last" type="text"  name="segundo_apellido" autocomplete="off"  placeholder="Digite su segundo apellido">
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
                    <label for="ficha" class="formu">Correo:</label>
	      			<input class="formu"  id="mail" type="text"  name="correo" autocomplete="off" required placeholder="Digite su correo" >	
					</div>
                    <div class="col-md-6">
                    <label for="ficha" class="formu">Seleccione una ficha:</label>
                    <select  name="ficha" class="formu" required>
						<?php
              
			            foreach ($datos2 as $t) {
                            
			                echo'
			                  <option value='.$t->codigo_ficha.'>'.$t->codigo_ficha.'</option>
			                ';
			            }
			              
			            ?>
              		</select>
                    </div>
				</div>

				<center> <button type="submit" class="btn btn-outline-primary mt-3 bbtt" id="botoon" >Registrar</button>
	   			</center>
        		</form>
        	</div>                           
<br><br>
</div>
<script type="text/javascript" src="<?php echo RUTA_URL; ?>/js/regApre.js"></script>