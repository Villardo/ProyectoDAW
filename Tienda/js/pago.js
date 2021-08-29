
$(function () {
    $('#datos').find('input').change(function () {
        var nombre = $("#nombre").val();
        var apellidos = $("#apellidos").val();
        var direccion = $("#direccion").val();
        var pais = $("#pais").val();
        var codigoPostal = $("#codpostal").val();
        if (nombre === "" || apellidos === "" || direccion === "" || pais === "" || codigoPostal === "") {
            $("#botonPagar").prop('disabled', true);
        } else {
            $("#botonPagar").prop('disabled', false);
        }
    });
});