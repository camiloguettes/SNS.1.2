<?php
class FichaModel{
    
    private $db;

    public function __construct(){
        $this->db = new Base();
    }

	public function regFichaModel($datos)
    {
        try{
            $sql2="INSERT INTO `ficha`(`codigo_ficha`, `fk_sede`, `fk_jornada`, `fk_modalidad`, `fk_programa_formacion`, `trimestre_formacion`) VALUES (?,?,?,?,?,?)";
            $this->db->query($sql2);
            $this->db->bind(1,$datos["codigo"]);
            $this->db->bind(2,$datos["sede"]);
            $this->db->bind(3,$datos["jornada"]);
            $this->db->bind(4,$datos["modalidad"]);
            $this->db->bind(5,$datos["programa"]);
            $this->db->bind(6,$datos["trimestre"]);
            
            if($this->db->execute()){
                return '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Hecho!</strong> La ficha se registró exitosamente.
                  </div>';
            }else{
                return '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Atención!</strong> La ficha no se pudo registrar.
                  </div>';
            }
            
        }catch(PDOException $e){
            die($e->getMessage());
        } 
    }

    public function consultarfichasModel()
    {
        try{
            $this->db->query(
            "SELECT codigo_ficha  FROM `ficha`
            ");
            $this->db->execute();
            $resultado=$this->db->registros();
            return $resultado;
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function allsedes()
    {
        try{
            $this->db->query(
            "SELECT id_sede, sede FROM `sede`
            ");
            $this->db->execute();
            $resultado=$this->db->registros();
            return $resultado;
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function alljornada()
    {
        try{
            $this->db->query(
            "SELECT id_jornadas,jornada FROM `jornada`
            ");
            $this->db->execute();
            $resultado=$this->db->registros();
            return $resultado;
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function allmodalidad()
    {
        try{
            $this->db->query(
            "SELECT id_modalidades,tipo_modalidad FROM `modalidad`
            ");
            $this->db->execute();
            $resultado=$this->db->registros();
            return $resultado;
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function allprogramaFormacion()
    {
        try{
            $this->db->query(
            "SELECT id_programa_formacion,programa_formacion,fk_id_tipos_de_formacion FROM `programas_formacion`
            ");
            $this->db->execute();
            $resultado=$this->db->registros();
            return $resultado;
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function alltipoDeFormacion()
    {
        try{
            $this->db->query(
            "SELECT id_tipos_de_formacion,tipos_de_formacion FROM `tipo_de_formacion`
            ");
            $this->db->execute();
            $resultado=$this->db->registros();
            return $resultado;
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function all($col,$tabla)
    {
        //no funciona esta funcion por el momento se espera reducir la cantidad de metodos en los que se obtiene la informacion de la ficha
        try{
            $this->db->query(
            "SELECT $col FROM $tabla");
            // $this->db->bind(1,$col);
            // $this->db->bind(2,$tabla);
            $resultado=$this->db->registros();
            return $resultado;
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function consultarfichaModel($id)
    {
        
        try{
            $this->db->query(
                "SELECT f.codigo_ficha,f.fk_programa_formacion, f.fk_sede, f.fk_jornada , f.trimestre_formacion, s.sede, j.jornada, m.tipo_modalidad, pf.programa_formacion, pf.programa_formacion ,pf.fk_id_tipos_de_formacion, tf.tipos_de_formacion
                FROM ficha AS f 
                INNER join sede AS s on f.fk_sede=s.id_sede 
                INNER JOIN jornada AS j on f.fk_jornada=j.id_jornadas 
                INNER JOIN modalidad As m on f.fk_modalidad=m.id_modalidades 
                INNER JOIN programas_formacion AS pf on f.fk_programa_formacion=pf.id_programa_formacion 
                INNER JOIN tipo_de_formacion AS tf on pf.fk_id_tipos_de_formacion = tf.id_tipos_de_formacion
                WHERE codigo_ficha=?
                ");
                $this->db->bind(1,$id);
                $this->db->execute();
                $resultado=$this->db->registro();
                return $resultado;
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function CompetenciasModel($programa)
    {
        try{
        $this->db->query(
            "SELECT * FROM `competencias` WHERE fk_id_programa=?
            ");
            $this->db->bind(1,$programa);
            $this->db->execute();
            $resultado=$this->db->registros();
            return $resultado;
        }catch(PDOException $e){
            die($e->getMessage());
        }  
    }

    public function consultafichasModel()
    {
        
        try{
            $this->db->query(
                "SELECT f.codigo_ficha, f.trimestre_formacion, s.sede, j.jornada, m.tipo_modalidad, pf.programa_formacion, pf.programa_formacion ,pf.fk_id_tipos_de_formacion, tf.tipos_de_formacion
                FROM ficha AS f 
                INNER join sede AS s on f.fk_sede=s.id_sede 
                INNER JOIN jornada AS j on f.fk_jornada=j.id_jornadas 
                INNER JOIN modalidad As m on f.fk_modalidad=m.id_modalidades 
                INNER JOIN programas_formacion AS pf on f.fk_programa_formacion=pf.id_programa_formacion 
                INNER JOIN tipo_de_formacion AS tf on pf.fk_id_tipos_de_formacion = tf.id_tipos_de_formacion
                ");
                $this->db->execute();
                $resultado=$this->db->registros();
                return $resultado;
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function act_fichaModel($datos)
    {
        
        try{
            $this->db->query("UPDATE ficha SET fk_sede=? ,fk_jornada=? ,trimestre_formacion=? WHERE codigo_ficha=?");
            $this->db->bind(1,$datos["sede"]);
            $this->db->bind(2,$datos["jornada"]);
            $this->db->bind(3,$datos["trimestre"]);
            $this->db->bind(4,$datos["codigoi"]);
            
            if($this->db->execute()){
                return '
                <script>
                    swal({
                        type: "success" ,                        
                        title: "Hecho!" ,                        
                        text: "Los datos de la ficha se atualizaron correctamente." ,                        
                    })
                </script>
                ';
            }else{
                return '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Atención!</strong> Los datos de la ficha no se atualizaron correctamente.
                  </div>';
            }
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

}
?>