document.getElementById('logout-link').addEventListener('click', function(event) {
    // Evita que el enlace redireccione automáticamente
    event.preventDefault();
  
    // Muestra un mensaje de confirmación
    if (confirm('¿Estás seguro de que quieres cerrar sesión?')) {
        // Si el usuario confirma, redirige a la página de inicio de sesión
        window.location.href = this.getAttribute('href');
    }
  });