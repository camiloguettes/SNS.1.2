<?php

class Sede extends Control{
	public function __construct(){	
        //$this->ficha = $this->modelar('FichaModel'); 
		$this->competencia = $this->modelar('SedeModel');		
	}
    
    public function index()
    {
        header('location:'.RUTA_URL);
    }

    public function ver($codigo=null)
    {
        $this->apoyoadministrador($_SESSION["rol"]);
        
        $caracteristicas=[
            'sede'=>$this->competencia->all(),
            'ciudad'=>$this->competencia->all2(),
        ];
        if($codigo==null){
            $this->cargarformulario('sedes', $caracteristicas);
        }else{
            $competecia=$this->competencia->getOne($codigo);
            $this->cargarformulario('sedes', $caracteristicas, $competecia);
        }
    }

    public function act_Sede()
    {
        $datos=[
            'sede1'=>$this->validar($_POST["sede1"]),
            'ciudad1'=>$this->validar($_POST["ciudad1"]),
            'sede0'=>$this->validar($_POST["sede0"]),
        ];
        $stm=$this->competencia->act_SedeModel($datos);
        return $stm;
    }

    public function reg_Sede()
    {
        $datos=[
            'sede_f'=>$this->validar($_POST["sede_f"]),
            'ciudad_f'=>$this->validar($_POST["ciudad_f"]),
        ];
        $stm=$this->competencia->reg_SedeModel($datos);
        return $stm;
    }

}
?>