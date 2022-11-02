<?php
session_start();
include("db.php");
$metodo = $_POST["metodo"];
$id = $_POST["id"];
$idCompra = $_POST["idCompra"];
$monto = $_POST["monto"];
$caja = $_POST ["caja"];

$pago = "INSERT INTO pagos_compras (monto, metodo, id_caja, id_credito) 
VALUES ('$monto', '$metodo', '$caja', '$id')";
$resultado = mysqli_query($conn, $pago);

$credito =  "UPDATE  credito_compra SET monto_deuda = monto_deuda-'$monto' WHERE id_creditoCom = '$id'";
$caja_actual = mysqli_query($conn, $credito);

if(!$caja_actual){
    printf("Error en pago credito: %s\n", mysqli_error($conn));
} else{
    echo 'Exito pago credito <br>' ;
}

$cajaUp = "UPDATE caja SET dinero = dinero+'$monto' WHERE id_caja = $caja";
$caja_actual = mysqli_query($conn, $cajaUp);

$credito = "SELECT monto_deuda from credito_compra WHERE id_creditoCom = $id";
$consulta = mysqli_query($conn, $credito);
$deuda = 0;
while($row = mysqli_fetch_assoc($consulta)) {
    $deuda =  $row['monto_deuda'];
}

if($deuda <= 0){
    $credito =  "UPDATE  credito_compra SET estado = 'Pagado' WHERE id_creditoCom = '$id'";
    $estatus = mysqli_query($conn, $credito); 
    
    $_SESSION['exito_pagoCom2'] = "Pago realizado con exito, deuda actual finiquitada ";
} else{
    $_SESSION['exito_pagoCom2'] = "Pago realizado con exito, deuda actual: " . $deuda;
}

header("Location: detalles_compra.php?id=$idCompra");
exit();

echo 'Listo :P';
mysqli_close($conn);


?>