<?php

class TipodocumentoModel  
{
    private $db;

	public function __construct(){
		$this->db = new Base();
	}
    
    public function all()
    {
        try{
            $this->db->query("SELECT * FROM `tipo_documento`");
            $resultado=$this->db->registros();
            return $resultado;
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

}
?>