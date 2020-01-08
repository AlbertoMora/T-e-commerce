var menuTglBtn = document.getElementById('btn-nav-toggle');
console.log(menuTglBtn);
menuTglBtn.onclick = function() {
    document.querySelector('.nav-items').classList.toggle('d-none');
    document.querySelector('.nav-items').classList.toggle('d-md-none');
    document.getElementById('btn-nav-toggle').classList.toggle('open');
}