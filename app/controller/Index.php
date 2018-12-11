<?php

class Index extends Control{
	public function __construct(){
        $this->tipo_doc = $this->modelar('TipodocumentoModel');     
		$this->persona = $this->modelar('PersonaModel');		
	}
    
    public function index()
    {
        if (isset($_SESSION["rol"])) {
        header('Location:'.RUTA_URL.'/persona/perfil');
        }else{
        $t_d = $this->tipo_doc->all();
        $this->cargarvista('/inicio', $t_d);
        }

    }

     public function ingresar()
    {

        
        if(isset($_POST["documentoi"])){
            $datosController = array( 'documento' =>$_POST["documentoi"]);
            $contrasena=md5($_POST['contrasenai']);

            $respuesta = $this->persona->ingresarModel($datosController);
            if ($respuesta) {
             if($respuesta->documento==$_POST["documentoi"] && $respuesta->fk_tipo_documento==$_POST["fk_tipo_documentoi"] && $respuesta->contrasena==$contrasena && $respuesta->fk_estado==1){
                $_SESSION["documento"]=$_POST["documentoi"];
                $_SESSION["fk_tipo_documento"]=$_POST["fk_tipo_documentoi"];
                $_SESSION["nombre"]=$respuesta->primer_nombre.' '.$respuesta->primer_apellido;
                //var_dump($respuesta);
                $_SESSION["rol"]=$respuesta->fk_tipo_rol;
                header('location:'.RUTA_URL.'/persona/perfil');

                
             }

            else{
                echo '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Atención!</strong> No se pudo ingresar.
                  </div>';

            }
            }else{
                echo '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Atención!</strong> No Existe el usuario.
                  </div>';

            }

        }//if
    
    }

    public function registro(){
        $t_d = $this->tipo_doc->all();
        $this->cargarFormulario('/persona', $t_d);
    }
    public function registrar()
    {
        if($_POST['contrasena']==$_POST['contrasena2']){

            $_POST["primer_nombre"] = $this->validar($_POST["primer_nombre"]);
            $_POST["segundo_nombre"] = $this->validar($_POST["segundo_nombre"]);
            $_POST["primer_apellido"] = $this->validar($_POST["primer_apellido"]);
            $_POST["segundo_apellido"] = $this->validar($_POST["segundo_apellido"]);
            $_POST["correo"] = $this->validar($_POST["correo"]);
            $_POST['contrasena']=md5($_POST['contrasena']);
            
            $datos=array(
                    'documento' =>$_POST['documento'],
                    'primer_nombre' =>$_POST['primer_nombre'],
                    'segundo_nombre' =>$_POST['segundo_nombre'],
                    'primer_apellido' =>$_POST['primer_apellido'],
                    'segundo_apellido' =>$_POST['segundo_apellido'],
                    'correo' =>$_POST['correo'],
                    'contrasena' =>$_POST["contrasena"],
                    'fk_tipo_documento' =>$_POST['fk_tipo_documento'],
                    );
            // $stm=$this->registrarModel($datos);
            $stm = $this->persona->registrarModel($datos);
            echo $stm;
            
        }else{
            echo "las contraseñas no coinciden";
        }
       
    }



}
?>