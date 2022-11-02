<?php
    session_start();
    include 'db.php';
    $id = $_GET["id"];

    $eliminar = "DELETE from activos WHERE id_activo = '$id'";
    $resultado = mysqli_query($conn, $eliminar);
    if(!$resultado){
        echo "ocurrio un error "; 
        printf("Error en pago credito: %s\n", mysqli_error($conn));
    } else{
        echo "actualizacion exitosa";
        $_SESSION['exito_delActivo'] = "Eliminacion con exito";
        header("Location: activos_menu.php");
        exit();
    }

    mysqli_close($conn);
?>