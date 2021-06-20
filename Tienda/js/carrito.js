
$(document).ready(inicio);

function inicio() {
    // $("td.cantidadProducto").click(function () {
    //     $(this).toggleClass("enabled");
    // })

    $(".cantidadProducto").on('change', function postinput() {
        let itemAct = $(this).data('item-id');
        let cantidadActualizada = $(this).val();
        alert(cantidadActualizada);
        $.ajax({
            type: 'POST',
            url: 'ajax.php',
            dataType: 'json',
            data: {
                action: 'actualizaCantidad',
                item_id: itemAct,
                item_cantidad: cantidadActualizada
            },
            success: function (data) {
                if (data.msg == 'success') {
                    window.location.href = 'carrito.php';
                }
            }
        });
    });

    $('#vaciarCarrito').click(function () {
        $.ajax({
            type: 'POST',
            url: 'ajax.php',
            dataType: 'json',
            data: {
                action: 'empty',
                empty_cart: true
            },
            success: function (data) {
                if (data.msg == 'success') {
                    window.location.href = 'carrito.php';
                }
            }
        });
    });
}



// $(document).ready(function () {
//     $(".cantidadProducto").change(function () {
//         let getItemID = $(this).data('item-id');
//         let qty = $(this).val();
//         $.ajax({
//             type: 'POST',
//             url: 'ajax.php',
//             dataType: 'json',
//             data: {
//                 action: 'update-qty',
//                 itemID: getItemID,
//                 qty: qty
//             },
//             success: function (data) {
//                 if (data.msg == 'success') {
//                     window.location.href = 'carrito.php';
//                 }
//             }
//         });
//     });

//     $('#vaciarCarrito').click(function () {
//         $.ajax({
//             type: 'POST',
//             url: 'ajax.php',
//             dataType: 'json',
//             data: {
//                 action: 'empty',
//                 empty_cart: true
//             },
//             success: function (data) {
//                 if (data.msg == 'success') {
//                     window.location.href = 'carrito.php';
//                 }
//             }
//         });
//     });
// });
