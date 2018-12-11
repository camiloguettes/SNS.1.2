<?php
  $this->cargarvista('iniciar',$datos);
?>
<div id="main">
      <div class="container">
        <?php 
            if(isset($_POST["documentoi"])){
              $ingreso = new index();
              $ingreso -> ingresar();
            }
         ?>
        <br>
       <br>
        <div id="slider-home" class="carousel slide slid" data-ride="carousel">
      <div id="de" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="<?php echo RUTA_URL; ?>/img/11.jpg" width="100%" height="450">
            <div class="carousel-caption">

                      <h2>SNS</h2>
                      <img src="<?php echo RUTA_URL; ?>/img/tools.png" height="500" >
                      <p class="h4">Gestiona las novedades de los aprendices </p>
                      <p>desde cualquier sitio</p>
                      <!-- <a href="#" class="btn btn-secondary">ingr</a> -->

                    </div>
          </div>
          <div class="carousel-item">
            <img src="<?php echo RUTA_URL; ?>/img/101.jpg" width="100%" height="450">
            <div class="carousel-caption">

                      <h2>Quienes somos </h2>
                      <img src="<?php echo RUTA_URL; ?>/img/descarga.jpg" height="500" >
                      <br>
                      <br>
                      <p class="h4">Grupo de jovenes que buscan mejorar el control de novedades a traves de un sistema de informacion </p>
                      <p>Analisis y desarrollo de sistemas de informacion</p>
                      <!-- <a href="#" class="btn btn-secondary">ingr</a> -->

                    </div>
          </div>
          <div class="carousel-item">
            <img src="<?php echo RUTA_URL; ?>/img/8.jpg"   width="100%" height="450">
            
          </div>
            
        </div>
        
       
        <a class="carousel-control-prev" href="#de" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#de" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>
      </div>

      </div>
    <br>

    
   
        <br><br>
 </div>
    <br>     
