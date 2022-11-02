/*function formaPago(){
    var combo = document.getElementById("formaL");
    var selected = combo.options[combo.selectedIndex].text;
    alert(selected);
} */

document.getElementById('formaL').addEventListener('change', function() {
    console.log('You selected: ', this.value);
    if(this.value != "Efectivo"){
        document.getElementById("cuenta").style.display = "inline";
    } else{
        document.getElementById("cuenta").style.display = "none";
        //document.getElementById("cuenta").value = "3";
    }
  });