var table;
var save_method;
var $pacientes = $('.pacientes');
var $odontologos = $('.odontologos');
var $ejecutores = $('.ejecutores');
var $metales = $(".metal");

$(document).ready(function() {
    /*dropdownlist*/        
    $(".datosGenerales").hide();
    $(".datosEspecificos").hide();
    $(".dientes").hide();
    $(".detalleTrabajo").hide();
    $(".footer-orden").hide();
    $(".especificosFijas").hide();
    $(".especificasColados").hide();
    $(".especificasRemovibles").hide();

    $(".js-example-basic-single").select2();      

    table = $(".tablaOrdenes").DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        "order": [[ 0, "desc" ]],
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": location.origin+'/dentosistema/orden/lstOrden',
            "type": "POST"
        },
    });

    /*calendario*/
    $('.date')
    .datepicker({
        format: 'dd/mm/yyyy'
    })
    .on('changeDate', function(e) {
            // Revalidate the date field
            $('#eventForm').formValidation('revalidateField', 'date');
        });

    /*Menu-toggle*/
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("active");
    });

    /*Scroll Spy*/
    $('body').scrollspy({ target: '#spy', offset:80});
});


function cargaInicialOrdenes()
{    
  $pacientes.select2({
      ajax: {        
        url: location.origin+'/dentosistema/usuario/lstUsuarioxTipo/2',
        dataType: 'json',
        delay: 250,
        data: function (params) {
            return {
                q: params.term // search term
            };
        },
        pagination: {
            more: true
        },
        processResults: function (data) {
            return {
                results: data
            };
        },
        cache: true  
    }  
}); 

  $odontologos.select2({
      ajax: {        
        url: location.origin+'/dentosistema/usuario/lstUsuarioxTipo/1',
        dataType: 'json',
        delay: 250,
        data: function (params) {
            return {
                q: params.term // search term
            };
        },
        pagination: {
            more: true
        },
        processResults: function (data) {
            return {
                results: data
            };
        },
        cache: true  
    }  
}); 

  $ejecutores.select2({
      ajax: {        
        url: location.origin+'/dentosistema/usuario/lstUsuarioxTipo/5',
        dataType: 'json',
        delay: 250,
        data: function (params) {
            return {
                q: params.term // search term
            };
        },
        pagination: {
            more: true
        },
        processResults: function (data) {
            return {
                results: data
            };
        },
        cache: true  
    }  
}); 

  $metales.select2({
      ajax: {        
        url: location.origin+'/dentosistema/metalvalor/lstMetalvalor/',
        dataType: 'json',
        delay: 250,
        data: function (params) {
            return {
                q: params.term // search term
            };
        },
        pagination: {
            more: true
        },
        processResults: function (data) {
            return {
                results: data
            };
        },
        cache: true  
    }  
}); 

}

function selectDiente(imagen)
{
    var $ruta = location.origin+'/dentosistema/assets/images/';    
    imagen.src =(imagen.src == $ruta+"dienteConFondo32x32.svg") ? $ruta + "dienteSinFondo32x32.svg" : $ruta + "dienteConFondo32x32.svg";
    if (imagen.src == $ruta+"dienteConFondo32x32.svg")
    {
        imagen.setAttribute("class", "sel");
    }
    else
    {
        imagen.removeAttribute("class");
    }
}

$(".btn-fijas").click(function (){
    limpiarFormOrden();
    $(".datosEspecificos").show();
    $(".datosGenerales").show();
    $(".dientes").show();
    $(".especificosFijas").show();
    $(".detalleTrabajo").show();
    $(".footer-orden").show();
    $("#tipo").val('1');    
});

$(".btn-colados").click(function (){
    limpiarFormOrden();
    $(".datosEspecificos").show();
    $(".datosGenerales").show();  
    $(".dientes").show();
    $(".especificasColados").show(); 
    $(".detalleTrabajo").show();
    $(".footer-orden").show();
    $("#tipo").val('2');
});

$(".btn-removibles").click(function (){
    limpiarFormOrden();
    $(".datosEspecificos").show();
    $(".datosGenerales").show();    
    $(".especificasRemovibles").show();
    $(".detalleTrabajo").show();
    $(".footer-orden").show();
    $("#tipo").val('3');
});


$(".nuevaOrden").click(function(){
    $(".tituloOrden").html("");
    $("#codorden").val('');
    save_method = 'crear';
    cargaInicialOrdenes();
    limpiarFormOrden();
});

function limpiarFormOrden(){
    $(".datosGenerales").hide();
    $(".datosEspecificos").hide();
    $(".dientes").hide();
    $(".especificosFijas").hide();
    $(".especificasColados").hide();
    $(".especificasRemovibles").hide();
    $(".detalleTrabajo").hide();
    $(".footer-orden").hide();
}

$(".Nuevotrabajo").click(function (){    
    $("#modal_Orden").modal('hide');
    //evitar ocultar el nuevo modal    
    setTimeout(function(){ $('#modal_trabajo').modal('show'); }, 500);    
});

$(".cancelarTrabajo").click(function(){
    $("#modal_trabajo").modal('hide');
    setTimeout(function(){ $('#modal_Orden').modal('show'); }, 100);
});

/**Ordenes**/

