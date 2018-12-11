<?php
class RolModel {

    private $db;

    function __construct(){
        $this->db=new Base;
    }
    
    public function all()
    {
        try{
             $this->db->query("SELECT * FROM `tipo_rol`");
             $this->db->execute();
            $resultado=$this->db->registros();
            return $resultado;
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }
    public function alld()
    {
        try{
            $this->db->query("SELECT * FROM `rol` WHERE fk_tipo_rol = 4");
            $this->db->execute();
            $resultado=$this->db->registros();
            return $resultado;
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function asignarrolModel($datos)
    {
        try{
         
            $this->db->query("UPDATE `rol` SET `fk_tipo_rol`=?,`fk_documento`=? WHERE fk_documento=?");
            $this->db->bind(1,$datos["rol"]);
            $this->db->bind(2,$datos["documento"]);       
            $this->db->bind(3,$datos["documento"]);
            if($this->db->execute()){
                return '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Exito!</strong> El rol se ha agregado correctamente.
                  </div>';
            }else{
                return '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Atención!</strong> El usuario no se ha registrado correctamente.
                  </div>';
            }
            
        }catch(PDOException $e){
            die($e->getMessage());
        } 
    }

    public function roles()
    {
        try{
            $this->db->query(
            "SELECT * FROM `rol` 
            inner JOIN persona on rol.fk_documento =persona.documento
            inner JOIN tipo_rol on rol.fk_tipo_rol= tipo_rol.id_tipo_rol");
            $this->db->execute();
            $resultado=$this->db->registros();
            return $resultado;
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function rol($documento)
    {
        try{
            $this->db->query(
            "SELECT * FROM `rol` 
            inner JOIN persona on rol.fk_documento =persona.documento
            inner JOIN tipo_rol on rol.fk_tipo_rol= tipo_rol.id_tipo_rol 
            WHERE documento=?");
            $this->db->bind(1,$documento);
            $this->db->execute();
            $resultado=$this->db->registro();
            return $resultado;
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }
}

?>