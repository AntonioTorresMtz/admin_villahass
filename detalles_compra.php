<?php
include("db.php");
include("includes/header.php");
$id = $_GET["id"];
$idC = $id;
$calibre = "SELECT a.fecha, a.id_compra, b.razon_social,  a.total, a.factura, a.id_pago, a.id_credito
from compras a 
inner join cliente b on a.id_cliente = b.id_cliente WHERE a.id_compra = '$id'";

$estado = "SELECT estado, monto_deuda FROM `credito_compra` WHERE id_compra =  '$id'";
$resultado = mysqli_query($conn, $estado);
$status = "";
$deuda ="";
while($row = mysqli_fetch_assoc($resultado)) {
    $status = $row["estado"];
    $deuda = $row["monto_deuda"];
}



$cFecha;
$cFolio;
$cRazon_social;
$cTotal;
$cFactura;
$cPago;
$cCredito;

$resultado = mysqli_query($conn, $calibre);
while($row = mysqli_fetch_assoc($resultado)) {
    $cFecha = $row["fecha"];
    $cFolio = $row["id_compra"];
    $cRazon_social = $row["razon_social"];
    $cTotal =  $row["total"];
    $cFactura = $row["factura"];
    $cPago = $row["id_pago"];
    $cCredito = $row["id_credito"];
}

?>

