$(document).on("click",".card", function () {
    let id = $(this).attr('id'); 
    window.open("ficha-producto.php?producto=" + id, '_self');
 });