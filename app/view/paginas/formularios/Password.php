<?php
    include RUTA_APP.'/view/paginas/cuerpo/navs.php';
?>
<div id="main">
	<div class="container">
		<div class="titulo">Cambiar Contraseña</div>	
        <center>
        <div class="contenedor">
        <?php
        if (isset($_POST["contrasena"])) {
            $cambiar= new Persona;
            $cambiar->cambiarContra();
        }
        ?>
            <form method="post">
                <div class="form-group">
                    <input type="password" class="formu" name="contrasena" placeholder="Contraseña Actual" id="pass" autocomplete="off" required>
                    <input type="password" class="formu" name="contrasena1" placeholder="Contraseña Nueva" id="pass1" autocomplete="off" required>
                    <input type="password" class="formu " name="contrasena2" placeholder="Confirmar nueva Contraseña" id="pass2" autocomplete="off" required>
                    <center> <button type="submit" class="btn btn-outline-primary bbtt separar_abajo" id="botoon" disabled>Registrar</button></center>
                    <span id="error2"></span>
                </div>
            </form>   
            <div class="nota"></div>   
    </div>
    </center>

	</div>
</div>

<script type="text/javascript" src="<?php echo RUTA_URL; ?>/js/script.js"></script>
