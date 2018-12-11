
<nav class="navbar navbar-expand-md navbar-dark fixed-top  " >
 <div class="container">
 
  <a class="navbar-brand" href="#">SNS</a>
  <img src="view/i/imagen1.png" alt="" style="width: 40px">

  <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
    <li class="nav-item">
        <a class="nav-link text-white lead" href="<?php echo RUTA_URL ?>">Inicio</a> 
      <li class="nav-item dropdown">
      <a class="nav-link text-white lead" href="aplazamiento.php" id="navbardrop" data-toggle="dropdown">
        Ficha
      </a>
      <div class="dropdown-menu">
      <a class="dropdown-item text-dark " href="<?php echo RUTA_URL ?>/ficha/ver"> Ver fichas</a>
      <a class="dropdown-item text-dark " href="<?php echo RUTA_URL ?>/ficha/registrar"> Registrar ficha</a>
      <a class="dropdown-item text-dark " href="<?php echo RUTA_URL ?>/competencia/ver">Competencias</a>
      <a class="dropdown-item text-dark " href="<?php echo RUTA_URL ?>/programa/ver">Programa de formación</a>
      <a class="dropdown-item text-dark " href="<?php echo RUTA_URL ?>/sede/ver">Sede</a>
      </div>
    </li>
      <li class="nav-item dropdown">
      <a class="nav-link text-white lead" href="aplazamiento.php" id="navbardrop" data-toggle="dropdown">
        Novedades
      </a>
      <div class="dropdown-menu">
      <a class="dropdown-item text-dark " href="<?php echo RUTA_URL ?>/novedad/registrar"> Registrar Novedad</a>
      <a class="dropdown-item text-dark " href="<?php echo RUTA_URL ?>/novedad/desercion"> Registrar desercion</a>
        <a class="dropdown-item text-dark " href="<?php echo RUTA_URL ?>/novedad/consultar"> Consultar</a>
      </div>
    </li> 
      
      <li class="nav-item dropdown">
          <img data-toggle="dropdown" src="<?php echo RUTA_URL; ?>/img/1.png" alt="logo" style="width: 40px" >
      <div class="dropdown-menu user">
      <div class="titulou">Mi cuenta</div>
      <div class="dropdown-divider"></div>
      <div class="nombre"> <?php echo $this->mostrar($_SESSION["nombre"]); ?> </div>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item but" href="#">Editar perfil</a>
      <a class="dropdown-item but" href="index.php?url=persona/salir">Cerrar sesión</a>
      </div>
    </li>
    

    </ul>

    
     
  </div>  
 </div>
</nav> 