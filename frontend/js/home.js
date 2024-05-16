const usuariosBody = document.getElementById('usuariosBody')
const rowUsuarios = document.getElementById('rowUsuarios').content
const idForm = document.getElementById('idForm')
const inputId = document.getElementById('id')
const fragment = document.createDocumentFragment()

document.addEventListener('DOMContentLoaded', () => {
    loadAllUsers()
})

const loadAllUsers = () => {
    fetch('../backend/index.php?accion=todos')
    .then((res) => res.json())
    .then((data) => {
        console.log('@@@ data => ', data)
        if (data.users && data.users.length > 0) {
            pintarUsuarios(data.users)
        }
    })
    .catch((err) => {
        console.log('@@@ err => ', err)
    })
}

const pintarUsuarios = usuarios => {
    usuariosBody.innerHTML = ''
    usuarios.forEach((user) => {
        const clone = rowUsuarios.cloneNode(true)

        clone.querySelectorAll('td')[0].textContent = user.id
        clone.querySelectorAll('td')[1].textContent = user.nombre
        clone.querySelectorAll('td')[2].textContent = user.apaterno
        clone.querySelectorAll('td')[3].textContent = user.amaterno
        clone.querySelectorAll('td')[5].textContent = user.telefono
        clone.querySelectorAll('td')[6].textContent = user.correo
        clone.querySelectorAll('td')[7].textContent = user.usuario
        clone.querySelector('.btn-danger').dataset.id = user.id
        clone.querySelector('.btn-warning').dataset.id = user.id

        const btnBorrar = clone.querySelector('.btn-danger')
        btnBorrar.addEventListener('click', () => {
            console.log('@@ btnborrar => ', btnBorrar.dataset.id)
            borrarUsuario(btnBorrar.dataset.id)
        })

        const btnActualizar = clone.querySelector('.btn-warning')
        btnActualizar.addEventListener('click', () => {
            window.location.href = `../frontend/actualizar.html?id=${btnActualizar.dataset.id}`
        })

        fragment.appendChild(clone)
    })
    usuariosBody.appendChild(fragment)
}

const borrarUsuario = id => {
    inputId.value = id
    const form = new FormData(idForm)
    fetch('../backend/index.php', {
        method: 'POST',
        body: form
    })
    .then((response) => response.json())
    .then((data) => {
        console.log('@@@ data => ', data)
        if (data.message === 'Usuario Eliminado Correctamente') {
            loadAllUsers()
        }
    })
    .catch((err) => {
        console.log('@@@ err => ', err)
    })
}