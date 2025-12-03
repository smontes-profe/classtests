// EJERCICIO 3

// Crear objeto usuario1
let usuario1 = {
    nombre: "Carlos",
    edad: 25,
    email: "carlos@example.com"
};

// Copia por referencia
let usuario2 = usuario1;

// Modificar usuario2
usuario2.edad = 30;

console.log("usuario1:", usuario1);
console.log("usuario2:", usuario2);
console.log("Los dos objetos cambiaron porque comparten la misma referencia\n");

// Clonación superficial con Object.assign
let usuario3 = Object.assign({}, usuario1);

// Cambiar propiedad del clon
usuario3.nombre = "María";

console.log("usuario1:", usuario1);
console.log("usuario3:", usuario3);
console.log("El original no fue modificado al usar Object.assign()");