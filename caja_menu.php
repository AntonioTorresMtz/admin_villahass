<?php
    include 'db.php';
    include 'includes/header.php';
    include 'includes/metodos.php';
    $precioCon = "SELECT * FROM creditos";
?>

<div class="menu_caja1">
    <div class="formulario cliente">
       <div class="titulo-modal">
            <h2>Nuevo pago</h2>
       </div>
        <form action="pagos.php" method="post">
            <label for="metodo">Forma de pago</label>
                <select name="metodo" id="metodo">
                    <option value="Efectivo">Efectivo</option>
                    <option value="Cheque">Cheque</option>
                    <option value="Transferencia">Transferencia</option>
                </select>
            <input type="number" placeholder="Folio credito" name="folioCredito">
            <label for="monto"> Monto </label>
            <input type="number" placeholder="monto" name="monto" id="monto" min="1">
            <label for="caja"> Caja </label>
            <select name="caja" id="caja">
                <?php 
                    $cajas = "SELECT id_caja, nombre FROM caja limit 3";
                    $resultado = mysqli_query($conn, $cajas);
                    while($row = mysqli_fetch_assoc($resultado)) {?>
                        <?php $id = $row["id_caja"]?>
                        <option value="<?php echo $id?>"> <?php echo $row["nombre"]?> </option>

                <?php } ?>             
            </select>
            <input type="submit" value="Guardar">
        </form>
    </div>

    <div class="creditos__tabla">
        <div class="tabla_creditos">
            <div class="titulo">Creditos</div>
            <div class="cabeceras-8">
                <div class="table_header">Folio de credito</div>
                <div class="table_header">Razon Social</div>
                <div class="table_header">Folio de venta</div>
                <div class="table_header">Fecha de Inicio</div>
                <div class="table_header">Forma de pago</div>
                <div class="table_header">Fecha limite</div>
                <div class="table_header">Monto</div>
                <div class="table_header">Estatus</div>
            </div>
            <div class="tabla creditos">
                    <?php 
                    $creditos = "SELECT c.id_credito,  cl.razon_social, c.folio_venta, c.fecha_inicio,
                    c.notas, c.monto_debe, c.Estado FROM creditos AS c
                    INNER JOIN ventas AS v
                    ON c.folio_venta = v.folio
                    INNER JOIN cliente AS cl
                    ON v.id_cliente = cl.id_cliente
                    ORDER BY c.id_credito DESC";
                    $resultado = mysqli_query($conn, $creditos);

                    while($row = mysqli_fetch_assoc($resultado)) {?>

                        <?php  $dinero = $row['monto_debe'];
                            $final = formatoDinero($dinero); ?>

                            <div class="table_item"> <?php echo $row["id_credito"] ?> </div>
                            <div class="table_item"> <?php echo $row["razon_social"] ?> </div>
                            <div class="table_item"> <?php echo $row["folio_venta"] ?> </div>
                            <div class="table_item"> <?php echo $row["fecha_inicio"] ?> </div>
                            
                            <div class="table_item"><?php echo $row["notas"] ?></div>
                            <div class="table_item"> Null  </div>
                            <div class="table_item"> <?php echo $final ?> </div>
                            <?php if ($row["Estado"] == "Pendiente"){?>

                            <div class="table_item estatusDebe"> <?php echo $row["Estado"] ?> </div>

                            <?php } else{?>
                            <div class="table_item estatusPagado"> <?php echo $row["Estado"] ?> </div> 
                                <?php } ?>
                    <?php } ?>
                </div>
        </div>
    </div>
</div>

