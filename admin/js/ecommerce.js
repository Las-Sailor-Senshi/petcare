///Esto va antes de cerrar la ultima llave
var nombreRec=$("#nombreRec").val();
var emailRec=$("#emailRec").val();
var direccionRec=$("#direccionRec").val();

$(document).ready(function () {
    $("#agregarCarrito").click(function (e) { 
        e.preventDefault();
        var id=$(this).data('id');
        var nombre=$(this).data('nombre');
        var web_path=$(this).data('web_path');
        var cantidad=$("#cantidadProducto").val();
        $.ajax({
            type: "post",
            url: "ajax/agregarCarrito.php",
            data: {"id":id,"nombre":nombre,"web_path":web_path,"cantidad":cantidad},
            dataType: "json",
            success: function (response) {
                var cantidad=Object.keys(response).length;
                $("#badgeProducto").text(cantidad);
            }
        });
    });
});

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