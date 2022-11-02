<?php
    session_start();
    include 'db.php';
    $id = $_GET["id"];

    $eliminar = "DELETE from gastos WHERE folio_gastos = '$id'";
    $resultado = mysqli_query($conn, $eliminar);
    if(!$resultado){
        echo "ocurrio un error "; 
        printf("Error en pago credito: %s\n", mysqli_error($conn));
    } else{
        echo "actualizacion exitosa";
        $_SESSION['exito_delGasto'] = "Eliminacion con exito";
        header("Location: gastos_menu.php");
        exit();
    }

    mysqli_close($conn);
?>