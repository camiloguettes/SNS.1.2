
               
<?php require RUTA_APP.'/view/inc/header.php';  ?>

<?php
	//clase de control
    class Control{
        //cargar modelo
        public function modelar($modelo){
            require_once("../app/model/".$modelo.".php");
            return new $modelo();

        }
        public function cargarvista($vista,$datos=[],$datos2=[]){
            if(file_exists("../app/view/paginas/cuerpo/".$vista.".php")){
            require_once("../app/view/paginas/cuerpo/".$vista.".php");
            require RUTA_APP.'/view/inc/footer.php';
            }else{
                die("no existe el archivo");
            }
            // echo $vista;
        }

        public function cargarFormulario($vista,$datos=[],$datos2=[],$datos3=[]){

            if(file_exists("../app/view/paginas/formularios/".$vista.".php")){
            require_once("../app/view/paginas/formularios/".$vista.".php");
            require RUTA_APP.'/view/inc/footer.php';
            }else{
                die("no existe el archivo");
            }
            // echo $vista;
        }

        public function validar($dato){
            $respuesta=ltrim( strtoupper( str_replace( array("<" , ">" , ";" , "'", '"'), "", strip_tags ($dato))));
            return $respuesta;
        }
        public function mostrar($dato)
        {
            $respuesta=ucwords(mb_strtolower($dato));
            return $respuesta;
        }

        public function administrador($seg)
        {
            if ($seg!=1) {
                header('location:'.RUTA_URL);
            }
        }

        public function apoyoadministrador($seg)
        {
            if ($seg==2 || $seg==1) { 
            }else{
                header('location:'.RUTA_URL);
            }
        }

        public function instructor($seg)
        {
            if ($seg!=3) {
                header('location:'.RUTA_URL);
            }
        }

        public function invitado($seg)
        {
            if ($seg!=4) {
                header('location:'.RUTA_URL);
            }    
        }

        function fecha_utc() {
            date_default_timezone_set("UTC");
            return date("Y-m-d H:i:s", time());
            }
            //ejemplo
             //fecha_utc(); //retorna la fecha UTC
            
        function fecha_local( $string, $format = 'Y-m-d H:i:s' ) {
            $tz = 'UTC';
            $datetime = date_create( $string, new DateTimeZone( $tz ) );
            if ( ! $datetime ) {
            return gmdate( $format, 0 );
            }
            //Cambiar America/Mexico_City por la zona horaria (local)
            $datetime->setTimezone( new DateTimeZone( 'America/Bogota' ) );
            $string_gmt = '|'.$datetime->format( $format );
            
            return $string_gmt;
        }
        public function fecha(){
            //ejemplo
            $this->fecha_local($this->fecha_utc()); //convierte la fecha UTC a local
            //Si queremos sólo la fecha, sin hora, cambiamos un poco el formato…
            $this->fecha_local($this->fecha_utc(), '/Y/m/d'); //Retorna año,mes y día 2016/07/0  4  
            $fecha=explode('|',$this->fecha_local($this->fecha_utc()));
            //var_dump($fecha);
            $fechal= $fecha["1"];
            return$fechal;

        }

    }
?>

