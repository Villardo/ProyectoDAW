//TODO Introducir de alguna manera valores en variables.php

let latitud = 42.2133932810003;
let longitud = -8.692993569571495;
let establecimiento = "colegio+montecastelo";

let url1 = "https://www.google.com/maps/search/?api=1&query=" + latitud + "," + longitud;
let url2 = "https://www.google.com/maps/search/" + establecimiento;

//Codigo de pais (+34) seguido del numero (123456789)
let tuNumero = "34123456789";
let tuMensaje = "Hola, quería concertar una cita si fuera posible";
let mensajeUrl = tuMensaje.split(' ').join('%20');

let urlWhatsapp = 'https://api.whatsapp.com/send?phone=' + tuNumero + '&text=%20' + mensajeUrl;

let email="correoEstetica@gmail.com";

$(".fa-map-marked-alt").on('click', function () {
    window.open(url1, '_blank');
    //window.open(url2, '_blank');
});

$(".fa-whatsapp-square").on('click', function () {
    window.open(urlWhatsapp, '_blank');
});

$(".fa-envelope-square").on('click', function () {
    window.location.href='mailto:'+email;
});

$(".fa-phone-square-alt").on('click', function () {
    window.location.href='tel:'+tuNumero;
});