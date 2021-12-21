<?php include("db.php")?>

<?php include("includes/header.php");
$caja = "SELECT * FROM caja";
?>

<div class="caja_menu">
    <div class="tabla_caja">
        <div class="titulo">Caja</div>
        <div class="tabla caja"> 
            <div class="table_header">Nombre</div>
            <div class="table_header">Cantidad</div>
            <?php $resultado = mysqli_query($conn, $caja);

            while($row = mysqli_fetch_assoc($resultado)) {?>
            <?php 
            $dinero = $row['dinero'];
            $dineroS = (string) $dinero;
            $cont=0;
            $final="";
            for ($i = strlen($dineroS)-1 ; $i >= 0; $i--){
                if($cont == 3){
                    $final = $final.",";
                    $cont=0;
                }
                $final = $final.$dineroS[$i];
                $cont++;
            }
            $final = strrev($final);
            
            ?>
            <div class="table_item"> <?php echo $row["nombre"] ?> </div>
            <div class="table_item"> <?php echo "$". $final ?> </div>
            <?php } ?>
            
        </div>
    </div>

    <div class="tabla_inventario">
        <div class="titulo">Clientes</div>
        <div class="cabeceras-3">
               <div class="table_header">Calibrel</div>
               <div class="table_header">Precio</div>
               <div class="table_header">No. de Cajas</div>
          </div>
        <div class="tabla inventario">
            <?php 
            $precio = "SELECT nombre, precio, cantidad FROM precio";
            $resultado = mysqli_query($conn, $precio);

            while($row = mysqli_fetch_assoc($resultado)) {?>

            <div class="table_item"> <?php echo $row["nombre"] ?> </div>
            <div class="table_item"> <?php echo $row["precio"] ?> </div>
            <div class="table_item"> <?php echo $row["cantidad"] ?> </div>            
            <?php } ?>

        </div>
    </div>
</div>
   
  <?php 
  mysqli_close($conn);
  include("includes/footer.php")
  ?>