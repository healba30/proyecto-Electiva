const nombre = document.getElementById("name")
const email = document.getElementById("email")
const pass = document.getElementById("password")
const form = document.getElementById("form")
const parrafo = document.getElementById("warnings")

form.addEventListener("submit", e=>{

    e.preventDefault()
    let warnings = ""
    let entrar = false
    let entrar1 = false
    let entrar2 = false
    let regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/
    parrafo.innerHTML = ""

    if(nombre.value.length < 1){
        
        warnings += `El nombre no es valido <br>`
        entrar = true
        
    }

    if(!regexEmail.test(email.value)){

        warnings += `El email no es valido <br>`
        entrar1 = true

    }

    if(pass.value.length < 8){
        
        warnings += `La contraseña no es valida <br>`
        entrar2 = true
    }

    if (entrar==false) {

        parrafo.innerHTML = warnings
        
    } else {
        parrafo.innerHTML = "Enviado"
    }

    if (entrar1=false) {

        parrafo.innerHTML = warnings
        
    } else {
        parrafo.innerHTML = "Enviado"
    }
    
    if (entrar2==false) {

        parrafo.innerHTML = warnings
            
    } else {
        parrafo.innerHTML = "Enviado"
    }

    


    
})

