<?php

class Programa extends Control{
	public function __construct(){	
        //$this->ficha = $this->modelar('FichaModel'); 
		$this->competencia = $this->modelar('ProgramaModel');		
	}
    
    public function index()
    {
        header('location:'.RUTA_URL);
    }

    public function ver($codigo=null)
    {
        $this->apoyoadministrador($_SESSION["rol"]);
        
        $caracteristicas=[
            'programa'=>$this->competencia->all(),
            'tipo'=>$this->competencia->all2(),
        ];
        if($codigo==null){
            $this->cargarformulario('programas', $caracteristicas);
        }else{
            $competecia=$this->competencia->getOne($codigo);
            $this->cargarformulario('programas', $caracteristicas, $competecia);
        }
    }

    public function act_Programa()
    {
        $datos=[
            'programa1'=>$this->validar($_POST["programa1"]),
            'tipo1'=>$this->validar($_POST["tipo1"]),
            'programa0'=>$this->validar($_POST["programa0"]),
        ];
        $stm=$this->competencia->act_ProgramaModel($datos);
        return $stm;
    }

    public function reg_Programa()
    {
        $datos=[
            'programa_f'=>$this->validar($_POST["programa_f"]),
            'tipo_f'=>$this->validar($_POST["tipo_f"]),
        ];
        $stm=$this->competencia->reg_ProgramaModel($datos);
        return $stm;
    }

}
?>