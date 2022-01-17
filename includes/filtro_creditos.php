<?php 
if(isset($_POST['filtrarCredito'])){
        $cliente = $_POST["cliente"];
        $fecha = $_POST["fecha_fil"];
        $folio = $_POST["compra"];
        $credito = $_POST["credito"];
        $orden = $_POST["orden"];
        $total = $_POST["total"];
        $status = $_POST["estado"];
        $where="";

        if(empty($_POST["fecha_fil"])){
                $where=$where;
        }else{
                $where=$where . " where fecha > CURDATE()".$fecha;     
        }

        if(empty($_POST["cliente"])){
                $where=$where;
        } else{
                $where=$where . " and cl.id_cliente =" . $cliente;       
        }
        
        if(empty($folio)){
                $where=$where;
                // echo 'Vacio';
        } else{
                $where=$where . " and v.id_compra =" . $folio;       
        }

        if(empty($credito)){
            $where=$where;
             //echo 'Vacio credito';
        } else{
            $where=$where . " and c.id_creditoCom =" . $credito;       
        }

        if(empty($_POST["total"])){
                $where=$where;
        } else{
                $where=$where . " and c.monto_deuda " . $total;       
        }

        if(empty($factura)){
                $where=$where;
                //echo 'Vacio * 2 ';
        } else{
                $where=$where . " and a.num_factura LIKE " ."'%". $factura ."%'";       
        }

        if(empty($_POST["estado"])){
            $where = $where;
        } else{
            
            $where=$where .  "and c.estado LIKE " . "'%". $status ."%'";
        }

        if(empty($_POST["orden"])){
                $where=$where;
        } else{
                $where=$where . " " . $orden;       
        }
} 

?>
