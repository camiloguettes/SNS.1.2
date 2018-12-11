<?php

class CompetenciaModel  
{
    private $db;

	public function __construct(){
		$this->db = new Base();
    }
    
    public function all()
    {
        try{
        $this->db->query(
            "SELECT *
            FROM competencias AS c 
            INNER join programas_formacion AS p on c.fk_id_programa=p.id_programa_formacion 
            ");
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
            "SELECT *
            FROM competencias AS c 
            INNER join programas_formacion AS p on c.fk_id_programa=p.id_programa_formacion 
            WHERE id_competencia=?
            ");
            $this->db->bind(1,$id);
            $this->db->execute();
            $resultado=$this->db->registro();
            return $resultado;
        }catch(PDOException $e){
            die($e->getMessage());
        }  
    }

    public function act_CompetenciaModel($datos)
    {
        try{
            
            $this->db->query(
            "UPDATE `competencias` SET `competencia`=? WHERE `id_competencia`=?");
            $this->db->bind(1,$datos["competencia"]);
            $this->db->bind(2,$datos["id_competencia"]);
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

    public function reg_CompetenciaModel($datos)
    {
        try{
            var_dump($datos);
            $this->db->query(
            "INSERT INTO `competencias` (`competencia`, `trimestre_diurno`, `trimestre_especial`, `fk_id_programa`) 
            VALUES (?,?,?,?)");
            $this->db->bind(1,$datos["competencia"]);
            $this->db->bind(2,$datos["trimestred"]);
            $this->db->bind(3,$datos["trimestree"]);
            $this->db->bind(4,$datos["programa"]);
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