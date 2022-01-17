<?php
session_start();
if(!isset($_SESSION['usuario'])){
    echo '
    <script>
        alert("Por favor debes inicar sesion");
        window.location = "index.php";
    </script>
    ';
    //header("location: index.php");
    session_destroy();
    die();
}
/*session_start();
include("db.php");
$correo = $_POST['email'];
$contrasena = $_POST['password'];
$contrasena = hash('sha512', $contrasena);
//$validar = "SELECT * FROM usuarios WHERE  username = '$correo' and contrasena = '$contrasena'";
$sql = mysqli_query($conn, "SELECT * FROM usuarios WHERE  username = '$correo' and passwords = '$contrasena'");


if(mysqli_num_rows($sql) > 0){
    $_SESSION['usuario'] = $correo;
    header("location: inventario.php");
} else{
    echo "Algo anda mal";
} */
?>