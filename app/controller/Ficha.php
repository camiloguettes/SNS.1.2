<?php
class Ficha extends Control{

    public function __construct(){
        $this->ficha = $this->modelar('FichaModel'); 
		//$this->persona = $this->modelar('PersonaModel');	

	}
    
    public function index($id=null)
    {
        header('location:'.RUTA_URL);
    }

    public function regFicha(){
        if (isset($_POST['trimestre'])&&isset($_POST['programa'])&&isset($_POST["tipoformacion"])) {
            $datos=[
                'codigo' => $_POST['codigo'],
                'sede' => $_POST['sede'],
                'jornada' => $_POST['jornada'],
                'modalidad' => $_POST['modalidad'],
                'programa' => $_POST['programa'],
                'trimestre' => $_POST['trimestre']
            ];
            //var_dump($datos);
            $stm=$this->ficha->regFichaModel($datos);
            return $stm;
        }else{
            echo 'llene todo vatito';
        }
    }

    public function consultarficha($id)
    {
        $ficha=$this->ficha->consultarfichaModel($id);
        $this->cargarformulario('ficha', $ficha);
    }

    public function ver($codigo=null)
    {
        $this->apoyoadministrador($_SESSION["rol"]);
        if($codigo==null){
            $fichas=$this->ficha->consultafichasModel();
            $this->cargarformulario('fichas', $fichas);
        }else{
            $fichas=$this->ficha->consultafichasModel();
            $ficha=$this->ficha->consultarfichaModel($codigo);
            $caracteristicas=[
                'sede'=> $this->ficha->allsedes(),
                'jornada'=>$this->ficha->alljornada()
            ];
            $this->cargarformulario('fichas', $fichas, $ficha,$caracteristicas);
        }
    }

    public function registrar()
    {
        $this->apoyoadministrador($_SESSION["rol"]);

        $fichas=$this->ficha->consultarfichasModel();

        if(isset($_POST["documento"])){
            if ($_POST["ficha"]==NULL) {
                return '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Atención!</strong> Debes seleccionar una fhicha.
                </div>';
            }else{
                //logica de regitro
                
            }
            // echo 'si hay documento';
        }else{
            $caracteristicas=[
                'sede'=> $this->ficha->allsedes(),
                'jornada'=>$this->ficha->alljornada(),
                'modalidad'=>$this->ficha->allmodalidad(),
                'programa_formacion'=>$this->ficha->allprogramaFormacion(),
                'tipo_de_formacion'=>$this->ficha->alltipoDeFormacion(),
            ];
            $this->cargarformulario('/reg_ficha', $caracteristicas);
            
        }
    }

    public function act_ficha(){
        $datos=[
            'codigoi'=>$_POST["codigoi"],
            'sede'=>$_POST["sede"],
            'jornada'=>$_POST["jornada"],
            'trimestre'=>$_POST["trimestre"],
        ];
        $stm=$this->ficha->act_fichaModel($datos);
        return $stm;
    }

    public function competencias($ficha=null)
    {
        if (isset($ficha)) {
            $ficha=$this->ficha->consultarfichaModel($ficha);
            $competencias=$this->ficha->CompetenciasModel($ficha->fk_programa_formacion);
            
            $competenciasficha=[
                'ficha'=>$ficha,
                'competencias'=>$competencias,
            ];

            $this->cargarformulario('ficha', $ficha,$competenciasficha);

            // foreach ($competencias as $c) {
            //     if ($ficha->fk_jornada==1) {
            //         if ($ficha->trimestre_formacion!=$c->trimestre_diurno) {
            //             echo 'la competencia '.$c->competencia.' es de jornada diurna <br>';
            //         }
            //     }else {
            //         if ($ficha->trimestre_formacion==$c->trimestre_especial) {
                        
            //             echo 'la competencia '.$c->competencia.' es de jornada especial <br>';
            //         }
            //     }
            // }
        }else{
            echo "no";
        }
             
    }
    
}
?>