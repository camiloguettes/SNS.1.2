<?php
    class NovedadModel {

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

    public function all(){
        try{
            $this->db->query(
            "SELECT id_tipo_novedad, tipo_novedad  FROM tipo_novedad
            ");
            $this->db->execute();
            $resultado=$this->db->registros();
            return $resultado;
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function consultarModel(){
        try{
            $this->db->query(
            "SELECT * FROM novedad as n LEFT JOIN competencias AS c ON n.competencia=c.id_competencia
            ");
            $this->db->execute();
            $resultado=$this->db->registros();
            return $resultado;
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function PDFdesercionModel($id){
        try{
            $this->db->query(
            "SELECT * FROM novedad as n 
            LEFT JOIN competencias AS c ON n.competencia=c.id_competencia
            INNER join persona AS p on n.fk_documento=p.documento 
            INNER JOIN ficha AS f on p.fk_ficha=f.codigo_ficha 
            INNER JOIN programas_formacion As pf on f.fk_programa_formacion=pf.id_programa_formacion 
            INNER JOIN jornada AS j on f.fk_jornada=j.id_jornadas
            INNER JOIN sede AS s on f.fk_sede= s.id_sede
            INNER join tipo_documento AS td on p.fk_tipo_documento = td.id_tipo_documento
            WHERE id_novedad=?
            ");
            $this->db->bind(1,$id);
            $this->db->execute();
            $resultado=$this->db->registro();
            return $resultado;
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function registrarNovModel($datos){
        try{
            $this->db->query("INSERT INTO `novedad` 
            ( `fecha_inicio`, `motivo`, `comentarios`, `recomendaciones`, `evidencias`,  `fk_tipo_novedad`, `fk_documento`,  `responsable`) 
            VALUES (?, ?, ?, ?, ?,?, ?, ?);");
            $this->db->bind(1,$datos["fecha"]);
            $this->db->bind(2,$datos["motivo"]);
            $this->db->bind(3,$datos["comentarios"]);
            $this->db->bind(4,$datos["recomendaciones"]);
            $this->db->bind(5,$datos["evidencias"]);
            $this->db->bind(6,$datos["novedad"]);
            $this->db->bind(7,$datos["documento"]);
            $this->db->bind(8,$datos["responsable"]);
            
            if($this->db->execute()){
                return '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Éxito!</strong> la novedad se ha registrado exitosamente.
                  </div>';
            }else{
                return '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Atención!</strong> No se pudo registrar la novedad.
                  </div>';
            }
            
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function registrarCambioJModel($datos){
        try{
            $this->db->query("INSERT INTO `novedad` 
            ( `fecha_inicio`, `motivo`, `comentarios`, `recomendaciones`, `evidencias`,  `fk_tipo_novedad`, `fk_documento`,nueva_jornada,  `responsable`) 
            VALUES (?, ?, ?, ?, ?,?, ?,?, ?);");
            $this->db->bind(1,$datos["fecha"]);
            $this->db->bind(2,$datos["motivo"]);
            $this->db->bind(3,$datos["comentarios"]);
            $this->db->bind(4,$datos["recomendaciones"]);
            $this->db->bind(5,$datos["evidencias"]);
            $this->db->bind(6,$datos["novedad"]);
            $this->db->bind(7,$datos["documento"]);
            $this->db->bind(8,$datos["nuevajornada"]);
            $this->db->bind(9,$datos["responsable"]);
            
            if($this->db->execute()){
                return '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Éxito!</strong> la novedad se ha registrado exitosamente.
                  </div>';
            }else{
                return '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Atención!</strong> No se pudo registrar la novedad.
                  </div>';
            }
            
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function registarrfModel($datos){
        try{
            $this->db->query("INSERT INTO `novedad` 
            ( `fecha_inicio`, `motivo`, `comentarios`, `recomendaciones`, `evidencias`,  `fk_tipo_novedad`, `fk_documento`,nueva_ficha,  `responsable`) 
            VALUES (?, ?, ?, ?, ?,?, ?,?, ?);");
            $this->db->bind(1,$datos["fecha"]);
            $this->db->bind(2,$datos["motivo"]);
            $this->db->bind(3,$datos["comentarios"]);
            $this->db->bind(4,$datos["recomendaciones"]);
            $this->db->bind(5,$datos["evidencias"]);
            $this->db->bind(6,$datos["novedad"]);
            $this->db->bind(7,$datos["documento"]);
            $this->db->bind(8,$datos["nuevaficha"]);
            $this->db->bind(9,$datos["responsable"]);
            
            if($this->db->execute()){
                return '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Éxito!</strong> la novedad se ha registrado exitosamente.
                  </div>';
            }else{
                return '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Atención!</strong> No se pudo registrar la novedad.
                  </div>';
            }
            
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function regDesercionModel($datos){
        try{
            $this->db->query("INSERT INTO `novedad`( `fecha_inicio`, `motivo`, `comentarios`, `fecha_desercion`, `telefono`, `direccion`, `competencia`, `fk_tipo_novedad`, `fk_documento`, `responsable`) 
            VALUES (?,?,?,?,?,?,?,?,?,?)");
            $this->db->bind(1,$datos["fecha"]);
            $this->db->bind(2,$datos["causa"]);
            $this->db->bind(3,$datos["comentarios"]);
            $this->db->bind(4,$datos["fecha_desercion"]);
            $this->db->bind(5,$datos["telefono"]);
            $this->db->bind(6,$datos["direccion"]);
            $this->db->bind(7,$datos["competencia"]);
            $this->db->bind(8,$datos["fk_tipo_novedad"]);
            $this->db->bind(9,$datos["documento"]);
            $this->db->bind(10,$datos["responsable"]);
            
            if($this->db->execute()){
                return '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Éxito!</strong> la novedad se ha registrado exitosamente.
                  </div>';
            }else{
                return '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Atención!</strong> No se pudo registrar la novedad.
                  </div>';
            }
            
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function PDFAplazamientoModel($id){
        try{
            $this->db->query(
            "SELECT *        FROM novedad AS n
            INNER join persona AS p on n.fk_documento=p.documento 
            INNER JOIN ficha AS f on p.fk_ficha=f.codigo_ficha 
            INNER JOIN programas_formacion As pf on f.fk_programa_formacion=pf.id_programa_formacion 
            INNER JOIN jornada AS j on f.fk_jornada=j.id_jornadas
            INNER JOIN sede AS s on f.fk_sede= s.id_sede
            INNER join tipo_documento AS td on p.fk_tipo_documento = td.id_tipo_documento
            WHERE id_novedad=?
            ");
            $this->db->bind(1,$id);
            $this->db->execute();
            $resultado=$this->db->registro();
            return $resultado;
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }
}
    
?>