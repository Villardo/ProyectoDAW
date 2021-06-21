
$(document).ready(inicio);

function inicio() {
    $(".cantidadProducto").on('change', function postinput() {
        let itemAct = $(this).data('item-id');
        let cantidadActualizada = $(this).val();
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
        window.location.reload();
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
