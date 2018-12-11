<?php

class Novedad extends Control{
	public function __construct(){
        $this->ficha = $this->modelar('FichaModel'); 
        $this->persona = $this->modelar('PersonaModel');    
        $this->novedad = $this->modelar('NovedadModel'); 	
	}
    
    public function desercion()
    {
        $this->cargarformulario('/reg_desercion');
    }
    public function form_desercion()
    {
        $aprendiz=$this->persona->consultaraprendizModel($_POST["documentoi"]);
        if ($aprendiz) {
            $ficha=$this->ficha->consultarfichaModel($aprendiz->fk_ficha);
            $competencias=$this->ficha->CompetenciasModel($ficha->fk_programa_formacion);
            $desercion=[
                'aprendiz'=>$aprendiz,
                'ficha'=>$ficha,
                'competencias'=>$competencias,
            ];
            return $desercion;
        }else{
            header('location:'.RUTA_URL.'/novedad/desercion');
        }
    }
    public function regDesercion()
    {
        $datos=[
            'documento'=>$_POST["documentoi"],
            'competencia'=>$_POST["competencia"],
            'causa'=>$_POST["causa"],
            'fecha_desercion'=>$_POST["fecha_desercion"],
            'telefono'=>$_POST["telefono"],
            'direccion'=>$_POST["direccion"],
            'comentarios'=>$_POST["comentarios"],
            'responsable'=>$_SESSION["documento"],
            'fk_tipo_novedad'=>3,
            'fecha'=>$this->fecha()
        ];
        $stm=$this->novedad->regDesercionModel($datos);
        return $stm;
    }
    
    public function index()
    {
        header('location:'.RUTA_URL);
    }
    

    public function registrar(){   
        $novedad=[
            'fichas'=>$this->ficha->consultafichasModel(),
            'jornada'=>$this->ficha->alljornada(),
            'novedades'=>$this->novedad->all(),
        ];
                $this->cargarformulario('/reg_novedad',$novedad);
        
    }
    public function reg(Type $var = null){
        $novedad=[
            'fichas'=>$this->ficha->consultafichasModel(),
            'jornada'=>$this->ficha->alljornada(),
            'novedades'=>$this->novedad->all(),
        ];
        if (isset($_POST["novedad"])) {
            switch ($_POST["novedad"]) {
                case 1:
                    $datos=[
                        'documento'=>$_POST["documento"],
                        'fecha'=>$this->fecha()/*'18-11-15'*/,
                        'novedad'=>$_POST["novedad"],
                        'motivo'=>$_POST["motivo"],
                        'comentarios'=>$_POST["comentarios"],
                        'recomendaciones'=>$_POST["recomendaciones"],
                        'responsable'=>$_SESSION["documento"],
                        'evidencias'=>$_POST["evidencias"],
                    ];
                    $r =$this->registrarNov($datos);
                    break;
                case 2:
                    if (isset($_POST["nuevajornada"])) {
                        $datos=[
                            'documento'=>$_POST["documento"],
                            'fecha'=>$this->fecha(),
                            'novedad'=>$_POST["novedad"],
                            'motivo'=>$_POST["motivo"],
                            'comentarios'=>$_POST["comentarios"],
                            'recomendaciones'=>$_POST["recomendaciones"],
                        'responsable'=>$_SESSION["documento"],
                        'evidencias'=>$_POST["evidencias"],
                            'nuevajornada'=>$_POST["nuevajornada"],
                        ];
                        // var_dump($datos);
                        $r=$this->registrarCambioJ($datos);
                    }else{
                        $r= '<div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Atención!</strong> Debe seleccionar una nueva jornada.
                        </div>';
                    }
                    break;
                case 3:
                    header('location:'.RUTA_URL.'/novedad/desercion');
                    break;
                case 4:
                    if (isset($_POST["nuevaficha"])) {
                        $datos=[
                            'documento'=>$_POST["documento"],
                            'fecha'=>$this->fecha(),
                            'novedad'=>$_POST["novedad"],
                            'motivo'=>$_POST["motivo"],
                            'comentarios'=>$_POST["comentarios"],
                            'recomendaciones'=>$_POST["recomendaciones"],
                            'responsable'=>$_SESSION["documento"],
                            'evidencias'=>$_POST["evidencias"],
                            'nuevaficha'=>$_POST["nuevaficha"],
                        ];
                        // var_dump($datos);
                        $r=$this->registarrf($datos);
                    }else{
                        $r= '<div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Atención!</strong> Debe seleccionar una nueva ficha.
                        </div>';
                    }
                    break;
                case 5:
                    $datos=[
                        'documento'=>$_POST["documento"],
                        'fecha'=>$this->fecha(),
                        'novedad'=>$_POST["novedad"],
                        'motivo'=>$_POST["motivo"],
                        'comentarios'=>$_POST["comentarios"],
                        'recomendaciones'=>$_POST["recomendaciones"],
                        'responsable'=>$_SESSION["documento"],
                        'evidencias'=>$_POST["evidencias"],
                    ];
                    // var_dump($datos);
                        $r=$this->registrarNov($datos);
                    break;
                case 6:
                    if (isset($_POST["fichatraslado"])) {
                        $datos=[

                            'documento'=>$_POST["documento"],
                            'fecha'=>$this->fecha(),
                            'novedad'=>$_POST["novedad"],
                            'motivo'=>$_POST["motivo"],
                            'comentarios'=>$_POST["comentarios"],
                            'recomendaciones'=>$_POST["recomendaciones"],
                            'responsable'=>$_SESSION["documento"],
                            'evidencias'=>$_POST["evidencias"],
                            'nuevaficha'=>$_POST["fichatraslado"],
                        ];
                        // var_dump($datos);
                        $r=$this->registarrf($datos);
                    }else{
                        $r= '<div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Atención!</strong> Debe seleccionar una nueva ficha.
                        </div>';
                    }
                    break;        
                default:
                    header('location:'.RUTA_URL);
                    break;
            }
        }else{
            $r= '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Atención!</strong> Debes seleccionar un  tipo de novedad.
                </div>';
        }
            return $r;
    }

