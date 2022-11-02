<?php include('includes/header.php');
include("db.php");
include 'includes/metodos.php';
$ventas = "SELECT a.fecha, a.folio, b.razon_social,  a.total, a.num_factura,
 a.id_pago,a.id_credito from ventas a 
inner join cliente b on a.id_cliente = b.id_cliente ";
//ORDER BY fecha DESC

/* 
select a.fecha, a.folio, b.razon_social, a.calibre, a.kilogramos, a.total, a.num_factura, a.plazo, a.id_pago,
a.id_credito from ventas a 
inner join cliente b on a.id_cliente = b.id_cliente ORDER BY fecha DESC;
*/
$precio = "SELECT * FROM precio";
$clientes = "SELECT * FROM cliente";
?>
        
<div class="ventas-cabecera">
        <div class="formulario compras">
       
                <h2>Venta Nueva</h2>
       

        <form action="ventas.php" method="post">

                <label for="cliente"> Cliente</label>
                <select name="cliente" id="cliente">
                        <?php $resultado = mysqli_query($conn, $clientes);

                        while($row = mysqli_fetch_assoc($resultado)) {?>
                                <?php $id = $row["id_cliente"]?>
                                <option value="<?php echo $id?>"> <?php echo $row["razon_social"]?> </option>

                        <?php } ?>    
                </select>

                <label for="calibre">Calibre</label>

                <table class="table bg-info"  id="tabla">
                        <tr class="fila-fija">
                                <td>
                                <select name="calibre[]" id="calibre">
                                        <option value="Limpio">Limpio</option> 
                                        <option value="Parejo">Parejo</option> 
                                        <option value="Proceso">Proceso</option>
                                        <option value="Canica">Canica</option> 
                                        <option value="Desecho">Desecho</option> 
                                        <option value="Maquila">Maquila</option>
                                        <option value="Caja de 10 kg">Caja de 10 kg</option>        
                                </select>  
                                </td>
                                <td><input type="number" required name="cajas[]" placeholder="No. de kg"/></td>
                                <td><input type="number" required name="precio[]" placeholder="Precio"/></td>
                                
                                <!-- <td class="eliminar"><input type="button"   value="Menos -"/></td> -->
                                <td class="eliminar"><button value="Menos -"><i class="fas fa-minus-circle"></i></button></td>
                        </tr>
                </table>
                        <div class="btn-der">
                                <button id="adicional" name="adicional" type="button" class="btn btn-warning"> <i class="far fa-plus-square"></i> </button>
                        </div>
                        
                        <div class="factura">
                                <p>Facura:</p>
                                <input type="radio" name="factura" id="sip" value="si"> <label for="si">Si</label>
                                <input type="radio" name="factura" id="nop" value="no"> <label for="no">No</label>
                        </div>
                        <input type="text" placeholder="Factura" name="factura" class="facturaInput" id="facturaInput">
                        <div class="pago"> 
                                <p>Tipo de pago:</p>
                                <input type="radio" name="metodoPago" id="credito" value="credito" required> <label for="credito">Credito</label>
                                <input type="radio" name="metodoPago" id="liquida" value="liquida"> <label for="liquida">Liquida</label>
                        </div>
                
                <div class="credito_formulario" id="credito_formulario">
                        <h2>Credito</h2>
                                <label for="condiciones">Condiciones</label>
                                <input type="text" placeholder="Condiciones" id="condiciones" name="notas">
                </div>

                <div class="liquida_formulario" id="liquida_formulario">
                        <h2>Liquidar</h2>
                        <label for="formaL">Forma de liquidacion</label>
                        <select name="formaL" id="formaL">
                                <option value="Efectivo">Efectivo</option>
                                <option value="Cheque">Cheque</option>
                                <option value="Transferencia">Transferencia</option>
                        </select>

                        <select name="cuenta" id="cuenta" class="cuenta">
                                <option value="4">Cuenta OMVIZA</option>
                                <option value="5">Cuenta Paulina</option>
                        </select>
                </div>
                
                <input type="submit" value="Guardar" name="insertar">

            
        </form>
