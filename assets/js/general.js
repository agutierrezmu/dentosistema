var base_url = window.location.origin;

$(document).ready(function(){
	$('#table').DataTable({
		"language": {
			"url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
		}
	});

	$dropdownEstado = $("#contextEstado");
	$(".cbestado").click(function() {
	    //get row ID	    
	    var id = $(this).closest("tr").children().first().html();
		    //move dropdown menu
		    $(this).after($dropdownEstado);
		    //update links
		    $dropdownEstado.find(".cbingresado").attr("href", window.location.origin+"/mit/comunidad/actualizarEstado/"+id+"/1");
		    $dropdownEstado.find(".cbrechazado").attr("href", window.location.origin+"/mit/comunidad/actualizarEstado/"+id+"/4");
		    $dropdownEstado.find(".cbanulado").attr("href", window.location.origin+"/mit/comunidad/actualizarEstado/"+id+"/5");
		    $dropdownEstado.find(".cbingresadoPendiente").attr("href", window.location.origin+"/mit/comunidad/actualizarEstado/"+id+"/9");
		    //show dropdown
		    $(this).dropdown();
		});

	$dropdownTipoUsuario = $("#contextTipoUsuario");
	$(".cbTipoUsuario").click(function() {
	    //get row ID	    
	    var rut = $(this).closest("tr").children().first().html();
	    var codcomunidad = $("#codcomunidad").val();
		    //move dropdown menu
		    $(this).after($dropdownTipoUsuario);
		    //update links
		    $dropdownTipoUsuario.find(".cbTesorero").attr("href", window.location.origin+"/mit/comunidad/actualizarTipoUsuario/"+rut+"/"+codcomunidad+"/2");
		    $dropdownTipoUsuario.find(".cbUsuarioBasico").attr("href", window.location.origin+"/mit/comunidad/actualizarTipoUsuario/"+rut+"/"+codcomunidad+"/4");
		    $dropdownTipoUsuario.find(".cbSubUsuario").attr("href", window.location.origin+"/mit/comunidad/actualizarTipoUsuario/"+rut+"/"+codcomunidad+"/5");
		    //show dropdown
		    $(this).dropdown();
		});
});

/**
Usuario
**/
function eliminarPorUrl(url)
{		
	if(confirm('¿Desea eliminar el registro?'))
	{
		$.ajax({
			url : url,
			type: "POST",          
			beforeSend: function() {
				$('#res').addClass("fa fa-spinner fa-pulse");
				//$('.fa-trash .'+id+'').addClass("fa fa-spinner fa-pulse");
			},
			success: function(data)
			{                
				$('#myModal .modal-body').html('<label><h4>registro eliminado</h4></label>') ;
				$('#myModal').modal('show');                  
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				$('#myModal .modal-body').html('<label><h4>se ha producido un error al intentar eliminar el registro, favor comuniquese con el administrador del sitio.</h4></label>') ;
				$('#myModal').modal('show');                  
			},
			complete: function (){
				$('#res').removeClass("fa fa-spinner fa-pulse");
            	//$('#table').DataTable().ajax.reload(null,false);
            }
        });
	}
}



function eliminar(id)
{
	var urlbase = $("#urlbase").val();
	var url = urlbase+'delete/'+id;	
	if(confirm('¿Desea eliminar el registro?'))
	{
		$.ajax({
			url : url,
			type: "POST",          
			beforeSend: function() {
				$('#res').addClass("fa fa-spinner fa-pulse");
				//$('.fa-trash .'+id+'').addClass("fa fa-spinner fa-pulse");
			},
			success: function(data)
			{                
				$('#myModal .modal-body').html('<label><h4>registro eliminado</h4></label>') ;
				$('#myModal').modal('show');                  
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				$('#myModal .modal-body').html('<label><h4>se ha producido un error al intentar eliminar el registro, favor comuniquese con el administrador del sitio.</h4></label>') ;
				$('#myModal').modal('show');                  
			},
			complete: function (){
				$('#res').removeClass("fa fa-spinner fa-pulse");
            	//$('#table').DataTable().ajax.reload(null,false);
            }
        });
	}
}

/**
envio de correo para recuperar clave
*/
function recuperarClave(id)
{
	var urlbase = $("#urlbase").val();
	var urlbase = urlbase+'recuperarClave/'+id;  	
	if(confirm('¿Desea cambiar la clave del usuario?. Esto enviará correo al usuario con la nueva clave.'))
	{
		$.ajax({
			url : urlbase,
			type: "POST",          
			beforeSend: function() {
				$('.recuperarClave .'+id+'').addClass("fa fa-spinner fa-pulse");
				$('#'+id+'').addClass("fa fa-spinner fa-pulse");
			},
			success: function(data)
			{
                //if success reload ajax table
                $('#myModal .modal-body').html('<label><h4>correo enviado</h4></label>') ;
                $('#myModal').modal('show');                  
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
            	$('#myModal .modal-body').html('<label><h4>se ha producido un error al intentar enviar correo al usuario, favor comuniquese con el administrador del sitio.</h4></label>') ;
            	$('#myModal').modal('show');                  
            },
            complete: function() {
            	$('.recuperarClave .'+id+'').removeClass("fa fa-spinner fa-pulse");                
            }
        });
	}
}

