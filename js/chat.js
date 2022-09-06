//obtencion de los parametros
var idUsuario = window.location.search;
var parametros = new URLSearchParams(idUsuario);
var idCliente = parametros.get('idC');
var idDoctor = parametros.get('idDoc');
//datos del form
const form = document.querySelector(".enviarMensaje"),
enviar = form.querySelector(".enviar"),
id = form.querySelector(".id").value, 
txt = form.querySelector(".textMSG");
var chatBody = document.querySelector(".chatBody");
var scroll;

form.onsubmit = (e)=>{
	e.preventDefault();
}

chatBody.onmouseenter = ()=>{
	scroll =1;
}

chatBody.onmouseleave = ()=>{
	scroll = 0;
}

enviar.onclick = () =>{
	let xhr = new XMLHttpRequest();
	xhr.open("POST", "../controlador/crtEnviarMsg.php", true);
	xhr.onload = ()=>{
		if(xhr.readyState === XMLHttpRequest.DONE){
			if(xhr.status === 200){
				txt.value = "";
				hastaAbajo();
			}
		}
	}
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.send("id="+id+"&msg="+txt.value+"&enviarMsg="+enviar);
}

setInterval(() => {
	let xhr = new XMLHttpRequest();
    xhr.open("POST", "../controlador/crtGetMensaje.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            chatBody.innerHTML = data;
			  if(scroll == 0){
				hastaAbajo();	
			  }
          }
      }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("idC="+idCliente+"&idDoc="+idDoctor);
},500);

function hastaAbajo(){
	chatBody.scrollTop = chatBody.scrollHeight;
}

function solicitarlCall(){
	txt.value = "Solicitando videollamada";
}