</div>

<div class="ventas-tabla">
        <!-- Filtro de ventas -->
        <div class="filtro_ventas">
                <form method="POST" class="filtro-form">
                        <div class="filtro">
                                <label for="fecha_fil">Fecha</label>
                                <select name="fecha_fil" id="fecha_fil" class="filter">
                                        <option value="">Todo</option>
                                        <option value="-10">Ultima semana</option>        
                                        <option value="-30">Ultimo mes</option>
                                        <option value="-365">Ultimo año</option>
                                </select>
                        </div>

                        <div class="filtro">
                                <label for="cliente-fil">Cliente</label>
                                <select name="cliente" id="cliente-fil" class="filter">
                                        <option value="">Todo</option>
                                        <?php $resultado = mysqli_query($conn, $clientes);

                                        while($row = mysqli_fetch_assoc($resultado)) {?>
                                        <?php $id = $row["id_cliente"]?>
                                                <option value="<?php echo $id?>"> <?php echo $row["razon_social"]?> </option>

                                        <?php } ?>
                        
                                </select>
                        </div>

                         <div class="filtro">
                                <label for="folio">Folio</label>
                                <input name="folio" type="text" placeholder="Numero de folio" class="filter" id="folio">
                         </div>               
                         
                         <div class="filtro">
                                <?php $calibre="SELECT nombre, id_precio FROM precio "?>
                                <label for="calibre">Calibre</label>
                                <select name="calibre" id="calibre" class="filter">
                                <option value="">Todo</option>
                                        <?php $resultado = mysqli_query($conn, $calibre);
                                        
                                        while($row = mysqli_fetch_assoc($resultado)) {?>
                                                
                                                <option value="<?php echo $row['nombre']?>"> <?php echo $row["nombre"]?> </option>

                                        <?php } ?>
                        
                                </select>
                         </div>                       

                        <div class="filtro">
                                <label for="orden">Orden</label>
                                <select name="orden" id="orden" class="filter">
                                        <option value="ORDER BY fecha DESC">Mas reciente</option>
                                        <option value="ORDER BY fecha ASC">Mas antiguo</option>
                                 </select>
                        </div>                        
                        
                        <div class="filtro">
                                <label for="cajas">Cajas</label>
                                <select name="cajas" id="cajas" class="filter">
                                        <option value="">Todo</option>
                                        <option value="< 50"> &lt; 50 </option>
                                        <option value="< 100"> &lt; 100 </option>
                                        <option value="< 200"> &lt; 200 </option>
                                        <option value=">= 200"> &gt; = 200 </option>
                                </select>                   
                        </div>

                        <div class="filtro">
                                <label for="total">Total</label>
                                <select name="total" id="total" class="filter">
                                        <option value="">Todo</option>
                                        <option value="< 10000"> &lt; $10 mil </option>
                                        <option value="< 25000"> &lt; $25 mil </option>
                                        <option value="< 50000"> &lt; $50 mil </option>
                                        <option value=">= 50000"> &gt; = $50 mil </option>
                                </select>                   
                        </div>

                        <div class="filtro">
                                <label for="factura">Factura</label>
                                <input type="text" id="factura" class="filter" name="factura">
                        </div>

                        <div class="filtro">
                                <label for="plazo">Plazo</label>
                                <select name="plazo" id="plazo" class="filter">
                                        <option value="">Todo</option>
                                        <option value="">Proxima semana</option>
                                        <option value="">Proxima mes</option>
                                        <option value="">Vencidos</option>
                                </select>
                        </div>
                        
                         
                         <button class="filtro_btn" name="filtrar" type="submit">Buscar</button>                       
                </form>
        </div>
        
        <!-- Querys de la consulta-->
        <?php
        if(isset($_POST['filtrar'])){
                $cliente = $_POST["cliente"];
                $fecha = $_POST["fecha_fil"];
                $folio = $_POST["folio"];
                $calibre = $_POST["calibre"];
                $orden = $_POST["orden"];
                $cajas = $_POST["cajas"];
                $total = $_POST["total"];
                $factura = $_POST["factura"];
                $where="";

                
                if(empty($_POST["fecha_fil"])){
                        $where=$where;
                }else{
                        $where=$where . " where fecha > CURDATE()".$fecha;
                        
                }
        
                if(empty($_POST["cliente"])){
                        $where=$where;
                } else{
                        $where=$where . " and a.id_cliente =" . $cliente;       
                }
               
                if(empty($folio)){
                        $where=$where;
                       // echo 'Vacio';
                } else{
                        $where=$where . " and a.folio =" . $folio;       
                }

                if(empty($_POST["calibre"])){
                        $where=$where;
                } else{
                        $where=$where . " and a.calibre =" ."'". $calibre ."'";       
                }

                if(empty($_POST["cajas"])){
                        $where=$where;
                } else{
                        $where=$where . " and a.kilogramos " . $cajas;       
                }

                if(empty($_POST["total"])){
                        $where=$where;
                } else{
                        $where=$where . " and a.total " . $total;       
                }

                if(empty($factura)){
                        $where=$where;
                        //echo 'Vacio * 2 ';
                } else{
                        $where=$where . " and a.num_factura LIKE " ."'%". $factura ."%'";       
                }

                if(empty($_POST["orden"])){
                        $where=$where;
                } else{
                        $where=$where . " " . $orden;       
                }

                $ventas = $ventas .$where;
               // echo $ventas;
        } 

        ?>

        <!-- Tabla de ventas -->
        <?php
        $descripcion="";
        ?>
