<?php //Si esta logeado y es el administrador hacer..
   if (isset($_SESSION['id']) && $_SESSION['id']=='38808595') { ?>
   
<div class="content-wrapper">
     
  <section class="content">
        
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Usuarios  
              
              <?php //Numero contador de usuarios                
                $count=mysqli_query($link,"SELECT COUNT(*) AS xusuarios FROM usuarios WHERE condicion=1");

                $row=mysqli_fetch_array($count);                

                if ( $row['xusuarios'] >=1){
                echo '<small class="label pull-right bg-green">'.$row['xusuarios'].'</small>';}
              ?>

            </h3>

            <?php if (isset($_GET['deleted'])) {

                echo '<div class="alert alert-info" style="width:70%; padding-top: 0px; padding-bottom: 0px;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><h5>
                <span class="glyphicon glyphicon-ok"></span>
                  El usuario se eliminó con éxito.</h5>
               </div>';
            } 
            elseif(isset($_GET['successful'])){

              echo '<div class="alert alert-info" style="width:70%; padding-top: 0px; padding-bottom: 0px;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><h5>
                <span class="glyphicon glyphicon-ok"></span>
                  El usuario se agregó con éxito.</h5>
               </div>';

              }?>

            <div class="box-tools pull-right box-title">
              <a href="index.php?id=admin/users/newuser.php">
                <button class="btn btn-default"> <span class="glyphicon glyphicon-user"></span><btn class='descarto3'> Crear Usuario</btn></button>
              </a>
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>          
            </div>
          </div>
          

          <div class="box-body ">             
            <div class="row">
              <div class="col-md-12 col-xs-12">


              <?php 

              $users=mysqli_query($link,"SELECT * FROM usuarios where condicion=1");

                   $hayuser=mysqli_fetch_array($users);

                    if($hayuser!=''){

              $usuarios=mysqli_query($link,"SELECT * FROM usuarios WHERE condicion=1");?>

                <table class='table table-hover rwd_auto'>
                  <thead>
                    <tr><th>DNI</th><th class="descarto3">Nombre</th><th class='descarto3'>Apellido</th><th class="descarto1">Email</th><th class="descarto1">Telefono</th><th class="descarto1">Localidad</th><th>Usuario</th><th class="descarto3">Estado</th><th>Acciones</th></tr>
                  </thead>
                  <tbody>
                  
                    <?php while (($write=mysqli_fetch_array($usuarios)))
                          {

                        echo "<tr>"."<td>".$write['dni']."</td>"."<td class='descarto3'>".$write['nombre']."</td>"."<td class='descarto3'>".$write['apellido']."</td>"."<td class='descarto1'>".$write['email']."</td>".
                          

                          "<td class='descarto1'>"?><?php if($write['telefono']==''){ echo '-';}else{ $write['telefono'];}?>
                          <td class='descarto1'><?php if($write['localidad']==''){ echo '-';}else{ $write['localidad'];}?>

                          </td><td><a title="Ver usuario" href="index.php?id=user/profile.php&dni=<?php echo $write['dni']?>">@<?php echo $write['usuario']."</td>".


                          "<td class='descarto3'>".$write['estado']."</td>
                          <td><a href='admin/deletes.php?deleteuser=true&dni=".$write['dni']."' title='Eliminar'><button class='btn btn-danger' type='button'>
                          <span class='glyphicon glyphicon-trash'></span></button></a>

                          <a href='#' title='Enviale un mensaje a ".$write['nombre'].".'><button class='btn btn-info' type='button'><span class='glyphicon glyphicon-envelope'></span></button></a>

                          </td></tr>";
                         }?>

                  </tbody>
                </table>

                <?php } else{ ?>

                <div class="alert alert-info col-md-6 col-sm-7" role="alert" style="margin-top:20px;">
                  <span class="glyphicon glyphicon-exclamation-sign">
                  </span><strong> Aún no dispones de usuarios.</strong>  
                </div>
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