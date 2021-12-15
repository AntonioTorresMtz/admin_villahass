<?php
    include('db.php');
    $metodo = $_POST["metodo"];
    $folioCredito = $_POST["folioCredito"];
    $monto = $_POST["monto"];
    $caja = $_POST ["caja"];
    

    $pago = "INSERT INTO pagos (monto, metodo, id_caja, id_credito) 
    VALUES ('$monto', '$metodo', '$caja', '$folioCredito')";
    $resultado = mysqli_query($conn, $pago);

    $credito =  "UPDATE  creditos SET monto_debe=monto_debe-'$monto' WHERE id_credito = '$folioCredito'";
    $caja_actual = mysqli_query($conn, $credito);

    $cajaUp = "UPDATE caja SET dinero = dinero+'$monto' WHERE id_caja = $caja";
    $caja_actual = mysqli_query($conn, $cajaUp);

    $credito = "SELECT monto_debe from creditos WHERE id_credito = $folioCredito";
    $consulta = mysqli_query($conn, $credito);
    $deuda = 0;
    while($row = mysqli_fetch_assoc($consulta)) {
        $deuda =  $row['monto_debe'];
    }
    
    if($deuda <= 0){
     $credito =  "UPDATE  creditos SET Estado = 'Pagado' WHERE id_credito = '$folioCredito'";
    $estatus = mysqli_query($conn, $credito); 
    }



    echo 'Listo :P';
    mysqli_close($conn);
?>