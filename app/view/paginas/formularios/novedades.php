<?php
    include RUTA_APP.'/view/paginas/cuerpo/navs.php';
    $a=0;
    $c=0;
    $r=0;
    $re=0;
    $d=0;
    $t=0;
    $cont=0;
    foreach ($datos["novedades"] as $k) {
        switch ($k->fk_tipo_novedad) {
            case 1:
                $a+=1;
                break;
            case 2:
                $c+=1;
                break;
            case 3:
                $d+=1;
                break;
            case 4:
                $r+=1;
                break;
            case 5:
                $re+=1;
                break;
            case 6:
                $t+=1;
                break;
        }
    }
?>
<div id="main">
	<div class="container">
		<div class="titulo">
        <div class="row">
            <div class="col-sm-6">
              Novedades
            </div>
            <div class="col-sm-6">
              <div class="form-group pull-right buscador">
              <input type="text" class="formu search " placeholder="Digite el documento del aprendiz">
            </div>
            </div>    
          </div>
        </div>	
		<div class="row">
			<div class="col-md-4">
			<table class="table ">
			  <thead class="thead-dark ">
			    <tr>
			      <th scope="col" colspan="3"><center>Elija Novedad</th>
			    </tr>
			  </thead>
			  <tbody>
              <tr>
                <?php
                foreach ($datos["novedadesd"] as $novedad) {
                    echo'
                    <td>
                    <p class="nov" id="'.$this->mostrar($novedad->id_tipo_novedad).'">'.$this->mostrar($novedad->tipo_novedad).'</p>
                    </td>
                    <td>';
                    switch ($novedad->id_tipo_novedad) {
                        case 1:
                            echo $a;
                            break;
                        case 2:
                            echo $c;
                            break;
                        case 3:
                            echo $d;
                            break;
                        case 4:
                            echo $r;
                            break;
                        case 5:
                            echo $re;
                            break;
                        case 6:
                            echo $t;
                            break;
                    }
                    echo '<td></tr>';
                }
                ?>
			  </tbody>
			</table>	
			</div>
		<div class="col-md-8">
            <div id="pai">
                <div id="1">


                <div class="table-responsive-md">
            <table class="table-responsive table table-striped results ">
                <thead class="">
                    <tr>
                    <th scope="col">fecha</th>
                    <th scope="col">motivo</th>
                    <th scope="col">comentarios</th>
                    <th scope="col">recomendaciones</th>
                    <th scope="col">evidencias</th>
                    <th scope="col">documento apendiz</th>
                    <th scope="col">responsable</th>
                    <th class="col">PDF</th>
                    </tr>
                    <tr class="warning no-result">
                  <td colspan="6"><i class="fa fa-warning"></i> No se encuentran registros</td>
                </tr> 
                </thead>
                <tbody>
                <tr><?php 
                // var_dump($datos["novedades"]);
                       foreach ($datos["novedades"] as $dato) {
                            if ($dato->fk_tipo_novedad==1) {
                                echo'
                                <td>'.$this->mostrar($dato->fecha_inicio).'</td>
                                <td>'.$this->mostrar($dato->motivo).'</td>
                                <td>'.$this->mostrar($dato->comentarios).'</td>
                                <td>'.$this->mostrar($dato->recomendaciones).'</td>
                                <td>'.$this->mostrar($dato->evidencias).'</td>
                                <td>'.$this->mostrar($dato->fk_documento).'</td>
                                <td>'.$this->mostrar($dato->responsable).'</td>
                                <td><a href="'.RUTA_URL.'/novedad/PDFAplazamiento/'.$this->mostrar($dato->id_novedad).'">Ver Pdf</a></td>
                                </tr>                            
                                ';
                            }
                       } 
                       if ($a==0) {
                        echo'<td colspan="8"><div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Atención!</strong>No existen novedades.
                          </div></td>
                        </tr>';
                        }
                      ?>
                    
                </tbody>
            </table>   
            </div> 


                </div>
                <div id="2">
                <div class="table-responsive-md">
            <table class="table-responsive table table-striped results ">
                <thead class="">
                    <tr>
                    <th scope="col">fecha</th>
                    <th scope="col">motivo</th>
                    <th scope="col">comentarios</th>
                    <th scope="col">recomendaciones</th>
                    <th scope="col">evidencias</th>
                    <th scope="col">documento apendiz</th>
                    <th scope="col">responsable</th>
                    <th scope="col">nueva jornada</th>
                    <th class="col">PDF</th>
                    </tr>
                    <tr class="warning no-result">
                  <td colspan="6"><i class="fa fa-warning"></i> No se encuentran registros</td>
                </tr> 
                </thead>
                <tbody>
                <tr><?php 
                // var_dump($datos["novedades"]);
                       foreach ($datos["novedades"] as $dato) {
                            if ($dato->fk_tipo_novedad==2) {
                                echo'
                                <td>'.$this->mostrar($dato->fecha_inicio).'</td>
                                <td>'.$this->mostrar($dato->motivo).'</td>
                                <td>'.$this->mostrar($dato->comentarios).'</td>
                                <td>'.$this->mostrar($dato->recomendaciones).'</td>
                                <td>'.$this->mostrar($dato->evidencias).'</td>
                                <td>'.$this->mostrar($dato->fk_documento).'</td>
                                <td>'.$this->mostrar($dato->responsable).'</td>
                                <td>'.$this->mostrar($dato->nueva_jornada).'</td>
                                <td><a href="'.RUTA_URL.'/novedad/PDFcambioJ/'.$this->mostrar($dato->id_novedad).'">Ver Pdf</a></td>
                                </tr>                            
                                ';
                            }
                            
                       } 
                       if ($c==0) {
                        echo'<td colspan="9"><div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Atención!</strong>No existen novedades.
                          </div></td>
                        </tr>';
                        }
                      ?>
                    
                </tbody>
            </table>   
            </div>
                </div>
                <div id="3">
                        
                <div class="table-responsive-md">
            <table class="table-responsive table table-striped results ">
                <thead class="">
                    <tr>
                    <th scope="col">fecha</th>
                    <th scope="col">Causa</th>
                    <th scope="col">competencia</th>
                    <th scope="col">fecha desercion</th>
                    <th scope="col">telefono</th>
                    <th scope="col">direccion</th>
                    <th scope="col">documento apendiz</th>
                    <th scope="col">responsable</th>
                    <th scope="col">PDF</th>
                    </tr>
                    <tr class="warning no-result">
                  <td colspan="6"><i class="fa fa-warning"></i> No se encuentran registros</td>
                </tr> 
                </thead>
                <tbody>
                <tr><?php 
                // var_dump($datos["novedades"]);
                       foreach ($datos["novedades"] as $dato) {
                            if ($dato->fk_tipo_novedad==3) {
                                echo'
                                <td>'.$this->mostrar($dato->fecha_inicio).'</td>
                                <td>'.$this->mostrar($dato->motivo).'</td>
                                <td>'.$this->mostrar($dato->competencia).'</td>
                                <td>'.$this->mostrar($dato->fecha_desercion).'</td>
                                <td>'.$this->mostrar($dato->telefono).'</td>
                                <td>'.$this->mostrar($dato->direccion).'</td>
                                <td>'.$this->mostrar($dato->fk_documento).'</td>
                                <td>'.$this->mostrar($dato->responsable).'</td>
                                <td><a href="'.RUTA_URL.'/novedad/PDFdesercion/'.$this->mostrar($dato->id_novedad).'">Ver Pdf</a></td>
                                </tr>                            
                                ';
                            }
                       } 
                       if ($d==0) {
                        echo'<td colspan="8"><div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Atención!</strong>No existen novedades.
                          </div></td>
                        </tr>';
                        }
                      ?>
                    
                </tbody>
            </table>   
            </div>
                </div>
                <div id="4">
                <div class="table-responsive-md">
            <table class="table-responsive table table-striped results ">
                <thead class="">
                    <tr>
                    <th scope="col">fecha</th>
                    <th scope="col">motivo</th>
                    <th scope="col">comentarios</th>
                    <th scope="col">recomendaciones</th>
                    <th scope="col">evidencias</th>
                    <th scope="col">documento apendiz</th>
                    <th scope="col">responsable</th>
                    <th scope="col">nueva ficha</th>
                    <th class="col">PDF</th>
                    </tr>
                    <tr class="warning no-result">
                  <td colspan="6"><i class="fa fa-warning"></i> No se encuentran registros</td>
                </tr> 
                </thead>
                <tbody>
                <tr><?php 
                // var_dump($datos["novedades"]);
                       foreach ($datos["novedades"] as $dato) {
                            if ($dato->fk_tipo_novedad==4) {
                                echo'
                                <td>'.$this->mostrar($dato->fecha_inicio).'</td>
                                <td>'.$this->mostrar($dato->motivo).'</td>
                                <td>'.$this->mostrar($dato->comentarios).'</td>
                                <td>'.$this->mostrar($dato->recomendaciones).'</td>
                                <td>'.$this->mostrar($dato->evidencias).'</td>
                                <td>'.$this->mostrar($dato->fk_documento).'</td>
                                <td>'.$this->mostrar($dato->responsable).'</td>
                                <td>'.$this->mostrar($dato->nueva_ficha).'</td>
                                <td><a href="'.RUTA_URL.'/novedad/PDFreintegro/'.$this->mostrar($dato->id_novedad).'">Ver Pdf</a></td>
                                </tr>                            
                                ';
                            }
                       } 
                       if ($r==0) {
                        echo'<td colspan="8"><div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Atención!</strong>No existen novedades.
                          </div></td>
                        </tr>';
                        }
                      ?>
                    
                </tbody>
            </table>   
            </div>
                </div>
                <div id="5">
                <div class="table-responsive-md">
            <table class="table-responsive table table-striped results ">
                <thead class="">
                    <tr>
                    <th scope="col">fecha</th>
                    <th scope="col">motivo</th>
                    <th scope="col">comentarios</th>
                    <th scope="col">recomendaciones</th>
                    <th scope="col">evidencias</th>
                    <th scope="col">documento apendiz</th>
                    <th scope="col">responsable</th>
                    <th class="col">PDF</th>
                    </tr>
                    <tr class="warning no-result">
                  <td colspan="6"><i class="fa fa-warning"></i> No se encuentran registros</td>
                </tr> 
                </thead>
                <tbody>
                <tr><?php 
                // var_dump($datos["novedades"]);
                       foreach ($datos["novedades"] as $dato) {
                            if ($dato->fk_tipo_novedad==5) {
                                echo'
                                <td>'.$this->mostrar($dato->fecha_inicio).'</td>
                                <td>'.$this->mostrar($dato->motivo).'</td>
                                <td>'.$this->mostrar($dato->comentarios).'</td>
                                <td>'.$this->mostrar($dato->recomendaciones).'</td>
                                <td>'.$this->mostrar($dato->evidencias).'</td>
                                <td>'.$this->mostrar($dato->fk_documento).'</td>
                                <td>'.$this->mostrar($dato->responsable).'</td>
                                <td><a href="'.RUTA_URL.'/novedad/PDFRetiroVoluntario/'.$this->mostrar($dato->id_novedad).'">Ver Pdf</a></td>
                                </tr>                            
                                ';
                            }
                       } 
                       if ($re==0) {
                        echo'<td colspan="8"><div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Atención!</strong>No existen novedades.
                          </div></td>
                        </tr>';
                        }
                      ?>
                    
                </tbody>
            </table>   
            </div> 
                </div>
                <div id="6">
                <div class="table-responsive-md">
            <table class="table-responsive table table-striped results ">
                <thead class="">
                    <tr>
                    <th scope="col">fecha</th>
                    <th scope="col">motivo</th>
                    <th scope="col">comentarios</th>
                    <th scope="col">recomendaciones</th>
                    <th scope="col">evidencias</th>
                    <th scope="col">documento apendiz</th>
                    <th scope="col">responsable</th>
                    <th scope="col">nueva ficha</th>
                    <th scope="col">PDF</th>
                    </tr>
                    <tr class="warning no-result">
                  <td colspan="6"><i class="fa fa-warning"></i> No se encuentran registros</td>
                </tr> 
                </thead>
                <tbody>
                <tr><?php 
                // var_dump($datos["novedades"]);
                       foreach ($datos["novedades"] as $dato) {
                            if ($dato->fk_tipo_novedad==6) {
                                echo'
                                <td>'.$this->mostrar($dato->fecha_inicio).'</td>
                                <td>'.$this->mostrar($dato->motivo).'</td>
                                <td>'.$this->mostrar($dato->comentarios).'</td>
                                <td>'.$this->mostrar($dato->recomendaciones).'</td>
                                <td>'.$this->mostrar($dato->evidencias).'</td>
                                <td>'.$this->mostrar($dato->fk_documento).'</td>
                                <td>'.$this->mostrar($dato->responsable).'</td>
                                <td>'.$this->mostrar($dato->nueva_ficha).'</td>
                                <td><a href="'.RUTA_URL.'/novedad/PDFTraslado/'.$this->mostrar($dato->id_novedad).'">Ver Pdf</a></td>
                                </tr>                            
                                ';
                            }
                       } 
                       if ($t==0) {
                        echo'<td colspan="8"><div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Atención!</strong>No existen novedades.
                          </div></td>
                        </tr>';
                        }
                      ?>
                    
                </tbody>
            </table>   
            </div>
                </div>
            </div>
		</div>


		</div>

	</div>
</div>
<script type="text/javascript" src="<?php echo RUTA_URL; ?>/js/ver_novedades.js"></script>