$("#btnAgregar").click(function(){
	$('#mdAgregar').modal('show');      
});


$("button#btnmodal").click(function(){
	window.location.reload();
});

$("#region").change(function(){
	var urlbase = $("input#urlbase").val();	
	/*dropdown post */
	event.preventDefault();
	$.ajax({
		url:urlbase+"comunidad/dropdownComuna",
		data: {id: $(this).val()},
		type: "POST",
		beforeSend: function(){
			$('#loadcomuna').addClass('fa fa-spinner fa-pulse');
		},
		success: function(data){
			$("#comuna").html(data);
		},
		complete: function(){			
			$('#loadcomuna').removeClass('fa fa-spinner fa-pulse');
		}
	});
});

$('#rut').Rut({
	on_error: function(){ 
		alert('Rut incorrecto');
		//document.getElementById("rut").focus();
	},
	format_on: 'keyup'
});

$('a.eliminar').click(function() {
	event.preventDefault();	
	var confirmText = "desea eliminar la cuenta?";	
	if(confirm(confirmText)) {
		var urlbase = document.getElementById("eliminarcuenta").getAttribute("href"); 
		console.log(urlbase);	
		$.ajax({
			url: urlbase,
			type: 'POST',
			beforeSend: function() {
				$('#res').addClass("fa fa-spinner fa-pulse");
			},
			success: function (data) {
				//$('#myModal .modal-body').html('<label><h4>cuenta eliminada correctamente</h4></label>') ;
				//$('#myModal').modal('show'); 
			},
			error: function (msg) {            
				//alert(msg.responseText);
			},
			complete: function(){
				$('#res').removeClass("fa fa-spinner fa-pulse");
				window.location.reload();
			}
		});
	}	
});

/*
* de pantalla usuario, accion para ingresar cuenta bancaria de un usuario
*/
$('#agregarcuenta').click(function() {
	event.preventDefault();
	var urlbase = $("input#urlbase").val()+"cuentapersonabanco/insert";		
	var datos = $('form').serialize();		
	$.ajax({
		url: urlbase,
		type: 'POST',
		data: datos,
		beforeSend: function() {
			$('#agregar').addClass("fa fa-spinner fa-pulse");
		},
		success: function(data) {    	
		//$('#myModal .modal-body').html('<label><h4>cuenta registrada correctamente</h4></label>') ;
		//$('#myModal').modal('show'); 		
 		//window.location.reload();
 		//$("#cuentas").html(data);
 	},
 	error: function(msg){
 			//alert(msg.responseText);
 		},
 		complete: function(){
 			$('#agregar').removeClass("fa fa-spinner fa-pulse");	 
 			$('#agregar').addClass("fa fa-plus-square");
 			window.location.reload();
 		}
 	});
});

$("#upload_link").on('click', function(e){
	e.preventDefault();
	$("#upload:hidden").trigger('click');
});

$('#comunidades').on( "click", function() {
	var base_url = window.location.origin;
	var url = base_url+'/mit/comunidad';
	$.ajax({
		url : url,
		type : 'POST',
		success: function(){
			window.open(url,'_self');
		}		
	});
});

$('#usuarios').on( "click", function() {
	var base_url = window.location.origin;
	var url = base_url+'/mit/persona';
	$.ajax({
		url : url,
		type : 'POST',
		success: function(){
			window.open(url,'_self');
		}		
	});
});

function cambiarestado() {	
	if(!confirm('¿Desea cambiar el estado del registro?'))
	{
		event.preventDefault();	
	}	
}

function Balance(id){
	var base_url = window.location.origin;
	$.ajax({
		url : base_url +'/mit/comunidad/balance/'+ id,
		type: "GET",
		dataType: "JSON",
		success: function(data)
		{     		
    		$('#ModalBalance .modal-title').text('Balance '+ data.descripcion); // Set title to Bootstrap modal title
    		$html = '<div class="row">'
    		$html +='<div class="col-sm-4"><h4>Ingresos</h4><h3><i class="label label-success">$ '+ formatearNumero(data.ingresos) +'</i></h3></div>';
    		$html += '<div class="col-sm-4"><h4>Egresos</h4><h3><i class="label label-danger">$ '+ formatearNumero(data.egresos) +'</i></h3></div>';
    		if (data.balance >= 0){
    			$html += '<div class="col-sm-4"><h4>Balance</h4><h3><i class="label label-info">$ '+ formatearNumero(data.balance) +'</i></h3></div>';
    		}
    		else{
    			$html += '<div class="col-sm-4"><h4>Balance</h4><h3><i class="label label-danger">$ '+ formatearNumero(data.balance) +'</i></h3></div>';
    		}    		
    		$html += '</div>';
    		$('#ModalBalance .modal-body').html($html);    
            $('#ModalBalance').modal('show'); // show bootstrap modal when complete loaded    		
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
        	$('#ModalBalance .modal-title').text(''); // Set title to Bootstrap modal title
        	$html = '<div class="row">'
        	$html +='<div class="col-sm-12"><h4>No hay registros</h4></div>';
        	$html += '</div>';
        	$('#ModalBalance .modal-body').html($html);
    		$('#ModalBalance').modal('show'); // show bootstrap modal when complete loaded
    	}
    });
}

