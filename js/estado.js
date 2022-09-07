var selector = document.getElementById("selector");

setInterval(()=>{
	let xhr = new XMLHttpRequest();
	xhr.open("POST", "../controlador/crtGetEstado.php", true);
	xhr.onload = ()=>{
		if(xhr.readyState === XMLHttpRequest.DONE){
			if(xhr.status === 200){
				let data = xhr.response;
				selector.value = data;
			}
		}
	}
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.send();

	if(selector.value == "2"){
		document.getElementById("disponible").style.display="none"
		document.getElementById("ocupado").style.display="block"
	}else if(selector.value == "1"){
		document.getElementById("disponible").style.display="block"
		document.getElementById("ocupado").style.display="none"
	}
},500)

function disponible(){
    let xhr = new XMLHttpRequest();
	xhr.open("POST", "../controlador/crtCambiarEstado.php", true);
	xhr.onload = ()=>{
		if(xhr.readyState == XMLHttpRequest.DONE){
			if(xhr.status === 200){
				document.getElementById("disponible").style.display="none"
			    document.getElementById("ocupado").style.display="block"
				selector.value = 2;
			}
		}
	}
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.send("estado="+2);
}

function ocupado(){
    	let xhr = new XMLHttpRequest();
	xhr.open("POST", "../controlador/crtCambiarEstado.php", true);
	xhr.onload = ()=>{
		if(xhr.readyState == XMLHttpRequest.DONE){
			if(xhr.status === 200){
				document.getElementById("disponible").style.display="block"
			    document.getElementById("ocupado").style.display="none"
				selector.value = 1;
			}
		}
	}
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.send("estado="+1);
}

