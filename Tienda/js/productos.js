$(document).on("click", ".card", function () {
    let id = $(this).attr('id');
    window.open("ficha-producto.php?producto=" + id, '_self');
});

$(document).ready(function () {
    $(".card").hover(function () {
        $(this).toggleClass("animate__animated animate__tada");
    });
});

$("#cerrarAlert").click(function () {
    $(".alert").hide();
});

