$(document).ready(function () {
    $.ajax({
        type: "post",
        url: "ajax/leerCarrito.php",
        dataType: "json",
        success: function (response) {
            llenarTablaPasarela(response);
        }
    });
    function llenarTablaPasarela(response){
        $("#tablaPasarela tbody").text("");
        var TOTAL=0;
        response.forEach(element => {
            var precio=parseFloat(element['precio']);
            var totalProd=element['cantidad']*precio;
            TOTAL=TOTAL+totalProd;
            $("#tablaPasarela tbody").append(
                `
                <tr>
                    <td><img src="${element['web_path']}" class="img-size-50"/></td>
                    <td>${element['nombre']}</td>
                    <td>
                        ${element['cantidad']}
                        <input type="hidden" name="id[]" value="${element['id']}">
                        <input type="hidden" name="cantidad[]" value="${element['cantidad']}">
                        <input type="hidden" name="precio[]" value="${precio.toFixed(2)}">
                    </td>
                    <td>$${precio.toFixed(2)}</td>
                    <td>$${totalProd.toFixed(2)}</td>
                <tr>
                `
            );
        });
        $("#tablaPasarela tbody").append(
            `
            <tr>
                <td colspan="4" class="text-right"><strong>Total:</strong></td>
                <td>
                $${TOTAL.toFixed(2)}
                <input type="hidden" name="total" value="${TOTAL.toFixed(2)*100}" >
                </td>
            <tr>
            `
        );
    }

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