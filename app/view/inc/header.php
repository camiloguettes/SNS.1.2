<!DOCTYPE html>
<html>
<?php
ob_start();
?>
<head>
	<!-- <meta charset="UTF-8"> -->
	<title><?php echo NOMBRESITIO?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Kodchasan" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL; ?>/css/estilos.css">
	<link rel="icon" type="image/png" href="<?php echo RUTA_URL; ?>/img/imagen1.png">

	<!-- alert -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.31.1/dist/sweetalert2.all.min.js"></script>
</head>
<body><?php
	session_start();
	if(!isset($_SESSION["rol"])){
 	 	require RUTA_APP.'/view/paginas/cuerpo/nav1.php';
	  }
	?>

