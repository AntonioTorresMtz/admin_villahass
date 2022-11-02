<?php
include("db.php");
include("includes/header.php");
$id = $_GET["id"];
$idV = $id;
$calibre = "SELECT a.fecha, a.folio, b.razon_social,  a.total, a.num_factura, a.id_pago, a.id_credito
from ventas a 
inner join cliente b on a.id_cliente = b.id_cliente WHERE a.folio = '$id'";

$estado = "SELECT estado, monto_debe FROM `creditos` WHERE folio_venta =  '$id'";
$resultado = mysqli_query($conn, $estado);
$status = "";
$deuda;
while($row = mysqli_fetch_assoc($resultado)) {
    $status = $row["estado"];
    $deuda = $row["monto_debe"];
}


$vFecha;
$vFolio;
$vRazon_social;
$vTotal;
$vFactura;
$vPago;
$vCredito;

$resultado = mysqli_query($conn, $calibre);
while($row = mysqli_fetch_assoc($resultado)) {
    $vFecha = $row["fecha"];
    $vFolio = $row["folio"];
    $vRazon_social = $row["razon_social"];
    $vTotal =  $row["total"];
    $vFactura = $row["num_factura"];
    $vPago = $row["id_pago"];
    $vCredito = $row["id_credito"];
}
    
?>

<div class="menu_gastos">
    <?php
    if (empty($status) || $status == "Pagado"){ ?>
        <div class="liquidado">
            <p>Venta liquidada</p>
            <i class="fas fa-thumbs-up icono"></i>
        </div>
    <?php } elseif ($status == "Pendiente"){ ?>
        <div class="container_form cliente abono_form">
            <div class="titulo-modal">
                <h2>Abonar</h2>
                <p> <?php echo "Deuda actual: " . $deuda?></p>
               
            </div>
            <form action="abono_ventas.php" method="post">
                <label for="metodo">Forma de pago</label>
                <select name="metodo" id="metodo">
                    <option value="Efectivo">Efectivo</option>
                    <option value="Cheque">Cheque</option>
                    <option value="Transferencia">Transferencia</option>
                </select>
                <input type="number" placeholder="monto" name="monto" required min="1" max="<?php echo $deuda?>">
                <input type="hidden" value="<?php echo $id;?>" name="idVenta">
                <input type="hidden" value="<?php echo $vCredito;?>" name="id">
                <select name="caja" id="caja">
                <?php 
                    $cajas = "SELECT id_caja, nombre FROM caja limit 3";
                    $resultado = mysqli_query($conn, $cajas);
                    while($row = mysqli_fetch_assoc($resultado)) {?>
                        <?php $id = $row["id_caja"]?>
                        <option value="<?php echo $id?>"> <?php echo $row["nombre"]?> </option>

                <?php } ?> 
                <input type="submit" value="Abonar">            
                </select>
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
                <div class="table_item"> <?php echo $vFecha ?> </div>
                <div class="table_item"> <?php echo $vFolio?> </div>
                <div class="table_item"> <?php echo $vRazon_social ?> </div>
                <div class="table_item"> <?php echo $vTotal ?> </div>            
                <div class="table_item"> <?php echo $vFactura?> </div>
                <div class="table_item"> <?php echo $vPago ?> </div> 
                <div class="table_item"> <?php echo $vCredito ?> </div>             
            </div>
        </div>

        <div class="tabla_inventario">
            <div class="titulo">Inventario</div>
            <div class="cabeceras-3">
                <div class="table_header">Calibre</div>
                <div class="table_header">Cajas</div>
                <div class="table_header">Subtotal</div>
            </div>
            <div class="tabla descripcion">
                <?php 
                $precio = "SELECT calibre, cajas, subtotal FROM descripcion_ventas WHERE folio_ventas = '$idV'";
                
                $resultado = mysqli_query($conn, $precio);
                while($row = mysqli_fetch_assoc($resultado)) {?>
                    <div class="table_item"> <?php echo $row["calibre"] ?> </div>
                    <div class="table_item"> <?php echo $row["cajas"] ?> </div>
                    <div class="table_item"> <?php echo $row["subtotal"] ?> </div>
                <?php } ?>

            </div>
        </div>
        <?php
        if($vPago != 0){ ?>
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
                    $pagos = "SELECT a.id_pago, a.fecha, a.monto, a.metodo, b.nombre FROM pagos a
                    INNER JOIN caja b
                    on a.id_caja = b.id_caja
                    WHERE id_pago = '$vPago'";
                    
                    $resultado = mysqli_query($conn, $pagos);
                    while($row = mysqli_fetch_assoc($resultado)) {?>
                        <div class="table_item"> <?php echo $row["id_pago"] ?> </div>
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
                    $pagos = "SELECT a.id_pago, a.fecha, a.monto, a.metodo, b.nombre FROM pagos a
                    INNER JOIN caja b
                    on a.id_caja = b.id_caja
                    WHERE id_credito = '$vCredito'";
                    
                    
                    $resultado = mysqli_query($conn, $pagos);
                    while($row = mysqli_fetch_assoc($resultado)) {?>
                        <div class="table_item"> <?php echo $row["id_pago"] ?> </div>
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

if(isset($_SESSION['exito_pagoComs'])){
    echo "<script type='text/javascript'>Swal.fire(
        'Pago realizado exitosamente!',
        '".$_SESSION['exito_pagoComs']."',
        'success'
    )</script>";
    unset($_SESSION['exito_pagoComs']);
}

mysqli_close($conn);
?>