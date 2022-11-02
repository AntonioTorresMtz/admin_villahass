<?php
session_start();
include("db.php");
$id = $_POST["id"];
$concepto = $_POST["concepto"];
$monto = $_POST["monto"];
$descripcion = $_POST["descripcion"];

echo $id;

$concepto2 = "";
$monto2 = "";
$descripcion2 = "";

$consulta = "SELECT concepto, monto, descripcion FROM gastos where folio_gastos = '$id'";
$resultado = mysqli_query($conn, $consulta);

while($row = mysqli_fetch_assoc($resultado)) {
    $concepto2 = $row["concepto"];
    $monto2 = $row["monto"];
    $descripcion2 = $row["descripcion"];
}
echo "Yei";

if(empty($concepto)){
    $concepto = $concepto2;
}

if(empty($monto)){
    $monto = $monto2;
}

if(empty($descripcion)){
    $descripcion = $descripcion2;
}


/* UPDATE `cliente` SET `Nombre` = 'Miguel', `ApetPa` = 'Munguia', `ApetMa` = 'Alanis', `telefono` = '4251006713',
 `razon_social` = 'Avocados Reyes', `direccion` = 'Calle victor Rosales, colonia los fresnos numero 26' WHERE `cliente`.`id_cliente` = 2; */

$sql = "UPDATE `gastos` SET `concepto` = '$concepto', `monto` = '$monto', `descripcion` = '$descripcion',
`deuda_por_pagar` = '$monto' WHERE `gastos`.`folio_gastos` = '$id'";

$resultado = mysqli_query($conn, $sql);
if(!$resultado){
    echo "ocurrio un error "; 
    printf("Error en pago credito: %s\n", mysqli_error($conn));
} else{
    echo "actualizacion exitosa";
    $_SESSION['exito_gastoAct'] = "Actualizacion exitosa";
    header("Location: gastos_menu.php");
    exit();
}

mysqli_close($conn);
?>