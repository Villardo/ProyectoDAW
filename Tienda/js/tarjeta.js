$("#card-number").focus(function () {

    var input = $("#card-number");
    input.on("keyup", function (e) {
        var value = input.val();

        if (e.keyCode === 8) {
            if (value.length == 4) {
                input.val(value.substr(0, 4));
            } else if (value.length == 9) {
                input.val(value.substr(0, 9));
            } else if (value.length == 9) {
                input.val(value.substr(0, 14));
            }
        } else {
            if (value.length == 4) {
                input.val(value + "-");
            } else if (value.length == 9) {
                input.val(value + "-");
            } else if (value.length == 14) {
                input.val(value + "-");
            }
        }
    });
});

$("#tramitar").click(function () {
    var cardnumber = $("#card-number").val();
    var cardholder = $("#card-holder").val();
    var cardmonth = $("#card-month").val();
    var cardyear = $("#card-year").val();
    var cardcvc = $("#card-cvc").val();

    if (cardnumber === "" || cardholder === "" || cardmonth === "" || cardyear === "" || cardcvc === "") {
        Swal.fire({
            icon: "error",
            text: "Error en los datos introducidos"
          })
    } else {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }, didClose: (toast) => {
                window.location.href="inicio.php"
            }
        })
        Toast.fire({
            icon: 'success',
            title: "Gracias por realizar su compra"
        })
    }
});