<div id="main">
    <div class="container">
      
      <?php
      include RUTA_APP.'/view/paginas/cuerpo/nav3.php';	
			if (isset($_POST["documento"])) {
				$registro = new Rol();
				$registro -> asignarrol();
			}
			?>
        <div class="titulo">
          Asignar Rol
        </div>
        	<br>
        	<center>
        	<div class="contenedor">
        		<form method="post">
        		<div class="form-group">
                      <select class="formu " name="documento">
                      <?php
                        foreach ($datos2 as $t) {
                        	if ($t->documento!=$_SESSION["documento"]) {
	                        	echo'
	                            <option value='.$t->fk_documento.'>'.$t->fk_documento.'</option>
	                            ';	
                        	}
                            
                        }
                      
                      ?>
                      </select>
                    <select class="formu " name="rol">
                      <?php
                        foreach ($datos as $t) {
                            if ($t->tipo_rol!='0') {
                                echo'
                                <option value='.$t->id_tipo_rol.'>'.$t->tipo_rol.'</option>
                                ';    
                            }else{
                                
                            }
                            
                        }
                      
                      ?>
                      </select>
	   			<center> <button type="submit" class="btn btn-outline-primary bbtt" id="botoon" >Registrar</button>
	   			</center>
					 <span id="error2"></span>
        	</form>
          <div class="nota"></div>
        	</div>  
        	</center>                           
        <br><br>                           
    </div>  
</div>
<br><br>