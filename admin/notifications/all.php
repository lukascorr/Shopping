<?php //Si esta logeado y es el administrador hacer..
   if (isset($_SESSION['id']) && $_SESSION['id']=='38808595') { ?>
   
<div class="content-wrapper">
     
  <section class="content">
        
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
<!--Tabs-->
            <ul class="nav nav-tabs">
              <li role="presentation"><a href="index.php?id=admin/notifications/now.php">Notificaciones 
                </a>
              </li>
              <li role="presentation" class="active"><a href="#">Todas</a></li>
            </ul>

          <div class="box-tools pull-right box-title">
            </a>
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
          </div>
        </div>
          

        <div class="box-body ">             
          <div class="row">
            <div class="col-md-12 col-xs-12">


              <?php 
                 $not=mysqli_query($link,"SELECT * FROM notifications");

                   $notvacia=mysqli_fetch_array($not);
        

                    if($notvacia!=''){?>

                      <div class='list-group menu-notificaciones'>
                  
                    <?php  $usuarios=mysqli_query($link,"SELECT * FROM notifications ORDER BY fecha DESC");

                        while ($write=mysqli_fetch_array($usuarios))

                      {       
                        echo "<p class='list-group-item noti-body'><b>".$write['nombre'].' '.$write['apellido'].' '."</b>solicitó una cuenta de usuario."?>

                            <?php if($write['mensaje']!=''){ echo "<a href='admin/notifications/read.php?notifications=true&dni=".$write['dni']."' target='frame-mensaje'>

                            <button class='btn bg-green-gradient pull-right' type='button' style='margin-top:-4px; padding: 3px 5px 3px 5px; display:block;'>
                              <span class='badge'>1</span> <span class='fa fa-envelope'></span>
                              <btn class='descarto3'> Mensaje</btn>
                            </button></a>"."<p>";}
                        } ?>

                </div>

                <ul class="nav nav-tabs" style="margin-top:-40px;">
              <li role="presentation" class="active"><a href="#"> Mensaje</a>
              </li>
              </ul>

              <iframe name="frame-mensaje" style='width: 100%;border: 0;' scrolling="yes"></iframe>

              

                <?php } else { ?>

                    <h5><span class="fa fa-ok-sign"></span> 
                    <strong> No hay notificaciones.</strong></h5>

                    <?php } ?>

              </div>
            </div>               
  		    </div>
       	</div>
      </div>
    </div>
  </section>
</div>

<!-- Si no esta logeado NO MOSTRAR! -->
<?php } else { echo '<meta http-equiv="refresh" content="0; url=./">'; } ?>