<?php
    include('db.php');
    
    $metodo = $_POST["metodo"];
    $folioCredito = $_POST["folioCredito"];
    $monto = $_POST["monto"];
    $caja = $_POST ["caja"];
    

    $pago = "INSERT INTO pagos_compras (monto, metodo, id_caja, id_credito) 
    VALUES ('$monto', '$metodo', '$caja', '$folioCredito')";
    $resultado = mysqli_query($conn, $pago);


    //Actualizamos la deuda del monto
    $credito =  "UPDATE  credito_compra SET monto_deuda = monto_deuda-'$monto' WHERE id_creditoCom = '$folioCredito'";
    $caja_actual = mysqli_query($conn, $credito);

    //Actualizamos el dineor en caja
    $cajaUp = "UPDATE caja SET dinero = dinero - '$monto' WHERE id_caja = $caja";
    $caja_actual = mysqli_query($conn, $cajaUp);

    //Se revisa si la cantidad que se debe es menor o igual a cero para liquidar el pago
    $credito = "SELECT monto_deuda from credito_compra WHERE id_creditoCom = $folioCredito";
    $consulta = mysqli_query($conn, $credito);
    $deuda = 0;
    while($row = mysqli_fetch_assoc($consulta)) {
        $deuda =  $row['monto_deuda'];
    }
    
    if($deuda <= 0){
     $credito =  "UPDATE  credito_compra SET estado = 'Pagado' WHERE id_creditoCom = '$folioCredito'";
    $estatus = mysqli_query($conn, $credito); 
    }



    echo 'Listo :P';
    mysqli_close($conn);
?>