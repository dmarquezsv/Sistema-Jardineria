$(buscar_datos2());

function buscar_datos2(consulta){
	$.ajax({
		url: 'modelos/validacionesPlantas.php' ,
		type: 'POST' ,
		dataType: 'html',
		data: {consulta: consulta},
	})
	.done(function(respuesta){
		$("#datos").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}


$(document).on('keyup','#Titulo', function(){
	var valor = $(this).val();
	if (valor != "") {
		buscar_datos2(valor);
	}
});