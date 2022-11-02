<?php
include("db.php");
include("includes/header.php");
include 'includes/metodos.php';
$caja = "SELECT * FROM caja";
?>

<?php

    //Saldo abonado en compras
    $abonado = "SELECT monto FROM pagos_compras";
    $resultado = mysqli_query($conn, $abonado);
    $abonadoTotal=0;
    while($row = mysqli_fetch_assoc($resultado)){
        $abonadoTotal = $abonadoTotal+$row["monto"];
    }

    //Total del dinero por compras
    $compras = "SELECT total from compras";
    $resultado = mysqli_query($conn, $compras);
    $comprasTotal=0;
    while($row = mysqli_fetch_assoc($resultado)){
        $comprasTotal = $comprasTotal+$row["total"];
    }
    
    //Saldo que se debe por las compras
    $deuda = $comprasTotal - $abonadoTotal;

    $gastos = "SELECT deuda_por_pagar FROM gastos";
    $resultado =  mysqli_query($conn, $gastos);
    $gastosTotal=0;
    while($row = mysqli_fetch_assoc($resultado)){
        $gastosTotal = $gastosTotal + $row["deuda_por_pagar"];
    }

    //Deuda que se muestra en la tabla
    $deudaTotal = $deuda + $gastosTotal;
    $deudaS = formatoDinero($deudaTotal);

    //GASTOS

    $gastos = $gastosTotal + $abonadoTotal;
    $gastosS = formatoDinero($gastos);

   /* $deuda =  "SELECT monto_deuda FROM credito_compra";
    $resultado = mysqli_query($conn, $deuda);
    $deudaFinal=0;

    while($row = mysqli_fetch_assoc($resultado)){
        $deudaFinal= $deudaFinal+ $row["monto_deuda"];
        }
    echo "Deuda" . $deudaFinal;  "<br>"; */

    //---- FONDO EN EFECTIVO -----
    $ventas = "SELECT monto FROM pagos WHERE metodo = 'Efectivo'";
    $resultado = mysqli_query($conn, $ventas);
    $ventasFinal = 0;
    while($row = mysqli_fetch_assoc($resultado)){
        $ventasFinal = $ventasFinal + $row["monto"];
    }

    //Fondo en Efectivo
    $fondoEfectivo = $ventasFinal - $gastos;
    $fondoEfectivoS = formatoDinero($fondoEfectivo);

    //Ventas
    $ventasDebe = "SELECT monto_debe FROM `creditos` WHERE monto_debe > 0"; 
    $resultado = mysqli_query($conn, $ventasDebe);
    $ventasDebeF = 0;

    while($row = mysqli_fetch_assoc($resultado)){
        $ventasDebeF = $ventasDebeF + $row["monto_debe"];
    }

    $ventasDebeFS = formatoDinero($ventasDebeF);

    //Inventario 
    $activos = "SELECT valor_total FROM activos";
    $resultado = mysqli_query($conn, $activos);
    $activosFinal=0;

    while($row = mysqli_fetch_assoc($resultado)){
    $activosFinal= $activosFinal + $row["valor_total"];
    }

    $activosFinalS = formatoDinero($activosFinal);


    $ventas = "SELECT total FROM ventas";
    $resultado = mysqli_query($conn, $ventas);
    $ventasFinal=0;

    while($row = mysqli_fetch_assoc($resultado)){
    $ventasFinal= $ventasFinal+ $row["total"];
    }
    
    $activos = "SELECT valor_total FROM activos";
    $resultado = mysqli_query($conn, $activos);
    $activosFinal=0;

    while($row = mysqli_fetch_assoc($resultado)){
        $activosFinal= $activosFinal+ $row["valor_total"];
        }
    

    
    
?>

