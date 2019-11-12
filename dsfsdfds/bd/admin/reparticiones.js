$(document).ready(function() {
    $("#searchbox").prop('disabled', true);
    
    $("#verReparticionesOpcion").addClass("active");
    $("#appendableDiv").append( $( "#appendHome" ) );
    readRecords();
});

function readRecords() {
    $.get("ajax/readReparticiones.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}