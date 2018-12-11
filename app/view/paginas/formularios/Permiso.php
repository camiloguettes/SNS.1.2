<?php

include RUTA_APP.'/view/paginas/cuerpo/nav3.php'; 

?>
<div id="main">
    <div class="container">


<div class="titulo">Permiso</div>

        	<center>
             <div class="contenedor">
             <form method="post">
                <div class="form-group">
                    <input type="text" name="documento" class="formu separar_abajo" placeholder="Ingrese el documento">
                    <br>
                <center> <button type="submit" class="btn btn-outline-primary bbtt" id="botoon" >Registrar</button>
                </center>
                     <span id="error2"></span>
            </form>  
             
            <?php

if (isset($_POST["documento"])) {
    $registro = new Permiso();
    $registro -> registrarpermiso();
}
?>
            <div class="nota">
                
            </div>                          
            </div>     
            </center>  

        <br><br>                           
    </div>  
</div>
<br><br>