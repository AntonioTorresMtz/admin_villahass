<?php
include("db.php");
include("includes/header.php");
$id = $_GET["id"];
echo $id;
$cliente = "SELECT nombre, valor_unitario, cantidad FROM activos WHERE id_activo = '$id'";


?>

    <div class="container_form center">
        <div class="titulo-modal">
            <h2>Editar activo</h2>
        </div>
        <form action="edit_activo_insert.php" method="post">
            <?php 
            $resultado = mysqli_query($conn, $cliente);
            while($row = mysqli_fetch_assoc($resultado)) {
            $nombre = $row["nombre"];
            $valor_unit = $row["valor_unitario"];
            $cantidad = $row["cantidad"];
            }?>
            <label for="nombre">Nombre</label>
            <input type="text" placeholder="<?php echo $nombre?>" name="nombre">            
            <label for="valor_unitario">Valor unitario</label>
            <input type="text" placeholder="<?php echo $valor_unit?>" name="valor_unitario">
            <label for="nombre">Cantidad</label>
            <input type="text" placeholder="<?php echo $cantidad?>" name="cantidad">
            <input type="hidden" value="<?php echo $id;?>" name="id">
            
            <input type="submit" value="Actualizar">

        </form>
    </div>

<?php
mysqli_close($conn);
?>