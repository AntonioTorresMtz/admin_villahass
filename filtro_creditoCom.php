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
            <label for="folio">Compra</label>
            <input name="compra" type="number" placeholder="Numero de compra" class="filter" id="folio">
        </div>
        <div class="filtro">
        <label for="total">Monto</label>
            <select name="total" id="total" class="filter">
                <option value="">Todo</option>
                <option value="< 10000"> &lt; $10 mil </option>
                <option value="< 25000"> &lt; $25 mil </option>
                <option value="< 50000"> &lt; $50 mil </option>
                <option value=">= 50000"> &gt; = $50 mil </option>
            </select>
        </div>
        <div class="filtro">
            <label for="credito">Credito</label>
            <input name="credito" type="number" placeholder="Numero de credito" class="filter" id="credito">                    
        </div>
        <div class="filtro">
            <label for="cliente-fil">Cliente</label>
            <select name="cliente" id="cliente-fil" class="filter">
                    <option value="">Todo</option>
                    <?php $acredores="SELECT id_cliente, razon_social FROM cliente";
                        $resultado = mysqli_query($conn, $acredores);
                        while($row = mysqli_fetch_assoc($resultado)) {
                            $id = $row["id_cliente"]?>
                            <option value="<?php echo $id?>"><?php echo $row["razon_social"]?></option>
                        <?php } ?>
                    
            </select>
        </div>
        <div class="filtro">
        <label for="orden">Estado</label>
            <select name="estado" id="estado" class="filter">
                <option value="">Todo</option>
                <option value="Pendiente">Pendiente</option>
                <option value="Pagado">Pagado</option>
            </select>
        </div>
        <div class="filtro">
            <label for="orden">Orden</label>
            <select name="orden" id="orden" class="filter">
                <option value="ORDER BY c.id_creditoCom DESC">Mas reciente</option>
                <option value="ORDER BY c.id_creditoCom ASC">Mas antiguo</option>
            </select>
        </div> 
        <button class="filtro_btn" name="filtrarCredito" type="submit">Buscar</button>
    </form>
</div>

<?php

?>