let idUser = document.getElementById('id')
let nombre = document.getElementById('nombre')
let apaterno = document.getElementById('apaterno')
let amaterno = document.getElementById('amaterno')
let correo = document.getElementById('correo')
let telefono = document.getElementById('telefono')
let usuario = document.getElementById('usuario')
let password = document.getElementById('password')
const actualizarForm = document.getElementById('actualizarForm') || null 

const idForm = document.getElementById('idFormUpdate')
let inputId = document.getElementById('idUpdate')
let inputAccion = document.getElementById('accion')

document.addEventListener('DOMContentLoaded', () => {
    const params = new URLSearchParams(window.location.search)
    const userId = params.get('id')

    if (userId) {
        console.log('@@ id => ', userId)
        obtenerDatosUsuario(userId)
    }
})

const obtenerDatosUsuario = id => {
    inputId.value = id
    inputAccion.value = 'actualizar'
    const form = new FormData(idForm)
    
    fetch('../backend/index.php', {
        method: 'POST',
        body: form
    })
    .then((response) => response.json())
    .then((data) => {
        console.log('@@@ data => ', data)
        if (data.success) {
            idUser.value = data.user.id
            nombre.value = data.user.nombre
            apaterno.value = data.user.apaterno
            amaterno.value = data.user.amaterno
            correo.value = data.user.correo
            direccion.value = data.user.direccion
            password.value = ''
            usuario.value = data.user.usuario
            telefono.value = data.user.telefono
        }
    })
    .catch((err) => {
        console.log('@@@ err => ', err)
    })
}

if (actualizarForm){
    actualizarForm.addEventListener('submit', (event) => {
      event.preventDefault() //para hacer refresh
      const form = new FormData(actualizarForm)
    
      fetch('../backend/index.php', {
        method: 'POST',
        body: form
      })
      .then((response) => response.json())
      .then ((res) => {
        console.log('@@ res =>', res)
        if (res.message === 'Usuario Actualizado Satisfactoriamente') {
          window.location.href = '../frontend/home.html'
      }
      })
      .catch((err) => {
        console.log('@@ err =>', err)
      })   
    })
}