<div class="menu_caja1">
    <div class="ventas__menu">
        <div class="tabla_pagos">
            <div class="titulo">Pagos de Creditos</div>
            <div class="cabeceras">
                <div class="table_header">Folio de pago</div>
                <div class="table_header">Fecha</div>
                <div class="table_header">Monto</div>
                <div class="table_header">Metodo</div>
                <div class="table_header">Caja</div>
                <div class="table_header">Folio credito</div>
            </div>
            <div class="tabla pagos">
                <?php 
                $ventas = "SELECT a.id_pago, b.nombre, a.fecha, a.monto, a.metodo, a.id_caja, id_credito FROM
                pagos a INNER JOIN caja b on a.id_caja = b.id_caja WHERE a.id_credito > 0 ORDER BY a.id_pago DESC";
                $resultado = mysqli_query($conn, $ventas);

                while($row = mysqli_fetch_assoc($resultado)) {?>

                <?php  $dinero = $row['monto'];
                    $dineroTabla =  formatoDinero($dinero);
                        ?>

                <div class="table_item"> <?php echo $row["id_pago"] ?> </div>
                <div class="table_item"> <?php echo $row["fecha"] ?> </div>
                <div class="table_item"> <?php echo "$"."$dineroTabla" ?> </div>
                
                <div class="table_item"> <?php echo $row["metodo"] ?> </div>
                
                <div class="table_item"> <?php echo $row["nombre"] ?> </div>
                <div class="table_item"> <?php echo $row["id_credito"] ?> </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="ventas__menu">
        <div class="tabla_pagos">
            <div class="titulo">Pagos Liquidacion</div>
            <div class="cabeceras">
                <div class="table_header">Folio de pago</div>
                <div class="table_header">Fecha</div>
                <div class="table_header">Monto</div>
                <div class="table_header">Metodo</div>
                <div class="table_header">Caja</div>
                <div class="table_header">Folio compra</div>
            </div>
            <div class="tabla pagos">
                <?php 
              /*  SELECT a.id_pago, b.nombre, a.fecha, a.monto, a.metodo, a.id_caja, id_credito FROM
                pagos a  INNER JOIN caja b on a.id_caja = b.id_caja WHERE a.id_credito > 0 ORDER BY a.id_pago DESC */
                $ventas = "SELECT a.id_pago, b.nombre, a.fecha, a.monto, a.metodo, a.id_caja, c.folio 
                FROM pagos a INNER JOIN caja b 
                on a.id_caja = b.id_caja 
                INNER JOIN ventas c 
                ON c.id_pago = a.id_pago";
                $resultado = mysqli_query($conn, $ventas);

                while($row = mysqli_fetch_assoc($resultado)) {?>

                <?php  $dinero = $row['monto'];
                    $dineroTabla =  formatoDinero($dinero);
                        ?>

                <div class="table_item"> <?php echo $row["id_pago"] ?> </div>
                <div class="table_item"> <?php echo $row["fecha"] ?> </div>
                <div class="table_item"> <?php echo "$"."$dineroTabla" ?> </div>
                
                <div class="table_item"> <?php echo $row["metodo"] ?> </div>
                
                <div class="table_item"> <?php echo $row["nombre"] ?> </div>
                <div class="table_item"> <?php echo $row["folio"] ?> </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php
if(empty($_SESSION['error_folio'])){

} else{
    //echo "EXITO!";
    //$message = "Actualizacion exitosa";
    //echo "<script type='text/javascript'>alert('$message');</script>";
    echo "<script type='text/javascript'>Swal.fire(
        'No existe este folio!',
        'No se pudo encontrar el folio ingresado!',
        'error'
    )</script>";
    unset($_SESSION['error_folio']);
}

if(empty($_SESSION['error_pagado'])){

} else{
    //echo "EXITO!";
    //$message = "Actualizacion exitosa";
    //echo "<script type='text/javascript'>alert('$message');</script>";
    echo "<script type='text/javascript'>Swal.fire(
        'Credito finiquitado!',
        'El folio ingresado ya se encuentra pagado!',
        'info'
    )</script>";
    unset($_SESSION['error_pagado']);
}

if(isset($_SESSION['exito_pagoComs'])){
    echo "<script type='text/javascript'>Swal.fire(
        'Pago realizado exitosamente!',
        'Se ha registrado un nuevo pago!',
        'success'
    )</script>";
    unset($_SESSION['exito_pagoComs']);
} 

mysqli_close($conn);
?>