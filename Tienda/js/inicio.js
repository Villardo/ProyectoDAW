$('#carouselImagen').on('touchstart mousedown', function (event) {
    var xClick;
    if (event.type == 'touchstart') {
        xClick = event.originalEvent.touches[0].pageX;
    } else {
        xClick = event.originalEvent.pageX;
    }

    $(this).on('touchmove mousemove', function (event) {
        var xMove;
        if (event.type == 'touchmove') {
            xMove = event.originalEvent.touches[0].pageX;
        } else {
            xMove = event.originalEvent.pageX;
        }
        const sensitivityInPx = .5;

        if (Math.floor(xClick - xMove) > sensitivityInPx) {
            $(this).carousel('next');
        } else if (Math.floor(xClick - xMove) < -sensitivityInPx) {
            $(this).carousel('prev');
        }
    });
    $(this).on('touchend mouseover', function () {
        $(this).off('touchmove mousemove');
    });
});