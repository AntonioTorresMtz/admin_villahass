<?php
include("db.php");
include("includes/header.php");
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
        <div class="titulo">Inventario</div>
        <div class="cabeceras-4">
            <div class="table_header">Calibrel</div>
            <div class="table_header">Precio</div>
            <div class="table_header">No. de Cajas</div>
            <div class="table_header">Modificar</div>
        </div>
        <div class="tabla inventario">
            <?php 
            $precio = "SELECT * FROM precio";
            $resultado = mysqli_query($conn, $precio);

            while($row = mysqli_fetch_assoc($resultado)) {?>

            <div class="table_item"> <?php echo $row["nombre"] ?> </div>
            <div class="table_item"> <?php echo $row["precio"] ?> </div>
            <div class="table_item"> <?php echo $row["cantidad"] ?> </div>
            <div class="table_item"> <a href="edit_precio.php?id=<?php echo $row["id_precio"];?>">
            <i class="fas fa-edit"></i></a> </div>
            <?php } ?>

        </div>
    </div>
</div>

<?php
$calibres = array("Super", "Super B", "Super Roña", "Extra", "Extra B", "Extra Roña", "Primera", "Primera B",
"Primera Roña", "Mediano", "Mediano B", "Mediano Roña", "Tercera", "Tercera B" );

/*$calibres = array('1'=> "Super", '2'=>"Super B", '3'=>"Super Roña", '4'=> "Extra", '5' => "Extra B",
'6' => "Extra Roña", '7' => "Primera", '8' => "Primera B", '9' => "Primera Roña", '10' => "Mediano",
'11' => "Mediano B", '12' => "Mediano Roña", '13' => "Tercera", '14' => "Tercera B"); */

$cajas = array();
$subtotal = array();

for ($i = 0; $i<14; $i++){
    $cajas[$i]=0;
    $subtotal[$i]=0;
    //echo $cajas[$i]. "<br>";
}

$promedio = "SELECT a.calibre, a.cajas, a.subtotal, b.fecha FROM descripcion_compra a
INNER JOIN compras b ON b.id_compra = a.id_compra;";

$resultado = mysqli_query($conn, $promedio);
while($row = mysqli_fetch_assoc($resultado)){

    switch($row["calibre"]){
        case "Super":
            $cajas[0] = $cajas[0] + $row["cajas"];
            $subtotal[0] = $subtotal[0] + $row["subtotal"];
            break;
        case "Super B":
            $cajas[1] = $cajas[1] + $row["cajas"];
            $subtotal[1] = $subtotal[1] + $row["subtotal"];
            break;
        case "Super Roña":
            $cajas[2] = $cajas[2] + $row["cajas"];
            $subtotal[2] = $subtotal[2] + $row["subtotal"];
            break;
        case "Extra":
            $cajas[3] = $cajas[3] + $row["cajas"];
            $subtotal[3] = $subtotal[3] + $row["subtotal"];
            break;
        case "Extra B":
            $cajas[4] = $cajas[4] + $row["cajas"];
            $subtotal[4] = $subtotal[4] + $row["subtotal"];
            break;
        case "Extra Roña":
            $cajas[5] = $cajas[5] + $row["cajas"];
            $subtotal[5] = $subtotal[5] + $row["subtotal"];
            break;
        case "Primera":
            $cajas[6] = $cajas[6] + $row["cajas"];
            $subtotal[6] = $subtotal[6] + $row["subtotal"];
            break;
        case "Primera B":
            $cajas[7] = $cajas[7] + $row["cajas"];
            $subtotal[7] = $subtotal[7] + $row["subtotal"];
            break;
        case "Primera Roña":
            $cajas[8] = $cajas[8] + $row["cajas"];
            $subtotal[8] = $subtotal[8] + $row["subtotal"];
            break;
        case "Mediano":
            $cajas[9] = $cajas[9] + $row["cajas"];
            $subtotal[9] = $subtotal[9] + $row["subtotal"];
            break;
        case "Mediano B":
            $cajas[10] = $cajas[10] + $row["cajas"];
            $subtotal[10] = $subtotal[10] + $row["subtotal"];
            break;
        case "Mediano Roña":
            $cajas[11] = $cajas[11] + $row["cajas"];
            $subtotal[11] = $subtotal[11] + $row["subtotal"];
            break;
        case "Tercera":
            $cajas[12] = $cajas[12] + $row["cajas"];
            $subtotal[12] = $subtotal[12] + $row["subtotal"];
            break; 
        case "Tercera B":
            $cajas[13] = $cajas[13] + $row["cajas"];
            $subtotal[13] = $subtotal[13] + $row["subtotal"];
            break;           
    }
}

for ($i = 0; $i<14; $i++){
    echo $calibres[$i] . "     ";
    echo $cajas[$i] . "     ";
    echo $subtotal[$i]. "     <br>";
    //echo $cajas[$i]. "<br>";
}



?>
   
  <?php 
  mysqli_close($conn);
  include("includes/footer.php")
  ?>