$(document).ready(function() {
    $("#searchbox").prop('disabled', false);
    $("#searchbox").attr("placeholder", "Buscar por apellido");
    $("#liquidarSueldosOpcion").addClass("active");
    $("#appendableDiv").append( $( "#appendHome" ) );
    readRecords();
    $("#searchbox").keyup(function(){
        var inputVal = $(this).val();
        if(inputVal.length){            
            $.get("ajax/search.php", {term: inputVal, type: "liquidacion"}).done(function(data){
                // Display the returned data in browser
                $(".records_content").html(data);
            });
            
        } else{
            readRecords();
        }
    });
});

function readRecords() {
    $.get("ajax/readLiqSueldos.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}

$(window).on( "load", function() {
    //alert("Holaa");
    var state = GetURLParameter('msg');


    if(state=='success'){
        $("#message_returned").html("El sueldo fue liquidado de forma correcta para el agente.");
        $("#modal_message").modal("toggle");
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
