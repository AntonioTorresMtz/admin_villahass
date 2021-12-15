
var credito = document.getElementById('credito');
        
credito.addEventListener("change", validaCredito, false);
 
function validaCredito(){
  var marcado = credito.checked;
  if(marcado){
    document.getElementById("credito_formulario").style.display = "block";
    document.getElementById("liquida_formulario").style.display = "none";
  } 
        
}


var liquida = document.getElementById('liquida');
        
liquida.addEventListener("change", validaLiquida, false);
 
function validaLiquida(){
  var marcado = liquida.checked;
  if(marcado){
    document.getElementById("liquida_formulario").style.display = "block";
    document.getElementById("credito_formulario").style.display = "none";
  } 
}

        
        
        
