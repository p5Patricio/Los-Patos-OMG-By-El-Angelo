function comprar(carroId) {
  // Redireccionar a la página de compra con el ID del carro
  window.location.href = "../backend/controllers/comprar.php?id=" + carroId;
}

function rentar(carroId) {
  // Redireccionar a la página de renta con el ID del carro
  window.location.href = "../backend/controllers/rentar.php?id=" + carroId;
}