function guardarOrden(){    

    var contadorInferior;
    var contadorSuperior;
    var nCoronas=0;
    var pCoronas='';
    for (contadorInferior = 1; contadorInferior <= 8; contadorInferior++)
    {
        if (contadorInferior==1 || contadorInferior==2 || contadorInferior==3 || contadorInferior==4 )
        {
            for (contadorSuperior = 1; contadorSuperior <= 8; contadorSuperior++)
            {
                var img = document.getElementById(contadorInferior+''+contadorSuperior);
                if (img.className=='sel')
                {   
                    pCoronas += img.id+' ';
                    nCoronas +=1;
                }                
            }    
        }
        else
        {
           for (contadorSuperior = 1; contadorSuperior <= 5; contadorSuperior++)
           {
            var img = document.getElementById(contadorInferior+''+contadorSuperior);
            if (img.className=='sel')
            {    
                pCoronas += img.id+' ';
                nCoronas +=1;
            }
        }   
    }
}

$(".trabajos tbody tr").each(function (index) 
{
    var campo1, campo2, campo3;
    $(this).children("td").each(function (index2) 
    {
        switch (index2) 
        {
            case 0: campo1 = $(this).text();
            break;
            case 1: campo2 = $(this).text();
            break;
            case 2: campo3 = $(this).text();
            break;
        }
               // $(this).css("background-color", "#ECF8E0");
           })
});

var data = {
    'origen' : $(".origen option:selected").val(),
    'recepcion' : $(".recepcion").val(),
    'filiacion' : $(".filiacion option:selected").val(),
    'entrega' : $(".entrega").val(),
    'odontologo' : $(".odontologos option:selected").val(),
    'paciente' : $(".pacientes option:selected").val(),
    'adherente' : $(".adherentes").val(),
    'pCoronas' : pCoronas,
    'nCoronas' : nCoronas,
    'nApoyos' : $(".nApoyos").val(),
    'pApoyos' : $(".pApoyos").val(),
    'singulares' : $(".singulares").val(),
    'plurales' : $(".plurales").val(),
    'color' : $(".color").val(),
    'metal' : $(".metal option:selected").val(),
    'peso' : $(".peso").val(),
    'cromos' : $(".cromos").val(),
    'pSuperior' : $(".pSuperior").val(),
    'pInferior' : $(".pInferior").val(),
    'clasificacion' : $("#tipo").val(),
    'codorden' : $("#codorden").val()
};

if (save_method=='crear')
{
    url = location.origin+'/dentosistema/orden/guardar';
} else {
    url=location.origin+'/dentosistema/orden/actualizar'
}
console.log(JSON.stringify(data));
$.ajax({    
    url: url,
    type: 'POST',
    data: data,     
    beforeSend: function() {
    },
    success: function(data) {                                     

    },
    error: function(msg){
        $('#myModal .modal-body').html(msg.responseText);
        $('#myModal').modal('show');            
    },
    complete: function(msg){    
    }
});
reload_table();
$('#modal_Orden').modal('hide');
}

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}


function editarOrden(id)
{
    cargaInicialOrdenes();
    save_method = 'editar'; 

    //Ajax Load data from ajax
    $.ajax({
        url : location.origin+'/dentosistema/orden/editar/' + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        { 
            $("#codorden").val(data.codorden);
            $(".tituloOrden").html("Orden N° " + data.codorden);
            $(".origen").val(data.origen).trigger("change");
            $(".recepcion").val(data.fecharecepcion);
            $(".filiacion").val(data.codfiliacion).trigger("change");
            $(".entrega").val(data.fechaentrega);          
            $(".odontologos").append("<option value='"+data.cododontologo+"' selected='selected'>"+data.nombreOdontologo+"</option>");
            $(".pacientes").append("<option value='"+data.codpaciente+"' selected='selected'>"+data.nombrePaciente+"</option>");
            $(".adherentes").val(data.adherente);            
            if (data.tipo == 1)
            {
                limpiarFormOrden();
                $(".datosEspecificos").show();
                $(".datosGenerales").show();
                $(".dientes").show();
                $(".especificosFijas").show();
                $(".detalleTrabajo").show();
                $(".footer-orden").show();
                $("#tipo").val('1'); 

            }
            if (data.tipo == 2)
            {
                limpiarFormOrden();
                $(".datosEspecificos").show();
                $(".datosGenerales").show();  
                $(".dientes").show();
                $(".especificasColados").show(); 
                $(".detalleTrabajo").show();
                $(".footer-orden").show();
                $("#tipo").val('2');
            }
            if (data.tipo == 3)
            {
                limpiarFormOrden();
                $(".datosEspecificos").show();
                $(".datosGenerales").show();    
                $(".especificasRemovibles").show();
                $(".detalleTrabajo").show();
                $(".footer-orden").show();
                $("#tipo").val('3');
            }

            $.ajax({
                url : location.origin+'/dentosistema/detalleorden/obtenerxId/' + id,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                { 
                    $(".nApoyos").val(data.numeroApoyos);
                    $(".pApoyos").val(data.piezaaApoyos);
                    $(".singulares").val(data.singulares);
                    $(".plurales").val(data.plurales);
                    $(".color").val(data.color);   
                    $(".metal").val(data.codmetalvalor).trigger("change");                   
                    $(".peso").val(data.pesometal);    
                    $(".cromos").val(data.numerocromos);
                    $(".pSuperior").val(data.superior);
                    $(".pInferior").val(data.inferior);
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });

            $('#modal_Orden').modal('show'); // show bootstrap modal when complete loaded
            //$('.modal-title').text('Edit Person'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });    
}