
	function disable() {
    document.getElementById("Barralateral").style.visibility = "hidden";
}

function undisable() {
    document.getElementById("mostrar-menu").disabled = false;
}

function comprobarClave(){
    clave1 = document.contactform.Contrase.value;
    clave2 = document.contactform.Conf_Contrase.value;

    if (clave1 == clave2){
      document.contactform.Conf_Contrase.value=clave2;
    }else{
	  document.contactform.Contrase.value="";
	  document.getElementById('oculto').style.display = 'block';
    }
} 

  function validarSiNumero(numero){
    if (!/^([0-9])*$/.test(numero))
        
      alert("El valor " + numero + " no es un número");
  }


