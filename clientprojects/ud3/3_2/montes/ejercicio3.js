// 3. Referencias de objetos y clonación
// ------PUNTOS: 1

// Crea un objeto usuario1 con las propiedades nombre, edad y email. Luego,
// crea una variable usuario2 y haz que sea una copia por referencia de usuario1.

// Modifica alguna propiedad de usuario2 y observa cómo cambia el objeto usuario1.

// Luego, realiza una clonación superficial del objeto usuario1 utilizando Object.assign y cambia una propiedad del clon. 
// Imprime ambos objetos para comprobar que el original no fue modificado.

const usuario1 = {
    nombre:"Ana",
    edad: 28,
    email: "ana@gmail.com"
};

const usuario2 = usuario1;

usuario2.nombre = "Juan";

console.log(usuario1);
console.log(usuario2);

const usuario3 = Object.assign({}, usuario1);
usuario3.nombre = "Pedro";
console.log(usuario1);
console.log(usuario3);