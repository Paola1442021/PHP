<?php include("cabecera.php");?>
<?php include("conexion.php");?>
<?php
if($_POST){

    $nombre=$_POST['nombre'];
    $descripcion=$_POST['descripcion'];
    $fecha=new DateTime();
    $imagen=$fecha->getTimestamp()."_".$_FILES['archivo']['name'];
    
    $imagen_temporal=$_FILES['archivo']['tmp_name'];
    move_uploaded_file($imagen_temporal,"imagenes/".$imagen);

    $objConexion=new conexion();
$sql="INSERT INTO `proyecto` (`id`, `imagen`, `nombre`, `descripcion`) VALUES (NULL,'$imagen','$nombre', '$descripcion')";
$objConexion->ejecutar($sql);
header("location:portafolio.php");
}
if($_GET){
    //"DELETE FROM proyecto WHERE `proyecto`.`id` = 2"
    $objConexion=new conexion();
    $imagen=$objConexion->consultar("SELECT imagen FROM `proyecto` where id=". $_GET['borrar']);
    unlink("imagenes/".$imagen[0]['imagen']);//elimino la imagen del codigo
    $sql = "DELETE FROM proyecto WHERE `proyecto`.`id` =" . $_GET['borrar'];

$objConexion->ejecutar($sql);
header("location:portafolio.php");

}
$objConexion=new conexion();
$resultado=$objConexion->consultar("SELECT * FROM `proyecto`");
?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card mt-3">
                <div class="card-header ">
                     Datos del proyecto
                </div>
                <div class="card-body">
                    <form action="portafolio.php" method="post" enctype="multipart/form-data">

                    <label for="">Nombre del proyecto:</label>
                    <input type="text" required name="nombre" class="form-control" id="">
                    <label for="">Descripcion del proyecto:</label>
                    <textarea name="descripcion" required id="" class="form-control" cols="30" rows="10"></textarea>

                    <label for="">Imagen del proyecto:</label>
                    <input type="file" required  class="form-control mt-2 mb-2"  name="archivo" id="">
                    <button type="submit" class="btn btn-success">Enviar proyecto</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <table
        class="table  mt-3"
    >
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Imagen</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Acciones</th>


            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach($resultado as $proyecto){?>
            <tr>
                <td scope="row"><?php echo $proyecto['id']?></td>
                <td><?php echo $proyecto['nombre']?></td>
                <td><img width="200" src="imagenes/<?php echo $proyecto['imagen'];?>"></td>
                <td><?php echo $proyecto['descripcion']?></td>
                <td><a class="btn btn-danger" href="?borrar=<?php echo $proyecto['id']?>">Eliminar</a>
                </td>


            </tr>
            <?php }?>
            
        </tbody>
    </table>
        </div>
    </div>
</div>
                
            
 
</div>


   

<?php include("pie.php");?>