<div class="menu_gastos">
    <?php
    if (empty($status) || $status == "Pagado"){ ?>
        <div class="liquidado">
            <p>Compra liquidada</p>
            <i class="fas fa-thumbs-up icono"></i>
        </div>
    <?php } elseif ($status == "Pendiente"){ ?>
    
        <div class="container_form cliente abono_form">
            <div class="titulo-modal">
                <h2>Abonar</h2>
                <p> <?php echo "Deuda actual: " . $deuda?></p>
            </div>
            <form action="abono_compras.php" method="post">
                <label for="metodo">Forma de pago</label>
                <select name="metodo" id="metodo">
                    <option value="Efectivo">Efectivo</option>
                    <option value="Cheque">Cheque</option>
                    <option value="Transferencia">Transferencia</option>
                </select>                
                <input type="number" placeholder="monto" name="monto" required min="1" max="<?php echo $deuda?>">
                <input type="hidden" value="<?php echo $id;?>" name="idCompra">
                <input type="hidden" value="<?php echo $cCredito;?>" name="id">
                <select name="caja" id="caja">
                <?php 
                    $cajas = "SELECT id_caja, nombre FROM caja limit 3";
                    $resultado = mysqli_query($conn, $cajas);
                    while($row = mysqli_fetch_assoc($resultado)) {?>
                        <?php $id = $row["id_caja"]?>
                        <option value="<?php echo $id?>"> <?php echo $row["nombre"]?> </option>

                <?php } ?> 
                <input type="submit" value="Abonar">
            </form>
        </div>
    <?php } ?>

    <div class="detalles_tabla">
        <div class="tabla_detalles">
            <div class="titulo">Gastos</div>
            <div class="cabeceras-7">
                <div class="table_header">Fecha</div>
                <div class="table_header">Folio</div>
                <div class="table_header">Acredor</div>
                <div class="table_header">Total</div>
                <div class="table_header">Factura</div>
                <div class="table_header">Pago</div>
                <div class="table_header">Credito</div>
                
            </div>
            <div class="tabla gastos detalles_cabecera">
                <?php 
                    $resultado = mysqli_query($conn, $calibre);
                    while($row = mysqli_fetch_assoc($resultado)) {?>
                    <div class="table_item"> <?php echo $cFecha ?> </div>
                    <div class="table_item"> <?php echo $cFolio ?> </div>
                    <div class="table_item"> <?php echo $cRazon_social ?> </div>
                    <div class="table_item"> <?php echo $cTotal?> </div>            
                    <div class="table_item"> <?php echo $cFactura ?> </div>
                    <div class="table_item"> <?php echo $cPago ?> </div> 
                    <div class="table_item"> <?php echo $cCredito ?> </div>
                <?php } ?>                
            </div>
        </div>

        <div class="tabla_inventario">
            <div class="titulo">Inventario</div>
            <div class="cabeceras-3">
                <div class="table_header">Calibre</div>
                <div class="table_header">Kilos</div>
                <div class="table_header">Subtotal</div>
            </div>
            <div class="tabla descripcion">
                <?php 
                $precio = "SELECT calibre, cajas, subtotal FROM descripcion_compra WHERE id_compra = '$idC'";
                $resultado = mysqli_query($conn, $precio);

                while($row = mysqli_fetch_assoc($resultado)) {?>

                <div class="table_item"> <?php echo $row["calibre"] ?> </div>
                <div class="table_item"> <?php echo $row["cajas"] . " kg" ?> </div>
                <div class="table_item"> <?php echo $row["subtotal"] ?> </div>
                <?php } ?>

            </div>
        </div>

        <?php
        if($cPago != 0){ ?>
            <div class="tabla_inventario">
                <div class="titulo">Pagos</div>
                <div class="cabeceras-5">
                    <div class="table_header">Folio Pago</div>
                    <div class="table_header">Fecha</div>
                    <div class="table_header">Monto</div>
                    <div class="table_header">Metodo</div>
                    <div class="table_header">Caja</div>
                </div>
                <div class="tabla pagos2">
                    <?php 
                    $pagos = "SELECT a.id_pagoCom, a.fecha, a.monto, a.metodo, b.nombre FROM pagos_compras a
                    INNER JOIN caja b
                    on a.id_caja = b.id_caja
                    WHERE id_pago = '$cPago'";
                    
                    $resultado = mysqli_query($conn, $pagos);
                    while($row = mysqli_fetch_assoc($resultado)) {?>
                        <div class="table_item"> <?php echo $row["id_pagoCom"] ?> </div>
                        <div class="table_item"> <?php echo $row["fecha"] ?> </div>
                        <div class="table_item"> <?php echo $row["monto"] ?> </div>
                        <div class="table_item"> <?php echo $row["metodo"] ?> </div>
                        <div class="table_item"> <?php echo $row["nombre"] ?> </div>
                    <?php } ?>

                </div>
            </div>
      <?php  } else{ ?>
            <div class="tabla_inventario">
                <div class="titulo">Pagos</div>
                <div class="cabeceras-5">
                    <div class="table_header">Folio Pago</div>
                    <div class="table_header">Fecha</div>
                    <div class="table_header">Monto</div>
                    <div class="table_header">Metodo</div>
                    <div class="table_header">Caja</div>
                </div>
                <div class="tabla pagos2">
                    <?php 
                    $pagos = "SELECT a.id_pagoCom, a.fecha, a.monto, a.metodo, b.nombre FROM pagos_compras a
                    INNER JOIN caja b
                    on a.id_caja = b.id_caja
                    WHERE id_credito = '$cCredito'";
                    
                    
                    $resultado = mysqli_query($conn, $pagos);
                    while($row = mysqli_fetch_assoc($resultado)) {?>
                        <div class="table_item"> <?php echo $row["id_pagoCom"] ?> </div>
                        <div class="table_item"> <?php echo $row["fecha"] ?> </div>
                        <div class="table_item"> <?php echo $row["monto"] ?> </div>
                        <div class="table_item"> <?php echo $row["metodo"] ?> </div>
                        <div class="table_item"> <?php echo $row["nombre"] ?> </div>
                    <?php } ?>

                </div>
            </div>
    <?php  } ?>

    </div>
</div>

<?php

if(isset($_SESSION['exito_pagoCom2'])){
    echo "<script type='text/javascript'>Swal.fire(
        'Pago realizado exitosamente!',
        '".$_SESSION['exito_pagoCom2']."',
        'success'
    )</script>";
    unset($_SESSION['exito_pagoCom2']);
}

mysqli_close($conn);
?>
