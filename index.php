<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Expires" content="0">
 
    <title>Pagina principal</title>
    <!--BOOTSTRAP 4 -->
    <link rel="stylesheet" href="includes/cabecera.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200;300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>
    <nav class="cabecera">
    <div class="logo">
        <a href="index.php"><img src="img/villahass.png" alt="roja"></a>
    </div>
    </nav>
    
    <?php
    include 'db.php';
    //include 'includes/header.php';
    session_start();
    include("db.php");

    if(isset($_POST['ingresar'])){
        $correo = $_POST['email'];
        $contrasena = $_POST['password'];
        $contrasena = hash('sha512', $contrasena);
        //$validar = "SELECT * FROM usuarios WHERE  username = '$correo' and contrasena = '$contrasena'";
        $sql = mysqli_query($conn, "SELECT * FROM usuarios WHERE  username = '$correo' and passwords = '$contrasena'");
        $mensaje='';

        if(mysqli_num_rows($sql) > 0){
            $_SESSION['usuario'] = $correo;
            header("location: inventario.php");
        } else{
            $mensaje="La contraseña y el usuario no coinciden";
        }
    }

    if (isset($_SESSION['usuario'])){
        header("location: inventario.php");
    }
    ?>
    <div class="error">
    <?php if(!empty($mensaje)):?>
        <p> <?=  $mensaje ?> </p>
        <?php endif; ?>
    </div>
    <div class="formulario cliente login">
        <div class="titulo-modal">
            <h2>Nuevo pago</h2>
        </div>
        <form action="index.php" method="post">
            <label for="metodo">Usuario</label>
            <input type="email" placeholder="Usuario" name="email">
            <input type="password" name="password" placeholder="Contraseña">
            <input type="submit" value="Ingresar" name="ingresar">
        </form>
    </div>
</body>