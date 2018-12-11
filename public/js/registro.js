function validar(){
	var  documento, name, sname, last, slast, pass1, mail;
	documento = document.getElementById("documento").value;
	name = document.getElementById("name").value;
	sname = document.getElementById("2name").value;
	last = document.getElementById("last").value;
	slast = document.getElementById("2last").value;
	mail = document.getElementById("mail").value;
	pass1 = document.getElementById("pass1").value;

	expresion = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

if(documento ==="" || name ==="" || last==="" || pass1==="" || mail===""){
	alert("Todos los campos son obligatorios");
	return false;
}

else if(documento.length>45){
 alert("El documento es muy largo");
	return false;
}
else if(isNaN(documento)){
 alert("solo debe escribir numeros");
	return false;
}
else if(name.length>45){
 alert("El nombre es muy largo");
	return false;
}
else if(sname.length>45){
 alert("El segundo nombre es muy largo");
	return false;
}
else if(last.length>45){
	alert("El apellido es muy largo");
	return false;
}
else if(slast.length>45){
	alert("El segundo apellido es muy largo");
	return false;
}
else if(pass1.length>100){
	alert("la contraseña es muy largo");
	return false;
}
else if(mail.length>100){
	alert("El correo es muy largo");
	return false;
}
else if(!expresion.test(mail)){
	alert("El correo es inválido");
	return false;
}

}
