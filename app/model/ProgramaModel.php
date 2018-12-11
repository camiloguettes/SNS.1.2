<?php

class ProgramaModel  
{
    private $db;

	public function __construct(){
		$this->db = new Base();
    }
    
    public function all()
    {
        try{
        $this->db->query(
            "SELECT * FROM programas_formacion INNER JOIN tipo_de_formacion ON programas_formacion.fk_id_tipos_de_formacion=tipo_de_formacion.id_tipos_de_formacion");
            $this->db->execute();
            $resultado=$this->db->registros();
            return $resultado;
        }catch(PDOException $e){
            die($e->getMessage());
        }  
    }
     public function all2()
    {
        try{
        $this->db->query(
            "SELECT * FROM tipo_de_formacion");
            $this->db->execute();
            $resultado=$this->db->registros();
            return $resultado;
        }catch(PDOException $e){
            die($e->getMessage());
        }  
    }

    public function getOne($id)
    {
        try{
        $this->db->query(
            "SELECT * FROM programas_formacion INNER JOIN tipo_de_formacion ON programas_formacion.fk_id_tipos_de_formacion=tipo_de_formacion.id_tipos_de_formacion WHERE id_programa_formacion=?
            ");
            $this->db->bind(1,$id);
            $this->db->execute();
            $resultado=$this->db->registro();
            return $resultado;
        }catch(PDOException $e){
            die($e->getMessage());
        }  
    }

    public function act_ProgramaModel($datos)
    {
        try{
            
            $this->db->query(
            "UPDATE programas_formacion SET programa_formacion=?, fk_id_tipos_de_formacion=? WHERE id_programa_formacion=?");
            $this->db->bind(1,$datos["programa1"]);
            $this->db->bind(2,$datos["tipo1"]);
            $this->db->bind(3,$datos["programa0"]);
            if ($this->db->execute()) {
                return'
                <script>
                    swal({
                        type: "success" ,                        
                        title: "Hecho!" ,                        
                        text: "Los datos de la competencia se atualizaron correctamente." ,                        
                    })
                </script>
                ';
            }else{
                return'
                <script>
                    swal({
                        type: "error" ,                        
                        title: "Atencion!" ,                        
                        text: "Los datos de la competencia no se atualizaron correctamente." ,                        
                    })
                </script>
                ';
            }
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function reg_ProgramaModel($datos)
    {
        try{
            var_dump($datos);
            $this->db->query(
            "INSERT INTO `programas_formacion` (`programa_formacion`, `fk_id_tipos_de_formacion`) 
            VALUES (?,?)");
            $this->db->bind(1,$datos["programa_f"]);
            $this->db->bind(2,$datos["tipo_f"]);
            if ($this->db->execute()) {
                return'
                <script>
                    swal({
                        type: "success" ,                        
                        title: "Hecho!" ,                        
                        text: "Los datos de la competencia se registró correctamente." ,                        
                    })
                </script>
                ';
            }else{
                return'
                <script>
                    swal({
                        type: "error" ,                        
                        title: "Atencion!" ,                        
                        text: "Los datos de la competencia no se registró correctamente." ,                        
                    })
                </script>
                ';
            }
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

}
?>