//Hago las selecciones 
const form = document.getElementById("form-inscripcion");
const inputNombre = document.getElementById("nombre");
const inputEmail = document.getElementById("email");
const inputPassword = document.getElementById("password");
const errorNombre = document.getElementById("error-nombre");
const errorEmail = document.getElementById("error-email");
const errorPassword = document.getElementById("error-password");
const selectEntrada = document.getElementById("tipo-entrada");
const talleres = document.querySelectorAll("input[name='taller']");
const resumenTotal = document.getElementById("resumen-total");

//Hago el regex
const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
const regexPassword = /^(?=.*[A-Z])(?=.*\d).{8,}$/;

//Hago la funcion para validar el campo por nombre
function validarNombre() {
    if (inputNombre.value.trim() === "") {
        errorNombre.textContent = "El nombre no puede estar vacío.";
        inputNombre.classList.add("error");
        return false;
    }
    errorNombre.textContent = "";
    inputNombre.classList.remove("error");
    return true;
}

//Hago la funcion para validar el email usando regex
function validarEmail() {
    if (!regexEmail.test(inputEmail.value)) {
        errorEmail.textContent = "Formato de email inválido.";
        inputEmail.classList.add("error");
        return false;
    }
    errorEmail.textContent = "";
    inputEmail.classList.remove("error");
    return true;
}

//Hago la funcion para validar la contraseña(min 8, 1 mayús, 1 número)
function validarPassword() {
    if (!regexPassword.test(inputPassword.value)) {
        errorPassword.textContent = "Debe tener 8 caracteres, 1 mayúscula y 1 número.";
        inputPassword.classList.add("error");
        return false;
    }
    errorPassword.textContent = "";
    inputPassword.classList.remove("error");
    return true;
}

//Hago la funcion que calcula y muestra el total a pagar
function actualizarTotal() {
    let total = Number(selectEntrada.value);

    talleres.forEach(chk => {
        if (chk.checked) total += 50;
    });

    resumenTotal.textContent = `Total a Pagar: ${total}€`;
}

//Hago los eventos de validacion
inputNombre.addEventListener("blur", validarNombre);
inputEmail.addEventListener("blur", validarEmail);
inputPassword.addEventListener("input", validarPassword);

//Hago los eventos para calcular el total
selectEntrada.addEventListener("change", actualizarTotal);
talleres.forEach(chk => chk.addEventListener("change", actualizarTotal));

//Hago el evento submit
form.addEventListener("submit", (event) => {
    event.preventDefault();

    const okNombre = validarNombre();
    const okEmail = validarEmail();
    const okPassword = validarPassword();

    if (okNombre && okEmail && okPassword) {
        form.style.display = "none";
        document.body.insertAdjacentHTML("beforeend", "<h2>¡Inscripción completada!</h2>");
    }
});