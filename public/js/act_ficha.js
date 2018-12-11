function validara(){
    console.log('hola');
	var  cod, sede, jornada, trimestre;
	cod = document.getElementById("cod").value;
	sede = document.getElementById("sede").value;
	jornada = document.getElementById("jornada").value;
	trimestre = document.getElementById("trimestre").value;

if(cod ==="" || sede ==="" || jornada==="" || trimestre===""){
	alert("Todos los campos son obligatorios");
	return false;
}

else if(cod.length>45){
 alert("El codigo es muy largo");
	return false;
}
else if(isNaN(cod)){
 alert("solo debe escribir numeros");
	return false;
}
else if(isNaN(sede)){
    alert("solo debe escribir numeros");
       return false;
}
else if(isNaN(jornada)){
    alert("solo debe escribir numeros");
       return false;
}
else if(isNaN(trimestre)){
    alert("solo debe escribir numeros");
       return false;
}
}
