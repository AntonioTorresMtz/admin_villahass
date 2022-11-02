<?php
include 'db.php';

$monto = $_POST["monto"];
$sql = "INSERT INTO `inversion` (`id_inversion`, `monto`, `fecha`) VALUES
 (NULL, '$monto', current_timestamp())";

$resultado = mysqli_query($conn, $sql);
if(!$resultado){
    echo 'Error inversion <br>';
} else{
    echo 'Exito inversion <br>' ;
}
?>