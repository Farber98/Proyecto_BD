$(document).ready(function() {
    $("#searchbox").prop('disabled', false);
    $("#searchbox").attr("placeholder", "Buscar por apellido");
    $("#verSueldosOpcion").addClass("active");
    $("#appendableDiv").append( $( "#appendHome" ) );
    readRecords();
    $("#searchbox").keyup(function(){
        var inputVal = $(this).val();
        if(inputVal.length){            
            $.get("ajax/search.php", {term: inputVal, type: "sueldo"}).done(function(data){
                // Display the returned data in browser
                $(".records_content").html(data);
            });
            
        } else{
            readRecords();
        }
    });
});

function readRecords() {
    $.get("ajax/readSueldos.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}

