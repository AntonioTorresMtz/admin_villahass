<?php include('includes/header.php');
include("db.php");

?>

<div class="menu_clientes">
     <div class="formulario cliente">
          <div class="titulo-modal">
               <h2>Cliente Nuevo</h2>
          </div>
          <form action="clientes.php" method="post">
               <input type="text" placeholder="Nombre" name="nombre">
               <input type="text" placeholder="Apellido Paterno" name="apePat">
               <input type="text" placeholder="Apellido Materno" name="apeMat">
               <input type="text" placeholder="Razon social" name="razonSocial">
               <input type="text" placeholder="Telefono" name="telefono">
               <input type="text" placeholder="direccion" name="direccion">
               <input type="submit" value="Guardar">
          </form>
     </div>

     <div>

     <div class="tabla_clientes">
          <div class="titulo">Clientes</div>
          <div class="cabeceras">
               <div class="table_header">Razon Social</div>
               <div class="table_header">Nombre</div>
               <div class="table_header">Apellido Paterno</div>
               <div class="table_header">Apellido Materno</div>
               <div class="table_header">Telefono</div>
               <div class="table_header">Direccion</div> 
          </div>
          <div class="tabla clientes">
          <?php 
          $cliente = "SELECT * FROM cliente";
          $resultado = mysqli_query($conn, $cliente);

          while($row = mysqli_fetch_assoc($resultado)) {?>

          <div class="table_item"> <?php echo $row["razon_social"] ?> </div>
          <div class="table_item"> <?php echo $row["Nombre"] ?> </div>
          <div class="table_item"> <?php echo $row["ApetPa"] ?> </div>
          <div class="table_item"> <?php echo $row["ApetMa"] ?> </div>
          <div class="table_item"> <?php echo $row["telefono"] ?> </div>
          <div class="table_item"> <?php echo $row["direccion"] ?> </div>
          
          <?php } ?>

          </div>
     </div>
</div>