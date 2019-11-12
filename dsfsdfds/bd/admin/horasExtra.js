$(document).ready(function() {
    $("#searchbox").prop('disabled', false);
    $("#searchbox").attr("placeholder", "Buscar por apellido");
    $("#horasExtraOpcion").addClass("active");
    $("#appendableDiv").append( $( "#appendHome" ) );
    readRecords();
    $("#searchbox").keyup(function(){
        var inputVal = $(this).val();
        if(inputVal.length){
            
            $.get("ajax/search.php", {term: inputVal, type: "horasExtra"}).done(function(data){
                // Display the returned data in browser
                $(".records_content").html(data);
            });
            
        } else{
            readRecords();
        }
    });
});

function readRecords() {
    $.get("ajax/readHorasExtra.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}

$(window).on( "load", function() {
    //alert("Holaa");
    var state = GetURLParameter('msg');
    var id = GetURLParameter('id');
    var date = GetURLParameter('date');
    var cant = GetURLParameter('cant');
    if(state=='success'){
        $("#message_returned").html("Se agregaron "+cant+" horas extra al dia "+date+" para el agente cuyo ID es " + id + ".");
        $("#modal_message").modal("toggle");
    }
    else{
         if(state=='error'){
            $("#message_returned").html("No se agregaron "+cant+" horas extra al dia "+date+" para el agente cuyo ID es " + id + " pues hubo un error en los datos.");
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
