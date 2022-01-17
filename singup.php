<?php
    include 'db.php';
    include 'includes/header.php';
    $message = '';

    if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['nombre'])){
        $username = $_POST['email'];
        $name = $_POST['nombre'];
        $passwords = hash('sha512', $_POST['password']);
        $sql = "INSERT  INTO usuarios (username, nombre, passwords) VALUES ('$username', '$name', '$passwords')";
        
        $resultado = mysqli_query($conn, $sql);
        if(!$resultado){
            $message = 'Sorry there is a problem';
        } else{
            $message = 'Succesful created new user';
        }
        
    }
?>

<div class="formulario cliente login">
    <div class="titulo-modal">
        <h2>Crear usuario nuevo</h2>
    </div>
    <?php if(!empty($message)):?>
    <p> <?=  $message ?> </p>
    <?php endif; ?>    
    <form action="singup.php" method="post">
        <input type="text" placeholder="Nombre" name="nombre" required>
        <input type="email" placeholder="Email" name="email" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <input type="submit" value="Registrar">
    </form>
</div>