<?php
include("db.php");
include("includes/header.php");
$id = $_GET["id"];
echo $id;
$gasto = "SELECT concepto, monto, descripcion FROM gastos WHERE folio_gastos = '$id'";

?>

<div class="container_form  center">
        <div class="titulo-modal">
            <h2>Editar datos de cliente</h2>
        </div>
        <form action="edit_gasto_insert.php" method="post" class="edita_form">
            <?php 
            $resultado = mysqli_query($conn, $gasto);
            while($row = mysqli_fetch_assoc($resultado)) {
            $concepto = $row["concepto"];
            $monto = $row["monto"];
            $descripcion = $row["descripcion"];

            }?>
            <label for="nombre">Concepto</label>
            <input type="text" placeholder="<?php echo $concepto?>" name="concepto">            
            <label for="nombre">Monto</label>
            <input type="number" placeholder="<?php echo $monto?>" name="monto">
            <label for="nombre">Descripcion</label>
            <input type="text" placeholder="<?php echo $descripcion?>" name="descripcion">
            <input type="hidden" value="<?php echo $id;?>" name="id">
            
            <input type="submit" value="Actualizar">

        </form>
    </div>

<?php
mysqli_close($conn);
?>
