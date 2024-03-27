
const cloud = document.getElementById("cloud");
const barraLateral = document.querySelector(".barra-lateral");
const spans = document.querySelectorAll("span");
const palanca = document.querySelector(".switch");
const circulo = document.querySelector(".circulo");
const menu = document.querySelector(".menu");
const main = document.querySelector("main");

menu.addEventListener("click",()=>{
    barraLateral.classList.toggle("max-barra-lateral");
    if(barraLateral.classList.contains("max-barra-lateral")){
        menu.children[0].style.display = "none";
        menu.children[1].style.display = "block";
    }
    else{
        menu.children[0].style.display = "block";
        menu.children[1].style.display = "none";
    }
    if(window.innerWidth<=320){
        barraLateral.classList.add("mini-barra-lateral");
        main.classList.add("min-main");
        spans.forEach((span)=>{
            span.classList.add("oculto");
        })
    }
});

palanca.addEventListener("click",()=>{
    let body = document.body;
    body.classList.toggle("dark-mode");
    body.classList.toggle("");
    circulo.classList.toggle("prendido");
});

cloud.addEventListener("click",()=>{
    barraLateral.classList.toggle("mini-barra-lateral");
    main.classList.toggle("min-main");
    spans.forEach((span)=>{
        span.classList.toggle("oculto");
    });
});


/* login */
const loginForm = document.getElementById('login-form');
const usernameInput = loginForm.querySelector('input[name="username"]');
const passwordInput = loginForm.querySelector('input[name="password"]');

loginForm.addEventListener('submit', (event) => {
    event.preventDefault();
    const username = usernameInput.value.trim();
    const password = passwordInput.value.trim();

    // Implementar la lógica de validación de credenciales aquí
    // Puedes utilizar AJAX o enviar los datos al servidor de forma segura

    if (validarCredenciales(username, password)) {
        // Credenciales válidas, redirigir al usuario a la página de inicio
        window.location.href = '';
    } else {
        // Credenciales inválidas, mostrar un mensaje de error
        alert('Nombre de usuario o contraseña incorrectos');
    }
});

function validarCredenciales(username, password) {
    // Implementar la lógica de validación de credenciales
    // Aquí puedes realizar comprobaciones contra una base de datos o un servicio de autenticación

    // Ejemplo básico: validar contra un usuario y contraseña hardcodeados
    const usuarioValido = 'admin';
    const passwordValida = 'password123';

    return username === usuarioValido && password === passwordValida;
}
