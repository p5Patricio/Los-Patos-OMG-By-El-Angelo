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

document.getElementById('logout-link').addEventListener('click', function(event) {
    // Evita que el enlace redireccione automáticamente
    event.preventDefault();

    // Muestra un mensaje de confirmación
    if (confirm('¿Estás seguro de que quieres cerrar sesión?')) {
        // Si el usuario confirma, redirige a la página de inicio de sesión
        window.location.href = this.getAttribute('href');
    }
});