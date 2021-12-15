<?php
function formatoDinero($suma){
    $dineroS = (string) $suma;
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
       return $final;
   }


?>