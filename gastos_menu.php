<?php
include('includes/header.php');
include("db.php");
?>

<div class="menu_gastos">
    <div class="container_form cliente gasto_form">
        <div class="titulo-modal">
            <h2>Gasto nuevo</h2>
        </div>
        <form action="gastos.php" method="post">
            <input type="text" placeholder="Concepto" name="concepto" required>
            <textarea name="descripcion" id="" cols="33" rows="5" placeholder="Descripcion"></textarea>
            <input type="number" placeholder="Monto" required name="monto">
            <select name="caja" id="">
                <?php
                $caja = "SELECT id_caja, nombre FROM caja";
                $resultado = mysqli_query($conn, $caja);
                while($row = mysqli_fetch_assoc($resultado)) {?>
                    <?php $id = $row["id_caja"]?>
                            <option value="<?php echo $id?>"> <?php echo $row["nombre"]?> </option>

                <?php } ?>

            </select>
            <input type="submit" value="Guardar">
        </form>
    </div>

    <div class="tabla_gastos">
    <div class="titulo">Gastos</div>
        <div class="cabeceras">
            <div class="table_header">Folio</div>
            <div class="table_header">Fecha</div>
            <div class="table_header">Concepto</div>
            <div class="table_header">Descripcion</div>
            <div class="table_header">Monto</div>
            <div class="table_header">Caja</div>
        </div>
        <div class="tabla gastos">
            <?php 
                $precio = "SELECT a.folio_gastos, a.concepto, a.monto, a.fecha, a.descripcion, b.nombre
                FROM gastos a INNER JOIN caja b where a.id_caja = b.id_caja";
                $resultado = mysqli_query($conn, $precio);

                while($row = mysqli_fetch_assoc($resultado)) {?>

                <div class="table_item"> <?php echo $row["folio_gastos"] ?> </div>
                <div class="table_item"> <?php echo $row["fecha"] ?> </div>
                <div class="table_item"> <?php echo $row["concepto"] ?> </div>            
                <div class="table_item"> <?php echo $row["descripcion"] ?> </div>
                <div class="table_item"> <?php echo $row["monto"] ?> </div>
                <div class="table_item"> <?php echo $row["nombre"] ?> </div>
             <?php } ?>
        </div>
    </div>
</div>
