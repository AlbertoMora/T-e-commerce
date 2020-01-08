window.onload = function(){
    var backs = document.getElementsByClassName('back');
    var next = document.getElementsByClassName('next');

    for(var i =0; i < backs.length; i++){
        var current = backs[i];
        current.onclick = function(){
            var ref = this.dataset.ref;
            var container = document.getElementById(ref);
            sideScroll(container, 'left',25,100,10);
        }
    }
    for(var i =0; i < next.length; i++){
        var current = next[i];
        current.onclick = function(){
            var ref = this.dataset.ref;
            var container = document.getElementById(ref);
            sideScroll(container, 'right',25,100,10);
        }
    }
}
function sideScroll(element, direction, speed, distance, step) {
    scrollAmount = 0;
    var slideTimer = setInterval(function () {
        if (direction == 'left') {
            element.scrollLeft -= step;
        } else {
            element.scrollLeft += step;
        }
        scrollAmount += step;
        if (scrollAmount >= distance) {
            window.clearInterval(slideTimer);
        }
    }, speed);
}