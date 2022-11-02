<?php
include("db.php");
include("includes/header.php");
?>

<div class="container_form cliente center">
        <div class="titulo-modal">
            <h2>Inversion</h2>
        </div>
        <form action="inversion_insert.php" method="post">
            <input type="number" name="monto" placeholder="Monto de inversion" required>
            <input type="submit" value="Agregar">
        </form>
    </div>

