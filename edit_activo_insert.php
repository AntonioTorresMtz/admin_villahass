<?php
session_start();
include("db.php");
$id = $_POST["id"];
$nombre = $_POST["nombre"];
$valor_unitario = $_POST["valor_unitario"];
$cantidad = $_POST["cantidad"];


echo $id;

$nombre2 = "";
$valor_unitario2 = 0;
$cantidad2 = 0;

$consulta = "SELECT * FROM activos where id_activo = '$id'";
$resultado = mysqli_query($conn, $consulta);

while($row = mysqli_fetch_assoc($resultado)) {
    $nombre2 = $row["nombre"];
    $valor_unitario2 = $row["valor_unitario"];
    $cantidad2 = $row["cantidad"];

}
echo "Yei";

if(empty($nombre)){
    $nombre = $nombre2;
}

if(empty($valor_unitario)){
    $valor_unitario = $valor_unitario2;
}

if(empty($cantidad)){
    $cantidad = $cantidad22;
}



/* UPDATE `cliente` SET `Nombre` = 'Miguel', `ApetPa` = 'Munguia', `ApetMa` = 'Alanis', `telefono` = '4251006713',
 `razon_social` = 'Avocados Reyes', `direccion` = 'Calle victor Rosales, colonia los fresnos numero 26' WHERE `cliente`.`id_cliente` = 2; */
$total = $cantidad*$valor_unitario;

$sql = "UPDATE `activos` SET `nombre` = '$nombre', `valor_unitario` = '$valor_unitario', `cantidad` = '$cantidad',
`valor_total` = '$total' WHERE `activos`.`id_activo` = '$id'";

$resultado = mysqli_query($conn, $sql);
if(!$resultado){
    echo "ocurrio un error "; 
    printf("Error en pago credito: %s\n", mysqli_error($conn));
} else{
    echo "actualizacion exitosa";
    $_SESSION['exito_actActivo'] = "Actualizacion exitosa";
    header("Location: activos_menu.php");
    exit();
}

mysqli_close($conn);
?>