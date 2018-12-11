<?php
switch ($_SESSION["rol"]) {
    case 1:
	    include RUTA_APP.'/view/paginas/cuerpo/nav3.php';
    break;
    case 2:
	    include RUTA_APP.'/view/paginas/cuerpo/nav3.php';
    break;
    case 3:
	    include RUTA_APP.'/view/paginas/cuerpo/nav2.php';
    break;
    case 4:
	    include RUTA_APP.'/view/paginas/cuerpo/nav4.php';
    break;
    default:
    header('location:'.RUTA_APP);
    break;
}
?>