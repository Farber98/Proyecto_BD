$(window).on( "load", function() {
    //alert("Holaa");
    var error = GetURLParameter('msg');
    
    if(error=='wrong'){
        $("#message_returned").html("Lo sentimos, los campos ingresados no se corresponden con  un usuario activo.");
        $("#modal_message").modal("toggle");
    }
    if(error=='unverified'){
        $("#message_returned").html("Debe activar su email primero antes de poder utilizar su cuenta.");
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
