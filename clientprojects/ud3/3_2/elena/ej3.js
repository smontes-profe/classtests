
// Referencias de objetos y clonacion

let usuario1 = { // Objeto 1
    nombre: "Elena",
    edad: 19, 
    email: "elena@gmail.com"
};

let usuario2 = usuario1; // Objeto 2, copia del objeto 1
usuario2.edad = 25;

let clonacion = Object.assign({}, usuario1); // Clonacion del objeto 1
clonacion.nombre = "Manolo";

console.log("Usuario 1: ", usuario1);
console.log("Clonacion: ", clonacion);


