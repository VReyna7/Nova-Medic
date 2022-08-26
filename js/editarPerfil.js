function activateButton(){
    document.getElementById("confCambios").style.display='block';
    document.getElementById("confPasswordLabel").style.display='block';
    document.getElementById("confPassword").style.display='block';
    
}

function activateInputs(){
    document.getElementById("nombre").disabled=false;
    document.getElementById("apellido").disabled=false;
    document.getElementById("email").disabled=false;
    document.getElementById("password").disabled=false;
    document.getElementById("confPassword").disabled=false;
    activateButton();
}

function fotoPerfil(){
    document.getElementById("subirArchivo").style.display='block'
    document.getElementById("confCambiosFoto").style.display='block';
}
