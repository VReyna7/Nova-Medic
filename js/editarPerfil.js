function activateButton(){
    document.getElementById("confCambios").style.display='block';
    document.getElementById("contrasenia").style.display='block';
    document.getElementById("confPasswordLabel").style.display='block';
}

function activateInputsCliente(){
    document.getElementById("nombre").disabled=false;
    document.getElementById("apellido").disabled=false;
    document.getElementById("email").disabled=false;
    document.getElementById("sexo").disabled=false;
    document.getElementById("cambiarContra").style.display='none';
    activateButton();
}

function activateInputsDoc(){
    document.getElementById("nombre").disabled=false;
    document.getElementById("apellido").disabled=false;
    document.getElementById("email").disabled=false;
    document.getElementById("sexo").disabled=false;
    document.getElementById("titulos").disabled=false;
    document.getElementById("cambiarContra").style.display='none';
    activateButton();
}

function fotoPerfil(){
    document.getElementById("subirArchivo").style.display='block'
    document.getElementById("confCambiosFoto").style.display='block';
}

function cambiarContrasenia(){
    document.getElementById("cambiarContra").style.display='block';
    document.getElementById("confCambios").style.display='none';
    document.getElementById("contrasenia").style.display='none';
    document.getElementById("confPasswordLabel").style.display='none';
    document.getElementById("nombre").disabled=true;
    document.getElementById("apellido").disabled=true;
    document.getElementById("email").disabled=true;
}
