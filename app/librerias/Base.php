<?php

//clase  para conectarse a la base de datos
    class Base{
        private $host = HOST;
        private $dbname = DBNAME;
        private $user = USER;
        private $password = PASSWORD;

        private $conexion;
        private $resultado;
        private $error;
        // SE realiza la conexion a la base de datos
        public  function __construct(){
                $dbs = 'mysql:host='.$this->host.';dbname='.$this->dbname.'; charset=utf8';
                $opciones = array(
                    PDO::ATTR_PERSISTENT => true,
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        
            try{
                $this->conexion = new PDO($dbs,$this->user,$this->password);
                $this->conexion->exec("SET NAMES utf8");
                // echo "conexion exitosa";
            }catch(PDOException $e){
                print "Error".$e->getMessage();
            }
        }
        // se toman las consultas de la base de datos 
        public function query($sql){
            $this->resultado= $this->conexion->prepare($sql);
        }
        // parametos de la base de datos
        public function bind($parametro,$valor,$tipo = null){
            if(is_null($tipo)){
                switch(true){
                    case is_int($valor):
                        $tipo =PDO::PARAM_INT;
                    break;
                    case is_bool($valor):
                        $tipo =PDO::PARAM_BOOL;
                    break;
                    case is_null($valor):
                        $tipo =PDO::PARAM_NULL;
                    break;
                    default:
                        $tipo=PDO::PARAM_STR;
                    break;
                }

            }
            $this->resultado->bindParam($parametro,$valor,$tipo);
        }
        //Ejecucion de los parametros
        public function execute(){
            return $this->resultado->execute();
            
        }
        public function registro(){
            $this->execute();
            return $this->resultado->fetch(PDO::FETCH_OBJ);
        }
        public function registros(){
            $this->execute();
            return $this->resultado->fetchAll(PDO::FETCH_OBJ);
        }
        public function rowCount(){
            $this->execute();
            return $this->resultado->rowCount();
        }
    
    }
?>