const sugerencias = "Hola, me gustaria hacer una pequeña sugerencia: \n";
const problema = "Hola, quiero ponerme en contacto con usted porque ha ocurrido un problema con un pedido que he realizado: \n";
const trabajo = "Hola, me pongo en contacto con usted porque me interesaría formar parte de su empresa";
const otros = "Añada aquí un breve resumen de la razón por la que se pone en contacto";

$(document).ready(function () {
    $("#select_razon").change(function () {
        switch ($("#select_razon").val()) {
            case 1:
                $("#txtarea").text(sugerencias);
                break;
            case 2:
                $("#txtarea").text(problema);
                break;
            case 3:
                $("#txtarea").text(trabajo);
                break;
            case 4:
                $("#txtarea").text(otros);
                break;
            default:
                break;
        }
    });
});

