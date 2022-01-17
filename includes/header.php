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
    <?php
    include("login_validar.php");
    ?>
    <nav class="cabecera">
    <div class="logo">
        <a href="index.php"><img src="img/villahass.png" alt="roja"></a>
    </div>
    <div class="vinculos">
        <a href="ventas_menu.php">Ventas</a>
        <a href="compras_menu.php">Compras</a>
        <a href="caja_compras.php">CajaC</a>
        <a href="caja_menu.php">CajaV</a>
        <a href="clientes_menu.php">Clientes</a>
        <a href="gastos_menu.php">Gastos</a>
        <a href="inventario.php">Inventario</a>
    </div>
    </nav>
    <div class="session">
        <a href="cerrar.php" class="cerrar_sesion">Cerrar sesion</a>
    </div>