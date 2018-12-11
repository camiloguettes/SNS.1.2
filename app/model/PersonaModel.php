<?php
class PersonaModel{
    
    private $db;

    public function __construct(){
        $this->db = new Base();
    }

    public function ingresarModel($datos)
    {

        try{
            $this->db->query("SELECT * FROM persona
            inner join rol on persona.documento=rol.fk_documento WHERE documento=?");
            $this->db->bind(1,$datos["documento"]);          
            $this->db->execute();
            $resultado=$this->db->registro();
            return $resultado;
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }
    public function rol($doc)
       {
           try{
               $this->db->query("SELECT fk_tipo_rol FROM rol WHERE fk_documento=?");
               $this->db->bind(1,$doc);          
               $this->db->execute();
                $resultado=$this->db->registro();
                return $resultado;
           }catch(PDOException $e){
               die($e->getMessage());
        }
    }

    public function registrarModel($datos)
    {
        try{
            $sql2="INSERT INTO persona(documento, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, correo, contrasena, fk_tipo_documento) VALUES (?,?,?,?,?,?,?,?)";
            $this->db->query($sql2);
            $this->db->bind(1,$datos["documento"]);
            $this->db->bind(2,$datos["primer_nombre"]);
            $this->db->bind(3,$datos["segundo_nombre"]);
            $this->db->bind(4,$datos["primer_apellido"]);
            $this->db->bind(5,$datos["segundo_apellido"]);
            $this->db->bind(6,$datos["correo"]);
            $this->db->bind(7,$datos["contrasena"]);
            $this->db->bind(8,$datos["fk_tipo_documento"]);
                if($this->db->execute()){
                    $sql3="INSERT INTO rol(fk_tipo_rol, fk_documento) VALUES ('4',?)";
                    $this->db->query($sql3);
                    $this->db->bind(1,$datos["documento"]);
                    if($this->db->execute()){
                        return '<div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>Exito!</strong> El usuario se ha registrado correctamente. Ingresa desde el inicio.
                                </div>';
                    }else{
                       return ' <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>Atención!</strong> El usuario no se ha registrado correctamente.
                                </div>';
                    }
                }else{
                    return ' <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>Atención!</strong> El usuario no se ha registrado correctamente.
                                </div>';
                }
        }catch(PDOException $e){
            die($e->getMessage());
        } 
    }

    public function cambiarContraModel($datos)
    {
        try{
            $this->db->query("UPDATE persona SET contrasena=? WHERE documento=?");
            $this->db->bind(1,$datos["contrasena"]);
            $this->db->bind(2,$datos["documento"]);
            if ($this->db->execute()) {
                return '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Exito!</strong> La contraseña se ha actualizado.
                  </div>';
            }else{
                return '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Atención!</strong> La contraseña no se ha actualizado.
                  </div>';
            }
            
        }catch(PDOException $e){
            die($e->getMessage());
        } 
    }

    public function consultaraprendicesModel()
    {
        try{
            $this->db->query(
            "SELECT * FROM persona
            INNER join tipo_documento 
            on persona.fk_tipo_documento=tipo_documento.id_tipo_documento 
            where fk_estado=3
            ");
            $this->db->execute();
            $resultado=$this->db->registros();
            return $resultado;
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function consultarUsuariosModel()
    {
        try{
            $this->db->query(
            "SELECT * FROM persona
            INNER join tipo_documento 
            on persona.fk_tipo_documento=tipo_documento.id_tipo_documento 
            where fk_estado=1
            ");
            $this->db->execute();
            $resultado=$this->db->registros();
            return $resultado;
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function consultaraprendizModel($documento)
    {
        try{
            $this->db->query(
            "SELECT * FROM persona
            INNER join tipo_documento 
            on persona.fk_tipo_documento=tipo_documento.id_tipo_documento 
            where fk_estado=3 AND documento=?
            ");
            $this->db->bind(1,$documento);
            $this->db->execute();
            $resultado=$this->db->registro();
            return $resultado;
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function consultarUsuarioModel($documento)
    {
        try{
            $this->db->query(
            "SELECT * FROM persona
            INNER join tipo_documento 
            on persona.fk_tipo_documento=tipo_documento.id_tipo_documento 
            where fk_estado=1 AND documento=?
            ");
            $this->db->bind(1,$documento);
            $this->db->execute();
            $resultado=$this->db->registro();
            return $resultado;
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function actualizarAModel($datos)
    {
        try{
            $sql2="UPDATE persona SET primer_nombre=?, segundo_nombre=?, primer_apellido=?, segundo_apellido=? ,correo= ?, fk_ficha=? WHERE documento=?";
            $this->db->query($sql2);
            $this->db->bind(1,$datos["primer_nombre"]);
            $this->db->bind(2,$datos["segundo_nombre"]);
            $this->db->bind(3,$datos["primer_apellido"]);
            $this->db->bind(4,$datos["segundo_apellido"]);
            $this->db->bind(5,$datos["email"]);
            $this->db->bind(6,$datos["ficha"]);
            $this->db->bind(7,$datos["documento"]);
                if($this->db->execute()){
                        return '<div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>Exito!</strong> La actualizacion de datos se ha realizado.
                                </div>';
                }else{
                    return ' <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>Atención!</strong>La actualizacion de datos no se ha realizado.
                                </div>';
                }
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function actualizarUModel($datos)
    {
        try{
            $sql2="UPDATE persona SET primer_nombre=?, segundo_nombre=?, primer_apellido=?, segundo_apellido=? ,correo= ? WHERE documento=?";
            $this->db->query($sql2);
            $this->db->bind(1,$datos["primer_nombre"]);
            $this->db->bind(2,$datos["segundo_nombre"]);
            $this->db->bind(3,$datos["primer_apellido"]);
            $this->db->bind(4,$datos["segundo_apellido"]);
            $this->db->bind(5,$datos["email"]);
            $this->db->bind(6,$datos["documento"]);
                if($this->db->execute()){
                        return '<div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>Exito!</strong> La actualizacion de datos se ha realizado.
                                </div>';
                }else{
                    return ' <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>Atención!</strong>La actualizacion de datos no se ha realizado.
                                </div>';
                }
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function regAprendizModel($datos)
    {
        try{

            $sql3="INSERT INTO `permiso`(`id_documento`) VALUES (?)";
            $this->db->query($sql3);
            $this->db->bind(1,$datos["documento"]);
            if($this->db->execute()){
            
                $sql="INSERT INTO persona
                (documento, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, correo,fk_estado,fk_ficha, fk_tipo_documento) 
                VALUES (?,?,?,?,?,?,?,?,?)";
                $this->db->query($sql);
                $this->db->bind(1,$datos["documento"]);
                $this->db->bind(2,$datos["primer_nombre"]);
                $this->db->bind(3,$datos["segundo_nombre"]);
                $this->db->bind(4,$datos["primer_apellido"]);
                $this->db->bind(5,$datos["segundo_apellido"]);
                $this->db->bind(6,$datos["correo"]);
                $this->db->bind(7,$datos["estado"]);
                $this->db->bind(8,$datos["ficha"]);
                $this->db->bind(9,$datos["tipo_documento"]);
                    if($this->db->execute()){
                        return '<div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>Exito!</strong> El aprendiz se ha registrado correctamente. 
                            </div>';

                    }else{
                        return ' <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>Atención!</strong> El aprendiz no se ha registrado correctamente.
                            </div>';
                    }
            }else {
                 return ' <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>Atención!</strong> El aprendiz no se ha registrado correctamente.
                            </div>';
            }
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

}
?>