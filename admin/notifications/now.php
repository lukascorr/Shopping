<?php //Si esta logeado y es el administrador hacer..
   if (isset($_SESSION['user']) && $_SESSION['user']=='admin') { ?>

<div class="content-wrapper">
     
  <section class="content">
        
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">

            <!--Tabs-->
            <ul class="nav nav-tabs">
              <li role="presentation" class="active"><a href="#">Notificaciones 
                <?php 
                $count=mysqli_query($link,"SELECT COUNT(*) as xnotific FROM notifications where condicion=1");

                $row=mysqli_fetch_array($count);
            
                    if ($row['xnotific']>=1){ echo '<small class="label pull-right bg-red">'.$row['xnotific'].'</small>';}?>

                </a>
              </li>
              <li role="presentation"><a href="index.php?id=admin/notifications/all.php">Ver todas</a></li>
            </ul>

            <div class="box-tools pull-right box-title">

              <?php if($row['xnotific']>0){?>
              <a href="admin/deletes.php?deletenotifications=true">
              <button class="btn btn-default"> <span class='fa fa-trash'></span><btn class='descarto3'> Eliminar</btn></button>
              </a><? } ?>
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
            </div>
          </div>
          

          <div class="box-body ">             
            <div class="row">
              <div class="col-md-12 col-xs-12">


                <?php 
                $notificaciones=mysqli_query($link,"SELECT * FROM notifications where condicion=1");

                   $haynotific=mysqli_fetch_array($notificaciones);
        

                    if($haynotific!=''){?>
                      <div class='list-group menu-notificaciones'>
                <table class='table table-striped rwd_auto'>
                  <thead>
                    <tr><th>DNI</th><th>Nombre</th><th>Apellido</th><th class='descarto3 descarto2'>Email</th><th class='descarto3'>Tipo</th><th>Acciones</th></tr>
                  </thead>
                  <tbody>
                  
                    <?php  $sihay=mysqli_query($link,"SELECT * FROM notifications where condicion=1");

                        while ($write=mysqli_fetch_array($sihay))

                      {   
                        echo "<tr>"."<td>".$write['dni']."</td>"."<td>".$write['nombre']."</td>"."<td>".$write['apellido']."</td>"."<td class='descarto3 descarto2'>".$write['email']."</td>"?>

                          </td><td class='descarto3'><?php echo $write['tipo']."</td>"?><?php if($write['mensaje']!=''){ echo        "<td><a href='admin/notifications/read.php?notifications=true&dni=".$write['dni']."' target='frame-mensaje' title='".$write['nombre']." "."te ha enviado un mensaje.'>

                          <button class='btn bg-green-gradient' type='button'><span class='badge'>1</span> <span class='fa fa-envelope'></span><btn class='descarto2 descarto3'> Mensaje</btn></button></a>";} 

                          if($write['dni']!=0){ echo "<a href='#' title='Agregar usuario'>
                          <button class='btn btn-primary' type='button'><span class='fa fa-check'><span class='fa fa-user'></span></span></button></a>";}?>
                          </td></tr>
                       <?php } ?>

                  </tbody>
                </table>
</div>
                <ul class="nav nav-tabs" style="margin-top:-40px;">
                  <li role="presentation" class="active"><a href="#">Mensaje</a>
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
