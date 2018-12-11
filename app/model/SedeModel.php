<?php

class SedeModel  
{
    private $db;

	public function __construct(){
		$this->db = new Base();
    }
    
    public function all()
    {
        try{
        $this->db->query(
            "SELECT * FROM sede INNER JOIN ciudad ON sede.fk_ciudad=ciudad.id_ciudad");
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
            "SELECT * FROM ciudad");
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
            "SELECT * FROM sede INNER JOIN ciudad ON sede.fk_ciudad=ciudad.id_ciudad");
            $this->db->bind(1,$id);
            $this->db->execute();
            $resultado=$this->db->registro();
            return $resultado;
        }catch(PDOException $e){
            die($e->getMessage());
        }  
    }

    public function act_SedeModel($datos)
    {
        try{
            
            $this->db->query(
            "UPDATE sede SET sede=?, fk_ciudad=? WHERE id_sede=?");
            $this->db->bind(1,$datos["sede1"]);
            $this->db->bind(2,$datos["ciudad1"]);
            $this->db->bind(3,$datos["sede0"]);
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

    public function reg_SedeModel($datos)
    {
        try{
            var_dump($datos);
            $this->db->query(
            "INSERT INTO `sede` (`sede`, `fk_ciudad`) 
            VALUES (?,?)");
            $this->db->bind(1,$datos["sede_f"]);
            $this->db->bind(2,$datos["ciudad_f"]);
            if ($this->db->execute()) {
                return'
                <script>
                    swal({
                        type: "success" ,                        
                        title: "Hecho!" ,                        
                        text: "Los datos de la sede se registraron correctamente." ,                        
                    })
                </script>
                ';
            }else{
                return'
                <script>
                    swal({
                        type: "error" ,                        
                        title: "Atencion!" ,                        
                        text: "Los datos de la sede no se registraron correctamente." ,                        
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