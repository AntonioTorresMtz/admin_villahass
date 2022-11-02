<?php
include('includes/header.php');
include("db.php");
?>

<div class="menu_gastos">
    <div class="container_form cliente gasto_form">
        <div class="titulo-modal">
            <h2>Gasto nuevo</h2>
        </div>
        <form action="gastos.php" method="post">
            <input type="text" placeholder="Concepto" name="concepto" required>
            <textarea name="descripcion" id="" cols="33" rows="5" placeholder="Descripcion"></textarea>
            <input type="number" placeholder="Monto" required name="monto">
            <input type="number" placeholder="Abono" required name="abono">
            <input type="submit" value="Guardar">
        </form>
    </div>

    <div class="tabla_gastos">
        <div class="titulo">Gastos</div>
        <div class="cabeceras-7">
            <div class="table_header">Folio</div>
            <div class="table_header">Fecha</div>
            <div class="table_header">Concepto</div>
            <div class="table_header">Descripcion</div>
            <div class="table_header">Monto</div>
            <div class="table_header">Deuda por Pagar</div>
            <div class="table_header">Acciones</div>
        </div>
        <div class="tabla gastos">
            <?php 
                $precio = "SELECT * FROM gastos";
                $resultado = mysqli_query($conn, $precio);

                while($row = mysqli_fetch_assoc($resultado)) {?>

                <div class="table_item"> <a href="abonos_menu.php?id=<?php echo $row["folio_gastos"];?>"
                target="_blank"> <?php echo $row["folio_gastos"]?> </a></div>
                <div class="table_item"> <?php echo $row["fecha"] ?> </div>
                <div class="table_item"> <?php echo $row["concepto"] ?> </div>            
                <div class="table_item"> <?php echo $row["descripcion"] ?> </div>
                <div class="table_item"> <?php echo $row["monto"] ?> </div>
                <?php
                if($row["deuda_por_pagar"] > 0){ ?>
                    <div class="table_item estatusDebe"> <?php echo $row["deuda_por_pagar"] ?> </div>
               <?php } else{ ?>
                    <div class="table_item estatusPagado"> <?php echo $row["deuda_por_pagar"] ?> </div>
                <?php } ?>
                <div class="table_item"> <abbr title="Editar gasto"><a href="editar_gasto.php?id=<?php echo $row["folio_gastos"];?>">
                <i class="fas fa-edit"></i></a></abbr>
                <abbr title="Eliminar gasto"><a class="item_elimina" href="elimina_gasto.php?id=<?php echo $row["folio_gastos"];?>"> <i  class="fas fa-trash"></i> </a> </abbr> </div>
             <?php } ?>
        </div>
    </div>
</div>

<script src="js/elimina.js"></script>
<?php
if(empty($_SESSION['exito_gasto'])){

} else{
    //echo "EXITO!";
    //$message = "Actualizacion exitosa";
    //echo "<script type='text/javascript'>alert('$message');</script>";
    echo "<script type='text/javascript'>Swal.fire(
        'Gasto creado con exito!',
        'Se ha creado un nuevo gasto!',
        'success'
    )</script>";
    unset($_SESSION['exito_gasto']);
}

if(empty($_SESSION['exito_gastoAct'])){

} else{
    //echo "EXITO!";
    //$message = "Actualizacion exitosa";
    //echo "<script type='text/javascript'>alert('$message');</script>";
    echo "<script type='text/javascript'>Swal.fire(
        'Gasto actualizado con exito!',
        'Se ha actualizado un nuevo gasto!',
        'success'
    )</script>";
    unset($_SESSION['exito_gastoAct']);
}

if(empty($_SESSION['exito_delGasto'])){

} else{
    //echo "EXITO!";
    //$message = "Actualizacion exitosa";
    //echo "<script type='text/javascript'>alert('$message');</script>";
    echo "<script type='text/javascript'>Swal.fire(
        'Gasto eliminado con exito!',
        'Se ha eliminado un nuevo gasto!',
        'success'
    )</script>";
    unset($_SESSION['exito_delGasto']);
}

include('includes/footer.php');

?>
