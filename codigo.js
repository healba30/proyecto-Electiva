const nombre = document.getElementById("name")
const email = document.getElementById("email")
const pass = document.getElementById("password")
const pass1 = document.getElementById("password1")
const form = document.getElementById("form")
const parrafo = document.getElementById("warnings")
let ent = false
let ent1 = false
let ent2 = false
let ent3 = false

form.addEventListener("submit", e=>{

    e.preventDefault()
    let warnings = ""
    let entrar = false
    let entrar1 = false
    let entrar2 = false
    let entrar3 = false

    let regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/
    parrafo.innerHTML = "";

    if(nombre.value.length < 1){
        
        warnings += `El nombre no es valido <br>`
        entrar = true
        
    }

    if(!regexEmail.test(email.value)){

        warnings += `El email no es valido <br>`
        entrar1 = true

    }

    if(pass.value.length == 0 || pass.value.length < 8){
        
        warnings += `La contraseña debe tener un minimo de 8 caracteres <br>`
        entrar2 = true
    }

    if(pass.value != pass1.value){
        
        warnings += `Las contraseñas no coinciden <br>`
        entrar3 = true
    }

    if (entrar==true) {

        parrafo.innerHTML = warnings
        
    } 

    if (entrar1=true) {

        parrafo.innerHTML = warnings
        
    } 
    
    if (entrar2==true) {

        parrafo.innerHTML = warnings
            
    } 

    if (entrar3==true) {

        parrafo.innerHTML = warnings
            
    } 
    
});
