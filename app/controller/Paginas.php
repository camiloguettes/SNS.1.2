<?php

class Paginas extends Control{

	public function __construct(){
		$this->usuarioModelo = $this->modelar('Usuario');	
	}
	public function index(){
		//obtener los usuarios
		$usuarios = $this->usuarioModelo->obtenerUsuario();
		$datos= ['usuarios' => $usuarios];

		$this->cargarvista('paginas/inicio',$datos);
	}
	public function agregar(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$datos = [
			'tipo_documento' => trim($_POST['tipo_documento']),
			'documento' => trim($_POST['documento']),
			'primer_nombre' => trim($_POST['primer_nombre']),
			'segundo_nombre' => trim($_POST['segundo_nombre']),
			'primer_apellido' => trim($_POST['primer_apellido']),
			'segundo_apellido' => trim($_POST['segundo_apellido']),
			'correo' => trim($_POST['correo']),
			'contrasena' => trim($_POST['contrasena'])
		];
		if($this->usuarioModelo->agregarUsuario($datos)){
			redireccionar('/paginas');
		}
		else{
			die('Algo salio mal');
		}
		}
		else{
			$datos = [
				'tipo_documento' => '',
				'documento' => '',
				'primer_nombre' => '',
				'segundo_nombre' => '',
				'primer_apellido' => '',
				'segundo_apellido' => '',
				'correo' => '',
				'contrasena' => ''];

				$this->cargarvista('paginas/agregar', $datos);
		}
	}
	public function editar($id){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$datos = [
			'id_usuario' => $id,
			'tipo_documento' => trim($_POST['tipo_documento']),
			'documento' => trim($_POST['documento']),
			'primer_nombre' => trim($_POST['primer_nombre']),
			'segundo_nombre' => trim($_POST['segundo_nombre']),
			'primer_apellido' => trim($_POST['primer_apellido']),
			'segundo_apellido' => trim($_POST['segundo_apellido']),
			'correo' => trim($_POST['correo'])
		];
		if($this->usuarioModelo->actualizarUsuario($datos)){
			redireccionar('/paginas');
		}
		else{
			die('Algo salio mal');
		}
		}
		else{

			//obtener informacion desde el modelo
			$usuario = $this->usuarioModelo->obtenerUsuarioId($id);
			$datos = [
				'id_usuario' => $usuario->documento,
				'tipo_documento' => $usuario->tipo_documento,
				'documento' => $usuario->documento,
				'primer_nombre' => $usuario->primer_nombre,
				'segundo_nombre' => $usuario->segundo_nombre,
				'primer_apellido' => $usuario->primer_apellido,
				'segundo_apellido' => $usuario->segundo_apellido,
				'correo' => $usuario->correo
				];

				$this->cargarvista('paginas/editar', $datos);
		}
	}
	public function borrar($id){
		//obtener informacion desde el modelo
			$usuario = $this->usuarioModelo->obtenerUsuarioId($id);
			$datos = [
				'id_usuario' => $usuario->documento,
				'tipo_documento' => $usuario->tipo_documento,
				'documento' => $usuario->documento,
				'primer_nombre' => $usuario->primer_nombre,
				'segundo_nombre' => $usuario->segundo_nombre,
				'primer_apellido' => $usuario->primer_apellido,
				'segundo_apellido' => $usuario->segundo_apellido,
				'correo' => $usuario->correo
				];
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$datos = [
			'id_usuario' => $id
		];
		if($this->usuarioModelo->borrarUsuario($datos)){
			redireccionar('/paginas');
		}
		else{
			die('Algo salio mal');
		}
	}
		$this->cargarvista('paginas/borrar', $datos);
}

}
?>