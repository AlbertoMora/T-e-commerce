var btnOpen = document.getElementById("shopping-cart-button");

btnOpen.onclick = () => {
    document.getElementById("shopping-cart").classList.toggle("display-none");
}

var btnClose = document.getElementById("close-shopping-cart");

btnClose.onclick = () => {
    document.getElementById("shopping-cart").classList.toggle("display-none");
}

var btnCleanCart = document.getElementById("clean-cart");

btnCleanCart.onclick = () => {
    var url = 'http://'+window.location.hostname + "/Proyecto/reset-cart.php";
    fetch(url, {
        method: "post",
    }).then(function(response){
        if(response.ok){
            alert("El carrito ha sido reiniciado satisfactoriamente");
            location.reload();
        }else{
            alert("No se ha podido reiniciar el carrito");
        }
    });
}