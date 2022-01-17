<?php
include("db.php");
$id = $_POST["id"];
$precioNuevo = $_POST['precio'];
echo $id;

$sql = "UPDATE `precio` SET `precio` = '$precioNuevo' WHERE `precio`.`id_precio` = '$id';";
$resultado = mysqli_query($conn, $sql);
if(!$resultado){
    echo "ocurrio ujn error "; 
} else{
    echo "actualizacion exitosa";
}

?>