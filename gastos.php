<?php
include("db.php");

$id_caja = $_POST["caja"];
$concepto = $_POST["concepto"];
$monto = $_POST["monto"];
$descripcion = $_POST["descripcion"];

$gasto = "INSERT INTO `gastos` (`folio_gastos`, `concepto`, `monto`, `fecha`, `descripcion`, `id_caja`)
 VALUES (NULL, '$concepto', '$monto', current_timestamp(), '$descripcion', '$id_caja')";
$resultado = mysqli_query($conn, $gasto);

if(!$resultado){
    printf("Error al insertar gasto: %s\n", mysqli_error($conn));
} else{
    echo 'Exito en un nuevo gasto <br>' ;
}

$caja =  "UPDATE  caja SET dinero = dinero-'$monto' 
WHERE id_caja = '$id_caja'";

$resultado = mysqli_query($conn, $caja);

if(!$resultado){
    printf("Error al actualizar caja: %s\n", mysqli_error($conn));
} else{
    echo 'Exito al actuliozar caja <br>' ;
}


?>