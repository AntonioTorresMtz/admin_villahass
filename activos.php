<?php
session_start();
include("db.php");

$nombre = $_POST["nombre"];
$cantidad = $_POST["cantidad"];
$valor_unit = $_POST["valor_unit"];
$valor_tot = $cantidad * $valor_unit;

$activo = "INSERT INTO `activos` (`id_activo`, `nombre`, `valor_unitario`, `cantidad`, `valor_total`, `fecha_adqui`)
 VALUES (NULL, '$nombre', '$valor_unit', '$cantidad', '$valor_tot', current_timestamp());";
$resultado = mysqli_query($conn, $activo);



if(!$resultado){
    printf("Error al insertar activo: %s\n", mysqli_error($conn));
} else{
    echo 'Exito activo <br>' ;
    $_SESSION['exito_activo'] = "Activo creado";
    header("Location: activos_menu.php");
    exit();
}

?>