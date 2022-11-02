<?php
    session_start();
    include('db.php');
    $metodo = $_POST["metodo"];
    $folioCredito = $_POST["folioCredito"];
    $monto = $_POST["monto"];
    $caja = $_POST ["caja"];

    $verificar = "SELECT Estado FROM creditos WHERE id_credito = '$folioCredito'";
    $resultado = mysqli_query($conn, $verificar);
    $estado = "";
    while($row = mysqli_fetch_assoc($resultado)) {
        $estado =  $row['Estado'];
    }

    if(empty($estado)){
        echo "actualizacion exitosa";
        $_SESSION['error_folio'] = "Actualizacion exitosa";
        header("Location: caja_menu.php");
        exit();
        echo "Holi";
    }  elseif ($estado == "Pagado"){
        echo "actualizacion exitosa";
        $_SESSION['error_pagado'] = "Actualizacion exitosa";
        header("Location: caja_menu.php");
        
        exit();
        echo "Holi";
    } else{
        $pago = "INSERT INTO pagos (monto, metodo, id_caja, id_credito) 
        VALUES ('$monto', '$metodo', '$caja', '$folioCredito')";
        $resultado = mysqli_query($conn, $pago);
    
        $credito =  "UPDATE  creditos SET monto_debe = monto_debe-'$monto' WHERE id_credito = '$folioCredito'";
        $caja_actual = mysqli_query($conn, $credito);
    
        if(!$caja_actual){
            printf("Error en pago credito: %s\n", mysqli_error($conn));
        } else{
            echo 'Exito pago credito <br>' ;
        }
    
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
    
        echo "actualizacion exitosa";
        $_SESSION['exito_pagoComs'] = "Actualizacion exitosa";
        header("Location: caja_menu.php");
        exit();
    
        echo 'Listo :P';
        mysqli_close($conn);
    }
     
    
    


?>