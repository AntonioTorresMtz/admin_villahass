<?php
session_start();
include("db.php");
$id = $_POST["id"];
$nombre = $_POST["nombre"];
$razon_social = $_POST["razon_social"];
$apet_pat = $_POST["apet_pat"];
$telefono = $_POST["telefono"];
$direccion = $_POST["direccion"];

echo $id;

$nombre2 = "";
$razon_social2 = "";
$apet_pat2 = "";
$telefono2 = "";
$direccion2 = "";

$consulta = "SELECT * FROM cliente where id_cliente = '$id'";
$resultado = mysqli_query($conn, $consulta);

while($row = mysqli_fetch_assoc($resultado)) {
    $nombre2 = $row["Nombre"];
    $razon_social2 = $row["razon_social"];
    $apet_pat2 = $row["ApetPa"];
    $telefono2 = $row["telefono"];
    $direccion2 = $row["direccion"];
}
echo "Yei";

if(empty($nombre)){
    $nombre = $nombre2;
}

if(empty($razon_social)){
    $razon_social = $razon_social2;
}

if(empty($apet_pat)){
    $apet_pat = $apet_pat2;
}

if(empty($telefono)){
    $telefono = $telefono2;
}

if(empty($direccion)){
    $direccion = $direccion2;
}


/* UPDATE `cliente` SET `Nombre` = 'Miguel', `ApetPa` = 'Munguia', `ApetMa` = 'Alanis', `telefono` = '4251006713',
 `razon_social` = 'Avocados Reyes', `direccion` = 'Calle victor Rosales, colonia los fresnos numero 26' WHERE `cliente`.`id_cliente` = 2; */

$sql = "UPDATE `cliente` SET `Nombre` = '$nombre', `ApetPa` = '$apet_pat', `telefono` = '$telefono',
`razon_social` = '$razon_social', `direccion` = '$direccion' WHERE `cliente`.`id_cliente` = '$id'";

$resultado = mysqli_query($conn, $sql);
if(!$resultado){
    echo "ocurrio un error "; 
    printf("Error en pago credito: %s\n", mysqli_error($conn));
} else{
    echo "actualizacion exitosa";
    $_SESSION['exito'] = "Actualizacion exitosa";
    header("Location: clientes_menu.php");
    exit();
}

mysqli_close($conn);
?>