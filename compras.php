<?php
    include 'db.php';
    $total =  0;
    $factura =  $_POST["factura"];
    $cliente = $_POST["acredor"];
    $formaPago = $_POST["metodoPago"];
    $forma_pago = $_POST["forma"];  //Credito
    $forma_pagoL =$_POST["formaL"]; //Liquidacion

    //INSERT DE LA VENTA
    $sql = "INSERT INTO `compras` (`id_compra`, `total`, `factura`, `id_cliente`, `id_pago`, `id_credito`, `fecha`) 
    VALUES (NULL, '$total', '$factura', '$cliente', null, Null, current_timestamp()); ";

    

    $resultado = mysqli_query($conn, $sql);
    if(!$resultado){
        echo 'Error venta <br>';
    } else{
        echo 'Exito venta <br>' ;
    }

    //Creacion de las variables para  calibres y cantidades
    $items1 = ($_POST['calibre']); //Arreglo de calibres
    $items2 = ($_POST['cajas']);   //Arreglo de cantidad de cajas
    ///////////// SEPARAR VALORES DE ARRAYS, EN ESTE CASO SON 4 ARRAYS UNO POR CADA INPUT (ID, NOMBRE, CARRERA Y GRUPO////////////////////)
    
    $folio = "SELECT MAX(id_compra) FROM compras";
    $resultado = mysqli_query($conn, $folio);
    $id;
    while($row = mysqli_fetch_assoc($resultado)) {
         $id = $row['MAX(id_compra)'];
    }

    while(true) {

         //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
        $item1 = current($items1); //Calibre
        $item2 = current($items2);
        $precioSub = "SELECT precio FROM precio where nombre='$item1'";
        $resultado = mysqli_query($conn, $precioSub);
        $precio = 0;
        while($row = mysqli_fetch_assoc($resultado)) {
                $precio = $row['precio'];
            } 
        
        $item3 = $precio * $item2;
        
        ////// ASIGNARLOS A VARIABLES ///////////////////
        $calibre=(( $item1 !== false) ? $item1 : ", &nbsp;");
        $cajas=(( $item2 !== false) ? $item2 : ", &nbsp;");
        $subtotal= (int) $cajas * (int) $precio;
         //// CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCIÓN ////////
        $valores='('.$id.',"'.$calibre.'","'.$cajas.'","'.$subtotal.'"),';
        //////// YA QUE TERMINA CON COMA CADA FILA, SE RESTA CON LA FUNCIÓN SUBSTR EN LA ULTIMA FILA /////////////////////
        $valoresQ= substr($valores, 0, -1);
        ///////// QUERY DE INSERCIÓN ////////////////////////////
        $sql1 = "INSERT INTO descripcion_compra (id_compra, calibre, cajas, subtotal)
                VALUES ('$id', '$calibre', '$cajas', '$subtotal')";

        $sqlRes=$conn->query($sql1); //Consulta para el insert
        if(!$sql1){
            echo 'Error descripcion<br>';
        } else{
            echo 'Exito descripcion <br>' ;
        }

        $sql1 = "UPDATE  precio SET cantidad = cantidad + '$cajas' WHERE nombre='$calibre'";
        $sqlRes=$conn->query($sql1);
        if(!$sql1){
            echo 'Error inventario <br>';
        } else{
            echo 'Exito inventario<br>' ;
        }

        // Up! Next Value
        $item1 = next( $items1 );
        $item2 = next( $items2 );
        // Check terminator
        if($item1 === false && $item2 === false) break;
	}

    $totalCon = "SELECT subtotal  FROM descripcion_compra WHERE id_compra = $id";
    $resultado = mysqli_query($conn, $totalCon);
    while($row = mysqli_fetch_assoc($resultado)) {
        $total = $total + $row['subtotal'];
        echo $total;
    }

    $totalNew = "UPDATE compras SET total = '$total' WHERE id_compra='$id'";
    $resultado = mysqli_query($conn, $totalNew);

    if($formaPago == "liquida"){

        $query = "INSERT INTO `pagos_compras` (`id_pagoCom`, `monto`, `fecha`, `metodo`, `id_caja`, `id_credito`)
         VALUES (NULL, '$total', current_timestamp(), '$forma_pagoL', '3', NULL);";
                  
        $result = mysqli_query($conn, $query);
        if(!$result){
            echo 'Error pago<br>';
        } else{
            echo 'Exito PAGO <br>' ;
        }

        $folio_pago = "SELECT MAX(id_pagoCom) FROM pagos_compras";
        $resultado1 = mysqli_query($conn, $folio_pago);
        $id_pago;

        while($row = mysqli_fetch_assoc($resultado1)) {
            $id_pago = $row['MAX(id_pagoCom)'];
        }
        $updatePago = "UPDATE compras SET id_pago = '$id_pago' WHERE id_compra ='$id'";
        $resultado = mysqli_query($conn, $updatePago);

        if(!$resultado){
            echo 'Error pago<br>';
        } else{
            echo 'Exito PAGO <br>' ;
        }

        $updateCaja = "UPDATE `caja` SET `dinero` =  dinero - '$total' WHERE `caja`.`id_caja` = '3' ";
        $resultado = mysqli_query($conn, $updateCaja);

        if(!$resultado){
            echo 'Error caja<br>';
        } else{
            echo 'Exito caja <br>' ;
        }
    
    } elseif ($formaPago == "credito"){
        $query = "INSERT INTO `credito_compra` (`id_creditoCom`, `fecha_inicio`, `forma_pago`,  `monto_deuda`,  `id_compra`, `estado`)
        VALUES (NULL, current_timestamp(), '$forma_pago',  '$total', '$id', 'Pendiente')";
                  
        $result = mysqli_query($conn, $query);

        if(!$result){
            echo 'Error credito <br>';
        } else{
            echo 'Exito Credito <br>' ;
        }

        $folio_credito = "SELECT MAX(id_creditoCom) FROM credito_compra";
        $resultado1 = mysqli_query($conn, $folio_credito);
        $id_credito;
        
        while($row = mysqli_fetch_assoc($resultado1)) {
            $id_credito = $row['MAX(id_creditoCom)'];
        }
        echo $id_credito;
        $updateCredito = "UPDATE compras SET id_credito = '$id_credito' WHERE id_compra ='$id'";
        $resultado = mysqli_query($conn, $updateCredito);

        if(!$resultado){
            echo 'Error update folio credito<br>';
        } else{
            echo 'Exito update folio credito <br>' ;
        }
    }

    mysqli_close($conn);
?>

