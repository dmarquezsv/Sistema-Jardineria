$(buscar_datosAccesorio());

function buscar_datosAccesorio(consulta){
	$.ajax({
		url: 'modelos/validarAccesorio.php' ,
		type: 'POST' ,
		dataType: 'html',
		data: {consulta: consulta},
	})
	.done(function(respuesta){
		$("#datos2").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}


$(document).on('keyup','#NombreTitulo', function(){
	var valor = $(this).val();
	if (valor != "") {
		buscar_datosAccesorio(valor);
	}
});