$(document).ready(function() {
    $("#searchbox").prop('disabled', false);
    $("#searchbox").attr("placeholder", "Buscar por apellido");
    $("#licenciaOpcion").addClass("active");
    $("#appendableDiv").append( $( "#appendHome" ) );
    readRecords();
    $("#searchbox").keyup(function(){
        var inputVal = $(this).val();
        if(inputVal.length){
            
            $.get("ajax/search.php", {term: inputVal, type: "licencia"}).done(function(data){
                // Display the returned data in browser
                $(".records_content").html(data);
            });
            
        } else{
            readRecords();
        }
    });
});

function readRecords() {
    $.get("ajax/readLicencias.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}

$(window).on( "load", function() {
    //alert("Holaa");
    var state = GetURLParameter('msg');
    var id = GetURLParameter('id');
    var date1 = GetURLParameter('date1');
    var date2 = GetURLParameter('date2');
    if(state=='success'){
        $("#message_returned").html("La licencia del dia "+date1+" al dia "+date2+" fue agregada al agente cuyo ID es " + id + ".");
        $("#modal_message").modal("toggle");
    }
    else{
         if(state=='error'){
            $("#message_returned").html("La licencia del dia "+date1+" al dia "+date2+" no fue agregada al agente cuyo ID es " + id + " porque la fecha no es valida.");
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
