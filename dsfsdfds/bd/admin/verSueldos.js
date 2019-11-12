$(document).ready(function() {
    $("#searchbox").prop('disabled', true);

    $("#verSueldosOpcion").addClass("active");
    $("#appendableDiv").append( $( "#appendHome" ) );
    readRecords();
   
});

function readRecords() {
    var id = GetURLParameter('id');
    $.get("ajax/readSueldosId.php", {id:id}, function (data, status) {
        $(".records_content").html(data);
    });
}

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