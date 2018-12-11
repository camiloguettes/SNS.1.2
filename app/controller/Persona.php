<?php

class Persona extends Control {

	public function __construct(){
        $this->tipo_doc = $this->modelar('TipodocumentoModel'); 
		$this->persona = $this->modelar('PersonaModel');	
		$this->ficha = $this->modelar('fichaModel');	

	}
    
    public function index($id=null)
    {
        $this->perfil();
    }

   

    public function perfil()
    {
        //secho "has ingresado vien ";
        if(!is_null($_SESSION["documento"])){
            $dato=['documento'=>$_SESSION["documento"]];
            $rol=$this->persona->ingresarModel($dato);
            $_SESSION["rol"]=$rol->fk_tipo_rol;
            switch ($_SESSION["rol"]) {
            case 1:
            include RUTA_APP.'/view/paginas/cuerpo/nav3.php';
            include RUTA_APP.'/view/paginas/cuerpo/perfil_admin.php';
            include RUTA_APP.'/view/inc/footer.php';
            break;
            case 2:
            include RUTA_APP.'/view/paginas/cuerpo/nav3.php';
            include RUTA_APP.'/view/paginas/cuerpo/perfil_apoyo_admin.php';
            include RUTA_APP.'/view/inc/footer.php';
            break;
            case 3:
             include RUTA_APP.'/view/paginas/cuerpo/nav2.php';
            include RUTA_APP.'/view/paginas/cuerpo/perfil_instructor.php';
            include RUTA_APP.'/view/inc/footer.php';
            break;
            case 4:
             include RUTA_APP.'/view/paginas/cuerpo/nav4.php';
             include RUTA_APP.'/view/paginas/cuerpo/perfil.php';
             include RUTA_APP.'/view/inc/footer.php';
            break;
            default:
            header('location:'.RUTA_URL);
            break;
            }
        }else{
            header('location:'.RUTA_URL);
        }
    }  

    public function salir()
    {
        $_SESSION["rol"]=null;
        $_SESSION["documento"]=null;
        $_SESSION["fk_tipo_documento"]=null;
        $_SESSION["nombre"]=null;
        header('location:'.RUTA_URL);
    }


    
    public function password(){
        $this->cargarFormulario('/password');
    }
    public function cambiarContra()
    {
        if($_POST["contrasena1"]==$_POST["contrasena2"]){
            $datosController = array( 'documento' =>$_SESSION["documento"]);
            $respuesta = $this->persona->ingresarModel($datosController);

            if ($respuesta->contrasena==md5($_POST["contrasena"])) {
            $datos = array(
                'contrasena' =>md5($_POST['contrasena2']) , 
                'documento' =>$_SESSION['documento'] , 
            );

                $stm=$this->persona->cambiarContraModel($datos);
                 echo $stm; 
            }else {
                echo '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Atención!</strong> La contraseña no coincide con la informacion del perfil.
                  </div>';            
            }  
        }else{
            echo '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Atención!</strong> Las contraseñas no coinciden. </div>';
        }
    
    }

    public function consultaraprendiz($documento=null)
    {
        $this->apoyoadministrador($_SESSION["rol"]);
        if($documento==null){
            $aprendices = $this->persona->consultaraprendicesModel();
            $this->cargarformulario('/aprendiz', $aprendices);
        }else{
            $aprendices = $this->persona->consultaraprendicesModel();
            $aprendiz = $this->persona->consultaraprendizModel($documento);
            $fichas = $this->ficha->consultarfichasModel(); 
            $this->cargarformulario('/aprendiz', $aprendices, $aprendiz, $fichas);
        }
    }

    public function consultarUsuarios($documento=null)
    {
        $this->apoyoadministrador($_SESSION["rol"]);
        if($documento==null){
            $usuarios = $this->persona->consultarUsuariosModel();
            $this->cargarformulario('/usuarios', $usuarios);
        }else{
            $usuarios = $this->persona->consultarUsuariosModel();
            $usuario = $this->persona->consultarUsuarioModel($documento);
            $this->cargarformulario('/Usuarios', $usuarios, $usuario);
        }
    }

    public function actualizaraprendiz()
    {        
        if (isset($_POST["ficha"])) {
            $datos=[
                'primer_nombre' => $this->validar($_POST["primer_nombre"]),
                'segundo_nombre' => $this->validar($_POST["segundo_nombre"]),
                'primer_apellido' => $this->validar($_POST["primer_apellido"]),
                'segundo_apellido' => $this->validar($_POST["segundo_apellido"]),
                'email' => $this->validar($_POST["email"]),
                'ficha'=> $_POST["ficha"],
                'documento' => $_POST["documentoi"]
            ];       
            $actuaizar= $this->persona->actualizarAModel($datos);
        }else {
            $datos=[
                'primer_nombre' => $this->validar($_POST["primer_nombre"]),
                'segundo_nombre' => $this->validar($_POST["segundo_nombre"]),
                'primer_apellido' => $this->validar($_POST["primer_apellido"]),
                'segundo_apellido' => $this->validar($_POST["segundo_apellido"]),
                'email' => $this->validar($_POST["email"]),
                'documento' => $_POST["documentoi"]
            ];
            $actuaizar= $this->persona->actualizarUModel($datos);
        }
        
        return $actuaizar;

    }

    public function regAprendiz()
    {
        $this->apoyoadministrador($_SESSION["rol"]);

        $fichas=$this->ficha->consultarfichasModel();
        $ti_doc=$this->tipo_doc->all();

        if(isset($_POST["documento"])){
            if ($_POST["ficha"]==NULL) {
                return '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Atención!</strong> Debes seleccionar una fhicha.
                </div>';
            }else{
                $datos=[
                    'documento'=>$_POST["documento"],
                    'tipo_documento'=>$_POST["tipo_documento"],
                    'primer_nombre'=>$this->validar($_POST["primer_nombre"]),
                    'segundo_nombre'=>$this->validar($_POST["segundo_nombre"]),
                    'primer_apellido'=>$this->validar($_POST["primer_apellido"]),
                    'segundo_apellido'=>$this->validar($_POST["segundo_apellido"]),
                    'correo'=>$this->validar($_POST["correo"]),
                    'estado'=>3,
                    'ficha'=>$_POST["ficha"],
                ];
                //var_dump($datos);
                $respuesta=$this->persona->regAprendizModel($datos);
                $this->cargarformulario('/reg_aprendiz', $ti_doc,$fichas,$respuesta);
                
            }
            // echo 'si hay documento';
        }else{
            $this->cargarformulario('/reg_aprendiz', $ti_doc,$fichas);
            // echo 'no hay documento';
        }
    }

}
?>