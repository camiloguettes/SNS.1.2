<?php
  $this->cargarvista('iniciar',$datos);
  if(isset($_SESSION["rol"])){
		header('location:'.RUTA_URL.'/persona/perfil');
	}
?>

<div id="main">
    <div class="container">
    	<?php 
      
            if(isset($_POST["documentoi"])){
              $ingreso = new index();
              $ingreso -> ingresar();
            }
         ?>
      <div class="titulo">Regístrate</div>
      <?php
			if (isset($_POST["documento"])) {
				$registro = new index();
				echo  $registro -> registrar();
			}
			?>
        	<div class="formulario">
        		<form  method="post" onsubmit="return validar();">
				<div class="row">
					<div class="col-md-6">
	      			<input class="formu" id="documento" type="text"  name="documento" autocomplete="off" required placeholder="Digite su documento" >
					</div>
					<div class="col-md-6">
	      			<select  name="fk_tipo_documento" class="formu">
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
	      			<input class="formu" id="name" type="text"  name="primer_nombre" autocomplete="off" required placeholder="Digite su primer nombre" >
					</div>
					<div class="col-md-6">
	      			<input class="formu" id="2name" type="text"  name="segundo_nombre" autocomplete="off"  placeholder="Digite su segundo nombre">
					</div>
				</div>

				<div class="row">
					<div class="col-md-6 ">
	      			<input class="formu" id="last" type="text"  name="primer_apellido" autocomplete="off" required placeholder="Digite su primer apellido" >
					</div>
					<div class="col-md-6">
	      			<input class="formu" id="2last" type="text"  name="segundo_apellido" autocomplete="off"  placeholder="Digite su segundo apellido">
					</div>
				</div>

				<div class="row">
					<div class="col-md-12 ">
	      			<input class="formu" style="width: 95%;" id="mail" type="text"  name="correo" autocomplete="off" required placeholder="Digite su	 correo" >	
					</div>
				</div>

				<div class="row">
					<div class="col-md-6 ">
	      			<input class="formu" id="pass1" type="password"  name="contrasena" autocomplete="off" required placeholder="Digite Contraseña" >
					</div>
					<div class="col-md-6">
	      			<input class="formu" id="pass2" type="password"  name="contrasena2" autocomplete="off" required placeholder="Confirme la contraseña">
					</div>
				</div>
				<center> <button type="submit" class="btn btn-outline-primary mt-3 bbtt" id="botoon" disabled>Registrar</button>
	   			</center>
					 <span id="error2"></span>
        		</form>
        	</div>                           
<br><br>
</div>
<script type="text/javascript" src="<?php echo RUTA_URL; ?>/js/registro.js"></script>
<script type="text/javascript" src="<?php echo RUTA_URL; ?>/js/script.js"></script>