$(document).ready(function() {
    $("#searchbox").prop('disabled', true);
    $("#informacionAgenteOpcion").addClass("active");
    $("#appendableDiv").append( $( "#appendHome" ) );
});

$("input:checkbox").click(function() {
    $("#fechaFin").attr("disabled", !this.checked); 
});

$(window).on( "load", function() {
    //alert("Holaa");
    var state = GetURLParameter('msg');
    if(state=='success'){
        $("#message_returned").html("El conyuge del agente fue agregado de forma correcta.");
        $("#modal_message").modal("toggle");
    }
    else{
         if(state=='error1'){
            $("#message_returned").html("El conyuge no fue agregado de forma correcta porque hubo un error en los datos.");
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
