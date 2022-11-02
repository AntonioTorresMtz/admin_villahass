<?php
    session_start();
    include 'db.php';
    $total =  0;
    $factura =  $_POST["factura"];
    $cliente = $_POST["cliente"];
    $formaPago = $_POST["metodoPago"];
    $forma_pagoL =$_POST["formaL"]; //Liquidacion
    $notas = $_POST["notas"];
    $cuenta = $_POST["cuenta"];

    if(empty($factura)){
        $factura = "Sin factura";
    }

    if($forma_pagoL == "Efectivo"){
        $cuenta = '3';
    }

    //INSERT DE LA VENTA
    $sql = "INSERT INTO ventas (folio, fecha, total, num_factura,  id_cliente, id_credito, id_pago, id_precio) 
    VALUES (NULL, current_timestamp(), '1', '$factura', '$cliente', '0', '0', NULL)";

    $resultado = mysqli_query($conn, $sql);
    if(!$resultado){
        echo 'Error venta <br>';
    } else{
        echo 'Exito venta <br>' ;
    }

    //Creacion de las variables para  calibres y cantidades
    $items1 = ($_POST['calibre']); //Arreglo de calibres
    $items2 = ($_POST['cajas']);   //Arreglo de cantidad de kilos
    $items3 = ($_POST['precio']);   //Arreglo de precios
    ///////////// SEPARAR VALORES DE ARRAYS, EN ESTE CASO SON 4 ARRAYS UNO POR CADA INPUT (ID, NOMBRE, CARRERA Y GRUPO////////////////////)
    
    $folio = "SELECT MAX(folio) FROM ventas";
    $resultado = mysqli_query($conn, $folio);
    $id;
    while($row = mysqli_fetch_assoc($resultado)) {
         $id = $row['MAX(folio)'];
    }

    while(true) {
         //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
        $item1 = current($items1); //Calibre
        $item2 = current($items2);
        $item3 = current($items3);

        //$item3 = $precios * $item2;
        
        ////// ASIGNARLOS A VARIABLES ///////////////////
        $calibre=(( $item1 !== false) ? $item1 : ", &nbsp;");
        $cajas=(( $item2 !== false) ? $item2 : ", &nbsp;");
        $precio=(( $item3 !== false) ? $item3 : ", &nbsp;");
        $subtotal = $cajas*$precio;
         //// CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCIÓN ////////
        $valores='('.$id.',"'.$calibre.'","'.$cajas.'","'.$subtotal.'"),';
        //////// YA QUE TERMINA CON COMA CADA FILA, SE RESTA CON LA FUNCIÓN SUBSTR EN LA ULTIMA FILA /////////////////////
        $valoresQ= substr($valores, 0, -1);
        ///////// QUERY DE INSERCIÓN ////////////////////////////
        $sql1 = "INSERT INTO descripcion_ventas (folio_ventas, calibre, cajas, subtotal, precio)
                VALUES ('$id', '$calibre', '$cajas', '$subtotal', '$precio')";

        $sqlRes=$conn->query($sql1); //Consulta para el insert
        if(!$sql1){
            echo 'Error descripcion<br>';
        } else{
            echo 'Exito descripcion <br>' ;
        }

        $sql1 = "UPDATE  precio SET cantidad = cantidad - '$cajas' WHERE nombre='$calibre'";
        $sqlRes=$conn->query($sql1);
        if(!$sql1){
            echo 'Error inventario <br>';
        } else{
            echo 'Exito inventario<br>' ;
        }

        // Up! Next Value
        $item1 = next( $items1 );
        $item2 = next( $items2 );
        $item3 = next( $items3 );
        // Check terminator
        if($item1 === false && $item2 === false) break;
	}

    $totalCon = "SELECT subtotal  FROM descripcion_ventas WHERE folio_ventas = $id";
    $resultado = mysqli_query($conn, $totalCon);
    while($row = mysqli_fetch_assoc($resultado)) {
        $total = $total + $row['subtotal'];
        echo $total;
        }

    $totalNew = "UPDATE ventas SET total = '$total' WHERE folio='$id'";
    $resultado = mysqli_query($conn, $totalNew);

    if($formaPago == "liquida"){
        $query = "INSERT INTO `pagos` (`id_pago`, `monto`, `fecha`, `metodo`, `id_caja`, `id_credito`)
                 VALUES (NULL, '$total', current_timestamp(), '$forma_pagoL', '$cuenta', '')";
                  
        $result = mysqli_query($conn, $query);
        if(!$result){
            echo 'Error pago<br>';
        } else{
            echo 'Exito PAGO <br>' ;
        }

        $folio_pago = "SELECT MAX(id_pago) FROM pagos";
        $resultado1 = mysqli_query($conn, $folio_pago);
        $id_pago;

        while($row = mysqli_fetch_assoc($resultado1)) {
            $id_pago = $row['MAX(id_pago)'];
        }
        $updatePago = "UPDATE ventas SET id_pago = '$id_pago' WHERE folio='$id'";
        $resultado = mysqli_query($conn, $updatePago);

        if(!$resultado){
            echo 'Error pago<br>';
        } else{
            echo 'Exito PAGO <br>' ;
        }

        $updateCaja = "UPDATE `caja` SET `dinero` =  dinero + '$total' WHERE `caja`.`id_caja` = '$cuenta' ";
        $resultado = mysqli_query($conn, $updateCaja);

        if(!$resultado){
            echo 'Error caja<br>';
        } else{
            echo 'Exito venta <br>' ;
            $_SESSION['exito_venta'] = "Venta exitosa";
            echo "Cuenta ". $cuenta;
            header("Location: ventas_menu.php");
            exit();            
        }
    
    } elseif ($formaPago == "credito"){
        $query = "INSERT INTO `creditos` (`id_credito`, `fecha_inicio`, `monto_debe`, `id_pago`, `folio_venta`, `Estado`, notas)
        VALUES (NULL, current_timestamp(),  '$total', '', '$id', 'Pendiente', '$notas')";
                  
        $result = mysqli_query($conn, $query);
        if(!$result){
            echo 'Error credito <br>';
        } else{
            echo 'Exito Credito <br>' ;
        }

        $folio_credito = "SELECT MAX(id_credito) FROM creditos";
        $resultado1 = mysqli_query($conn, $folio_credito);
        $id_credito;

        while($row = mysqli_fetch_assoc($resultado1)) {
            $id_credito = $row['MAX(id_credito)'];
        }
        $updateCredito = "UPDATE ventas SET id_credito = '$id_credito' WHERE folio='$id'";
        $resultado = mysqli_query($conn, $updateCredito);

        if(!$resultado){
            echo 'Error ventas folio credito<br>';
        } else{
            echo 'Exito venta <br>' ;
            $_SESSION['exito_venta'] = "Venta exitosa";
            header("Location: ventas_menu.php");
            exit();            
        }
    }

    mysqli_close($conn);
?>

