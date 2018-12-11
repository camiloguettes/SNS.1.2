<?php
class Rol extends Control{

    function __construct(){
        $this->rol= $this->modelar('RolModel'); 
    }
    
    public function asignarrol()
    {
        $datos=array(
            'rol' =>$_POST['rol'],
            'documento' =>$_POST['documento'],
            );
            $stm=$this->rol->asignarrolModel($datos);
            echo $stm;
    }

    public function agregar(){
        $this->administrador($_SESSION["rol"]);
        $rol = $this->rol->all();
        $documentos = $this->rol->alld();
        $this->cargarformulario('/rol', $rol,$documentos);
    }

    public function modificar($documento=null)
    {
        $this->administrador($_SESSION["rol"]);
        if($documento==null){
            $personarol = $this->rol->roles();
            $this->cargarformulario('/modificarrol', $personarol);
        }else{
            // echo $documento;
            $rol=$this->rol->rol($documento);
            $roles=$this->rol->all();
            $personarol = $this->rol->roles();
        $this->cargarformulario('/modificarrol', $personarol/*datos de todas las personas*/,$rol/*datos de la persona seleccionada*/,$roles/*lista de roles de la base de datos*/);
        }
    }

    public function actualizar(){
        if (isset($_POST["rol"])) {
            $datos=[
                'documento'=>$_POST["documentoi"],
                'rol'=>$_POST["rol"]
            ];
            $stm=$this->rol->asignarrolModel($datos);
            return $stm;
        }else{
            return '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Atención!</strong> Seleccione un rol diferente.
              </div>';
        }
    }
    
}

?>