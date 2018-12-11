<?php
    class permisoModel {

        private $db;

        public function __construct(){
            $this->db = new Base();
        }

        public function registrarpermisoModel($datos){
        try{
            $this->db->query("INSERT INTO permiso(id_documento) VALUES (?)");
            $this->db->bind(1,$datos["documento"]);
            
            if($this->db->execute()){
                return '<br><div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Éxito!</strong> El usuario ahora tiene permiso para registrarse.
                  </div>';
            }else{
                return '<br><div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Atención!</strong> El usuario no tiene permiso para registrarse o ya tiene permiso.
                  </div>';
            }
            
        }catch(PDOException $e){
            die($e->getMessage());
        } 
    }
        }
    
?>