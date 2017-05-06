
<div class="content-wrapper">
     
  <section class="content">
        
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Categorias</h3>
          <div class="box-tools pull-right box-title">

            <? //Si esta logeado y es el administrador hacer..
            if (isset($_SESSION['id']) && $_SESSION['id']=='38808595') { ?>

            <a href="index.php?id=warehouse/categories/new.php">
              <button class="btn bg-green-gradient"> <span class="fa fa-plus-circle"></span><btn class='descarto3'>  Agrega una Categoria</btn></button>
            </a>
            <? } ?>

            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
          </div>
        </div>
          

        <div class="box-body ">             
          <div class="row">
            <div class="col-md-12 col-xs-12">
              <div class="container-fluid">   
                <?php

                $categories=$link->query("SELECT * FROM categorias");

                $haycategories=$categories->fetch_array(MYSQLI_ASSOC);

                if($haycategories==true){

                  //variables para buscar categorias
                $categorias=$link->query("SELECT * FROM categorias");
               
                 while ($reg=$categorias->fetch_array(MYSQLI_ASSOC))

                  {  ?> 

                  <a href="index.php?id=warehouse/articles/list.php&category=<?php echo $reg['idcategoria'];?>">
                  <div class="col-md-3 col-sm-3 cajitas">

                    <!--imagen -->
                    <img class="profile-user-img" src="<?php echo $reg['imagen'];?>">

                    <!--nombre de producto-->
                    <div class="cajita-text"><?php echo $reg['tipo'];?></div>

                    <!--Descripcion -->
                    <div class="cajita-descripcion"><?php echo $reg['descripcion_cat'];?></div>

                  </div>
                  </a>

                 <?php } } else{ 

                 if (isset($_SESSION['id']) && $_SESSION['id']=='38808595') {?>
                  
                  <div class="alert alert-warning col-md-7 col-sm-8" role="alert" style="margin-top:20px;">
                  <span class="fa fa-exclamation-sign">
                  </span><strong> Atención!</strong> No dispones de Categorias.
                </div>
                
                <?php } else{?>

                  <div class="alert alert-info col-md-7 col-sm-10" role="alert" style="margin-top:20px;">
                  <span class="fa fa-exclamation-sign">
                  </span><strong> Disculpe!</strong> Por el momento, no disponemos categorias.
                </div>

                <?php }  }?>

              </div>
            </div>               
  		    </div>
       	</div>
      </div>
    </div>
  </section>
</div>