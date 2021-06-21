//Codigo de pais (+34) seguido del numero (123456789)
let tuNumero = "34123456789";
let tuMensaje = "Hola, quería concertar una cita si fuera posible";
let mensajeUrl = tuMensaje.split(' ').join('%20');

let urlWhatsapp = 'https://api.whatsapp.com/send?phone=' + tuNumero + '&text=%20' + mensajeUrl;

let email="correoEstetica@gmail.com";

$("#whatsapp").on('click', function () {
    window.open(urlWhatsapp, '_blank');
});

$("#email").on('click', function () {
    window.location.href='mailto:'+email;
});

$("#telefono").on('click', function () {
    window.location.href='tel:'+tuNumero;
});
