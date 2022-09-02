const nombre = document.getElementById("nombre");
const apellido = document.getElementById("apellido");
const email = document.getElementById("email");
const password = document.getElementById("password");
const fecha = document.getElementById("fecha");
const mensaje = document.getElementById("msgError");

colorito.addEventListener("submit", e => {
    e.preventDefault();
    let msgError = "";
    let formatoEmail = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    let ingresar = false;
    if (nombre.value.length < 3) {
        msgError += '-Nombre inválido <br>';
        ingresar = true;
    }
    if (apellido.value.length < 3) {
        msgError += '-Apellido inválido <br>';
        ingresar = true;
    }
    if (!formatoEmail.test(email.value)) {
        msgError += '-Correo electrónico inválido <br>';
        ingresar = true;
    }
    if (password.value.length < 8) {
        msgError += '-Contraseña inválida <br>';
        ingresar = true;
    }
    if (nombre.value.length == 0 | apellido.value.length == 0 | email.value.length == 0 | password.value.length == 0 | fecha.value.length == 0) {
        msgError = 'ERROR.DEBE LLENAR TODOS LOS CAMPOS';
        ingresar = true;
    }
    if (ingresar) {
        mensaje.innerHTML = msgError;
    } else {
        document.getElementById("colorito").submit();
    }
})
