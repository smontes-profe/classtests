"use strict"

// Crear objeto usuario1
let usuario1 = {
    nombre: "Carlos",
    edad: 35,
    email: "carlos@example.com"
};

// Crear usuario2 como copia por referencia de usuario1
let usuario2 = usuario1;

// Modificar una propiedad de usuario2
usuario2.edad = 40;

// Observar cómo cambia usuario1 también
console.log("usuario1 después de modificar usuario2:", usuario1);
console.log("usuario2:", usuario2);

// Clonación superficial usando Object.assign
let usuarioClon = Object.assign({}, usuario1);

// Cambiar una propiedad del clon
usuarioClon.nombre = "Luis";

// Imprimir ambos para comprobar que el original no fue modificado
console.log("usuario1 después de modificar el clon:", usuario1);
console.log("usuarioClon:", usuarioClon);