<div class="caja_menu">
    <div class="tabla_caja">
        <div class="titulo">Caja</div>
        <div class="tabla caja"> 
            <div class="table_header">Nombre</div>
            <div class="table_header">Cantidad</div>
           
            <div class="table_item"> Deuda </div>
            <div class="table_item"> <?php echo $deudaS?> </div>
            <div class="table_item">Dinero Invertido</div>
            <div class="table_item">  </div>
            <div class="table_item">Fondo en Efectivo</div>
            <div class="table_item"> <?php echo $fondoEfectivoS ?> </div>
            <div class="table_item"> Ventas </div>
            <div class="table_item"> <?php echo $ventasDebeFS ?> </div>
            <div class="table_item"> Activos </div>
            <div class="table_item"> <?php echo $activosFinalS ?> </div>
            <div class="table_item"> Inventarios </div>
            <div class="table_item"> h </div>
            
            
        </div>
    </div>

    <div class="tabla_caja">
        <div class="titulo">Fondo</div>
        <div class="tabla caja"> 
            <div class="table_header">Nombre</div>
            <div class="table_header">Cantidad</div>
           
            <div class="table_item"> Ingresos </div>
            <div class="table_item"> <?php echo $fondoEfectivoS ?> </div>
            <div class="table_item">Gastos</div>
            <div class="table_item"> <?php echo $gastosS?> </div>
            <div class="table_item">Total</div>            
        </div>
    </div>

    <div class="tabla_inventario">
        <div class="titulo">Inventario</div>
        <div class="cabeceras-4">
            <div class="table_header">Calibre</div>
            <div class="table_header">Precio</div>
            <div class="table_header">No. de Cajas</div>
            <div class="table_header">Modificar</div>
        </div>
        <div class="tabla inventario">
            <?php 
            $precio = "SELECT * FROM precio LIMIT 7";
            $resultado = mysqli_query($conn, $precio);

            while($row = mysqli_fetch_assoc($resultado)) {?>

            <div class="table_item"> <?php echo $row["nombre"] ?> </div>
            <div class="table_item"> <?php echo $row["precio"] ?> </div>
            <div class="table_item"> <?php echo $row["cantidad"] ?> </div>
            <div class="table_item"> <a href="edit_precio.php?id=<?php echo $row["id_precio"];?>">
            <i class="fas fa-edit"></i></a> </div>
            <?php } ?>

        </div>
    </div>

    <div class="tabla_inventario">
        <div class="titulo">Inversiones </div>
        <div class="cabeceras-2">
            <div class="table_header">Fecha</div>
            <div class="table_header">Monto</div>
        </div>
        <div class="tabla inversion">
            <?php 
            $inversion = "SELECT monto, fecha FROM inversion";
            $resultado = mysqli_query($conn, $inversion);
            while($row = mysqli_fetch_assoc($resultado)){ ?>
                <div class="table_item"> <?php echo $row["fecha"] ?> </div>
                <div class="table_item"> <?php echo $row["monto"] ?> </div>
            <?php }?>

        </div>
    </div>

</div>

<?php
$calibres = array("Super", "Super B", "Super Roña", "Extra", "Extra B", "Extra Roña", "Primera", "Primera B",
"Primera Roña", "Mediano", "Mediano B", "Mediano Roña", "Tercera", "Tercera B" );

/*$calibres = array('1'=> "Super", '2'=>"Super B", '3'=>"Super Roña", '4'=> "Extra", '5' => "Extra B",
'6' => "Extra Roña", '7' => "Primera", '8' => "Primera B", '9' => "Primera Roña", '10' => "Mediano",
'11' => "Mediano B", '12' => "Mediano Roña", '13' => "Tercera", '14' => "Tercera B"); */

$cajas = array();
$subtotal = array();

for ($i = 0; $i<14; $i++){
    $cajas[$i]=0;
    $subtotal[$i]=0;
    //echo $cajas[$i]. "<br>";
}

$promedio = "SELECT a.calibre, a.cajas, a.subtotal, b.fecha FROM descripcion_ventas a
INNER JOIN ventas b ON b.folio = a.folio_ventas;";

$resultado = mysqli_query($conn, $promedio);
while($row = mysqli_fetch_assoc($resultado)){

    switch($row["calibre"]){
        case "Limpio":
            $cajas[0] = $cajas[0] + $row["cajas"];
            $subtotal[0] = $subtotal[0] + $row["subtotal"];
            break;
        case "Parejo":
            $cajas[1] = $cajas[1] + $row["cajas"];
            $subtotal[1] = $subtotal[1] + $row["subtotal"];
            break;
        case "Proceso":
            $cajas[2] = $cajas[2] + $row["cajas"];
            $subtotal[2] = $subtotal[2] + $row["subtotal"];
            break;
        case "Canica":
            $cajas[3] = $cajas[3] + $row["cajas"];
            $subtotal[3] = $subtotal[3] + $row["subtotal"];
            break;
        case "Desecho":
            $cajas[4] = $cajas[4] + $row["cajas"];
            $subtotal[4] = $subtotal[4] + $row["subtotal"];
            break;
        case "Maquila":
            $cajas[5] = $cajas[5] + $row["cajas"];
            $subtotal[5] = $subtotal[5] + $row["subtotal"];
            break;
        case "Caja de 10 kg":
            $cajas[6] = $cajas[6] + $row["cajas"];
            $subtotal[6] = $subtotal[6] + $row["subtotal"];
            break;    
    }
}

?>

<?php 
    if(empty($_SESSION['exito_precio'])){

    } else{
        //echo "EXITO!";
        //$message = "Actualizacion exitosa";
        //echo "<script type='text/javascript'>alert('$message');</script>";
        echo "<script type='text/javascript'>Swal.fire(
            'Precio actualizado!',
            'Se ha actualizado el precio con exito!',
            'success'
        )</script>";
        unset($_SESSION['exito_precio']);
    }

  include("includes/footer.php");
  mysqli_close($conn);
?>