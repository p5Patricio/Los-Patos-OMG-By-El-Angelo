const loginForm = document.getElementById('loginForm') || null 
const registrarForm = document.getElementById('registrarForm') || null 
const signUpButton = document.getElementById('signUp') || null

if (loginForm){
loginForm.addEventListener('submit', (event) => {
  event.preventDefault() //para hacer refresh
  const form = new FormData(loginForm)

  fetch('../backend/index.php', {
    method: 'POST',
    body: form
  })
  .then((response) => response.json())
  .then ((res) => {
    console.log('@@ res =>', res)
    if (res.message === 'Inicio Satisfactorio') {
      window.location.href = '../frontend/home.html'
  }
  })
  .catch((err) => {
    console.log('@@ err =>', err)
  }) 
})
}

if (registrarForm){
  registrarForm.addEventListener('submit', (event) => {
    event.preventDefault() //para hacer refresh
    const form = new FormData(registrarForm)
  
    fetch('../backend/index.php', {
      method: 'POST',
      body: form
    })
    .then((response) => response.json())
    .then ((res) => {
      console.log('@@ res =>', res)
      if (res.message === 'Usuario Registrado Satisfactoriamente') {
        window.location.href = '../frontend/index.html'
    }
    })
    .catch((err) => {
      console.log('@@ err =>', err)
    })   
  })
  }

if (signUpButton) {
  signUpButton.addEventListener('click', (event) => {
    event.preventDefault()
    window.location.href = './registrar.html'
  })
}