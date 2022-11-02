<?php
session_start();
include("db.php");

$abono = $_POST["abono"];
$concepto = $_POST["concepto"];
$monto = $_POST["monto"];
$descripcion = $_POST["descripcion"];

$deuda = $monto - $abono;
//CREAR COMPRA
$gasto = "INSERT INTO `gastos` (`folio_gastos`, `concepto`, `monto`, `fecha`, `descripcion`, `deuda_por_pagar`)
 VALUES (NULL, '$concepto', '$monto', current_timestamp(), '$descripcion', '$deuda')";
$resultado = mysqli_query($conn, $gasto);

if(!$resultado){
    printf("Error al insertar gasto: %s\n", mysqli_error($conn));
} else{
    echo 'Exito en un nuevo gasto <br>' ;
}

//SELECCIONAR EL ID DE LA INSERCION PASADA

$folio = "SELECT MAX(folio_gastos) FROM gastos";
$resultado = mysqli_query($conn, $folio);
$id;
while($row = mysqli_fetch_assoc($resultado)) {
     $id = $row['MAX(folio_gastos)'];
}

//CREAR LISTA DE ABONOS
$abono_t = "INSERT INTO abonos_gastos (`id_abono`, `id_gasto`, `monto`, `fecha`) 
VALUES (NULL, '$id', '$abono', current_timestamp())";

$resultado = mysqli_query($conn, $abono_t);

if(!$resultado){
    printf("Error al actualizar caja: %s\n", mysqli_error($conn));
} else{
    echo "New record created successfully";
    $_SESSION['exito_gasto'] = "Gasto nuevo";
    header("Location: gastos_menu.php");
    exit(); 
}


?>