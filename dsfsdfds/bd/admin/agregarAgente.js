$(document).ready(function() {
    $("#searchbox").prop('disabled', true);
    $("#agregarAgenteOpcion").addClass("active");
    $("#appendableDiv").append( $( "#appendHome" ) );
});

$(window).on( "load", function() {
    //alert("Holaa");
    var state = GetURLParameter('msg');
    if(state=='success'){
        $("#message_returned").html("El agente fue agregado de forma correcta.");
        $("#modal_message").modal("toggle");
    }
    else{
         if(state=='error1'){
            $("#message_returned").html("El agente no fue agregado de forma correcta porque hubo un error en los datos.");
            $("#modal_message").modal("toggle");
        }
        if(state=='error2'){
            $("#message_returned").html("El agente fue agregado de forma correcta pero hubo un error agregando su estudio ni su seguro.");
            $("#modal_message").modal("toggle");
        }
        if(state=='error3'){
            $("#message_returned").html("El agente fue agregado de forma correcta pero hubo un error agregando su seguro.");
            $("#modal_message").modal("toggle");
        }
    }
});

function GetURLParameter(sParam)
{
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++)
    {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam)
        {
            return sParameterName[1];
        }
    }
}
