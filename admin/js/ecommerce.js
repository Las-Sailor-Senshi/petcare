///Esto va antes de cerrar la ultima llave
var nombreRec=$("#nombreRec").val();
var emailRec=$("#emailRec").val();
var direccionRec=$("#direccionRec").val();
$("#jalar").click(function(e){
    var nombreCli=$("#nombreCli").val();
    var emailCli=$("#emailCli").val();
    var direccionCli=$("#direccionCli").val();

    if($(this).prop("checked")==true) {
        $("#nombreRec").val(nombreCli);
        $("#emailRec").val(emailCli);
        $("#direccionRec").val(direccionCli);
    } else {
        $("#nombreRec").val(nombreRec);
        $("#emailRec").val(emailRec);
        $("#direccionRec").val(direccionRec);
    }
});