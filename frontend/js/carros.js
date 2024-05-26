document.addEventListener('DOMContentLoaded', () => {
  cargarCarros();
});

function cargarCarros() {
  const xhr = new XMLHttpRequest();
  xhr.open('GET', '../backend/obtener_carros.php', true);
  xhr.onload = function () {
      if (xhr.status === 200) {
          const carros = JSON.parse(xhr.responseText);
          mostrarCarros(carros);
      } else {
          console.error('Error al cargar los carros. Estado:', xhr.status);
      }
  };
  xhr.onerror = function () {
      console.error('Error de red al cargar los carros.');
  };
  xhr.send();
}

function mostrarCarros(carros) {
  const carrosLista = document.getElementById('carros-lista');
  carrosLista.innerHTML = ''; // Limpiar contenido anterior

  carros.forEach(carro => {
      const divCarro = document.createElement('div');
      divCarro.classList.add('carro');
      divCarro.innerHTML = `
          <h3>${carro.marca} ${carro.modelo} (${carro.anio})</h3>
          <p><strong>Precio:</strong> $${carro.precio}</p>
          <p><strong>Descripción:</strong> ${carro.descripcion}</p>
          <p><strong>Caracteristicas:</strong> ${carro.caracteristicas}</p>
          <p><strong>Disponibilidad:</strong> ${carro.disponibilidad ? 'Disponible' : 'No disponible'}</p>
          <button onclick="comprar(${carro.carro_id})">Comprar</button>
          <button onclick="rentar(${carro.carro_id})">Rentar</button>
          <hr>
      `;
      carrosLista.appendChild(divCarro);
  });
}

function comprar(id) {
  actualizarDisponibilidad(id, 0); // 0 representa "no disponible" (comprado)
}

function rentar(id) {
  actualizarDisponibilidad(id, 0); // 0 representa "no disponible" (rentado)
}

function actualizarDisponibilidad(id, nuevaDisponibilidad) {
  const xhr = new XMLHttpRequest();
  xhr.open('POST', '../backend/obtener_carros.php', true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = function () {
      if (xhr.status === 200) {
          cargarCarros(); // Recargar la lista de carros después de actualizar la disponibilidad
      } else {
          console.error('Error al actualizar la disponibilidad. Estado:', xhr.status);
      }
  };
  xhr.onerror = function () {
      console.error('Error de red al actualizar la disponibilidad.');
  };
  xhr.send(`carro_id=${id}&nueva_disponibilidad=${nuevaDisponibilidad}`);
}
