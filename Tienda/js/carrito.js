$(document).ready(inicio);

function inicio() {
    $(".cantidadProducto").on('change', function postinput() {
        let itemAct = $(this).data('item-id');
        let cantidadActualizada = $(this).val();

        $.ajax({
            type: 'POST',
            url: 'carrito-ajax.php',
            dataType: 'json',
            data: {
                action: 'actualizaCantidad',
                item_id: itemAct,
                item_cantidad: cantidadActualizada
            },
            success: function (data) {
                console.log(data);
                if (data.msg == 'success') {
                    let total = "#total" + itemAct;
                    let prCont = 0;
                    let cantCont = 0;
                    $(total).text(data.total + "€");

                    var pr = $(".precioproducto");
                    var cant = $(".cantidadProducto");

                    for (var i = 0; i < pr.length; i++) {
                        cantCont += parseFloat($(cant[i]).val());
                        prCont += parseFloat($(pr[i]).text());
                    }

                    let itTotal = (cantCont == 1) ? cantCont + ' item' : cantCont + ' items';

                    $("#totalitems").text(itTotal);
                    $("#preciototal").text(parseFloat(prCont).toFixed(2) + "€");
                }
            }
        });
    });

    $('.papelera').click(function () {
        let item = $(this).data('btn-remove-id');

        $.ajax({
            type: 'POST',
            url: 'carrito-ajax.php',
            dataType: 'json',
            data: {
                action: 'eliminaItem',
                item_id: item,
            },
            success: function (data) {
                if (data.msg == 'success') {
                    location.reload();
                }
            }
        });
    });

    $('#vaciarCarrito').click(function () {
        $.ajax({
            type: 'POST',
            url: 'carrito-ajax.php',
            dataType: 'json',
            data: {
                action: 'vaciarCarrito',
                empty_cart: true
            },
            success: function (data) {
                if (data.msg == 'success') {
                    location.reload();
                }
            }
        });
    });
}
