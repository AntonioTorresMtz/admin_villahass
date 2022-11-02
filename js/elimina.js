
function eliminar(e){
    if (confirm("¿Esta seguro que desea eliminar este activo?")){
        return true;
    } else{
        e.preventDefault();
    }
} 

/*
function eliminar(e){
    e.preventDefault();
    Swal.fire({
        title: '¿Deseas eliminar este elemento?',
        text: "No podras recuperarlo despues!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminalo'
        }).then((result) => {
        if (result.isConfirmed) {
           alert(e);
        } 
    })
} */


let linkDelete = document.querySelectorAll(".item_elimina");

for (var i=0; i < linkDelete.length; i++){
    linkDelete[i].addEventListener('click', eliminar);
}



