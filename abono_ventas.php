<?php
session_start();
include("db.php");
$metodo = $_POST["metodo"];
$id = $_POST["id"];
$idVenta = $_POST["idVenta"];
$monto = $_POST["monto"];
$caja = $_POST ["caja"];

$pago = "INSERT INTO pagos (monto, metodo, id_caja, id_credito) 
VALUES ('$monto', '$metodo', '$caja', '$id')";
$resultado = mysqli_query($conn, $pago);

$credito =  "UPDATE  creditos SET monto_debe = monto_debe-'$monto' WHERE id_credito = '$id'";
$caja_actual = mysqli_query($conn, $credito);

if(!$caja_actual){
    printf("Error en pago credito: %s\n", mysqli_error($conn));
} else{
    echo 'Exito pago credito <br>' ;
}

$cajaUp = "UPDATE caja SET dinero = dinero+'$monto' WHERE id_caja = $caja";
$caja_actual = mysqli_query($conn, $cajaUp);

$credito = "SELECT monto_debe from creditos WHERE id_credito = $id";
$consulta = mysqli_query($conn, $credito);
$deuda = 0;
while($row = mysqli_fetch_assoc($consulta)) {
    $deuda =  $row['monto_debe'];
}

if($deuda <= 0){
    $credito =  "UPDATE  creditos SET Estado = 'Pagado' WHERE id_credito = '$id'";
    $estatus = mysqli_query($conn, $credito); 
    
    $_SESSION['exito_pagoComs'] = "Pago realizado con exito, deuda actual finiquitada ";
} else{
    $_SESSION['exito_pagoComs'] = "Pago realizado con exito, deuda actual: " . $deuda;
}

header("Location: detalles_venta.php?id=$idVenta");
exit();

echo 'Listo :P';
mysqli_close($conn);


?>