    public function registrarNov($datos){
        $aprendiz = $this->persona->consultaraprendizModel($datos["documento"]);
        if ($aprendiz) {
            $stm=$this->novedad->registrarNovModel($datos);
            return $stm;
        }else{
            return'<div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>Atención!</strong> No existe el aprendiz.
                            </div>';
        }
    }

    public function registrarCambioJ($datos){
        $aprendiz = $this->persona->consultaraprendizModel($datos["documento"]);
        if ($aprendiz) {
            // var_dump($datos);
            $stm=$this->novedad->registrarCambioJModel($datos);
            return $stm;
        }else{
            return'<div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>Atención!</strong> No existe el aprendiz.
                            </div>';
        }
        
    }

    public function registarrf($datos){
        $aprendiz = $this->persona->consultaraprendizModel($datos["documento"]);
        if ($aprendiz) {
            // var_dump($datos);
            $stm=$this->novedad->registarrfModel($datos);
            return $stm;
        }else{
            return'<div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>Atención!</strong> No existe el aprendiz.
                            </div>';
        }        
    }

    public function consultar($documento=null)
    {
        $this->apoyoadministrador($_SESSION["rol"]);
        if($documento==null){
            // $aprendices = $this->persona->consultaraprendicesModel();
            $novedades=[
                'novedades'=>$this->novedad->consultarModel(),
                'novedadesd'=>$this->novedad->all(),
            ];
            $this->cargarformulario('/novedades',$novedades);
        }else{
            $aprendices = $this->persona->consultaraprendicesModel();
            $aprendiz = $this->persona->consultaraprendizModel($documento);
            $fichas = $this->ficha->consultarfichasModel(); 
            $this->cargarformulario('/aprendiz', $aprendices, $aprendiz, $fichas);
        }
    }

    public function PDFAplazamiento($idnovedad)
    {
        ob_clean(); 
        require 'pdf.php';
        $novedad=$this->novedad->PDFAplazamientoModel($idnovedad);
        $pdf= new PDF;
        $pdf->novedad($novedad);
    }

    public function PDFRetiroVoluntario($idnovedad)
    {
        ob_clean(); 
        require 'pdf.php';
        $novedad=$this->novedad->PDFAplazamientoModel($idnovedad);
        $pdf= new PDF;
        $pdf->novedad($novedad);
    }

    public function PDFcambioJ($idnovedad)
    {
        ob_clean(); 
        require 'pdf.php';
        $novedad=$this->novedad->PDFAplazamientoModel($idnovedad);
        $pdf= new PDF;
        $pdf->PDFCambioJ($novedad);
    }

    public function PDFreintegro($idnovedad)
    {
        ob_clean(); 
        require 'pdf.php';
        $novedad=$this->novedad->PDFAplazamientoModel($idnovedad);
        $pdf= new PDF;
        $pdf->novedades($novedad);
    }
    
    public function PDFTraslado($idnovedad)
    {
        ob_clean(); 
        require 'pdf.php';
        $novedad=$this->novedad->PDFAplazamientoModel($idnovedad);
        $pdf= new PDF;
        $pdf->novedades($novedad);
    }

    public function PDFdesercion($idnovedad)
    {
        ob_clean(); 
        require 'pdf.php';
        $novedad=$this->novedad->PDFdesercionModel($idnovedad);
        // var_dump($novedad  );
        $pdf= new PDF;
        $pdf->desercion($novedad);
    }
}
?>