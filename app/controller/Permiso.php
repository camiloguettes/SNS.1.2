<?php
class Permiso Extends Control{

    public function __construct(){
        $this->permiso = $this->modelar('PermisoModel');
    }

    public function index(){
        header('location:'.RUTA_URL);
    }

    
    public function registrarpermiso(){
        $datos=array(
            'documento' =>$_POST['documento']
            );
    $stm=$this->permiso->registrarpermisoModel($datos);
    echo $stm;
    }


    public function registro(){
        $this->administrador($_SESSION["rol"]);
        $this->cargarFormulario('/permiso');
    }

}
?>