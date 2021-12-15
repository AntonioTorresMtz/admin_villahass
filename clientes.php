<?php
include('db.php');

$nombre = $_POST["nombre"];
$apePat = $_POST["apePat"];
$apeMat = $_POST["apeMat"];
$telefono = $_POST["telefono"];
$razonSocial = $_POST["razonSocial"];
$direccion = $_POST["direccion"];


$sql = "INSERT INTO `cliente` (`id_cliente`, `Nombre`, `ApetPa`, `ApetMa`, `telefono`, `razon_social`, `direccion`) 
VALUES (NULL, '$nombre', '$apePat', '$apeMat', '$telefono', '$razonSocial', '$direccion')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);


?>