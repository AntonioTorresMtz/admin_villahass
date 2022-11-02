<?php
include("db.php");
include("includes/header.php");
$id = $_GET["id"];
echo $id;
$cliente = "SELECT * FROM cliente WHERE id_cliente = '$id'";


?>

<div class="container_form edita center">
        <div class="titulo-modal">
            <h2>Editar datos de cliente</h2>
        </div>
        <form action="edit_cliente_insert.php" method="post" class="edita_form">
            <?php 
            $resultado = mysqli_query($conn, $cliente);
            while($row = mysqli_fetch_assoc($resultado)) {
            $nombre = $row["Nombre"];
            $apetPat = $row["ApetPa"];
            $apetMat = $row["ApetMa"];
            $telefono = $row["telefono"];
            $razonSocial = $row["razon_social"];
            $direccion = $row["direccion"];
            }?>
            <label for="nombre">Razon Social</label>
            <input type="text" placeholder="<?php echo $razonSocial?>" name="razon_social">            
            <label for="nombre">Nombre</label>
            <input type="text" placeholder="<?php echo $nombre?>" name="nombre">
            <label for="nombre">Apellido Paterno</label>
            <input type="text" placeholder="<?php echo $apetPat?>" name="apet_pat">
            <label for="nombre">Telefono</label>
            <input type="text" placeholder="<?php echo $telefono?>" name="telefono">
            <label for="nombre">Direccion</label>
            <input type="text" placeholder="<?php echo $direccion?>" name="direccion">
            <input type="hidden" value="<?php echo $id;?>" name="id">
            
            <input type="submit" value="Actualizar">

        </form>
    </div>

<?php
mysqli_close($conn);
?>
