<?php

class Competencia extends Control{
	public function __construct(){	
        $this->ficha = $this->modelar('FichaModel'); 
		$this->competencia = $this->modelar('CompetenciaModel');		
	}
    
    public function index()
    {
        header('location:'.RUTA_URL);
    }

    public function ver($codigo=null)
    {
        $this->apoyoadministrador($_SESSION["rol"]);
        
        $caracteristicas=[
            'competencias'=>$this->competencia->all(),
            'programa_formacion'=>$this->ficha->allprogramaFormacion(),
        ];
        if($codigo==null){
            $this->cargarformulario('competencias', $caracteristicas);
        }else{
            $competecia=$this->competencia->getOne($codigo);
            $this->cargarformulario('competencias', $caracteristicas, $competecia);
        }
    }

    public function act_Competencia()
    {
        $datos=[
            'id_competencia'=>$this->validar($_POST["codigo"]),
            'competencia'=>$this->validar($_POST["competencia"]),
        ];
        $stm=$this->competencia->act_CompetenciaModel($datos);
        return $stm;
    }

    public function reg_Competencia()
    {
        $datos=[
            'competencia'=>$this->validar($_POST["competencia"]),
            'trimestred'=>$this->validar($_POST["trimestred"]),
            'trimestree'=>$this->validar($_POST["trimestree"]),
            'programa'=>$this->validar($_POST["programa"]),
        ];
        $stm=$this->competencia->reg_CompetenciaModel($datos);
        return $stm;
    }

}
?>