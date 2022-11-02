
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

var si = document.getElementById('sip');
si.addEventListener("change", validaFacturaSi, false);

function validaFacturaSi(){
  var marcado = si.checked;
  if(marcado){
    document.getElementById("facturaInput").style.display = "block";
  }

}

var no = document.getElementById('nop');
no.addEventListener("change", validaFacturaNo, false);

function validaFacturaNo(){
  var marcado = no.checked;
  if(marcado){
    document.getElementById("facturaInput").style.display = "none";
  }

}

  
        
