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
          <div class="cabeceras-7">
               <div class="table_header">Razon Social</div>
               <div class="table_header">Nombre</div>
               <div class="table_header">Apellido Paterno</div>
               <div class="table_header">Apellido Materno</div>
               <div class="table_header">Telefono</div>
               <div class="table_header">Direccion</div> 
               <div class="table_header">Editar</div> 
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
          <div class="table_item"> <a href="editar_cliente.php?id=<?php echo $row["id_cliente"];?>">
            <i class="fas fa-edit"></i></a> </div>
          
          <?php } ?>

          </div>
     </div>
     <?php
          if(empty($_SESSION['exito'])){

          } else{
               //echo "EXITO!";
               //$message = "Actualizacion exitosa";
               //echo "<script type='text/javascript'>alert('$message');</script>";
               echo "<script type='text/javascript'>Swal.fire(
                    'Cambio exitoso!',
                    'Se han cambiado los datos!',
                    'success'
               )</script>";
               unset($_SESSION['exito']);
          }

          if(empty($_SESSION['exito_cliente'])){

          } else{
               //echo "EXITO!";
               //$message = "Actualizacion exitosa";
               //echo "<script type='text/javascript'>alert('$message');</script>";
               echo "<script type='text/javascript'>Swal.fire(
                    'Cliente creado exitosamente!',
                    'Se ha creado un nuevo cliente!',
                    'success'
               )</script>";
               unset($_SESSION['exito_cliente']);
          }
     
          //session_unset();
     ?>
</div>

<?php
include('includes/footer.php');
mysqli_close($conn);
?>