const button = document.getElementById("modal_btn");
const modal = document.getElementById("modal");


function muestraModal(){
    modal.classList.add('show');
}

function cerrarModal(){
    if (modal.classList.contains('show')){
        modal.classList.remove('show')
    } 
}



//button.addEventListener('click', () => modal.style.transform = "scale(1)");
//button.addEventListener('click', () => modal.classList.add('show'))

//modal.addEventListener('click', (e) => {
  //  if (e.target.classList.contains('show')) modal.classList.remove('show')
//})