function registro(){
	url = base_url+'/mit/Login/registro';	
	var datos = $('form').serialize();
	$.ajax({
		url: url,
		type: 'POST',
		data: datos,
		beforeSend: function() {
			$('#registrarUsuario').addClass("fa fa-spinner fa-pulse");
		},
		success: function(data) { 
			var obj = jQuery.parseJSON(data);
			$('#registrarUsuario').removeClass("fa fa-spinner fa-pulse");
			document.getElementById("form1").reset();
			document.getElementById("form2").reset();
			if (obj['status'] == 'false') alert('el correo ingresado ya existe en nuestros registros');
			else alert('Usuario registrado correctamente, se le enviará un correo con los datos de acceso');

 	},
 	error: function(msg){
 		alert(msg.responseText);
 	},
 	complete: function(){ 			

 	}
 });
}

function depositoGiro(tipo){
	var base_url = window.location.origin;
	var action='';
	if (tipo == 'depósito') action = base_url+'/mit/persona/deposito';
	else action = base_url+'/mit/persona/giro';		 
	$('#myModal .modal-title').text('Nuevo '+tipo); // Set title to Bootstrap modal title
	$html =  '<div class="row">';
	$html += '<form method="post" action="'+action+'" class="form-horizontal">';					
	$html += '<div class="col-lg-10">';
	$html += '<div class="form-group">';
	$html += '<label class="col-md-2 control-label" for="descripcion">Monto</label>';
	$html += '<div class="col-md-6">';
	$html += '<input id="monto" name="monto" type="text" placeholder="Monto..." class="form-control input-md" required="">';
	$html += '</div>';
	$html += '</div>';
	$html += '<input class="btn btn-success" id="submit" name="submit" type="submit" value="Guardar" data-toggle="modal" data-target=".bs-example-modal-sm" />';
	$html += '</form>';
	$html += '</div>';
	$('#myModal .modal-body').html($html);
	$('#myModal .modal-footer').html('');
	$('#myModal').modal('show'); // show bootstrap modal when complete loaded  
}

function cargaUsuario(idComunidad){
	$('#myModal .modal-title').text('carga de usuario'); // Set title to Bootstrap modal title
	$html = '<div class="row">';
	$html += '<div class="col-md-6"><a href="#" class="btn btn-success" onclick="cargaIndividual('+idComunidad+')">Carga individual</a></div>';
	//$html += '<div class="col-md-6"><a href="#" class="btn btn-success" onclick="cargaMasiva()">Carga masiva</a></div>';
	$html += '</div>';
	$('#myModal .modal-body').html($html);
	$('#myModal .modal-footer').html('');
	$('#myModal').modal('show');
}

function cargaIndividual(idComunidad){
	document.getElementById("nuevo").reset();
	console.log(idComunidad);
	$('#myModal').modal('hide');
	$('#myModalPersona .modal-title').text('carga de usuario individual'); // Set title to Bootstrap modal title		
	$html = '<a href="#" class="btn btn-success" onclick="guardarUsuario('+idComunidad+')">Guardar<i id="guardarUsuario"><i></a>';
    $html +=' <input class="btn btn-default" type="button" data-dismiss="modal" value="Cerrar" />';
	$('#myModalPersona .modal-footer').html($html);
	$('#myModalPersona').modal('show');
}

function guardarUsuario(idComunidad){
	url = base_url+'/mit/Login/registro';	
	var datos = $('form').serialize();
	$.ajax({
		url: url,
		type: 'POST',
		data: datos + "&idComunidad="+idComunidad,
		beforeSend: function() {
			$('#guardarUsuario').addClass("fa fa-spinner fa-pulse disabled");
		},
		success: function(data) { 
			var obj = jQuery.parseJSON(data);
			if (obj['status'] == 'false') alert('el correo ingresado ya existe en nuestros registros');
			else alert('Usuario registrado correctamente');
			$('#guardarUsuario').removeClass("fa fa-spinner fa-pulse disabled");
			$('#myModalPersona').modal('hide');
 	},
 	error: function(msg){
 		alert(msg.responseText);
 	},
 	complete: function(){ 			

 	}
 });
}

function cargaMasiva(){	
	document.getElementById("nuevo").reset();
	$('#myModal').modal('hide');
	$('#myModalPersona .modal-title').text('carga de usuario masiva'); // Set title to Bootstrap modal title	
	$('#myModalPersona').modal('show');
}


function formatearNumero(nStr) {
	nStr += '';
	x = nStr.split('.');
	x1 = x[0];
	x2 = x.length > 1 ? ',' + x[1] : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1)) {
		x1 = x1.replace(rgx, '$1' + '.' + '$2');
	}
	return x1 + x2;
}