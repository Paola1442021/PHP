<?php
include "cabecera.php";
include "conexion.php";


?>
<?php
$objConexion=new conexion();
$proyectos=$objConexion->consultar("SELECT * FROM `proyecto`");
?>
<div class="row align-items-md-stretch mt-2">
    <div class="col-md-6">
        <div
            class="h-100 p-5 text-white bg-primary border rounded-3"
        >
            <h2>Bienvenidos</h2>
            <p>
                Este es un portafolio privado
            </p>
            <hr>
            <p >
               Mas informacion
            </p>
        </div>
   
</div>
</div>
<div class="row row-cols-1 row-cols-md-3 g-4 mt-2">

<?php foreach($proyectos as $proyecto){?>
<div class="col">
  <div class="card">
    <img class="card-img-top" alt="..." src="imagenes/<?php echo $proyecto['imagen'];?>" >
    <div class="card-body">
      <h5 class="card-title"><?php echo $proyecto['nombre']?></h5>
      <p class="card-text"><?php echo $proyecto['descripcion']?></p>
    </div>
  </div>
  </div>
  
            <?php }?>
            </div>

<?php
include "pie.php"

?>