var idUsuario = window.location.search;
var parametros = new URLSearchParams(idUsuario);
var idCliente = parametros.get('idC');
var idDoctor = parametros.get('idDoc');
var chatBody = document.querySelector(".chatBody");
var scroll;

chatBody.onmouseenter = ()=>{
	scroll =1;
}

chatBody.onmouseleave = ()=>{
	scroll = 0;
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

