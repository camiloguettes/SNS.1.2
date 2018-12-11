$(document).ready(function(){
	$('#pass2').keyup(function(){
		var pass1 = $('#pass1').val();
		var pass2 = $('#pass2').val();

		if ( pass1 == pass2 ){
			$('#error2').text("Las contraseñas coinciden").css("color", "green");
			$('#botoon').attr('disabled',false);
		}
		else{
			$('#error2').text("Las contraseñas no coinciden").css("color", "red");
			$('#botoon').attr('disabled',true);
		}
		if ( pass2 == ""){
			$('#error2').text("No se puede dejar en blanco").css("color", "red");
			$('#botoon').attr('disabled',true);
		}
	});
	$('#pass1').keyup(function(){
		var pass1 = $('#pass1').val();
		var pass2 = $('#pass2').val();

		if ( pass2 == pass1 ){
			$('#error2').text("Las contraseñas coinciden").css("color", "green");
			$('#botoon').attr('disabled',false);
		}
		else{
			$('#error2').text("Las contraseñas no coinciden").css("color", "red");
			$('#botoon').attr('disabled',true);
		}
		if ( pass1 == ""){
			$('#error2').text("No se puede dejar en blanco").css("color", "red");
			$('#botoon').attr('disabled',true);
		}
	});
});