<div class="ejemplo">
        <div class="tabla">
                <div class="table_title details">Registro de ventas</div>
                <div class="table_header">Detalles</div>
                <div class="table_header">Fecha</div>
                <div class="table_header">Cliente</div>
                <div class="table_header">Folio</div>
                <div class="table_header">Total</div>
        
                <div class="table_header">Factura</div>
                <div class="table_header">Plazo</div>
                <div class="table_header">Pago</div>
                <div class="table_header">Credito</div>
        
                <?php $resultado = mysqli_query($conn, $ventas);

                while($row = mysqli_fetch_assoc($resultado)) {?>
                        <div class="table_item"> <a href="detalles_venta.php?id=<?php echo $row["folio"];?>"
                        target="_blank"><i  class="fas fa-chevron-circle-down"></i> </a></div>
                        <?php
                        $dinero = $row['total'];
                        $final = formatoDinero($dinero);
                        $folio = $row['folio'];
                        ?>
                        <div class="table_item"> <?php echo $row["fecha"] ?> </div>
                        <div class="table_item"> <?php echo $row["razon_social"] ?> </div>
                        <div class="table_item"> <?php echo $row["folio"] ?> </div>        
                        <div class="table_item"> <?php echo $final ?> </div>        
                        <div class="table_item"> <?php echo $row["num_factura"] ?> </div>
                        <div class="table_item"> <?php echo "Nada por ahora"?> </div>
                        <div class="table_item"> <?php echo $row["id_pago"] ?> </div>
                        <div class="table_item"> <?php echo $row["id_credito"] ?> </div>
                        <div class="detalles_venta" id="modal">
                        

                </div>

                <?php } ?>

        </div>
</div>

</div>
</div>

<?php 
if(empty($_SESSION['exito_venta'])){

} else{
        //echo "EXITO!";
        $message = "Venta exitosa";
        //echo "<script type='text/javascript'>alert('$message');</script>";
        echo "<script type='text/javascript'>Swal.fire(
                'Exito en venta!',
                'Se ha guardado la venta exitosamente!',
                'success'
              )</script>";
        unset($_SESSION['exito_venta']);
}
mysqli_close($conn);
include("includes/footer.php");
?>