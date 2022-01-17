<?php
include("db.php");
include("includes/header.php");
$id = $_GET["id"];
$calibre = "SELECT nombre, precio FROM precio WHERE id_precio = '$id'";
?>

<div class="container_form cliente center">
        <div class="titulo-modal">
            <h2>Gasto nuevo</h2>
        </div>
        <form action="edit_precio_insert.php" method="post">
            <?php 
            $resultado = mysqli_query($conn, $calibre);
            while($row = mysqli_fetch_assoc($resultado)) {
            $nombre = $row["nombre"];
            $precio = $row["precio"];
            }?>
            <label for="precio"> <b>Calibre:</b> <?php echo $nombre?> </label> <br>
            <label for="precio"> <b>Precio actual: </b> <?php echo $precio?> </label>
            <input type="number" name="precio" placeholder="Nuevo precio" required>
            <input type="hidden" value="<?php echo $id;?>" name="id">
            <input type="submit" value="Actualizar">
        </form>
    </div>

