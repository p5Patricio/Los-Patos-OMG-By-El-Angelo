function mostrarTarjeta(numero) {
    var tarjetas = document.querySelectorAll('.card-container');
    tarjetas.forEach(function(tarjeta) {
        tarjeta.style.display = 'none';
    });
    document.getElementById('card' + numero).style.display = 'block';
}

function toggleInfo(numero) {
    var info = document.getElementById('info' + numero);
    if (info.style.display === 'none' || info.style.display === '') {
        info.style.display = 'block';
    } else {
        info.style.display = 'none';
    }
}