<?php
    include 'db.php';
    include 'includes/header.php';
    include 'includes/metodos.php';
?>

<div class="menu_gastos">
    <div class="container_form cliente activo_form">
        <div class="titulo-modal">
            <h2>Activo nuevo</h2>
        </div>
        <form action="activos.php" method="post">
            <input type="text" placeholder="Nombre" name="nombre" required>
            <input type="number" placeholder="Cantidad" name="cantidad" required>
            <input type="number" placeholder="Valor unitario" name="valor_unit" required>
            <input type="submit" value="Guardar">
        </form>
    </div>

    <div class="tabla_gastos">
    <div id="elimina"  class="titulo">Activos</div>
        <div class="cabeceras-7">
            <div class="table_header">Folio</div>
            <div class="table_header">Fecha</div>
            <div class="table_header">Concepto</div>
            <div class="table_header">Descripcion</div>
            <div class="table_header">Monto</div>
            <div class="table_header">Caja</div>
            <div class="table_header">Acciones</div>
        </div>
        <div class="tabla gastos">
            <?php 
                $precio = "SELECT * FROM activos";
                $resultado = mysqli_query($conn, $precio);

                while($row = mysqli_fetch_assoc($resultado)) {
                    $unitarioF = formatoDinero($row["valor_unitario"]);
                    $totalF = formatoDinero($row["valor_total"]);
                  ?>
                    <div class="table_item"> <?php echo $row["id_activo"] ?> </div>
                    <div class="table_item"> <?php echo $row["nombre"] ?> </div>
                    <div class="table_item"> <?php echo $unitarioF ?> </div>            
                    <div class="table_item"> <?php echo $row["cantidad"] ?> </div>
                    <div class="table_item"> <?php echo $totalF ?> </div>
                    <div class="table_item"> <?php echo $row["fecha_adqui"] ?> </div>
                    <div class="table_item"> <a href="editar_activo.php?id=<?php echo $row["id_activo"];?>">
                    <abbr title="Editar activo"> <i class="fas fa-edit"></i>  </abbr></a>
                    <a class="item_elimina" href="elimina_activo.php?id=<?php echo $row["id_activo"];?>"><abbr title="Eliminar activo"><i  class="fas fa-trash"></i></abbr></a></div>
    
             <?php } ?>
        </div>
    </div>
</div>
<script src="js/elimina.js"></script>
<?php 

if(empty($_SESSION['exito_activo'])){

} else{
        //echo "EXITO!";
        $message = "Compra exitosa";
        //echo "<script type='text/javascript'>alert('$message');</script>";
        echo "<script type='text/javascript'>Swal.fire(
                'Activo creado!',
                'El activo se ha creado exitosamente!',
                'success'
              )</script>";
        unset($_SESSION['exito_activo']);
}


if(empty($_SESSION['exito_actActivo'])){

} else{
        //echo "EXITO!";
        //$message = "Compra exitosa";
        //echo "<script type='text/javascript'>alert('$message');</script>";
        echo "<script type='text/javascript'>Swal.fire(
                'Activo actualizado!',
                'El activo se ha actualizado exitosamente!',
                'success'
              )</script>";
        unset($_SESSION['exito_actActivo']);
}

if(empty($_SESSION['exito_delActivo'])){

} else{
        //echo "EXITO!";
        //$message = "Compra exitosa";
        //echo "<script type='text/javascript'>alert('$message');</script>";
        echo "<script type='text/javascript'>Swal.fire(
                'Activo eliminado!',
                'El activo se ha eliminado exitosamente!',
                'success'
              )</script>";
        unset($_SESSION['exito_delActivo']);
}

//session_unset();
include("includes/footer.php");     
mysqli_close($conn);

?>