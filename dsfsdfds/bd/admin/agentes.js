$(document).ready(function() {
    $("#searchbox").prop('disabled', false);
    $("#searchbox").attr("placeholder", "Buscar por apellido");
    $("#verAgentesOpcion").addClass("active");
    $("#appendableDiv").append( $( "#appendHome" ) );
    readRecords();
    $("#searchbox").keyup(function(){
        var inputVal = $(this).val();
        if(inputVal.length){
            
            $.get("ajax/search.php", {term: inputVal, type: "agentes"}).done(function(data){
                // Display the returned data in browser
                $(".records_content").html(data);
            });
            
        } else{
            readRecords();
        }
    });
    $("#botonFiltro").click(function(){
        var antiguedad = $("#antiguedad").val();
        var estado = $("#filtroPlanta option:selected").val();
        if(estado>0 && antiguedad>=0){
                //aca lo que hace
            filterReparticion(estado,antiguedad);
        }
        else{
            readRecords();
        }
    });
});

function readRecords() {
    $.get("ajax/readAgentes.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}

function filterReparticion(estado,antiguedad) {
    $.get("ajax/readAgentes.php", {estado:estado, antiguedad:antiguedad}, function (data, status) {
        $(".records_content").html(data);
    });
}