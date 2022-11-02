<?php
include("db.php");
include("includes/header.php");
$id = $_GET["id"];
$calibre = "SELECT nombre, precio FROM precio WHERE id_precio = '$id'";
echo $id;
?>

<div class="menu_gastos">
    <div class="container_form cliente abono_form">
        <div class="titulo-modal">
            <h2>Abonar</h2>
        </div>
        <form action="gastos.php" method="post">
            <input type="number" placeholder="monto" name="monto" required>
            <input type="submit" value="Abonar">
        </form>
    </div>

    <div class="tabla_gastos">
        <div class="titulo">Gastos</div>
        <div class="cabeceras">
            <div class="table_header">Folio</div>
            <div class="table_header">Fecha</div>
            <div class="table_header">Concepto</div>
            <div class="table_header">Descripcion</div>
            <div class="table_header">Monto</div>
            <div class="table_header">Deuda por Pagar</div>
        </div>
        <div class="tabla gastos gastos_cabecera">
            <?php 
                $precio = "SELECT * FROM gastos where folio_gastos = $id ";
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
             <?php } ?>
                <div class="table_item"></div>
                <div class="table_item"> <b>Fecha</b> </div>
                <div class="table_item"> <b>Abono</b> </div>
                <div class="table_item">  </div>
                <div class="table_item">  </div>
                <div class="table_item"> </div>
            <?php
                $abonos = "SELECT fecha, monto FROM abonos_gastos WHERE  id_gasto ='$id'";
                $resultado = mysqli_query($conn, $abonos);
                while($row = mysqli_fetch_assoc($resultado)) {?>
                <div class="table_item"> </div>
                <div class="table_item"> <?php echo $row["fecha"] ?> </div>            
                <div class="table_item"> <?php echo $row["monto"] ?> </div>
                <div class="table_item"> </div>
                <div class="table_item"> </div>
                <div class="table_item"> </div>

            <?php }?>
                
        </div>
    </div>
</div>